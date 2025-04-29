<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\FundMail;
use App\Models\Fund;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Wallet;
use App\Services\SmmowlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class SmmowlController extends Controller
{
    protected $smmowlService;

    public function __construct(SmmowlService $smmowlService)
    {
        $this->smmowlService = $smmowlService;
    }

    public function Services()
    {
        $result = []; // Initialize an array to store data
        $userId = session('USER_ID'); // Get user ID from session
        $user_id_admin = session('USER_IS_ADMIN');
        $result['userDetails'] = User::find($userId);
        // Fetch user balance
        $result['userbalance'] = ($user_id_admin == 1) ? 0.00 : optional(Wallet::where('user_id', $userId)->first())->wallet_balance ?? 0.00;

        $result['services'] = $this->smmowlService->getAllServices();

        if (isset($result['services']['error'])) {
            return response()->json(['error' => 'Failed to fetch services'], 500);
        }

        // return response()->json($services);


        return view('Services', $result);
    }

    public function ManageFunds()
    {
        $userId = session('USER_ID');
        $user_id_admin = session('USER_IS_ADMIN');
        $result = [
            'userDetails' => User::find($userId),
            'userbalance' => $user_id_admin == 1 ? 0.00 : Wallet::where('user_id', $userId)->value('wallet_balance') ?? 0.00,
            'referralsbonus' => $user_id_admin == 1 ? 0.00 : Wallet::where('user_id', $userId)->value('refer_bonus') ?? 0.00,
            'spendbalance' => $user_id_admin == 1 ? 0.00 : Order::where('user_session_id', $userId)->sum('charge'),
            'total_order' => DB::table('orders')->when($userId !== 1, fn($query) => $query->where('user_session_id', $userId))->count(),
            'total_funds' => $user_id_admin == 1 ? Fund::all() : Fund::where('user_id', $userId)->get(),
            'total_ticket_count' => $user_id_admin == 1 ? Ticket::count() : Ticket::where('user_id', $userId)->count(),
            'latest_tickets' => Ticket::where('user_id', $userId)->orderBy('created_at', 'desc')->take(4)->get(),
        ];

        return view("ManageFunds", $result);
    }

    public function store(Request $request)
    {
        $rules = [
            'category' => 'required',
            'amount' => 'required|numeric|min:200', // Minimum amount Rs 200
            'phone' => 'required|digits:10', // Ensure phone is exactly 10 digits
        ];

        $messages = [
            'category.required' => 'Please select the category!',
            'amount.required' => 'Please enter the amount!',
            'amount.numeric' => 'The amount must be a number!',
            'amount.min' => 'Minimum amount should be Rs 200!',
            'phone.required' => 'Please enter a phone number!',
            'phone.digits' => 'Phone number must be 10 digits!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $amount = $request->input('amount');
        $phone = $request->input('phone');
        // Store in Laravel session
        Session::put('session_amount', $amount);
        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $order = $api->order->create([
                'receipt' => uniqid(),
                'amount' => $amount * 100, // Convert to paise
                'currency' => 'INR',
            ]);
            return response()->json([
                'order_id' => $order['id'],
                'amount' => $amount,
                'message' => 'Order created successfully. Proceed to payment.',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error creating order: ' . $e->getMessage());
        }
    }


    public function paymentSuccess(Request $request)
    {
        $orderId = $request->query('order_id');
        $payment_id = $request->query('payment_id');
        $amount = Session::get('session_amount');
        $userId = session('USER_ID');

        if ($amount > 0 && isset($userId)) {
            setMailConfig();
            $wallet = DB::table('wallets')->where('user_id', $userId)->first();
            if ($wallet) {
                // Add the new amount to the existing balance
                $wallet = Wallet::where('user_id', $userId)->first();
                $wallet->wallet_balance += $amount;
                $wallet->first_add_fund = 'true';
                $wallet->save();

                // Add fund details 
                $fund = new Fund();
                $fund->order_id = $orderId;
                $fund->payment_id = $payment_id;
                $fund->payment_method = "Razorpay";
                $fund->amount = $amount;
                $fund->user_id = $userId;
                $fund->save();


                $fundDetails = [
                    'Name'      => session('USER_FULL_NAME'),
                    'PAYMENT_ORDER_ID' => $payment_id,
                    'ORDER_PAYMENT_ID' => $orderId,
                    'Amount' => $amount,
                    'Transaction_Date' => now()->format('d-m-Y H:i:s'),
                    'subject' => 'Payment Transaction Confirmation'
                ];

                // Send mail
                Mail::to(session('USER_EMAIL'))->send(new FundMail($fundDetails));

                return redirect()->route('manage.funds')->with('success', 'Fund added successfully.');
            } else {
                return redirect()->back()->with('error', 'Wallet not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid amount or user session.');
        }
    }
    public function MassOrder()
    {
        $result = []; // Initialize an array to store data
        $userId = session('USER_ID'); // Get user ID from session
        $result['userDetails'] = User::find($userId);
        $user_id_admin = session('USER_IS_ADMIN');
        // Fetch user balance
        $result['userbalance'] = ($user_id_admin == 1) ? 0.00 : optional(Wallet::where('user_id', $userId)->first())->wallet_balance ?? 0.00;
        return view('MassOrder', $result);
    }

    public function logout(Request $req)
    {
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->forget('USER_NAME');
        session()->forget('USER_EMAIL');
        session()->flush();
        return redirect()->route('login')->with('success', 'Logout successful!');
    }

    public function AccountSetting()
    {
        $userId = session('USER_ID');
        $user_id_admin = session('USER_IS_ADMIN');
        $result = [
            'userDetails' => User::find($userId),
            'userbalance' =>  $user_id_admin == 1 ? 0.00 : Wallet::where('user_id', $userId)->value('wallet_balance') ?? 0.00,
            'referralsbonus' =>  $user_id_admin == 1 ? 0.00 : Wallet::where('user_id', $userId)->value('refer_bonus') ?? 0.00,
            'spendbalance' =>  $user_id_admin == 1 ? 0.00 : Order::where('user_session_id', $userId)->sum('charge'),
            'total_order' => DB::table('orders')->when($userId !== 1, fn($query) => $query->where('user_session_id', $userId))->count(),
            'total_funds' =>  $user_id_admin == 1 ? Fund::all() : Fund::where('user_id', $userId)->get(),
            'total_ticket_count' =>  $user_id_admin == 1 ? Ticket::count() : Ticket::where('user_id', $userId)->count(),
            'latest_tickets' => Ticket::where('user_id', $userId)->orderBy('created_at', 'desc')->take(4)->get(),
        ];
        return view('AccountSetting', $result);
    }
}

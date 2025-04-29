<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{

    public function Index()
    {
        return view('Home.index');
    }

    public function Login()
    {
        return view('Home.login');
    }

    public function processLogin(Request $req)
    {
        $rules = [
            'useremail' => 'required|email',
            'pwd' => 'required',
        ];

        $messages = [
            'useremail.required' => 'Please enter your email!',
            'useremail.email' => 'Please enter a valid email address!',
            'pwd.required' => 'Please enter your password!',
        ];


        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $req->post('useremail');
        $password = $req->post('pwd');

        $result = User::where(['email' => $email, 'is_del' => true])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $req->session()->put('USER_LOGIN', true);
                $req->session()->put('USER_ID', $result->id);
                $req->session()->put('USER_NAME', $result->username);
                $req->session()->put('USER_EMAIL', $result->email);
                // Redirect to Dashboard with Success Message

                if ($result->is_admin == true) {
                    return redirect()->route('dashboard')->with('success', 'Login successful!');
                } else {
                    return redirect()->route('dashboard')->with('success', 'Login successful!');
                }
            } else {
                return redirect()->back()->with('error', 'Your password is invalid.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials!');
        }
    }


    public function registration(Request $request, $refer = null)
    {
        return view('Home.Registration', ['referral' => $refer]);
    }


    public function registrationProcess(Request $request)
    {
        try {
            $timezone = date_default_timezone_get();
            // Define validation rules
            $rules = [
                'username' => 'required|string|unique:users,username|max:255',
                'useremail' => 'required|email|unique:users,email',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'whatsapp_no' => 'required|numeric|digits:10',
                'referral_user' => 'nullable|string|exists:users,username', // Optional, must exist in users table
                'pwd' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                    'confirmed'
                ],

            ];

            // Define custom error messages
            $messages = [
                'username.required' => 'Please enter your username!',
                'username.unique' => 'This username is already registered!',
                'useremail.required' => 'Please enter your email!',
                'useremail.email' => 'Please enter a valid email address!',
                'useremail.unique' => 'This email is already registered!',
                'first_name.required' => 'Please enter your first name!',
                'last_name.required' => 'Please enter your last name!',
                'whatsapp_no.required' => 'Please enter your mobile number!',
                'whatsapp_no.numeric' => 'Your mobile number must be numeric!',
                'whatsapp_no.digits' => 'Your mobile number must be exactly 10 digits!',
                'referral_user.exists' => 'Referral username is not valid!',
                'pwd.required' => 'Please enter a password!',
                'pwd.min' => 'Password must be at least 8 characters long!',
                'pwd.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character!',
                'pwd.confirmed' => 'Passwords do not match!',
            ];
            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create user
            $rand_id = rand(111111111, 999999999);
            $register = new User();
            $register->username = $request->post('username');
            $register->email = $request->post('useremail');
            $register->first_name = $request->post('first_name');
            $register->last_name = $request->post('last_name');
            $register->whatsapp_no = $request->post('whatsapp_no');
            $register->password = Hash::make($request->post('pwd_confirmation'));
            $register->is_admin = false;
            $register->refer = $request->post('referral_user');
            $register->created_at = Carbon::now($timezone); // Set timestamp with system timezone
            $register->updated_at = Carbon::now($timezone);
            if ($register->save()) {
                // Check if referral user exists
                $referralUser = User::where('username', $request->referral_user)->first();

                if ($referralUser) {
                    // Ensure refer_count is not NULL before incrementing
                    if ($referralUser->refer_count === null) {
                        $referralUser->refer_count = 1;
                    } else {
                        $referralUser->refer_count += 1;
                    }
                    $referralUser->updated_at = Carbon::now($timezone);
                    $referralUser->save();
                }

                // Get the inserted user ID
                $insertedUserId = $register->id;
                $welcome_bonus = 100;
                $referral_bonus = 20;

                // Create a new wallet entry for the registered user
                Wallet::create([
                    'user_id' => $insertedUserId,
                    'welcome_bonus' => $welcome_bonus,
                    'wallet_balance' => $welcome_bonus, // Initial balance
                    'created_at' => Carbon::now($timezone), // Set timestamp with system timezone
                    'updated_at' => Carbon::now($timezone),
                ]);

                // If referral user exists, update their wallet balance
                if ($referralUser) {
                    $referrerWallet = Wallet::firstOrNew(['user_id' => $referralUser->id]);
                    $referrerWallet->refer_bonus = ($referrerWallet->refer_bonus ?? 0) + $referral_bonus;
                    $referrerWallet->wallet_balance = ($referrerWallet->wallet_balance ?? 0) + $referral_bonus;
                    $referralUser->updated_at = Carbon::now($timezone);
                    $referrerWallet->save();
                }
                $toEmail = $request->post('useremail');
                $messageData = "Registration successful! You can now log in.";
                Mail::to($toEmail)->send(new TestMail($messageData));
                // Mail::raw("", function ($message) use ($request) {
                //     $message->to($request->post('useremail'))
                //         ->subject("Register Account");
                // });
                return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
            } else {
                return redirect()->back()->with('error', 'Oops! Something went wrong. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ForgotPassword()
    {
        return view('Home.ForgotPassword');
    }

    public function ForgotPasswordProcess(Request $request)
    {
        $user = DB::table('users')->where('email', $request->str_forgot_email)->first();

        if ($user) {
            $otp = rand(100000, 999999);
            DB::table('users')->where('email', $request->str_forgot_email)->update([
                'otp' => $otp,
                'otp_expiry' => now()->addMinutes(10)
            ]);

            Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                $message->to($request->str_forgot_email)
                    ->subject("Your OTP for Password Reset");
            });


            return response()->json(['status' => 'success', 'msg' => 'OTP sent to your email.']);
            return redirect()->back()->with('error', 'OTP sent to your email.');
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Email ID not registered']);
            return redirect()->back()->with('error', 'Email ID not registered');
        }
    }

    public function VerifyOtp(Request $request)
    {
        $user = DB::table('users')->where('otp', $request->otp)->where('otp_expiry', '>=', now())->first();

        if ($user) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Invalid or expired OTP.']);
        }
    }

    public function ResetPassword(Request $request)
    {
        DB::table('users')->where('otp', '!=', null)->update([
            'password' => Hash::make($request->new_password),
            'otp' => null
        ]);

        return response()->json(['status' => 'success', 'msg' => 'Password reset successful.']);
    }


    public function ReferralProcess(Request $request)
    {
        $username = DB::table('users')->where('username', $request->str_refferal_code)->first();
        if ($username) {
            $request->session()->put('USERNAME', $username->first_name . " " . $username->last_name);
            return response()->json([
                'status' => 'success',
                'msg' => 'Referral code applied successfully',
                'data' => [
                    'refer_code' => $username->username
                ]
            ]);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Your referral code is not correct']);
        }
    }
}

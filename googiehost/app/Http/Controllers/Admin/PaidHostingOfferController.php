<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\paidHostingOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaidHostingOfferController extends Controller
{
    public function index()
    {
        // Fetch all FAQs from the database
        $result['data'] = paidHostingOffer::with('pagePaidOffer')->get();

        return view('admin.paid-hosting-offers.index', $result);
    }

    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? paidHostingOffer::findOrFail($id) : null;
        dd($result);
        return view('admin.paid-hosting-offers.manage-offer', $result);
    }

    public function store(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'title' => 'required|string',
                'offer_text' => 'nullable|string',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'description' => 'nullable|string',
                'button_link' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update 
                $paidOffer = paidHostingOffer::find($id);
                $msg = 'Paid Hosting Offer updated successfully!';
            } else {
                // Create
                $paidOffer = new paidHostingOffer();
                $msg = 'Paid Hosting Offer created successfully!';
            }

            $paidOffer->page_id = $request->input('page_id');
            $paidOffer->title = $request->input('title');
            $paidOffer->offer_text = $request->input('offer_text');
            $paidOffer->description = $request->input('description');
            $paidOffer->button_link = $request->input('button_link');
            $paidOffer->status = 'active';
            // Handle profile image upload
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($paidOffer->image && Storage::exists('public/offers/paid/' . $paidOffer->image)) {
                    Storage::delete('public/offers/paid/' . $paidOffer->image);
                }

                // Upload new image
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('offers/paid/', $image, $image_name);

                // Save new file name
                $paidOffer->image = $image_name;
            }
            $paidOffer->save();

            return redirect()->route('offer.paid')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $paidOffer = paidHostingOffer::findOrFail($id);
            $paidOffer->status = $status;
            $paidOffer->save();
            return redirect()->route('offer.paid')->with('success', 'Paid Hosting Offer status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delPaidPlans($id)
    {
        try {
            $paidOffer = paidHostingOffer::findOrFail($id);
            $paidOffer->delete();
            return redirect()->route('offer.paid')->with('success', 'Paid Hosting Offer deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

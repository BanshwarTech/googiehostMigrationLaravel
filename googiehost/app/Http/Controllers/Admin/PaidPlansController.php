<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\PaidHosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaidPlansController extends Controller
{
    public function index()
    {
        $result['data'] = PaidHosting::with('pagePaid')->get();
        return view('admin.paid-hosting-plans.index', $result);
    }
    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? PaidHosting::findOrFail($id) : null;
        return view('admin.paid-hosting-plans.manage-plans', $result);
    }
    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'plan_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'rating' => 'nullable|string',
                'listing_point' => 'nullable|string',
                'deal_points' => 'nullable|string',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the HeroSection
                $service = PaidHosting::find($id);
                $msg = 'Paid Hosting Plans updated successfully!';
            } else {
                // Create a new HeroSection
                $service = new PaidHosting();
                $msg = 'Paid Hosting Plans created successfully!';
            }
            $service->page_id = $request->input('page_id');
            $service->rating = $request->input('rating');
            $service->listing_points = $request->input('listing_point');
            $service->deal_points = $request->input('deal_points');
            $service->button_text = $request->input('button_text');
            $service->button_link = $request->input('button_link');
            $service->status = 'active';

            // Handle profile image upload
            if ($request->hasFile('plan_image')) {
                // Delete old plan_image if it exists
                if ($service->plan_image && Storage::exists('public/paidplans/paidHosting' . $service->plan_image)) {
                    Storage::delete('public/paidplans/paidHosting/' . $service->plan_image);
                }

                // Upload new plan_image
                $plan_image = $request->file('plan_image');
                $plan_image_name = time() . '.' . $plan_image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('paidplans/paidHosting/', $plan_image, $plan_image_name);

                // Save new file name
                $service->plan_image = $plan_image_name;
            }

            $service->save();

            return redirect()->route('admin.paid-hosting-plans')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    public function status($id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $faq = PaidHosting::findOrFail($id);
            $faq->status = $status;
            $faq->save();
            return redirect()->route('admin.paid-hosting-plans')->with('success', 'Paid Hosting Plans status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the Paid Hosting Plans status.');
        }
    }
    public function delPaidPlans($id)
    {
        try {
            $paid = PaidHosting::findOrFail($id);
            $paid->delete();
            return redirect()->route('admin.paid-hosting-plans')->with('success', 'Paid Hosting Plans deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Paid Hosting Plans.');
        }
    }
}

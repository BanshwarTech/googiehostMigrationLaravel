<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\VpsHosting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VpsPlansController extends Controller
{
    public function index()
    {
        $result['data'] = VpsHosting::with('pageVps')->get();
        return view('admin.vps-hosting-plans.index', $result);
    }
    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? VpsHosting::findOrFail($id) : null;
        return view('admin.vps-hosting-plans.manage-plans', $result);
    }
    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'logo_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'offer_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'title' => 'nullable|string',
                'description' => 'nullable|string',
                'coupon_code' => 'nullable|string',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the HeroSection
                $vps = VpsHosting::find($id);
                $msg = 'VPS Hosting Plans updated successfully!';
            } else {
                // Create a new HeroSection
                $vps = new VpsHosting();
                $msg = 'VPS Hosting Plans created successfully!';
            }
            $vps->page_id = $request->input('page_id');
            $vps->title = $request->input('title');
            $vps->description = $request->input('description');
            $vps->coupon_code = $request->input('coupon_code');
            $vps->button_text = $request->input('button_text');
            $vps->button_link = $request->input('button_link');
            $vps->status = 'active';

            // Handle profile image upload

            if ($request->hasFile('logo_image')) {
                // Delete old logo_image if it exists
                if ($vps->logo_image && Storage::exists('public/paidplans/vpsHosting/logo_image' . $vps->logo_image)) {
                    Storage::delete('public/paidplans/vpsHosting/logo_image/' . $vps->logo_image);
                }

                // Upload new logo_image
                $logo_image = $request->file('logo_image');
                $logo_image_name = time() . '.' . $logo_image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('paidplans/vpsHosting/logo_image/', $logo_image, $logo_image_name);

                // Save new file name
                $vps->logo_image = $logo_image_name;
            }

            if ($request->hasFile('offer_image')) {
                // Delete old offer_image if it exists
                if ($vps->offer_image && Storage::exists('public/paidplans/vpsHosting/offer_image' . $vps->offer_image)) {
                    Storage::delete('public/paidplans/vpsHosting/offer_image/' . $vps->offer_image);
                }

                // Upload new offer_image
                $offer_image = $request->file('offer_image');
                $offer_image_name = time() . '.' . $offer_image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('paidplans/vpsHosting/offer_image/', $offer_image, $offer_image_name);

                // Save new file name
                $vps->offer_image = $offer_image_name;
            }

            $vps->save();

            return redirect()->route('admin.paid-hosting-plans')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    public function status($id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $vps = VpsHosting::findOrFail($id);
            $vps->status = $status;
            $vps->save();
            return redirect()->route('admin.paid-hosting-plans')->with('success', 'VPS Hosting Plans status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the VPS Hosting Plans status.');
        }
    }
    public function delVPSPlans($id)
    {
        try {
            $vps = VpsHosting::findOrFail($id);
            $vps->delete();
            return redirect()->route('admin.paid-hosting-plans')->with('success', 'VPS Hosting Plans deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the VPS Hosting Plans.');
        }
    }
}

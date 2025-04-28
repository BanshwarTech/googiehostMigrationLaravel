<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DedicatedServe;
use App\Models\ManagePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DedicatedPlansController extends Controller
{
    public function index()
    {
        $result['data'] = DedicatedServe::with('pageDedicated')->get();
        return view('admin.dedicated-server-plans.index', $result);
    }
    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? DedicatedServe::findOrFail($id) : null;
        return view('admin.dedicated-server-plans.manage-plans', $result);
    }
    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'logo_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'read_review_url' => 'nullable|string',
                'deal_points' => 'nullable|string',
                'discount' => 'nullable|string',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|string|max:255',
                'short_desc' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the HeroSection
                $dedica = DedicatedServe::find($id);
                $msg = 'Dedicated Hosting Plans updated successfully!';
            } else {
                // Create a new HeroSection
                $dedica = new DedicatedServe();
                $msg = 'Dedicated Hosting Plans created successfully!';
            }
            $dedica->page_id = $request->input('page_id');
            $dedica->read_review_url = $request->input('read_review_url');
            $dedica->deal_points = $request->input('deal_points');
            $dedica->discount = $request->input('discount');
            $dedica->button_text = $request->input('button_text');
            $dedica->button_link = $request->input('button_link');
            $dedica->short_desc = $request->input('short_desc');
            $dedica->status = 'active';

            // Handle profile image upload

            if ($request->hasFile('logo_image')) {
                // Delete old logo_image if it exists
                if ($dedica->logo_image && Storage::exists('public/paidplans/dediHosting' . $dedica->logo_image)) {
                    Storage::delete('public/paidplans/dediHosting/' . $dedica->logo_image);
                }

                // Upload new logo_image
                $logo_image = $request->file('logo_image');
                $logo_image_name = time() . '.' . $logo_image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('paidplans/dediHosting/', $logo_image, $logo_image_name);

                // Save new file name
                $dedica->logo_image = $logo_image_name;
            }
            $dedica->save();

            return redirect()->route('admin.dedicated-hosting-plans')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    public function status($id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $dedica = DedicatedServe::findOrFail($id);
            $dedica->status = $status;
            $dedica->save();
            return redirect()->route('admin.dedicated-hosting-plans')->with('success', 'Dedicated Hosting Plans status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the Dedicated Hosting Plans status.');
        }
    }
    public function delDediPlans($id)
    {
        try {
            $dedica = DedicatedServe::findOrFail($id);
            $dedica->delete();
            return redirect()->route('admin.dedicated-hosting-plans')->with('success', 'Dedicated Hosting Plans deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Dedicated Hosting Plans.');
        }
    }
}

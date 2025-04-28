<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\vpsHostingOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VpsHostingOfferController extends Controller
{
    public function index()
    {
        // Fetch all FAQs from the database
        $result['data'] = vpsHostingOffer::with('pageVpsOffer')->get();

        return view('admin.vps-hosting-offers.index', $result);
    }

    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? vpsHostingOffer::findOrFail($id) : null;
        return view('admin.vps-hosting-offers.manage-offer', $result);
    }

    public function store(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'title' => 'required|string',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'price' => 'nullable|string',
                'performance' => 'nullable|string',
                'speed' => 'nullable|string',
                'support' => 'nullable|string',
                'description' => 'nullable|string',
                'response_time' => 'nullable|string',
                'server_uptime' => 'nullable|string',
                'live_status' => 'nullable|string',
                'list_heading' => 'nullable|string',
                'list_point' => 'nullable|string',
                'button_link' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update 
                $vpsOffer = vpsHostingOffer::find($id);
                $msg = 'Vps Hosting Offer updated successfully!';
            } else {
                // Create
                $vpsOffer = new vpsHostingOffer();
                $msg = 'Vps Hosting Offer created successfully!';
            }

            $vpsOffer->page_id = $request->input('page_id');
            $vpsOffer->title = $request->input('title');
            $vpsOffer->price = $request->input('price');
            $vpsOffer->performance = $request->input('performance');
            $vpsOffer->speed = $request->input('speed');
            $vpsOffer->support = $request->input('support');
            $vpsOffer->description = $request->input('description');
            $vpsOffer->response_time = $request->input('response_time');
            $vpsOffer->server_uptime = $request->input('server_uptime');
            $vpsOffer->live_status = $request->input('live_status');
            $vpsOffer->list_heading = $request->input('list_heading');
            $vpsOffer->list_point = $request->input('list_point');
            $vpsOffer->button_link = $request->input('button_link');
            $vpsOffer->status = 'active';
            // Handle profile image upload
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($vpsOffer->image && Storage::exists('public/offers/vps/' . $vpsOffer->image)) {
                    Storage::delete('public/offers/vps/' . $vpsOffer->image);
                }

                // Upload new image
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('offers/vps/', $image, $image_name);

                // Save new file name
                $vpsOffer->image = $image_name;
            }
            $vpsOffer->save();

            return redirect()->route('offer.vps')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $vpsOffer = vpsHostingOffer::findOrFail($id);
            $vpsOffer->status = $status;
            $vpsOffer->save();
            return redirect()->route('offer.vps')->with('success', 'Vps Hosting Offer status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delPaidPlans($id)
    {
        try {
            $vpsOffer = vpsHostingOffer::findOrFail($id);
            $vpsOffer->delete();
            return redirect()->route('offer.vps')->with('success', 'Vps Hosting Offer deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

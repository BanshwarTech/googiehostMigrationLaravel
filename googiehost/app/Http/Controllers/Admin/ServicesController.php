<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function index()
    {
        $result['data'] = ServiceSection::with('pageService')->get();
        return view('admin.services-section', $result);
    }
    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? ServiceSection::findOrFail($id) : null;
        return view('admin.manage-services-section', $result);
    }

    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the HeroSection
                $service = ServiceSection::find($id);
                $msg = 'Service Section updated successfully!';
            } else {
                // Create a new HeroSection
                $service = new ServiceSection();
                $msg = 'Service Section created successfully!';
            }
            $service->page_id = $request->input('page_id');
            $service->title = $request->input('title');
            $service->description = $request->input('description');
            $service->button_text = $request->input('button_text');
            $service->button_link = $request->input('button_link');
            $service->status = 'active';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/services'), $imageName);
                $service->image = 'images/services/' . $imageName;
            }
            $service->save();

            return redirect()->route('admin.services-section')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}

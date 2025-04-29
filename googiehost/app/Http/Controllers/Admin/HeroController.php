<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\ManagePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroController extends Controller
{
    public function index()
    {
        // Fetch all hero sections from the database
        $result['data'] = HeroSection::with('page')->get();
        return view('admin.hero-section', $result);
    }
    public function upsert($id = null)
    {
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? HeroSection::findOrFail($id) : null;
        return view('admin.manage-hero-section', $result);
    }
    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'title' => 'required|string',
                'subtitle' => 'nullable|string',
                'listing_point' => 'nullable|string',
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the HeroSection
                $hero = HeroSection::find($id);
                $msg = 'Hero Section updated successfully!';
            } else {
                // Create a new HeroSection
                $hero = new HeroSection();
                $msg = 'Hero Section created successfully!';
            }

            $hero->page_id = $request->input('page_id');
            $hero->title = $request->input('title');
            $hero->subtitle = $request->input('subtitle');
            $hero->listing_point = $request->input('listing_point');
            $hero->status = 'active';
            // Handle profile image upload
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($hero->image && Storage::exists('public/uploads/hero/' . $hero->image)) {
                    Storage::delete('public/uploads/hero/' . $hero->image);
                }

                // Upload new image
                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('uploads/hero/', $image, $image_name);

                // Save new file name
                $hero->image = $image_name;
            }
            $hero->save();

            return redirect()->route('admin.hero-section')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delHeroSection($id)
    {
        try {
            $hero = HeroSection::findOrFail($id);
            $hero->delete();
            return redirect()->route('admin.hero-section')->with('success', 'Hero Section deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Hero Section.');
        }
    }
}

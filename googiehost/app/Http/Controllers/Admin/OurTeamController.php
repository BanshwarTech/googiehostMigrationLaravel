<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OurTeamController extends Controller
{
    public function Index()
    {
        $result['data'] = OurTeam::get();
        return view('admin.our-team.index', $result);
    }

    public function ManageTeam($id = null)
    {
        $result['data'] =  $id ? OurTeam::findOrFail($id) : null;
        return view('admin.our-team.manage-our-team', $result);
    }

    public function ManageTeamProcess(Request $request, $id = null)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
                'linkedin_url' => 'nullable|string|max:255',
                'twitter_url' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update
                $team = OurTeam::find($id);
                $msg = 'Our Team updated successfully!';
            } else {
                // Create
                $team = new OurTeam();
                $msg = 'Our Team created successfully!';
            }

            if ($request->hasFile('profile_image')) {
                if ($team->profile_image && Storage::exists('public/our-team/' . $team->profile_image)) {
                    Storage::delete('public/our-team/' . $team->profile_image);
                }

                // Upload new profile_image
                $profile_image = $request->file('profile_image');
                $profile_image_name = time() . '.' . $profile_image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('our-team/', $profile_image, $profile_image_name);

                // Save new file name
                $team->profile_image = $profile_image_name;
            }
            $team->name = $request->input('name');
            $team->role = $request->input('role');
            $team->linkedin_url = $request->input('linkedin_url');
            $team->twitter_url = $request->input('twitter_url');
            $team->status = 'active';
            $team->save();

            return redirect()->route('our.team')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
}

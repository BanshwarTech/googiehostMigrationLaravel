<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\Privacy;
use App\Models\terms;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addPages()
    {
        $result['data'] = ManagePages::all();
        return view('admin.pages', $result);
    }

    public function managePage($id = null)
    {
        $result['data'] =  $id ? ManagePages::findOrFail($id) : null;
        return view('admin.manage-page', $result);
    }

    public function manageStore(Request $request, $id = null)
    {
        try {
            $validator = Validator::make($request->all(), [
                'page_name' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Process the page management logic here
            if ($id) {
                // Update the page
                $page = ManagePages::find($id);
                $msg = 'Page updated successfully!';
            } else {
                // Create a new page
                $page = new ManagePages();
                $msg = 'Page created successfully!';
            }

            $page->page_name = $request->input('page_name');
            $page->page_status = 'active';
            $page->save();

            return redirect()->route('admin.pages')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function manageDelete($id = null)
    {
        try {
            $page = ManagePages::findOrFail($id);
            $page->delete();
            return redirect()->route('admin.pages')->with('success', 'Page deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the page.');
        }
    }

    // manage terms 
    public function ManageTerms()
    {
        $result['data'] = terms::where('id', 1)->first(); // <-- first() instead of get()
        return view('admin.manage-terms', $result);
    }


    public function ManageTermsProcess(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Update existing record
            $terms = terms::find(1); // Find the record with ID 1

            if (!$terms) {
                return redirect()->back()->with('error', 'Terms not found.');
            }

            $terms->description = $request->post('description');
            $terms->save();

            $msg = 'Terms updated successfully!';
            return redirect()->route('terms.manage')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // manage privacy 
    public function ManagePrivacy()
    {
        $result['data'] = Privacy::where('id', 1)->first(); // <-- first() instead of get()
        return view('admin.manage-privacy', $result);
    }


    public function ManagePrivacyProcess(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Update existing record
            // $privacy = Privacy::find(1); // Find the record with ID 1
            $privacy = new Privacy();

            if (!$privacy) {
                return redirect()->back()->with('error', 'Privacy not found.');
            }

            $privacy->description = $request->post('description');
            $privacy->save();

            $msg = 'Pprivacy updated successfully!';
            return redirect()->route('privacy.manage')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

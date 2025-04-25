<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
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
}

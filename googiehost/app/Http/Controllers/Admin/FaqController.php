<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\faq;
use App\Models\ManagePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        // Fetch all FAQs from the database
        $result['data'] = faq::with('pageFaqs')->where('status', 'active')->get();

        return view('admin.faq-section', $result);
    }
    public function upsert($id = null)
    {
        // Fetch the FAQ data for editing or create a new one
        $result['pages'] = ManagePages::all();
        $result['data'] = $id ? faq::findOrFail($id) : null;
        return view('admin.manage-faq-section', $result);
    }
    public function upsertProcess(Request $request, $id = null)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'page_id' => 'required|numeric|exists:manage_pages,id',
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Process the FAQ management logic here
            if ($id) {
                // Update the FAQ
                $faq = faq::find($id);
                $msg = 'FAQ updated successfully!';
            } else {
                // Create a new FAQ
                $faq = new faq();
                $msg = 'FAQ created successfully!';
            }
            $faq->page_id = $request->input('page_id');
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');
            $faq->status = 'active';
            $faq->save();

            return redirect()->route('admin.faq-section')->with('success', $msg);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function status(Request $request, $id, $status)
    {
        try {

            // Find the FAQ by ID and update its status
            $faq = faq::findOrFail($id);
            $faq->status = $status;
            $faq->save();
            return redirect()->route('admin.faq-section')->with('success', 'FAQ status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the FAQ status.');
        }
    }

    public function delFaqSection($id)
    {
        try {
            // Find the FAQ by ID and delete it
            $faq = faq::findOrFail($id);
            $faq->delete();
            return redirect()->route('admin.faq-section')->with('success', 'FAQ deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the FAQ.');
        }
    }
}

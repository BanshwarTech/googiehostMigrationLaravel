<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            },
            'faqSection' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(1);
        return view('index', $result);
    }
    public function freehosting(Request $request)
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            },
            'faqSection' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(2);
        // dd($result['data']);
        return view('freehosting', $result);
    }

    public function webHostingSaleCoupons()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            },
            'faqSection' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(3);

        return view('web-hosting-sale-coupons', $result);
    }
}

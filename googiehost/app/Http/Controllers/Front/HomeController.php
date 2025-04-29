<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ManagePages;
use App\Models\OurTeam;
use App\Models\Privacy;
use App\Models\terms;
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
            },
            'paidHosting' => function ($query) {
                $query->where('status', 'active');
            },
            'paidHostingOffer' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(3);

        return view('web-hosting-sale-coupons', $result);
    }


    public  function cheapVpsHosting()
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
            },
            'vpsHosting' => function ($query) {
                $query->where('status', 'active');
            },
            'vpsHostingOffer' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(4);

        return view('cheap-vps-hosting', $result);
    }


    public  function cheapDedicatedServer()
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
            },
            'dedicatedServer' => function ($query) {
                $query->where('status', 'active');
            },
            'dedicatedServerOffer' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(5);

        return view('cheap-dedicated-server', $result);
    }
    public function freeLandingPageHosting()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'faqSection' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(6);
        return view('free-landing-page-hosting', $result);
    }
    public function freeHostingForNgo()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'faqSection' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(7);
        return view('free-hosting-for-ngo', $result);
    }


    public function freeWordpressHosting()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(9);
        return view('freewordpresshosting', $result);
    }

    public function freeHostingForStudent()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(10);
        return view('free-hosting-for-student', $result);
    }

    public function freePhpHosting()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(11);
        return view('freephphosting', $result);
    }

    public function freeDomain()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(12);
        return view('freedomains', $result);
    }

    public function freeWebsiteBuilder()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(13);
        return view('freewebsitebuilder', $result);
    }

    public function freeMysqlHosting()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(14);
        return view('free-mysql-hosting', $result);
    }


    public function dmcanotice()
    {
        $result['data'] = ManagePages::with([

            'faqSection' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(15);
        return view('dmca-notice', $result);
    }


    public function support()
    {
        return view('support');
    }


    public function about()
    {
        $result['data'] = ManagePages::with([
            'heroSections' => function ($query) {
                $query->where('status', 'active');
            },
            'serviceSections' => function ($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail(18);
        return view('about', $result);
    }


    public function team()
    {
        $result['data'] = OurTeam::get();
        return view('team', $result);
    }


    public function contact()
    {
        return view('contact');
    }


    public function privacy()
    {
        $result['data'] = Privacy::where('id', 1)->first();
        return view('privacy', $result);
    }


    public function terms()
    {
        $result['data'] = terms::where('id', 1)->first();
        return view('terms', $result);
    }


    public function disclosure()
    {
        return view('disclosure');
    }
}

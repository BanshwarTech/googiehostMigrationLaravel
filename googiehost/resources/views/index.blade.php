@extends('includes.layout')
@section('page_title', 'Index')
@section('content')
    <style>
        .hero-section .hero-image-section img {
            margin: auto;
            width: 60%;
        }
    </style>
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Celebrating 1 Million Registered Customers! 500+ Web Hosting Reviews</p>
                    <p class="banner__content mb-4">We believe everyone deserves a stunning website for their business
                        offers you 100% free website hosting with Premium features, and we also help you choose
                        the best-paid hosting solution so you can spend your hard-earned money on quality hosting.</p>
                    <a href="{{ route('freehosting') }}" class="btn banner__btn "
                        rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>


    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Web Hosting Features?</h2>
            <p class=" text-center  p-1 sec-subheading">
                We offer ultimate free hosting services packed with our most popular cPanel "DirectAdmin" to manage your
                free web hosting. Along with our <a href="/freewebsitebuilder.php">free web hosting Website builder</a> you
                get free webmail access, SSD boosted drives, a fast MySQL database and much more.
            </p>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>

    </section>

    {{-- banner section  --}}

    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">What You See is What You Get!</p>
                    <p class="banner__content mb-4">We believe in the growth of our clients business. So, we offer stunning
                        performance with our Free Hosting Plan. It doesn't end here. With free hosting, you also get free
                        website builder, Email accounts, support, and much more to kick start your website</p>
                    <a href="signup.php" class="btn banner__btn " rel="me">{{ strtoupper('Signup Now') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- comparision table --}}
    <div class="container my-5 comparison-table">
        <h2 class="text-center w-md-50 m-auto">Why GoogieHost Is The Best Free Hosting Provider Over The Internet</h2>

        <div class="table-responsive  py-3">
            <table class="table table-bordered text-center hosting-comparison-table">
                <thead>
                    <tr class="table-freeHosting-section">
                        <th></th>
                        <th class="best-free-hosting">Best Free Hosting</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="table-heading-section">
                        <th>Features</th>
                        <th class="googiehost-table-heading">GoogieHost</th>
                        <th class="table-heading-sec">InfinityFree</th>
                        <th class="table-heading-sec">Weebly</th>
                        <th class="table-heading-sec">Wix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <td class="text-start">NVMe SSD</td>
                        <td class="googiehost-table-col">
                            <i class="fa-solid fa-check check compare-table-check"></i>
                        </td>
                        <td><i class="fa-solid fa-minus compare-table-minus "></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">Business Emails</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">LiteSpeed</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">Cloudflare</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">Control Panel</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">1-Click Installer</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">Malware Protection</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">SSL Certificate</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">SitePad Website Builder</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">No Forced Ads</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- include signup-steps file --}}
    @include('includes.signup-steps')

    {{-- block-single section --}}
    @include('includes.single-features')
@endsection

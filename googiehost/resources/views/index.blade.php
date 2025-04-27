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
                        <th class=" googiehost-table-heading">GoogieHost</th>
                        <th class="table-heading-sec">InfinityFree</th>
                        <th class="table-heading-sec">Weebly</th>
                        <th class="table-heading-sec">Wix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <td class="text-start">NVMe SSD</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
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

    {{-- cta section --}}
    <Section class="my-5">
        <div class="container">
            <h4 class="cta__subheading">Create your free account now</h4>
            <h2 class="cta_heading text-center">3 Easy Steps to create your free account</h2>
            <p class="cta_para text-center w-md-75 m-auto mb-5">Follow the steps given below to create a free website.
                GoogieHost offers free hosting to all of its users with no forced advertisements. </p>
            <div class="cta-content-section  py-5 ">
                <div class="d-flex align-items-center mb-5">
                    <img src="{{ asset('images/icons2/Password.svg') }}" alt="cta" class="img-fluid me-4">
                    <div class="cta__content">
                        <h3>Fill in your credentials</h3>
                        <p>Order your free hosting account by <a href="signup.php">filling this Signup form</a> with your
                            basic details.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-5">
                    <img src="{{ asset('images/icons2/Group 1707478628.svg') }}" alt="cta" class="img-fluid me-4">
                    <div class="cta__content">
                        <h3>Enter your Control Panel (DirectAdmin)</h3>
                        <p>Start building your Website using our SitePad free website builder or tailored HTML templates.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-5">
                    <img src="{{ asset('images/icons2/Group 1707478629.svg') }}" alt="cta" class="img-fluid me-4">
                    <div class="cta__content">
                        <h3>Launch your Website</h3>
                        <p>Publish your website and make it visible to the world wide web in the blink of an eye.</p>
                    </div>
                </div>

            </div>

        </div>
    </Section>

    {{-- block-single section --}}
    @include('includes.single-features')
@endsection

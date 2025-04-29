@extends('includes.layout')
@section('page_title', 'Index')
@section('content')

    {{-- hero section --}}
    <style>
        .hero-section {
            background: linear-gradient(90deg, #11253c 0%, #33215d 69%) !important;
            background-image: url(https://res.cloudinary.com/youstable/image/upload/v1658402026/GOOGIEHOST012-01_rnv8jy.jpg) !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center !important;
            padding: 80px 0px 60px 0px;
            height: 1600px;
        }
    </style>
    <!-- hero section -->
    @foreach ($data->heroSections as $heroSection)
        <div class="hero-section h-100">
            <div class="container">
                <div class="row">
                    <div class="hero-left-section col-md-12">
                        {!! $heroSection->title !!}
                        {!! $heroSection->subtitle !!}
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- plan section --}}
    <div class="container pricing-section py-5">
        <h2 class="text-center sec-heading">Choose a Free Domain Name With a Hosting Plan</h2>
        <p class=" text-center  p-1 sec-subheading mb-5">
            Googiehost is offering feature-filled free as well as premium hosting plans with a free domain name for a
            lifetime! Not only this, but you can also grab free website migration with the premium hosting plan!
        </p>

        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>
    {{-- Free Domain name Forever --}}
    <div class="container mb-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/free domain forever.png') }}" alt="domain forever" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Free Domain name Forever</h2>
                    <div class="fw-normal">
                        <p>Get a free domain name forever Looking for a domain? Grab it for free at GoogieHost with no
                            hidden charges or conditions applied. Just click on the button mentioned below, enter your
                            details, hit enter and Tada! Your free domain is ready to use.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Sign-up for Free
                                Domain
                                <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Rank Up Easily With Short Subdomain Name --}}
    <div class="container my-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">

                <div class="col-md-6">
                    <h2 class="fw-bold">Rank Up Easily With Short Subdomain Name</h2>
                    <div class="fw-normal">
                        <p>Grab Free Domain Name and Hosting now! Get short and easy to remember subdomains like ".cu.ma",
                            ".thats.im", ".c1.is" and "onweb.im". If you are not already aware, SERP loves domains that are
                            user-friendly.</p>
                        <ul>
                            <li>Free SSL for secure transfer and management.</li>
                            <li>Easy and Quick DNS Management.</li>
                            <li>Create Email Accounts for professionalism.</li>
                        </ul>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Sign-up for Free
                                Domain
                                <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/domain-rank.png') }}" alt="domain-rank" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    {{-- No Hidden Costs | LIFETIME FREE Domain --}}
    <div class="container my-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/d3.png') }}" alt="d3" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">No Hidden Costs | LIFETIME FREE Domain</h2>
                    <div class="fw-normal">
                        <p>At GoogieHost, we believe in cost transparency, and if we promise to give a free domain along
                            with free hosting, we fulfill it. We have hosted numerous customers for free domain and hosting,
                            and they are proud of our hosting.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Sign-up for Free
                                Domain
                                <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- banner section --}}
    <section class="pb-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Register your brand with FREE Domain Name </p>
                    <p class="banner__content mb-4">With GoogieHost, there are many different ways that you can obtain a
                        free domain name. Build your brand » Boost your online presence » With a provider you can trust.
                        Start now!</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Activate Free Domain') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- Build your online brand  --}}
    <div class="container my-5 ">
        <h2 class="mb-4 text-center fw-bold">Build your online brand with a company you can trust!</h2>
        <p class="mb-5 text-center">Create and run a smooth running website when you have features like full-time available
            customer support, free domain name, free SSL certificate, and many more.</p>
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img src="{{ asset('images/icons/FreeHosting.svg') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">Free Hosting</h5>
                        <p>If you plan to get a free domain name, then why not TRUSTED GoogieHost’s free hosting? Get
                            unlimited SSD+Bandwidth+99.9% Uptime for free!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img style="width: 40px;" src="{{ asset('images/icons/da-logo.png') }}" class="svg"
                            alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">DirectAdmin Control Panel</h5>
                        <p>to install and manage your website. Also, you will get a Softaculous and user-friendly panel
                            interface.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img src="{{ asset('images/icons/FreeWebsiteBuilder.svg') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">Free Website Builder</h5>
                        <p>Make your website for free today with Site.
                            Pro Website Builder customised with free templates. You can either unleash your creativity or
                            make a website in minutes with templates.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img src="{{ asset('images/icons/FreeSSLCertificate.svg') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">Free SSL Certificate</h5>
                        <p>With free hosting, we understand that it is necessary to secure the files on the website. Hence,
                            there arises the need for free SSL. But NO COST and NO FEES at GoogieHost only! .</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img src="{{ asset('images/icons/FreeEmail.svg') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">Free Email with Domain Name</h5>
                        <p>Worry about owning your brand’s or domain’s custom email account? We have made the necessary
                            arrangements to interact with your customers with a custom email domain account.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-icon">
                        <img src="{{ asset('images/icons/TicketSupport.svg') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h5 class="fw-bold text-primary fs-3">24/7 Chat+Ticket Support</h5>
                        <p>We make sure that none of our customers feel neglected. Hence we provide constant chat and ticket
                            support for free hosting and domain. Why not get a free domain today to find out!.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container my-5 comparison-table">
        <h2 class="text-center ">How do we measure up to our competition?</h2>
        <div class="table-responsive  p-3">
            <table class="table table-bordered text-center  hosting-comparison-table">
                <thead>
                    <tr class="table-freeHosting-section">
                        <th></th>
                        <th class="best-free-hosting">Best Free Hosting</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="table-heading-section">
                        <th></th>
                        <th class="googiehost-table-heading">GoogieHost</th>
                        <th class="table-heading-sec">InfinityFree</th>
                        <th class="table-heading-sec">Weebly</th>
                        <th class="table-heading-sec">Wix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Free Subdomain</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td>Website/User</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Disk Space</td>
                        <td>1000 MB SSD</td>
                        <td>Unlimited but HDD</td>
                        <td>500 MB SSD</td>
                        <td>500 MB SSD</td>
                    </tr>
                    <tr>
                        <td>Banwidth</td>
                        <td>100 GB</td>
                        <td>Unlimited</td>
                        <td>100 MB</td>
                        <td>500 MB</td>
                    </tr>
                    <tr>
                        <td>Business Email</td>
                        <td>2</td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>SSL Certificates</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>CloudFlare</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>cPanel</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>Cloud Linux</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>Website Builder</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                    <tr>
                        <td>No Ads</td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                        <td><i class="fa-solid fa-xmark cross"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- include signup-steps file --}}
    @include('includes.signup-steps')

    {{-- block-single section --}}
    @include('includes.single-features')

    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold">Frequently Asked Questions</h2>
        <div class="accordion bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])
        </div>
    </div>
@endsection

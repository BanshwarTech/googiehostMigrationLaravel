@extends('includes.layout')
@section('content')
    @php
        $pageName = 'freewordpresshosting'; // Define page name for this view
    @endphp
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Host your website with Free Wordpress Hosting
                    </p>
                    <p class="banner__content mb-4">Free Wordpress Website Hosting with no restrictions.With record speed,
                        performance, and 24/7 support, EasyWP gets your WordPress site up fast.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Signup Now') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Amazing Features of Free WordPress Hosting →</h2>
            {{-- <p class=" text-center  p-1 sec-subheading">
                Get a bunch of features with Unlimited Free Web Hosting For NGO and Shoot Up Your NGO Site. Let us take a
                look at the features that will make your site special.
            </p> --}}

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>
    </section>

    {{-- plan section --}}
    <div class="container pricing-section py-5">
        <h2 class="sec-heading text-center">Give More Power To Your WordPress Site →</h2>
        <p class="sec-subheading text-center mb-5">You will get the best Free WordPress Hosting Features which will help you
            grow more and GoogieHost also helps you to migrate your Data to any Premium Hosting Provider.</p>
        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>


    {{-- Grow Without Resistance --}}
    <div class="container ">
        <h2 class="sec-heading text-center">Grow Without Resistance →</h2>
        <p class="sec-subheading text-center mb-5">It's time for you to grow without limits with FREE WordPress Hosting</p>
        <div class="row g-4">
            {{-- Flip Card 1  --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Infinite-WordPress-Themes.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Infinite WordPress Themes</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light"> Scroll through the infinite Exciting WordPress Themes which will give
                                your site a More
                                Amazing and optimized look. You can opt for the theme of your choice and attract more
                                audiences. WordPress consists of millions of themes and you can assess them all with FREE
                                WordPress Hosting.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 2 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Unlimited-Premium-Plugins.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Unlimited Premium Plugins</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">The site needs plugins for better performance and the output will be quite
                                smooth and
                                flawless. Even with free WordPress Hosting, you will get the best and the Most famous
                                WordPress Plugins. The Plugins will help you reach your optimization goals.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 3 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Easy-Rank-On-Google.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Turn Your Site Into Store</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">With the help of this Free Hosting Service, you will get a better rank on
                                search engines like
                                Google, Yahoo, Bing. The Free Domains are also easy to remember and they will also play a
                                vital role in the ranking of your site.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 4 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Turn-Your-Site-Into-Store.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Easy Rank On Google</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">It’s time for you to turn your normal site into an online store. The
                                WordPress Themes and
                                WordPress Plugins will help you convert your simple site into an Online Store. All with Free
                                WordPress Hosting.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">WordPress Hosting Made Easy -Free Domain, SSL & Free CDN
                    </p>
                    <p class="banner__content mb-4">Get web Hosting for your Website with cPanel access.Our free WordPress
                        hosting is 20X faster & easy to install secure WordPress Hosting in minutes.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Signup Now') }}</a>
                </div>

            </div>
        </div>
    </section>

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

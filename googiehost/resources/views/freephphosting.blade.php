@extends('includes.layout')
@section('page_title', 'Index')
@section('content')
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Host your website with Free PHP Hosting
                    </p>
                    <p class="banner__content mb-4">Free PHP Website Hosting with no restrictions.With record speed,
                        performance, and 24/7 support, EasyWP gets your WordPress site up fast.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Signup Now') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Free PHP Hosting Features →</h2>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>
    </section>


    {{-- plan section --}}
    <div class="container pricing-section pb-5">
        <h2 class="text-center sec-heading">Give More Power To Your PHP Site →</h2>
        <p class=" text-center  p-1 sec-subheading mb-5">
            You will get the best Free PHP Hosting Features which will help you grow more and GoogieHost also helps you to
            migrate your Data to any Premium Hosting Provider.
        </p>

        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>

    <div class="container mb-5">
        <h2 class="sec-heading text-center">Grow Without Resistance →</h2>
        <p class="sec-subheading text-center mb-5">It's time for you to grow without limits with FREE WordPress Hosting</p>
        <div class="row g-4">
            {{-- Flip Card 1  --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/wordpress-icons/infinite.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Supports MySQL 8.0</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light"> Best security and account management with Free PHP Hosting. Atomic data
                                definition statements. Feel the best performance tuning with legit security optimizations.
                                Avail now to Feel the speed.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 2 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/wordpress-icons/unlimited.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">PHP Version: 8, 7, 6, 5.6</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">Get the best optimizations of PHP 8 with GoogieHost’s Free PHP Hosting and
                                lesser the errors faster the response rate. With the best efficiency performance enhancer
                                available for you.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 3 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/wordpress-icons/turn.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Cloudflare CDN</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">You will get a Blazing fast performance no matter from where you will
                                request with the Free CDN from Cloudflare. Grab the Free PHP Hosting Now and get the best
                                hosting service.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 4 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/wordpress-icons/rank.png') }}" class="w-50 mb-3">
                            <h5 class="fw-bold">Immense Hosting Experience</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">All the plugins and special features will give you a flawless hosting
                                experience and your PHP site will become slowly start to rank better on search engines. Just
                                grab the Best PHP Hosting for your Website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

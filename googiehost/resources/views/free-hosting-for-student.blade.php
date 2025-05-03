@extends('includes.layout')
@section('page_title', 'Index')
@section('content')

    @php
        $pageName = 'free-hosting-for-student'; // Define page name for this view
    @endphp

    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Start Your Online Journey With "Ads Googiehost"
                    </p>
                    <p class="banner__content mb-4">Achieve your goals with free web hosting for students and start making
                        your online presence with Us. </p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- plan section --}}
    <div class="container pricing-section pb-5">

        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>

    {{-- Host Your Projects For Free --}}
    <div class="container ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">

                <div class="col-md-6">
                    <h2 class="fw-bold">Host Your Projects For Free</h2>
                    <div class="fw-normal">
                        <p>GoogieHost provides free premium web hosting services for students who thrive on challenges and
                            want to grow in web designing or digital marketing.
                        </p>
                        <p>
                            All you need to show us is your school/college ID and a photo id proof; purchase a domain, and
                            that’s it; free web hosting is all yours for a year.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Design Your FREE
                                Website Now! <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/no-cost.jpg') }}" alt="cost" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    {{-- include signup-steps file --}}
    @include('includes.signup-steps')



    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Free Students Web Hosting Features →</h2>
            <p class=" text-center  p-1 sec-subheading">
                Finding web hosting for students is not so tough after all but getting the bunch of features is quite
                Resisting.
                Grab Free Hosting For Students and get a bunch of remarkable features.
            </p>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>
    </section>


    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Remarkable Free Domain Name For Students"
                    </p>
                    <p class="banner__content mb-4">Guaranteed Free domain for students so that they can present their
                        projects and get all the essentials you need for your Free Website. </p>
                    <a href="{{ route('free.domain') }}" class="btn banner__btn "
                        rel="me">{{ strtoupper('Claim Your Free Domain') }}</a>
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

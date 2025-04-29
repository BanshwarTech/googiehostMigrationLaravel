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
                    <p class="banner__heading">Kick Start Your NGO Site With Best Web Hosting
                    </p>
                    <p class="banner__content mb-4">Show Your Achievements on your Site by building your site with Free NGO
                        Hosting. Scroll through Unlimited Free templates and make the Best NGO Site.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>


    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Not Exaggerating, Features Of Free NGO Hosting →</h2>
            <p class=" text-center  p-1 sec-subheading">
                Get a bunch of features with Unlimited Free Web Hosting For NGO and Shoot Up Your NGO Site. Let us take a
                look at the features that will make your site special.
            </p>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>

    </section>

    {{-- banner section --}}
    <section class="pb-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Launch your NGO with Non-Profit Hosting
                    </p>
                    <p class="banner__content mb-4">Show Your Achievements on your Site by building your site with Free NGO
                        Hosting. Scroll through Unlimited Free templates and make the Best NGO Site.
                    </p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>


    {{-- Most Trusted NGO Hosting for Rural Learning --}}
    <div class="container mb-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/trust.svg') }}" alt="trust" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Most Trusted NGO Hosting for Rural Learning</h2>
                    <div class="fw-normal">
                        <p>Free Hosting with On Page SEO is something everyone should opt for their Small business to help
                            it grow more. Grab the Free Charity Web Hosting with Unlimited Features, Attract more clients
                            with the Themes options available for you.
                        </p>
                        <p>
                            With Free NGO Hosting Service, you can educate the backward and rural areas, not only from India
                            but from all around the world.</p>
                        <p>Step Up towards bettering the human mind, we hope that everyone out there gets the opportunity to
                            build and grow.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Design Your FREE
                                Website Now! <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Can I create a Free NGO Website? Absolutely!!! --}}

    <div class="container ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4">
                <div class="col-md-6">
                    <h2 class="fw-bold">Can I create a Free NGO Website?
                        Absolutely!!!</h2>
                    <div class="fw-normal">
                        <p>Any semi-government NGO or start-up NGO can create a free website with GoogieHost. All it
                            requires is submitting the accreditation papers and other official documents of the NGO. Once
                            the cross-verification of the documents is complete, we’ll start with the process of launching
                            your NGO online.
                        </p>
                        <p>
                            The best part is that our developers will do the taxing work of creating <strong>5 WEB PAGES,
                                FREE OF COST,</strong> and our expert team will do the <strong>
                                ON-PAGE SEO
                            </strong> for your website. All you will have to do is provide the content that you want to
                            appear on your website.</p>
                        <p><em>Like we mentioned, </em> YOU CREATE, WE PROVIDE!</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Design Your FREE
                                Website Now! <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/no-cost.jpg') }}" alt="no cost" class="img-fluid">
                </div>

            </div>
        </div>
    </div>

    {{-- plan section --}}
    <div class="container pricing-section py-5">
        <h2 class="sec-heading text-center">Choose Your Web Hosting Plan</h2>
        <p class="sec-subheading text-center mb-5">GoogieHost offers best free hosting with added features to help you reach
            new
            heights. Get free website migration when switching to premium hosting provider.</p>
        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
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

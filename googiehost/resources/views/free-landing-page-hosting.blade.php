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
                    <p class="banner__heading">Create Free Landing Pages with Free Web Hosting By "Googiehost Ads"
                    </p>
                    <p class="banner__content mb-4">We believe everyone deserves a stunning website for their business
                        offers you 100% free website hosting with Premium features, and we also help you choose
                        the best-paid hosting solution so you can spend your hard-earned money on quality hosting.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>


    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Super Exciting Landing Page Hosting Features →</h2>
            <p class=" text-center  p-1 sec-subheading">
                No matter what’s going in your mind, the Free Landing Pages Templates will capture it easily and will
                present it to you within No Time.
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
                    <p class="banner__heading">Get Free CPA Landing page Hosting
                    </p>
                    <p class="banner__content mb-4">Drive Unlimited Traffic on your Site with Free Landing Page Hosting From
                        GoogieHost. Scroll through Unlimited Free Templates to be different from others.</p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get Free Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>


    {{-- Unleash The Tools For Your Growth section start --}}
    <div class="container  pb-5">
        <div class="container-box p-4 unleash-idea-income rounded-0">
            <div class="row align-items-center ">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/unleash.svg') }}" alt="unleash" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Unleash The Tools For Your Growth</h2>
                    <div class="fw-normal">
                        <p>Forget all the drama, and work on your Growth. GoogieHost will give you the best landing pages
                            templates which will make your site go BOOM.
                        </p>
                        <p>
                            You must be aware of “The First Impression is the Last Impression” So, you must get the Free
                            Landing page Hosting and make your site stand with the most prominent personality.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-4 col-12 col-lg-6  rounded-0">Design Your FREE
                                Website Now! <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Turn Your Idea Into Income --}}

    <div class="container ">
        <div class="container-box p-4 unleash-idea-income rounded-0">
            <div class="row align-items-center ">
                <div class="col-md-6">
                    <h2 class="fw-bold">Turn Your Idea Into Income</h2>
                    <div class="fw-normal">
                        <p>It’s time to turn your Idea into a long-lasting source of income, with the High Conversion
                            Landing Page Templates which are free to use. It doesn’t end here, you will also get the Best
                            Free Hosting to shoot up your site.
                        </p>
                        <p>
                            With Free Hosting you will get a Free Landing Page And Email Marketing services for you, Avail
                            them all and start growing from Today only. And believe me, Tomorrow never comes.</p>
                        <div class="text-center  mt-5">
                            <a href="signup.php" class="button_orange p-4 col-12 col-lg-6  rounded-0">Design Your FREE
                                Website Now! <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/turn.svg') }}" alt="turn" class="img-fluid">
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

    {{-- block-single section --}}
    @include('includes.single-features')

    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold">Free Hosting FAQ</h2>
        <div class="accordion bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>
@endsection

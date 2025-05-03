@extends('includes.layout')
@section('content')
    @php
        $pageName = 'freewebsitebuilder'; // Define page name for this view
    @endphp
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__content mb-4">Get Smart Free Website Builder for Blogging and then watch your Blog
                        driving lots of traffic. Be Smart Be Fast with Amazing Free Website builder and it’s not daunting.
                    </p>
                    <a href="signup" class="btn banner__btn "
                        rel="me">{{ strtoupper('Create Website With SitePad') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- Design Your website with SitePad --}}
    <div class="container mb-5">
        <h2 class="sec-heading text-center">Design Your website with SitePad →</h2>
        <p class="sec-subheading text-center mb-5">You will get nearly 70% rise with the completely free website templates
            for your site. Scroll through 500+ astonishing Free Website Templates and drive high traffic.</p>
        <div class="row g-4">
            {{-- Flip Card 1  --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/icons/easy-to-use.svg') }}" class=" mb-3" width="100">
                            <h5 class="fw-bold">Easy to Use</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">The free drag and drop option makes it pretty easy to build an innovative
                                website. One does not need any technical knowledge to set up a website of their choice! Just
                                use the drag-and-drop elements, and it is all set to go on the internet.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 2 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/icons/onne-click.svg') }}" class=" mb-3" width="100">
                            <h5 class="fw-bold">One-Click Publish</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">All you have to do is pick a theme, add the content like media, images,
                                videos, and all, look if your website is ready to go live and push the button “Publish” to
                                get your website on air!</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 3 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/icons/sitepad.svg') }}" class=" mb-3" width="100">
                            <h5 class="fw-bold">SitePad Awesome Widgets</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">SitePad offers 40+ amazing widgets to help create a unique website.
                                Widgets like easy-to-use Video/Image Slider, Rich Text, Image galleries, Audio, Video,
                                Google Maps and more are offered by GoogieHost.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Flip Card 4 --}}
            <div class="col-md-6 col-lg-3">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/icons/theme.svg') }}" class="mb-3" width="100">
                            <h5 class="fw-bold">500+ Professional Themes</h5>
                        </div>
                        <div class="flip-card-back d-flex align-items-center justify-content-center p-4">
                            <p class="text-light">website. Use one of the themes from a lot of 500+ of them. Stay creative
                                yet unique in your style and way.</p>
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
                    <p class="banner__content mb-4">The best Free Website Builder is waiting for you, don’t get diverted and
                        get the best free website builder for small businesses, gaming, eCommerce, freshers, photographers.
                    </p>
                    <a href="signup" class="btn banner__btn "
                        rel="me">{{ strtoupper('Create Website With SitePad') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Everything you need to create your free website →</h2>
            <p class=" text-center  p-1 sec-subheading">
                Firstly this a completely free website builder and the ingredient will make your website earnestly mushy and
                will help you engage more audience.
            </p>
            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>
    </section>

    {{-- plan section --}}
    <div class="container pricing-section py-5">
        <h2 class="sec-heading text-center">Choose Your Web Hosting Plan</h2>
        <p class="sec-subheading text-center pb-5">GoogieHost offers best free hosting with added features to help you reach
            new
            heights. Get free website migration when switching to a premium hosting provider.</p>
        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>

    {{-- block-single section --}}
    @include('includes.single-features')

    {{-- faq section   --}}
    <div class="container mt-5 faq">
        <h2 class="text-center mb-5 fw-bold">Free Hosting FAQ</h2>
        <div class="accordion  bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>
@endsection

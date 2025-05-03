@extends('includes.layout')
@section('page_title', 'Cheap Dedicated Server')
@section('content')
    @php
        $pageName = 'cheap-dedicated-server';
    @endphp
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- hosting plan section --}}
    <section class="py-5 position-relative bg-white z-1">
        <div class="container">
            <div class="inner text-center block-double-tb">
                <h2 class=" sec-heading">Buy Cheap Dedicated Server 2025</h2>
                <!-- <span class="heading-4 blink-soft">Sale Live!</span> -->
                <p class="sec-subheading text-center">Googiehost is your one-stop solution to finding the <a
                        href="https://googiehost.com/blog/best-web-hosting-services/" target="_blank">best web hosting
                        services </a> for your website needs. Find out which top web hosts are the best at saving your money
                    &amp; time. Get reliable facts and reviews for the top-rated hosting solutions.</p>
            </div>
            @foreach ($data->dedicatedServer as $paidServer)
                <div class="row sale-row text-center mb-4 cursor-pointer"
                    onclick="window.location.href='{{ $paidServer->button_link }}'">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <div class="d-grid"><a href="{{ $paidServer->button_link }}"><img
                                    src="{{ asset('storage/paidplans/dediHosting/' . $paidServer->logo_image) }}"></a>
                            <a href="{{ $paidServer->button_link }}" target="_blank">Read review</a>
                        </div>
                    </div>
                    <div class="col-md-3 deal-sec">
                        <div>
                            <h5 class="deal-heading">Whats the Deal</h5>
                            <p class="mb-0">Starting From:<br class="remove-break"><span
                                    class="deal-price">${{ $paidServer->deal_points }}/mo</span>
                            </p>

                        </div>
                    </div>
                    <div class="col-md-3 deal-sec">
                        <div>
                            <h5 class="deal-heading">Discount</h5>
                            <p class="discount-percent">{{ $paidServer->discount }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 p-2 d-flex align-items-center justify-content-center">
                        <div>
                            <a href="{{ $paidServer->button_link }}" target="_blank" rel="noopener"><button
                                    class="grab-deal-btn">{{ $paidServer->button_text }}&nbsp;<i
                                        class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                                </button></a>
                            <p class="mb-0 disc-coupon">({{ $paidServer->short_desc }})</p>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </section>

    {{-- Top Cheap Dedicated Server Hosting Providers --}}
    <section class="py-3">
        <div class="container">
            <div class="inner text-center block-double-tb">
                <h2 class="large-title mb-4">Top Cheap Dedicated Server Hosting Providers In 2025</h2>
                <p class="description mb-5 text-center">The best dedicated server hosting options with up to 100% uptime and
                    faster speed.</p>
            </div>


            @foreach ($data->dedicatedServerOffer as $index => $dedicatedServerOffer)
                <div class="custom-review-card">
                    <div class="d-flex justify-content-between align-items-center card-heading-sec">
                        <h5 class="fw-bold">{{ $index + 1 }}. {{ $dedicatedServerOffer->title }}</h5>
                        <span class="fw-bold">${{ $dedicatedServerOffer->price }}/mo</span>
                    </div>
                    <div class="p-4">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ $dedicatedServerOffer->button_link }}">
                                    <img src="{{ asset('storage/offers/dedicated/' . $dedicatedServerOffer->image) }}"
                                        alt="Offer" class="img-fluid rounded"></a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span
                                            class="rating-sec fw-bold">{{ $dedicatedServerOffer->number_rating }}</span><span
                                            class="fw-bold fs-5">/10</span>
                                        <div class="rating-star">
                                            @for ($i = 0; $i < $dedicatedServerOffer->star_rating; $i++)
                                                <i class="fa-solid fa-star star" aria-hidden="true"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <a href="{{ $dedicatedServerOffer->button_link }}"
                                        class="best-deal-btn hide-btn1">Claim deal <i class="fa-solid fa-arrow-right"
                                            aria-hidden="true"></i></a>
                                </div>

                                <div class="mt-3 stats-box">
                                    <div class="d-flex justify-content-between"><span>Performance</span>
                                        <strong>{{ $dedicatedServerOffer->performance }}/5</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2"><span>Speed
                                        </span><strong>{{ $dedicatedServerOffer->speed }}/5</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2"><span>Support
                                        </span><strong>{{ $dedicatedServerOffer->support }}/5</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <a href="https://googiehost.com/blog/go/youstable-dedicated/"
                                    class="best-deal-btn hide-btn">Claim deal <i class="fa-solid fa-arrow-right"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>

                        <div class="mt-3">

                            {!! $dedicatedServerOffer->description !!}
                        </div>

                        <div class="row text-center mt-3 p-2">
                            <div class="col-md-4 review-feature">
                                <span class="">Response Time</span><br>
                                <strong>{{ $dedicatedServerOffer->response_time }} ms to load</strong>
                            </div>
                            <div class="col-md-4 review-feature">
                                <span class="">Server Uptime</span><br>
                                <strong>{{ $dedicatedServerOffer->server_uptime }}%</strong>
                            </div>
                            <div class="col-md-4 review-feature">
                                <span class="">Live Status</span><br>
                                <strong class="online">{{ $dedicatedServerOffer->live_status }}</strong>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item key-feature-sec">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button key-feature" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFeature1"
                                            aria-expanded="true" aria-controls="collapseFeature1">
                                            {{ $dedicatedServerOffer->list_heading }}:
                                        </button>
                                    </h2>
                                    <div id="collapseFeature1" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">

                                            @php
                                                $listPoints = '';
                                                if (!empty($dedicatedServerOffer->list_point)) {
                                                    // Remove outer <ul> and keep <li> items only
                                                    $listPoints = strip_tags($dedicatedServerOffer->list_point, '<li>');
                                                }
                                            @endphp

                                            <div class="hosting-key-features">
                                                @foreach (explode('</li>', $listPoints) as $point)
                                                    @if (!empty(trim(strip_tags($point))))
                                                        <div class="d-flex  align-item-center">
                                                            <i class="fa-solid fa-check feature-check-symbol"
                                                                aria-hidden="true"></i>
                                                            {!! $point !!}</li>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </section>


    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Why Buy Cheap Dedicated Server Hosting?</h2>
            <p class=" text-center  p-1 sec-subheading">
                A cheap Dedicated Hosting Must be the Best Dedicated Hosting. It has the following features.
            </p>

            <div class="row g-4 mt-3">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>
    </section>

    {{-- static feature section --}}
    <section>
        <div>

            <div class="container p-md-5 tech-specification">
                <h2 class="text-center sec-heading">Technical Specifications to keep in mind while choosing The Best
                    Dedicated Server Hosting</h2>
                <p class=" text-center mx-auto p-1 sec-subheading">
                    If you are planning to rent your first dedicated server, we are here to ensure that you realize the
                    crucial factors before making any such decision. Here are the few technical specifications you should
                    keep in mind in order to choose the best cheap Dedicated server hosting:
                </p>

                <div class="row g-4 mt-2">
                    <!-- Feature 1 -->
                    <div class="col-md-6">
                        <div class=" feature-card">
                            <div class=" mx-auto">
                                <img src="{{ asset('images/icons/cpu.svg') }}" alt="cpu" class="mb-3">
                                <h5 class="card-title">CPU</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text ">CPU is one of the major components of your server, and so is the core
                                    that gives it power and handles all requests. So if you want your projects to grow
                                    bigger and run faster, you must opt for more CPUs.</p>

                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-md-6">
                        <div class=" feature-card">
                            <div class=" mx-auto">
                                <img src="{{ asset('images/icons/ram.svg') }}" alt="ssd" class="mb-3">
                                <h5 class="card-title">RAM</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text ">The random-access memory (RAM), is yet another crucial server
                                    configuration that helps” the CPU execute multiple requests without affecting their
                                    speed.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-md-6">
                        <div class=" feature-card">
                            <div class=" mx-auto">
                                <img src="{{ asset('images/icons/ssd.svg') }}" alt="Storage" class="mb-3">
                                <h5 class="card-title">Storage</h5>
                            </div>
                            <div class="card-body">

                                <p class="card-text ">The technology behind your disk is as important as its capacity.
                                    While SSD has limited write cycles, compared to traditional HDD, solid-state drives are
                                    much faster and more reliable. We advise you to prefer SSD over HDD.</p>

                            </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-md-6">
                        <div class=" feature-card">
                            <div class=" mx-auto">
                                <img src="{{ asset('images/icons/bandwidth.svg') }}" alt="Bandwidth" class="mb-3">
                                <h5 class="card-title">Bandwidth</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text ">With every visitor and action performed on your website, a bit of
                                    bandwidth is utilized. Generally speaking, most of the websites consume less than 5GB a
                                    month, so the few terabytes that most dedicated hosting providers give you is more than
                                    sufficient.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold ">Frequently Asked Questions</h2>
        <div class="accordion bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>
@endsection

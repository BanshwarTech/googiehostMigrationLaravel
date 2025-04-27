@extends('includes.layout')
@section('page_title', 'Cheap Vps Hosting')
@section('content')
    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- hosting plan section --}}
    <div class="container mt-5">
        <h2 class="text-center mb-5 sec-heading">Top Best Paid/Free VPS Hosting Providers</h2>
        @foreach ($data->vpsHosting as $paidVps)
            <div class="row offer-container mx-auto mb-5 sale-row">
                <div class="offer-logo col-12 col-lg-3 mx-auto my-auto align-item-center">
                    <img src="{{ asset('storage/paidPlans/vpsHosting/logo_image/' . $paidVps->logo_image) }}"
                        alt="Kamatera Logo" class="img-fluid w-75">
                    <a href="{{ $paidVps->button_link }}">
                        <img src="{{ asset('storage/paidPlans/vpsHosting/offer_image/' . $paidVps->offer_image) }}"
                            alt="Kamatera" width="250">
                    </a>
                </div>
                <div class="offer-content col-12 col-lg-6 d-flex justify-content-center align-items-center">
                    <div>
                        <span class="badge badge-success small">✔ Last Verified Yesterday</span>
                        <div>
                            <h5 class="mb-0 ">{{ $paidVps->title }}</h5>
                            <p class="mb-0">{{ $paidVps->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="offer-button col-12 col-lg-3 mx-auto my-auto">
                    <span class="badge badge-warning rounded-0">🏆 100% SUCCESS RATE</span>
                    <a href="{{ $paidVps->button_link }}" class="btn btn-custom w-100 mt-2"
                        onmouseover="swapText(this, '{{ $paidVps->coupon_code }}')"
                        onmouseout="swapText(this, '{{ $paidVps->button_text }}')">
                        {{ $paidVps->button_text }}
                    </a>

                    <script>
                        function swapText(element, text) {
                            element.innerText = text;
                        }
                    </script>

                </div>
            </div>
        @endforeach



    </div>
    {{-- Free VPS Hosting Forever - Activate 30 Days Trial Now --}}
    <div class="container my-5">
        <div class="container-box p-4">
            <h2 class="text-center fw-bold">Free VPS Hosting Forever - Activate 30 Days Trial Now</h2>
            <div class="row align-items-center mt-4">
                <div class="col-md-6">
                    <div class="highlight-box shadow">
                        <p>Looking for free VPS hosting? This is the best time to grab ultra-powerful VPS servers for free!!
                            All thanks to <a href="#" class="text-primary fw-bold">Kamatera’s</a> free VPS trial in
                            which you can avail of their robust VPS servers free for 30 days. No additional charges will be
                            applied!!</p>
                        <p>So what are you waiting for? Grab their free VPS hosting trial and enjoy the optimum performance
                            for your website with powerful features such as a cloud load balancer, powerful cloud firewall,
                            free SSL certificate, and much more!!</p>
                        <p>Get free SSL certificates with VPS hosting that offers extra data security from hackers.
                            Kickstart your website with the best VPS Hosting provider.</p>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="depends/no-credit-card-new.svg" alt="VPS Hosting" class="img-fluid">
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="https://googiehost.com/blog/go/kamatera-free-vps/" class="cta-button col-12 col-lg-6">START FOR
                    FREE <i class="fa-solid fa-angles-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Premium VPS Features Come With Every Plans</h2>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>

    </section>
    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold">Frequently Asked Questions</h2>
        <div class="accordion p-md-5 bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>

    {{-- block-single section --}}
    @include('includes.single-features')
@endsection

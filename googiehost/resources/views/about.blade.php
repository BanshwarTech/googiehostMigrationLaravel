@extends('includes.layout')
@section('page_title', 'Teams')
@section('content')

    <div class="hero-section">
        <div class="container py-5">
            <div class="row text-center">
                <div class="hero-left-section">
                    @foreach ($data->heroSections as $hero)
                        <img src="{{ asset('storage/uploads/hero/' . $hero->image) }}" alt="logo" class="mb-5">
                        {!! $hero->title !!}
                        {!! $hero->subtitle !!}
                        <a href="{{ route('team') }}" class="button_white">Meet GoogieHost Team !</a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="entry-title mb-4 fw-bold">How GoogieHost Started?</h1>
                    <p>In the early 2010s, Rajesh Chauhan wanted to start his online journey and make a name for himself,
                        but the cost of a domain and web hosting skyrocketed, and an ordinary man could not afford it. But,
                        Rajesh Chauhan took the challenge and decided to make web hosting & new domain registration
                        affordable for an average person. In the summer of 2012, Rajesh founded GoogieHost, which offers 1GB
                        NVMe SSD Storage and 100GB Bandwith without any cost.</p>
                    <p class="quote-box">
                        GoogieHost was founded on beliefs.<br>Rajesh Chauhan - Founder
                    </p>
                </div>
                <div class="col-md-6">
                    <h1 class="entry-title mb-4 fw-bold">It's All About Customers</h1>
                    <p>The GooigeHost ran into many problems with the domain issues with search engine giant Google because
                        GoogieHost sounds like Google hosting, but Google decided to let the web hosting company continue.
                        The GoogieHost had a decent amount of paid users on the platform, but the Blogger Rajesh Chauhan
                        made it a free web hosting platform. The company became a non-profit organisation ever since, and
                        they don’t sell advertisements, they don’t sell your information, and they don’t force you to
                        upgrade to premium.</p>
                </div>

            </div>
        </div>
    </section>


    <section>
        <div class="container bg-white p-0">
            <div class="service-card text-center">
                <h2>Free Service List→</h2>
                <p>Allow us to list down the free services GoogieHost is offering right now.</p>
            </div>
            <div class="row p-5 g-3">
                @foreach ($data->serviceSections as $serviceSections)
                    <div class="col-md-4">
                        <div class="card feature-card text-center">
                            <div class=" service-icon mx-auto">
                                <img src="{{ asset('storage/uploads/service/' . $serviceSections->image) }}"
                                    alt="Online File Manager" class="service-img">
                                {!! $serviceSections->title !!}
                            </div>
                            <div class="card-body">
                                {!! $serviceSections->description !!}
                                {{-- <p class="card-text ">
                                    The company is no stranger to the competition, and they plan to offer the best free
                                    services
                                    in the industry. The GoogieHost has servers in UK, USA, and New Zealand, and the servers
                                    rating is 99/100.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <section>
        <div class="container end-content-about mt-5">
            <div>
                <h1 class=" text-center mb-4">Fast forward to 2025</h1>
                <p class=" text-center mb-5 text-white">We offer the ultimate free PHP hosting with cPanel for insanely fast
                    file management. Additionally., we combine it with services packed with our free Website builder,
                    Webmail, SSD boosted Attracta SEO Tools, Fast MySQL Databases and Much more unique things.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-list1">
                            <h3><i class="fa-solid fa-check me-3"></i> Free SSL certificate.</h3>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="feature-list1">
                            <h3><i class="fa-solid fa-check me-3"></i>Free on-page SEO.</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-list1">
                            <h3> <i class="fa-solid fa-check me-3"></i>10GB SSD Storage space</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-list1">
                            <h3><i class="fa-solid fa-check me-3"></i> 100GB Bandwidth.</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

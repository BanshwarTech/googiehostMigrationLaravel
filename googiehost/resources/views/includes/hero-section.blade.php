@foreach ($data->heroSections as $heroSection)
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="hero-left-section col-md-6">
                    {!! $heroSection->title !!}
                    @if (request()->routeIs('home'))
                        <h2>Secure &amp; Powerful</h2>
                    @endif


                    @if ($heroSection->subtitle != null)
                        {!! $heroSection->subtitle !!}
                    @endif
                    @if ($heroSection->listing_point != null)
                        {!! $heroSection->listing_point !!}
                    @endif

                    <a href="signup.php" class="button_orange">Start for Free </a>
                    <div class="rated">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20"
                                fill="none">
                                <path
                                    d="M12.5 7.5L8 12L6.5 10.5M9 1L1 5C1 10.1932 3.78428 17.5098 9 19C14.2157 17.5098 17 10.1932 17 5L9 1Z"
                                    stroke="#F4FFF9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </span>No Credit Card required
                    </div>
                </div>
                <div class="hero-image-section col-md-6 text-center">
                    <img src="{{ asset('storage/uploads/hero/' . $heroSection->image) }}" alt="GoogiehostHeroImage"
                        class="img-fluid">
                </div>
            </div>
        </div>
        <div class="inner container " style="padding-top: 0 !important;">
            <img loading="lazy" alt="featured on logos" class="img-fluid"
                src="{{ asset('images/featured-logos.png') }}">
        </div>
    </div>
@endforeach

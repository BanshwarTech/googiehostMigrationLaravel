@extends('includes.layout')
@section('page_title', 'Teams')
@section('content')


    <div class="hero-section">
        <div class="container py-5">
            <div class="row text-center">
                <div class="hero-left-section">
                    <h1 class="entry-title mb-5">Meet GoogieHost Team !</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="my-5">
        <div class="container ">
            <div class="row">
                @foreach ($data as $team)
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <ul class="social-icons">
                                <li><a href="{{ $team->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="{{ $team->twitter_url }}"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                            <div class="image">
                                <a href="#">
                                    <img src="{{ asset('storage/our-team/' . $team->profile_image) }}"
                                        alt="{{ $team->linkedin_url }} Googiehost"></a>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">{{ $team->name }}</a></h3>
                                <div class="designation">{{ $team->role }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection

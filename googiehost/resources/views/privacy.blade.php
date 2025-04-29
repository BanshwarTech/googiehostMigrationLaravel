@extends('includes.layout')
@section('page_title', 'Privacy')
@section('content')


    <div class="hero-section">
        <div class="container py-5">
            <div class="row text-center">
                <div class="hero-left-section">
                    <h1 class="entry-title mb-5">PLEASE READ OUR TERMS & CONDITIONS</h1>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container py-5">
            <div class="policy-sec">
                {!! $data->description !!}
            </div>
        </div>
    </section>
@endsection

@extends('includes.layout')
@section('content')
    @php
        $pageName = 'terms'; // Define page name for this view
    @endphp


    <div class="hero-section">
        <div class="container py-5">
            <div class="row text-center">
                <div class="hero-left-section">
                    <h1 class="entry-title mb-5">Meet GoogieHost Team !</h1>
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

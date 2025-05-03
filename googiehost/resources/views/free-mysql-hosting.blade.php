@extends('includes.layout')
@section('content')
    @php
        $pageName = 'free-mysql-hosting'; // Define page name for this view
    @endphp

    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- banner section --}}
    <section class="py-5">
        <div class="container">
            <div class="content-upgrade mb-mid block-single box-lr " style="background-color: #F9F5FF;  color: #FFFFFF;">

                <div class="content-upgrade-text mb-single ">
                    <p class="banner__heading">Get Craved Free MySQL Hosting</p>
                    <p class="banner__content mb-4">Get the Best MySQL Hosting that is beyond your expectation and can Host
                        your site for Free. Here you will get the perfect combination of Speed and Security.
                    </p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Get MySQL Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Most Prominent Features Of Free MySQL Hosting →</h2>
            <p class=" text-center  p-1 sec-subheading">
                Get the most advanced DBMS features for your MySQL site and experience Secure, Reliable and Fast Free MySQL
                Hosting.
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
                    <p class="banner__heading">OMG!! The Best MySQL Hosting Is Here</p>
                    <p class="banner__content mb-4">GoogieHost offers Best Free MySQL Hosting, its Cluster allows you to
                        accept all the Database challenges like Uptime, Scalability and Friendly Interface.
                    </p>
                    <a href="signup" class="btn banner__btn " rel="me">{{ strtoupper('Free MySQL Hosting') }}</a>
                </div>

            </div>
        </div>
    </section>
    {{-- Develop Manage & Optimise Your Free MySQL Site --}}
    <div class="container mb-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/free-mysql-hosting.svg') }}" alt="mysql" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="fw-bold">Develop Manage & Optimise Your Free MySQL Site</h2>
                    <div class="fw-normal">
                        <p>Host your MySQL Database with GoogieHost and get the best optimization features that allow you to
                            customize your data and store it your desired way.

                            Easily explore the databases and get the best guide for SQL queries. Some of them are employed
                            functions and operators.
                        </p>
                        <div class="text-left  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Host Your MySQL Site!
                                <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Hosting MySQL Database Made Easy --}}
    <div class="container my-5 ">
        <div class="container-box  unleash-idea-income rounded-0">
            <div class="row align-items-center p-4 ">

                <div class="col-md-6">
                    <h2 class="fw-bold">Hosting MySQL Database Made Easy</h2>
                    <div class="fw-normal">
                        <p>This MySQL Hosting Service is a fully-managed database service that enables High-performance
                            drastically improves MySQL performance by 400x.
                        </p>
                        <p>With the most advanced features, the management became so easy, and the tools help you reach the
                            best levels of MySQL security reliability and excellent Uptime.</p>
                        <div class="text-left  mt-5">
                            <a href="signup.php" class="button_orange p-3 col-12 col-lg-6  rounded-0">Host Your MySQL Site!
                                <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/free-mysql.svg') }}" alt="free mysql" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    {{-- plan section --}}
    <div class="container pricing-section pb-5">

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

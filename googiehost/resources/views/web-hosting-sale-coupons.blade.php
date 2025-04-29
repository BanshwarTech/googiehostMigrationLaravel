@extends('includes.layout')
@section('page_title', 'Website Hosting Sale Coupons - GoogieHost')
@section('content')

    <style type="text/css">
        body,
        html {
            scroll-behavior: smooth;
        }

        @media screen and (min-width:900px) {
            .coupon-wrap {
                border-radius: 6px
            }

            .coupon .col1 {
                width: 20%;
            }

            .coupon .col2 {
                width: 50%
            }
        }

        .card-x {
            border: 2px solid #ddd;
            border-radius: 10px;
        }

        .card-x p {
            color: #212529;
        }

        .card-x p a {
            color: rgb(29, 114, 241);
        }

        .offerValue {
            font-size: 44px;
            line-height: 1.3;
            padding: 10px;
            color: #0e7b0e;
            font-weight: 800;
        }

        .btn-a2 {
            background: #fc8c1e !important;
            margin-bottom: 20px !important;
            background: #edb53c !important;
        }

        .badge {
            padding: 6px 10px !important;
            background: #FF5722 !important;
        }

        .coupon-offer {
            padding: 20px;
            border: 4px dashed #0e7b0e;
            color: #0e7b0e;
            margin: 20px;
            font-size: 20px
        }

        .detailDesc {
            font-size: 14px;
            margin: 0 10px 0 0;
            background: #5eb939;
            padding: 6px;
            border-radius: 0 16px 0 0;
            color: #fff;
        }

        .detailDesc i {
            padding: 5px;
        }

        .coupon.description {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            background: #eaefff;
            padding: 15px;
            border: 1px solid #ccc;
            border-top: 0;
            border-radius: 0 0 6px 6px
        }

        h3.couponTitle {
            background: #e5daff;
            padding: 15px;
            border: 1px solid #ccc
        }

        .couponCode {
            display: none;
        }

        a.button.button-coupon {
            background: aliceblue;
            color: #333;
            border: 2px dashed;
            display: block;
        }

        a.button.button-coupon:hover .couponCode {
            display: block;
        }

        a.button.button-coupon:hover .revealCode {
            display: none;
        }

        a.button.button-coupon:hover {
            background: #bbedbb;
            -webkit-animation: slide-right 0.5s ease-in 0.5s both;
            animation: slide-right 0.5s ease-in 0.5s both;
        }

        a.button.button-coupon:hover:after {
            content: 'Click to activate';
            display: inline;
            font-size: 14px !important;
            background: #ffef31;
            padding: 5px;
            position: absolute;
            bottom: -40px;
            right: 0;
            border: 1px solid #ccc;
        }

        .couponcontainer {
            width: 100%;
        }

        #couponstable {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        #couponstable td,
        th {
            padding: 20px 15px;
            text-align: center;
        }

        #couponstable .cptablecl1 {
            width: 24%;
        }

        #couponstable .cptablecl2 {
            width: 26%;
        }

        #couponstable .cptablecl3 {
            width: 15%;
        }

        #couponstable .cptablecl3 {
            width: 15%;
        }

        #couponstable .cptablecl5 {
            width: 20%;
        }

        @media screen and (max-width: 767px) {

            #couponstable .cptablecl1,
            #couponstable .cptablecl2,
            #couponstable .cptablecl3,
            #couponstable .cptablecl4,
            #couponstable .cptablecl5 {
                width: 100%;
            }

            .offer-a2 {
                width: 100% !important;
            }

            #couponstable td:nth-child(2),
            #couponstable td:nth-child(3) {
                text-align: center !important;
            }

            #couponstable td ul {
                margin: auto !important;
                list-style-type: none !important;
            }
        }

        #couponstable td .couponcodetxt {
            padding: 10px 15px;
            color: #4CAF50;
        }

        table td {
            border: none;
        }

        #couponstable {
            border: none;
            font-size: 15px !important;
        }

        #couponstable th {
            background-color: #7C4DFF;
            color: #fff;
        }

        #couponstable td {
            border-bottom: 10px solid #E0E0E0;
        }

        #couponstable td ul {
            list-style-type: none;
            /*font-size: 1em;*/
        }

        #couponstable td ul li:before {
            content: '\2713';
            display: inline-block;
            color: #388E3C;
            padding: 0 6px 0 0;
            font-size: 15px;
            font-weight: 900;
        }

        #couponstable td button {
            margin: auto;
            margin-bottom: 5px;
            padding: 10px;
            text-decoration: none;
            box-shadow: none;
            background: none;
        }

        #couponstable td button:hover {
            transform: none;
        }

        #couponstable td:nth-child(even) {
            background-color: #def7f7;
        }

        #couponstable td:nth-child(2),
        #couponstable td:nth-child(3) {
            text-align: left;
        }

        #couponstable td:nth-child(4) {
            text-align: center;
        }

        #couponstable .couponabutton {
            padding: 15px 25px;
            background-color: #FFD700;
            border-radius: 3px;
            border: none;
        }

        #couponstable .couponabutton a {
            color: #333333;
            letter-spacing: 0.5px;
            font-weight: 700;
            text-decoration: none;
        }

        #couponstable .couponabutton:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            background-color: #F7CA00;
        }

        .coupon_code {
            font-size: 14px;
            font-weight: 500;
        }

        .discount-sec {
            color: #333333;
            font-size: 14px;
            font-weight: 500;
        }

        .discount-sec:before {
            content: '\2713';
            display: inline-block;
            color: #388E3C;
            padding: 0 6px 0 0;
            font-size: 15px;
            font-weight: 900;
        }

        .integration-checklist__copy-button {
            display: block;
            position: relative;


            &:before {
                content: '';
                display: none;
                position: absolute;
                z-index: 9998;
                top: 35px;
                left: 15px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 5px solid rgba(0, 0, 0, .72);
            }

            &:after {
                content: 'Copy to Clipboard';
                display: none;
                position: absolute;
                z-index: 9999;
                top: 40px;
                left: 0px;
                width: 114px;
                height: 36px;
                color: #fff;
                font-size: 10px;
                line-height: 36px;
                text-align: center;
                background: rgba(0, 0, 0, .72);
                border-radius: 3px;
            }

            &:hover {
                background-color: #eee;

                &:before,
                &:after {
                    display: block;
                }
            }

            &:active,
            &:focus {
                outline: none;

                &:after {
                    content: 'Copied!';
                }
            }
        }


        .header {
            background: #000 !important;
        }

        .hero_section {
            background: #080808 !important;
            background-image: url(https://googiehost.com/img/GoogieHostBgmin-1.png) !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center !important;
        }

        .hero-heading span {
            color: #F58F2A;

        }



        .bfcm-hero-plan {
            border: 1px solid #fff;
            background-color: transparent;
            transition: all 0.3s;
        }

        .bfcm-hero-plan:hover {
            border: 2px solid #FF5722;
        }

        .bfcm-hero-plan-featured {
            line-height: 30px;
            text-align: left;
            margin-left: 10px;
        }

        .bfcm-hero-plan-btn {
            background-color: #FF5722;
            text-transform: uppercase;
        }

        .bfcm-hero-plan-btn:hover {
            background-color: #128413;
        }

        .coupon_section {
            margin: 50px 0;
        }

        .review_description {
            margin: 50px 0;
        }

        .review_description p {
            color: #212529;
        }

        .review_description p a {
            color: rgb(29, 114, 241);
        }



        .activate-btn,
        .review-btn {
            padding: 12px 35px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 18px;
            width: fit-content;
        }

        .activate-btn {
            background-color: #3E9632;
            color: #ffffff;
        }

        .activate-btn:hover {
            background-color: #F58F2A;
        }

        .review-btn {
            background-color: #3D00A6;
            color: #ffffff;
        }

        .upcoming_offer_table table thead tr th {
            background-color: #18029D;
            color: #ffffff;
            padding: 10px;
            font-size: 20px;
            font-weight: 600;
        }

        .upcoming_offer_table table {
            border-radius: 10px 10px 0px 0px;
        }

        .compare-table {
            border: 1px solid #000000;
            border-radius: 30px;
            background: #F6F6F6;


        }

        .hosting-sales-tips {
            background: #F7783A;
            color: #fff;
            font-size: 24px;
            border-radius: 20px 0px 0px 20px;
        }

        .hosting-companies {
            background: #18029D;
            color: #fff;
            font-size: 24px;
            border-radius: 0px 20px 20px 0px;
        }

        .companies-list {
            font-size: 18px;
            font-weight: 500;
            color: #000;
            list-style: none;
        }

        .companies-list li {
            margin-bottom: 5px;
        }

        .sales-tips {
            font-size: 18px;
            font-weight: 500;
            list-style: none;
        }

        .sales-tips li {
            margin-bottom: 5px;
        }

        .sales-tips a {
            color: #000;

        }

        .fa-check {
            color: #fff;
            background: #4BAE4F;
            padding: 5px;
            margin-right: 5px;
            border-radius: 40px;
            font-size: 10px;
        }

        .fa-x {
            color: #fff;
            background: #E21B1B;
            padding: 5px;
            margin-right: 5px;
            border-radius: 40px;
            font-size: 10px;
        }

        .googiehost-feature {
            background: #F4F2FF;
            border-radius: 20px;
            padding: 20px;
        }

        .seprator {
            border-right: 1px solid #C8C8C8;

        }

        .tested {
            color: #FF1E1E;
            font-size: 18px;
            font-weight: 700;

        }

        .black-friday-price span {
            font-size: 35px;
        }


        .claim-btn {
            background: #F58F2A;
            border: 1px solid #F58F2A;
            color: #fff;
            border-radius: 30px;
            padding: 15px 30px;
        }

        .explore-btn {
            border: 1px solid #fff;
            background-color: #000;
            border-radius: 30px;
            padding: 15px 30px;

        }

        .explore-btn a {
            color: #fff;
        }

        .claim-btn a {
            color: #fff;
            text-decoration: none;
        }

        .table-text-left {
            text-align: left;
        }

        @media(max-width:1024px) {
            .table-text-left {
                text-align: center;
            }
        }

        @media (min-width: 900px) {
            #menu-primary-marketer {
                margin-top: 10px !important;
                margin-bottom: 0px;
                /* padding: 10px 0px; */
            }
        }

        @media(max-width:1199px) {
            .compare-heading {
                font-size: 20px;
            }
        }

        @media(max-width:991px) {
            .hosting-sales-tips {

                border-radius: 20px;
            }

            .hosting-companies {
                border-radius: 20px;
            }

            .hosting-companies {

                border-radius: 20px;
            }

        }

        @media(max-width:768px) {
            .seprator {
                display: none;
            }
        }

        /*New Design Hero Section CSS*/
        #hero_list_check li:before {
            position: static;
            margin-right: 10px;
        }

        .deals-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 20px;
            /* Space between rows */
            margin: 20px 0;
            border: 0px !important;
        }

        .deals-table th {
            text-align: left;
            font-weight: bold;
            font-size: 16px;
            padding: 15px;
            color: #333;
        }

        .deals-table tr {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #F6F6F6;
            border-radius: 10px;

        }


        .deals-table td {
            padding: 20px;
            vertical-align: middle;
            width: 25%;
        }

        .logo-cell {
            text-align: center;
        }

        .logo {
            display: block;
            margin: 0 auto 10px;
        }

        .review-link {
            color: #759ac4;
            font-size: 12px;
            text-decoration: none;
        }

        .deal-info {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .grab-deal-sec {
            border: 1px solid #000088;
            border-style: dashed;
            text-align: center;
            border-radius: 20px;
            padding: 15px;
        }


        .deal-info li {
            font-weight: 500;
        }

        .deal-heading {
            font-size: 18px;
            font-weight: 700;
        }

        .deal-list {
            list-style: none;
            padding-left: 0px;
        }

        .discount-cell {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        .action-cell {
            text-align: center;
        }

        .deal-button {
            display: inline-block;
            background-color: #f78f1e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .rating {
            color: orange;
            margin-bottom: 5px;
        }

        .coupon_code {
            font-size: 12px;
            color: #333;
            text-align: center;
        }


        .coupon-btn {
            border-radius: 30px;
            padding: 15px 30px;
            margin-left: 0px;
            background-color: #3BAE15;
            font-size: 18px;
            margin-bottom: 10px;
            width: fit-content;
            border: 0px;
        }

        .coupon-btn a {
            text-decoration: none;
        }

        .coupon-btn:hover {
            background-color: #F58F2A;
        }

        .coupon-btn a {
            color: #fff;
        }

        .litespeed-loaded {
            width: 100%;
        }

        .feature-img {
            width: 35%;
        }

        .fa-circle-info {
            color: #FF1E1E;
        }

        .menu-item a {
            text-decoration: none;
        }

        .list a {
            text-decoration: none;
        }

        .list {
            padding-left: 0px;
        }

        .claim-btn {
            padding: 15px 22px;
        }

        .explore-btn {
            padding: 15px 22px;
        }



        @media(max-width:1024px) {
            .litespeed-loaded {
                width: 85%;
            }

            .discount-sec,
            .deal-heading {
                text-align: center;
            }

            .discount-sec,
            .deal-heading {
                text-align: left;
            }

            .deals-table td {
                padding: 5px 20px;

            }

            .coupon-table-sec {
                padding: 8px 0px !important;
            }
        }

        @media(max-width:425px) {
            .upcoming_offer_table table {
                width: 100% !important;
            }

            .claim-btn {
                padding: 15px 15px;
            }

            .explore-btn {
                padding: 15px 15px;
            }
        }

        @media(max-width:768px) {
            .seprator {
                margin-bottom: 10px;
                border-bottom: 1px solid #C8C8C8;
                border-right: 0px;
            }

            .feature-img {
                width: 20%;
            }

            .mt-single {
                padding: 8px 0px !important;
            }

            .deals-table td {
                width: 100%;
                border-radius: 0px !important;
                border-right: 0px !important;
            }

            .deals-table td {
                padding: 20px;

            }

            .card-x {
                padding: 30px 16px !important;
                border: 2px solid #ddd;
                border-radius: 10px;
            }

            .btn-col {
                display: flex;
                justify-content: center;
            }

            .claim-btn {
                width: fit-content;
            }

            .explore-btn {
                width: fit-content;
            }

        }

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }



            tr {
                margin: 0 0 1rem 0;
            }

            tr:nth-child(odd) {
                background: #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                /* Top/left values mimic padding */
                top: 0;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }
        }

        .host-card-title {
            background: #bd081c;
            padding: 1em;
            font-size: 1.9em;
            line-height: 1;
            font-weight: 800;
            color: #fff;
            border-radius: 10px 10px 0 0;
            text-align: left;
        }

        .host-card-title i {
            color: #ffd487;
        }

        @media (max-width: 768px) {
            #tablepress-17 {
                display: block !important;
            }
        }

        .note {
            background: #3bae15;
            padding: 15px;
            text-align: center;
            color: #fff;
            font-size: 18px;
        }

        .mb-single {
            margin-bottom: 30px;
        }

        .mt-double {
            margin-top: 30px;
        }
    </style>


    {{--  hero section --}}
    @foreach ($data->heroSections as $heroSection)
        <section class="hero_section">
            <div class="container">
                <div class="row" style="padding: 70px 0;">
                    <div class="col-md-6">
                        <div class="">
                            {!! $heroSection->title !!}
                            {!! $heroSection->subtitle !!}
                            <div class="d-flex">
                                <h2 class="display-5 mb-4 fw-bolder black-friday-price"
                                    style="color: #FF5722; font-size: 60
                        px;">
                                    $25<span>/Lifetime</span>
                                    <span class="" style="color:#F58F2A; font-size: 24px;">(Save Up
                                        to 90%)</span>
                            </div>
                            </h2>
                            <div class="d-flex">
                                <a href="https://googiehost.com/lifetime-hosting/#plan_box"
                                    class="btn claim-btn border text-decoration-none text-white fw-bold me-2">
                                    Claim Deal <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a href="#explore-plan"
                                    class="btn border  text-decoration-none text-white fw-bold explore-btn">
                                    More Deals <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>


                        </div>

                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('storage/uploads/hero/' . $heroSection->image) }}"
                            alt="Black Friday Cyber Monday" style="width: 75%;">
                    </div>
                </div>
            </div>



            </div>
        </section>
    @endforeach
    <div class="mt-5 text-center">
        <img src="depends/feature-img.png" alt="" class="w-75 m-auto">
    </div>
    <!-- Hero End -->
    <!-- Website Content etc -->
    <div class="container">
        <section class="py-5 position-relative bg-white z-1">
            <div class="container">
                <div class="inner text-center block-double-tb">
                    <h2 class=" sec-heading">Best Web Hosting Sale 2025 </h2>
                    <!-- <span class="heading-4 blink-soft">Sale Live!</span> -->
                    <p class="sec-subheading text-center">Googiehost blog is your one-stop solution to finding the best web
                        hosting services. Find out which top webhost are the best at saving your money & time. Get reliable
                        facts and reviews for the top rated hosting solutions.</p>
                    <p class="sec-subheading text-center">Site Owner? You Deserve Peace of Mind! Compare Trusted & Checked
                        Web Hosting Services Here. We've
                        Compared 15 Flexible, Cost-Effective Web Hosting Services Your Dream Project Website.</p>
                </div>

                {{-- hosting plan section --}}
                @foreach ($data->paidHosting as $pagePaid)
                    <div class="row sale-row text-center mb-4 cursor-pointer"
                        onclick="window.location.href='{{ $pagePaid->button_link }}'">
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <div class="d-grid">
                                <a href="{{ $pagePaid->button_link }}"><img class="img-fluid"
                                        src="{{ asset('storage/paidplans/paidHosting/' . $pagePaid->plan_image) }}"></a>

                                <div>
                                    <span style="color:orange">
                                        @for ($i = 0; $i < $pagePaid->rating; $i++)
                                            <i class="fa-solid fa-star"></i>
                                        @endfor
                                    </span>
                                    <p class="mb-0 disc-coupon">{{ strtoupper($pagePaid->disc_coupon) }}</p>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 deal-sec">
                            <div>
                                {!! $pagePaid->listing_points !!}
                            </div>
                        </div>
                        <div class="col-md-3 deal-sec">
                            <div>
                                <h5 class="deal-heading">Whats the Deal</h5>
                                {!! $pagePaid->deal_points !!}

                            </div>
                        </div>
                        <div class="col-md-3 p-2 d-flex align-items-center justify-content-center">
                            <div>
                                <a href="{{ $pagePaid->button_link }}" target="_blank" rel="noopener"><button
                                        class="grab-deal-btn">{{ $pagePaid->button_text }}&nbsp;<i
                                            class="fa-solid fa-arrow-right"></i>
                                    </button></a>

                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </section>
        <!-- YouStable End -->
        <section class="review_description">
            <script>
                function toggleReadMore() {
                    var content = document.getElementById("extraContent");
                    var btn = document.getElementById("toggleButton");
                    if (content.style.display === "none") {
                        content.style.display = "block";
                        btn.innerText = "Read Less";
                    } else {
                        content.style.display = "none";
                        btn.innerText = "Read More";
                    }
                }
            </script>
            <style>
                .btn-primary {
                    display: none;
                }

                #extraContent {
                    display: block;
                    /* Ensure extra content is hidden initially */
                }

                @media only screen and (max-width: 767px) {

                    /* Styles for mobile devices */
                    #extraContent {
                        display: none;
                        /* Ensure extra content is hidden initially */
                    }

                    .btn-primary {
                        width: 100%;
                        display: block;
                    }
                }
            </style>
            <div class="container mb-5">

                @foreach ($data->paidHostingOffer as $paidHostingOffer)
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 p-3 rounded-3 align-items-center"
                        style="background-color: #e5d4ff">
                        <div class="col">
                            <div>
                                <h2 class="fw-bold mb-3 mb-lg-0 text-lg-start text-center">{{ $paidHostingOffer->title }}
                                </h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-center justify-content-lg-end">
                                <a href="{{ $paidHostingOffer->button_link }}" class="text-decoration-none me-3">
                                    <button class="activate-btn border-0">Activate Offer <i
                                            class="fa-solid fa-arrow-right"></i></button> </a>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 p-3 rounded-3 mt-3">
                        <div class="col">
                            <img src="{{ asset('storage/offers/paid/' . $paidHostingOffer->image) }}" width="100%">
                            <p class="para mt-3"><strong> {{ $paidHostingOffer->offer_text }}</strong></p>
                        </div>
                        <div class="col">
                            {!! $paidHostingOffer->description !!}


                            <!-- Additional Content Hidden Initially -->
                            {{-- <div id="extraContent">
                                <p class="para">Black Friday deals bring Flat 80% instant OFF on Shared Hosting plans for
                                    beginners, wanting to start Blogging, online portfolio for projects and all. Even for
                                    websites requiring virtual servers for uninterrupted management, YouStable brings 50%
                                    OFF on
                                    CyberPanel VPS Hosting deals.</p>
                                <p class="para">Want more? Wait for Santa’s exclusive Xmas hosting gifts. And not only
                                    that,
                                    Get
                                    to Enjoy New Year's unbelievable savings. So, Stay tuned! Festive deals are on the way!
                                </p>
                            </div> --}}

                            <!-- Read More Button -->
                            {{-- <button id="toggleButton" class="btn btn-primary mt-2" onclick="toggleReadMore()">Read
                                More</button> --}}
                        </div>
                    </div>
                @endforeach



            </div>




            <div class="container mb-5">
                <div class="row mx-auto mb-4" style="max-width: 90%;">
                    <div class="col-12">
                        <div class="p-4 rounded-4" style="background: #F6F6F6;">
                            <p class="para fw-medium text-center mb-0"><strong style="color:#FF1E1E"> Note: </strong>
                                Don’t forget to read Unbaised reviews of web hosting providers during the upcoming
                                <strong style="color:#F7783A"> Black Friday Web Hosting Sale and Cyber Monday Web
                                    Hosting Sale</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="white-bg card-x " style="padding: 30px;">
                    <h2 class="mt-double mb-single text-center">How do we test and recommend?</h2>
                    <div class=" d-flex">
                        <style>
                            blockquote:before,
                            .quote-box:before {
                                content: "\201C";
                                color: #ddd;
                                font-family: Georgia, serif;
                                font-size: 59px !important;
                                font-weight: bold;
                                position: absolute;
                                left: -3px !important;
                                top: -6px !important;
                            }
                        </style>
                        <div class="col mx-auto my-auto">
                            <div class="position-relative">
                                <p class=" quote-box fst-italic text-muted mb-0 ms-1">
                                    To provide you with the deals mentioned below, our team has tested all the companies on
                                    various factors
                                    such as uptime, load handling, speed etc. to ensure you don’t get stuck with low-quality
                                    service just
                                    because of attractive offers!!
                                </p>

                            </div>
                            <br>
                            <i class="text-center">Rajesh Chauhan, CEO, Googiehost</i>
                        </div>
                        <div class="col text-center">
                            <img src="{{ asset('images/53-01_aqdybj.png') }}" alt="testing" class="w-50">
                        </div>
                    </div><br>

                    <h3 class="note">
                        <strong
                            style="color: #fff;font-size: 22px;border: 2px solid white;border-radius: 99%;padding: 0px 12px 4px 12px;background: #303952;">&#x2139;</strong>&nbsp;Last
                        year we published Halloween, Black Friday and Cyber
                        Monday offers, which will also
                        be
                        available this year.
                    </h3>
                </div>

                <div class="row my-5">
                    <div class="col-12">
                        <h3 class="text-center mb-5 fw-bold">Upcoming Deals</h3>
                        <div class="upcoming_offer_table">
                            <table class="table table-striped text-center w-75 mx-auto border">
                                <thead class="text-white "
                                    style="background-color: #18029D; border-radius: 20px 20px 0px 0px;">

                                    <tr>
                                        <th>Upcoming Offers</th>
                                        <th>Date</th>
                                        <th>Check Deals</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-text-left">Save Flat 75% 💰</td>
                                        <td class="table-text-left">14 Jan-14 Mar, 2025</td>
                                        <td><a href="#explore-plan"><img style="width: 80px;"
                                                    src="{{ asset('images/icons/live.webp') }}"></a></td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Holi</td>
                                        <td class="table-text-left">14 March, 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">April Fool</td>
                                        <td class="table-text-left">1 April, 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Easter</td>
                                        <td class="table-text-left">20 April, 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Summer Sale</td>
                                        <td class="table-text-left">Available in May-July 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Diwali (Deepawali in India) 🪔</td>
                                        <td class="table-text-left">18-23 October, 2025 </td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td class="table-text-left">Halloween 🎃</td>
                                        <td class="table-text-left">31 October, 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <td class="table-text-left">Black Friday Hosting sales 🔥</td>
                                    <td class="table-text-left">28 November 2025</td>
                                    <td>Upcoming
                                    </td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Cyber Monday</td>
                                        <td class="table-text-left">1 December 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">Christmas Hosting 🎅</td>
                                        <td class="table-text-left">25th December 2025</td>
                                        <td>Upcoming</td>
                                    </tr>
                                    <tr>
                                        <td class="table-text-left">New Year 🧨</td>
                                        <td class="table-text-left">31 Dec- 5 Jan 2026</td>
                                        <td>Upcoming</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="compare-table p-4 mb-5">
                    <div class="row">


                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6 pe-0">
                            <div class=" hosting-sales-tips p-3">
                                <h4 class="fw-fold compare-heading">Web Hosting Sales Tips</h4>
                            </div>
                            <p style="padding:12px;" class="para">Here are the few links, I would like to mention in
                                order to guide
                                you on a
                                better hosting plan and <a href="https://googiehost.com/blog/best-cheap-web-hosting/"
                                    target="_blank" class="text-decoration-none">cheap web hosting</a> monthly billing
                                according to your needs.</p>

                            <ul class="sales-tips text-left" style=" padding:20px;">
                                <li><i class="fa-solid fa-check"></i><a
                                        href="https://googiehost.com/blog/best-vps-hosting" target="_blank">Best VPS
                                        Hosting
                                        2025</a></li>
                                <li><i class="fa-solid fa-check"></i><a
                                        href="https://googiehost.com/blog/best-dedicated-server/" target="_blank">Best
                                        Dedicated
                                        Servers</a></li>
                                <li><i class="fa-solid fa-check"></i><a
                                        href="https://googiehost.com/blog/free-web-hosting-for-students"
                                        target="_blank">Free Web
                                        Hosting For Students</a></li>
                                <li><i class="fa-solid fa-check"></i><a href="https://googiehost.com/blog/vpn/"
                                        target="_blank">Demands For VPN Apps</a>
                                </li>
                                <li><i class="fa-solid fa-check"></i><a
                                        href="https://googiehost.com/blog/best-managed-web-hosting/" target="_blank">Best
                                        Managed
                                        Web Hosting</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-lg-6 ps-0">
                            <div class=" hosting-companies p-3">
                                <h4 class="fw-fold compare-heading">Web Hosting Companies You Should Avoid</h4>
                            </div>
                            <p style="padding:12px;" class="para">Listed below are some web hosting companies that you
                                should avoid
                                at any
                                cost. If you search the internet, you will find the many reasons why you must stay away
                                from
                                them.</p>
                            <ul class="companies-list text-left">
                                <li><i class="fa-solid fa-x"></i> GoDaddy (Low-Quality Hosting)
                                </li>
                                <li> <i class="fa-solid fa-x"></i> BigRock (Lack of Support and
                                    Quality)
                                </li>
                                <li> <i class="fa-solid fa-x"></i> Manas Hosting (Worst Hosting)
                                </li>
                                <li><i class="fa-solid fa-x"></i> Hosting (Over Loaded Servers)
                                </li>
                                <li><i class="fa-solid fa-x"></i> Hosting24 (Hosting Project)
                                </li>
                                <li><i class="fa-solid fa-x"></i> TurnkeyInternet (Strict Rules)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="tested mb-0"><i class="fa-solid fa-circle-info me-2"></i> We Tested These
                                Companies to Provide
                                You With Better Hosting Options This Season.</p>
                        </div>
                    </div>
                </div>

                {{-- block-single section --}}
                @include('includes.single-features')
            </div>
        </section>

    </div>


    <script>
        function myFunction1() {
            var copyText1 = document.getElementById("myInput1").innerHTML;
            navigator.clipboard.writeText(copyText1);

        }

        function myFunction2() {
            var copyText2 = document.getElementById("myInput2").innerHTML;
            navigator.clipboard.writeText(copyText2);

        }

        function myFunction3() {
            var copyText3 = document.getElementById("myInput3").innerHTML;
            navigator.clipboard.writeText(copyText3);

        }

        function myFunction4() {
            var copyText4 = document.getElementById("myInput4").innerHTML;
            navigator.clipboard.writeText(copyText4);

        }

        function myFunction5() {
            var copyText5 = document.getElementById("myInput5").innerHTML;
            navigator.clipboard.writeText(copyText5);

        }

        function myFunction6() {
            var copyText6 = document.getElementById("myInput6").innerHTML;
            navigator.clipboard.writeText(copyText6);

        }

        function myFunction7() {
            var copyText7 = document.getElementById("myInput7").innerHTML;
            navigator.clipboard.writeText(copyText7);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts.js"></script>
    <script type='text/javascript' id='marketers-delight-js-after'>
        MD.headerMenu();
    </script>
    <script>
        MD.accordion('faqs');
    </script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script type="text/javascript" src="https://a.omappapi.com/app/js/api.min.js" data-account="96954" data-user="86400"
        async></script>
@endsection

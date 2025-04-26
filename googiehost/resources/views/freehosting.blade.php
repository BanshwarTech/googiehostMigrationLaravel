@extends('includes.layout')
@section('page_title', 'Free Hosting - GoogieHost')
@section('content')
    {{-- include hero section --}}
    @include('includes.hero-section', ['data' => $data])

    {{-- plan section --}}
    <div class="container pricing-section py-5">
        <h2 class="sec-heading text-center">Choose Your Web Hosting Plan</h2>
        <p class="sec-subheading text-center">GoogieHost offers best free hosting with added features to help you reach new
            heights. Get free website migration when switching to a premium hosting provider.</p>
        {{-- include hosting plan  --}}
        @include('includes.hosting-plans')
    </div>

    {{-- feature section  --}}
    <section>
        <div class="container pb-5 ">
            <h2 class="text-center sec-heading">Web Hosting Features →</h2>
            <p class=" text-center  p-1 sec-subheading">
                We offer ultimate free hosting services packed with our most popular cPanel "DirectAdmin" to manage your
                free web hosting.
                Along with <a href="freewebsitebuilder.php">our free web hosting Website builder</a> you get free webmail
                access, SSD boosted drives, a fast
                MySQL database and much more.
            </p>

            <div class="row g-4 mt-4">
                {{-- include services section --}}
                @include('includes.services-section', ['data' => $data])

            </div>
        </div>

    </section>


    {{-- comparision table --}}
    <div class="container my-5 comparison-table">
        <h2 class="text-center w-md-50 m-auto">Why GoogieHost Is The Best Free Hosting Provider Over The Internet</h2>

        <div class="table-responsive  py-3">
            <table class="table table-bordered text-center hosting-comparison-table">
                <thead>
                    <tr class="table-freeHosting-section">
                        <th></th>
                        <th class="best-free-hosting">Best Free Hosting</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="table-heading-section">
                        <th>Features</th>
                        <th class=" googiehost-table-heading">GoogieHost</th>
                        <th class="table-heading-sec">InfinityFree</th>
                        <th class="table-heading-sec">Weebly</th>
                        <th class="table-heading-sec">Wix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <td class="text-start">NVMe SSD</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus "></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">Business Emails</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">LiteSpeed</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">Cloudflare</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">Control Panel</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">1-Click Installer</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">Malware Protection</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">SSL Certificate</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                    <tr class="table-active">
                        <td class="text-start">Website Builder</td>
                        <td class="googiehost-table-col"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-check check compare-table-check"></i></td>
                    </tr>
                    <tr>
                        <td class="text-start">No Forced Ads</td>
                        <td class="googiehost-table-col1"><i class="fa-solid fa-check check compare-table-check"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                        <td><i class="fa-solid fa-minus compare-table-minus"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- block-single section --}}
    @include('includes.single-features')

    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold">Free Hosting FAQ</h2>
        <div class="accordion p-md-5 bg-white" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>

@endsection

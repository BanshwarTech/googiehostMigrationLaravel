@extends('includes.layout')
@section('page_title', 'Dmca Notice')
@section('content')

    <div class="hero-section">
        <div class="container py-5">
            <div class="row text-center">
                <div class="hero-left-section">
                    <h1 class="entry-title mb-5">DIGITAL MILLENNUIM COPYRIGHT ACT NOTICE GENERATOR!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-5 mt-5">
            <div class="col-6 block-half">
                <h2>DMCA Notice Generator</h2><br>
                <h3 class="mb-3">Instantly Generate a DMCA Notice to Protect your Copyright</h3>
                <p>While we always feel glad when users land on GoogieHost, we are sorry to see you struggle for your stolen
                    content… trust us we can relate!
                    Nothing makes us more aggrieved than seeing your earnest content has been stolen by internet pirate and
                    they are passing it as their own and gaining profit that is rightfully yours!
                    But don’t worry, we have got your back. With our simple DMCA Notice Generator, you can get a customized
                    DMCA Notice, both in Styled Text and HTML format.
                    Just fill out the information below, submit, and find an instant DMCA Takedown Notice at your disposal.
                    Check below for more information about the DMCA in general and how to use our generator in particular.
                </p><br>
            </div>


            <div class="col-6 block-half block-single">
                <div class="columns-4  block-single-tb">
                    <form class="pure-form pure-form-stacked" method="post" action="notice.php">
                        <fieldset class="p-4 mb-4"
                            style="border-radius: 22px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <legend>Your Details</legend>
                            <label for="dmca_full_name">Full Name</label>
                            <input class="pure-input-1-2" type="text" id="dmca_full_name" name="dmca_full_name"
                                value="" required="">
                            <label for="dmca_address">Address</label>
                            <input class="pure-input-1" type="text" id="dmca_address" name="dmca_address" value=""
                                required="">
                            <label for="dmca_tel">Phone Number</label>
                            <input class="pure-input-1-2" type="text" name="dmca_tel" id="dmca_tel" value="">
                            <label for="dmca_email">Email</label>
                            <input class="pure-input-1-2" type="email" id="dmca_email" name="dmca_email" value=""
                                required="">
                        </fieldset>
                        <fieldset class="p-4 mb-4"
                            style="border-radius: 22px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <legend>Infringement Details</legend>
                            <label for="dmca_infringement_name">Name of Infringing Work</label>
                            <input class="pure-input-1-2" type="text" id="dmca_infringement_name"
                                name="dmca_infringement_name" value="" required="">
                            <label for="dmca_original_urls">Original Content URLs</label>
                            <textarea class="pure-input-1" name="dmca_original_urls" id="dmca_original_urls" rows="3" required=""></textarea>
                            <label for="dmca_infringing_urls">Infringing Content URLs</label>
                            <textarea class="pure-input-1" name="dmca_infringing_urls" id="dmca_infringing_urls" rows="3" required=""></textarea>
                        </fieldset> <br>
                        <p style="text-align: center;"><button class="pure-button pure-button-primary" type="submit"
                                name="SubmitButton">Generate DMCA Notice</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- faq section   --}}
    <div class="container mt-5 faq mb-5">
        <h2 class="text-center mb-5 fw-bold">Free Hosting FAQ</h2>
        <div class="accordion p-md-5 bg-white pb-5" id="accordionExample0">

            {{-- include faq section  --}}
            @include('includes.faq-section', ['data' => $data])


        </div>
    </div>
@endsection

@extends('Home.includes.main')
@section('page_name', 'Register')
@section('main-content')
<div class="container mt-5">
    <div class="row register">
        <div class="blury-img1"> </div>

        <div class="col-lg-5 text-lg-start">
            <h1 class="h1">The Cheapest <br> & Fastest <br><i class="highlight">Social
                    Media</i><br> Growth</h1>
            <p>Everything you need to improve your social media presence
            </p>
            <div class="mt-3 d-flex flex-wrap text-center text-lg-start">
                <!-- Orders Completed -->
                <div class="me-5 d-flex align-items-center rounded card-box">
                    <div class="icon-circle me-3"> <!-- Added Bootstrap margin -->
                        <i class="fa fa-box-open"></i>
                    </div>
                    <div>
                        <h4 class="title-text">14,350</h4>
                        <p class="subtitle-text">Orders Completed</p>
                    </div>
                </div>

                <!-- Active Customers -->
                <div class="me-4 d-flex align-items-center rounded card-box" style="background: #00000033;">
                    <div class="icon-circle me-3"> <!-- Added Bootstrap margin -->
                        <i class="fa fa-user-check"></i>
                    </div>
                    <div>
                        <h4 class="title-text">1200</h4>
                        <p class="subtitle-text">Active Customers</p>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-lg-5 offset-lg-1 mt-2 mt-lg-0 mb-2">
            <div class="auth-container">
                <div class="text-center mb-2">
                    <img src="{{ asset('public/assets/images/Group.png') }}" alt=" Logo">
                </div>
                <h4 class="text-center">Signup for new account</h4>
                <p class="small text-center">Please enter your details to complete signup.</p>
                <button type="button" class="btn btn-light w-100 mb-3"><img src="{{ asset('public/assets/images/google.png') }}"
                        height="20px" width="20px" /> Sign
                    up with Google</button>

                <form method="POST" action="{{ route('registration.process') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="enter  first name"
                                value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="enter  last name"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="enter  username"
                                value="{{ old('username') }}">
                            @error('username')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="useremail" class="form-control" placeholder="enter  email"
                                value="{{ old('useremail') }}">
                            @error('useremail')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Whatsapp No.</label>
                            <input type="text" name="whatsapp_no" class="form-control" placeholder="enter  mobile number"
                                value="{{ old('whatsapp_no') }}">
                            @error('whatsapp_no')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6"><label class="form-label">Referral User (Optional)</label>
                            <input type="text" name="referral_user" class="form-control" placeholder="referral usercode"
                                value="{{ old('referral_user', $referral) }}" readonly>
                            @error('referral_user')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <label class="form-label">Password</label>
                                <div>
                                    <span class="small w-75 me-2 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Password must have an uppercase, lowercase, number, and a special character (@, $, !, %, ?, &)."
                                        style="font-size: 10px; color: #fff; cursor: pointer; font-size:12px;">
                                        <i class="fa fa-user-check fa-1.5x"></i>
                                    </span>
                                    <!-- Toggle Password Icon -->
                                    <span onclick="togglePassword()" style="cursor: pointer;font-size:12px;">
                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                    </span>
                                </div>

                            </div>


                            <input type="password" id="password" name="pwd" class="form-control"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                placeholder="enter password">

                            @error('pwd')
                            <span class="message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="pwd_confirmation" class="form-control"
                                placeholder="enter confirm password" id="confirm_password">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-orange w-100">Sign up</button>
                </form>
                <p class="mt-3 text-center">Already have an account? <a href="{{ route('login') }}" class="text-light">Sign
                        in</a></p>
            </div>
        </div>


        <div class="blury-img2"></div>
    </div>

</div>
<script>
    function togglePassword() {
        let password = document.getElementById("password");
        let confirmPassword = document.getElementById("confirm_password");
        let toggleIcon = document.getElementById("togglePasswordIcon");

        if (password.type === "password") {
            password.type = "text";
            confirmPassword.type = "text";
            toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            password.type = "password";
            confirmPassword.type = "password";
            toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>

@endsection
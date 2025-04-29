@extends('Home.includes.main')
@section('page_name', 'Login')
@section('main-content')
<div class="container mt-5">


    <div class="row align-items-center login">
        <div class="blury-img1"> </div>
        <div class="col-lg-5 text-center text-lg-start">
            <h1 class="h1">The Cheapest <br> & Fastest <br><i class="highlight">Social
                    Media</i><br> Growth</h1>
            <p>Everything you need to improve your social media presence </p>
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

        <div class="col-lg-5 offset-lg-1 mt-5 mt-lg-0 mb-5">
            <div class="auth-container">
                <div class="text-center mb-2">
                    <img src="{{ asset('public/assets/images/Group.png') }}" alt=" Logo">
                </div>
                <h4 class="text-center">Log in to your account</h4>
                <p class="small text-center">Welcome back! Please enter your details.</p>
                <form action="{{ route('process.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Useremail</label>
                        <input type="text" name="useremail" class="form-control" placeholder="Enter your useremail">
                        @error('useremail')
                        <span class="message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="pwd"
                                placeholder="Enter password">
                            <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;FONT-SIZE:12PX;">
                                <i class="fa fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                        @error('pwd')
                        <span class="message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember for 30 days</label>
                        </div>
                        <a href="#" class="text-light" class="text-light" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-orange w-100">Sign in</button>
                    <button type="button" class="btn btn-light w-100 mt-2"><img src="{{ asset('public/assets/images/google.png') }}"
                            height="20px" width="20px" /> Sign in with Google</button>
                </form>
                <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}" class="text-light">Sign
                        up</a></p>
            </div>
        </div>

        <div class="blury-img2"></div>
    </div>

    <!-- ✅ Main Forgot Password Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: #373737; color: white;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Forgot Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- ✅ 1. Enter Email Section -->
                    <div id="emailSection">
                        <form id="frmForgot">
                            @csrf
                            <label>Email Address<span>*</span></label>
                            <input type="email" name="str_forgot_email" id="str_forgot_email"
                                placeholder="Enter your email" class="form-control">
                            <button type="submit" class="btn btn-orange mt-3 w-100">Send OTP</button>
                        </form>
                        <div id="forgot_msg" style="color: green;"></div>
                    </div>

                    <!-- ✅ 2. OTP Verification Section (Hidden Initially) -->
                    <div id="otpSection" style="display: none;">
                        <input type="text" id="otp_code" class="form-control" placeholder="Enter OTP">
                        <button id="verifyOtpBtn" class="btn btn-primary mt-3 w-100">Verify OTP</button>
                        <div id="otp_msg" style="color: red;"></div>
                    </div>

                    <!-- ✅ 3. New Password Section (Hidden Initially) -->
                    <div id="newPasswordSection" style="display: none;">
                        <input type="password" id="new_password" class="form-control" placeholder="New Password">
                        <input type="password" id="confirm_password" class="form-control mt-2"
                            placeholder="Confirm Password">
                        <button id="resetPasswordBtn" class="btn btn-success mt-3 w-100">Reset Password</button>
                        <div id="password_msg" style="color: red;"></div>
                    </div>

                    <!-- ✅ 4. Success Confirmation Section (Hidden Initially) -->
                    <div id="successSection" style="display: none;">
                        <h4>Password Reset Successful!</h4>
                        <p>You can now log in with your new password.</p>
                        <button onclick="window.location.href='/'" class="btn btn-primary w-100">Go to Login</button>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        let password = document.getElementById("password");
        let toggleIcon = document.getElementById("togglePasswordIcon");

        if (password.type === "password") {
            password.type = "text";
            toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            password.type = "password";
            toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>

<script>
    jQuery(document).ready(function() {

        // Step 1: Send OTP
        jQuery('#frmForgot').submit(function(e) {
            e.preventDefault();
            jQuery('#forgot_msg').html("Please wait...");

            jQuery.ajax({
                url: '/forgot-password-process',
                data: jQuery('#frmForgot').serialize(),
                type: 'post',
                success: function(result) {
                    if (result.status === 'success') {
                        jQuery('#forgot_msg').html(result.msg);
                        jQuery('#emailSection').hide();
                        jQuery('#otpSection').show();
                        jQuery('#modalTitle').text("Enter OTP");
                    } else {
                        jQuery('#forgot_msg').html(result.msg);
                    }
                }
            });
        });

        // Step 2: Verify OTP
        jQuery('#verifyOtpBtn').click(function() {
            var otp = jQuery('#otp_code').val();

            jQuery.ajax({
                url: '/verify-otp',
                type: 'post',
                data: {
                    otp: otp,
                    _token: "{{ csrf_token() }}"
                },
                success: function(result) {
                    if (result.status === 'success') {
                        jQuery('#otpSection').hide();
                        jQuery('#newPasswordSection').show();
                        jQuery('#modalTitle').text("Reset Password");
                    } else {
                        jQuery('#otp_msg').html(result.msg);
                    }
                }
            });
        });

        // Step 3: Reset Password
        jQuery('#resetPasswordBtn').click(function() {
            var new_password = jQuery('#new_password').val();
            var confirm_password = jQuery('#confirm_password').val();

            if (new_password !== confirm_password) {
                jQuery('#password_msg').html("Passwords do not match.");
                return;
            }

            jQuery.ajax({
                url: '/reset-password',
                type: 'post',
                data: {
                    new_password: new_password,
                    _token: "{{ csrf_token() }}"
                },
                success: function(result) {
                    if (result.status === 'success') {
                        jQuery('#newPasswordSection').hide();
                        jQuery('#successSection').show();
                        jQuery('#modalTitle').text("Success!");
                    } else {
                        jQuery('#password_msg').html(result.msg);
                    }
                }
            });
        });
    });
</script>
@endsection
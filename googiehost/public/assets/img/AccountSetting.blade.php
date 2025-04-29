@extends('includes.app')
@section('page_name', 'Account Setting')
@section('content')
    <div class="content account-setting">
        <div class="d-flex justify-content-between align-items-center my-3">
            <h1>Account Setting</h1>
            {{-- <div class="two-buttons">
                <a href="{{ route('manage.tickets') }}" class="btn text-white"><i class="fa-solid fa-arrow-left"></i> Back</a>

            </div> --}}
        </div>

        <div class="row g-4">

            <div class="col-md-12">
                <div class="card place-new-order">
                    <div class="card-body">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active border-0" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Overview
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link border-0" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">
                                    Change Password
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content p-3" id="myTabContent">
                            <!-- Account Details Tab -->
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <h5 class="mt-4"><strong>Profile Details</strong></h5>
                                <div>
                                    <!-- Profile Image Section -->
                                    <div class="position-relative d-inline-block">
                                        @if (!empty($userDetails->profile) && Storage::disk('public')->exists('uploads/project/' . $userDetails->profile))
                                            <img src="{{ asset('public/storage/uploads/project/' . $userDetails->profile) }}"
                                                class="rounded-circle img-thumbnail" width="120" height="120"
                                                alt="Profile Image">
                                        @else
                                            <img src="{{ asset('public/assets/images/user-icon.webp') }}"
                                                class="rounded-circle img-thumbnail" width="120" height="120"
                                                alt="Default Profile Image">
                                        @endif

                                        <!-- Upload & Delete Buttons -->
                                        <div class="mt-2">
                                            <form action="{{ route('profile.upload') }}" method="POST"
                                                enctype="multipart/form-data" class="d-inline">
                                                @csrf
                                                <label for="profileUpload" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-upload"></i>
                                                </label>
                                                <input type="file" name="profile_image" id="profileUpload" class="d-none"
                                                    onchange="this.form.submit()">
                                            </form>
                                            <form action="{{ route('profile.delete') }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-3">
                                            <label for="form-label">First Name</label>
                                            <input type="text" name="fname" placeholder="Enter your first name"
                                                value="{{ $userDetails->first_name }}" class="form-control">
                                            @error('fname')
                                                <div class="message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="form-label">Last Name</label>
                                            <input type="text" name="lname" placeholder="Enter your first name"
                                                value="{{ $userDetails->last_name }}" class="form-control">
                                            @error('lname')
                                                <div class="message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="form-label">Phone</label>
                                            <input type="number" name="phone_number" placeholder="Enter your phone number"
                                                value="{{ $userDetails->whatsapp_no ?? 'N/A' }}" class="form-control">
                                            @error('phone_number')
                                                <div class="message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="form-label">Email</label>
                                            <input type="email" name="email" placeholder="Enter your phone number"
                                                value="{{ $userDetails->email ?? 'N/A' }}" class="form-control" readonly>
                                        </div>
                                        <button type="submit" class="btn col-md-12 sub-btn">Submit</button>
                                    </div>
                                </form>


                            </div>

                            <!-- Reset Password Tab -->
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mt-4">Reset Password</h5>
                                    <!-- Toggle Password Icon -->
                                        <span onclick="togglePassword()" style="cursor: pointer; font-size: 16px;">
                                            <i class="fa fa-eye-slash" id="togglePasswordIcon"></i>
                                        </span>
                                   
                                </div>


                                <form action="{{ route('reset.password') }}" method="POST">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-md-6 mb-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <label for="new_password" class="form-label me-3">
                                                    New Password 
                                                </label>
                                                <span class="small fw-bold ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Password must have an uppercase, lowercase, number, and a special character (@, $, !, %, ?, &)."
                                                    style="font-size: 16px; color: #fff; cursor: pointer;">
                                                    <i class="fa-solid fa-circle-exclamation"></i>
                                                </span>
                                            </div>

                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password" placeholder="Enter new password">
                                            @error('new_password')
                                                <span class="message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="new_password_confirmation" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" id="new_password_confirmation"
                                                name="new_password_confirmation" placeholder="Confirm password">
                                        </div>
                                        <button type="submit" class="btn col-md-12 sub-btn">Update Password</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        function togglePassword() {
            let password = document.getElementById("new_password");
            let confirmPassword = document.getElementById("new_password_confirmation");
            let toggleIcon = document.getElementById("togglePasswordIcon");

            if (password.type === "password") {
                password.type = "text";
                confirmPassword.type = "text";
                toggleIcon.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                password.type = "password";
                confirmPassword.type = "password";
                toggleIcon.classList.replace("fa-eye", "fa-eye-slash");
            }
        }
    </script>
@endsection

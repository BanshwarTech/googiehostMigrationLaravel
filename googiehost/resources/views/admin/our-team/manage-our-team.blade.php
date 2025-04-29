@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Our Team</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Our Team</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('our.team') }}" class="btn btn-primary">
                <i class="bi bi-skip-backward-circle"></i> Back
            </a>
        </div>
    </div>
    <section class="section">
        <div class="row">


            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ isset($data->id) ? 'Update' : 'Create' }} Our Team
                        </h5>

                        <form class="row g-3" enctype="multipart/form-data" method="POST"
                            action="{{ isset($data->id) ? route('our.team.manage.process', $data->id) : route('our.team.manage.process') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name', $data->name ?? '') }}">
                                @error('name')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control" name="role" id="role"
                                    value="{{ old('role', $data->role ?? '') }}">
                                @error('role')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_image">
                                @if (!empty($data->profile_image))
                                    <img src="{{ asset('storage/our-team/' . $data->profile_image) }}" alt=""
                                        width="150">
                                @endif

                                @error('profile_image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="linkedin_url" class="form-label">Linkedin Url</label>
                                <input type="text" class="form-control" name="linkedin_url" id="linkedin_url"
                                    value="{{ old('linkedin_url', $data->linkedin_url ?? '') }}">
                                @error('linkedin_url')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="twitter_url" class="form-label">Twitter Url</label>
                                <input type="text" class="form-control" name="twitter_url" id="twitter_url"
                                    value="{{ old('twitter_url', $data->twitter_url ?? '') }}">
                                @error('twitter_url')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                    class="btn btn-primary col-12 col-lg-12 col-md-12">{{ isset($data->id) ? 'Update' : 'Create' }}</button>
                            </div>

                        </form>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

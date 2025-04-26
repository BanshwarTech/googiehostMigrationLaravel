@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Paid Hosting Plans</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Paid Hosting Plans</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.paid-hosting-plans') }}" class="btn btn-primary">
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
                            {{ isset($data->id) ? 'Update' : 'Create' }} Paid Hosting Plans
                        </h5>

                        <form class="row g-3" enctype="multipart/form-data" method="POST"
                            action="{{ isset($data->id) ? route('vps-hosting-plans.store', $data->id) : route('vps-hosting-plans.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="page_id" class="form-label">Page Name</label>
                                <select class="form-select" id="page_id" name="page_id">
                                    <option value="">Select Page</option>
                                    @foreach ($pages as $page)
                                        <option value="{{ $page->id }}"
                                            {{ old('page_id', $data->page_id ?? '') == $page->id ? 'selected' : '' }}>
                                            {{ $page->page_name }}</option>
                                    @endforeach
                                </select>
                                @error('page_id')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="logo_image" class="form-label">Logo Image</label>
                                <input type="file" class="form-control" id="logo_image" name="logo_image">
                                @if (!empty($data->logo_image))
                                    <img src="{{ asset('storage/paidplans/vpsHosting/logo_image/' . $data->logo_image) }}"
                                        alt="" width="150">
                                @endif

                                @error('logo_image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="offer_image" class="form-label">Offer Image</label>
                                <input type="file" class="form-control" id="offer_image" name="offer_image">
                                @if (!empty($data->offer_image))
                                    <img src="{{ asset('storage/paidplans/vpsHosting/offer_image/' . $data->offer_image) }}"
                                        alt="" height="50" width="50">
                                @endif

                                @error('offer_image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', $data->title ?? '') }}">
                                @error('title')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                    value="{{ old('description', $data->description ?? '') }}">
                                @error('description')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="coupon_code" class="form-label">Coupon Code</label>
                                <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                                    value="{{ old('coupon_code', $data->coupon_code ?? '') }}">
                                @error('coupon_code')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" name="button_text" id="button_text" class="form-control"
                                    value="{{ old('button_text', $data->button_text ?? '') }}">
                                @error('button_text')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="text" name="button_link" id="button_link" class="form-control"
                                    value="{{ old('button_link', $data->button_link ?? '') }}">
                                @error('button_link')
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

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
                            action="{{ isset($data->id) ? route('dedicated-hosting-plans.store', $data->id) : route('dedicated-hosting-plans.store') }}">
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
                                    <img src="{{ asset('storage/paidplans/dediHosting/' . $data->logo_image) }}"
                                        alt="" width="150">
                                @endif

                                @error('logo_image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="read_review_url" class="form-label">Read Review Url</label>
                                <input type="text" class="form-control" name="read_review_url" id="read_review_url"
                                    value="{{ old('read_review_url', $data->read_review_url ?? '') }}">
                                @error('read_review_url')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="deal_points" class="form-label">Deal Points</label>
                                <input type="text" class="form-control" name="deal_points" id="deal_points"
                                    value="{{ old('deal_points', $data->deal_points ?? '') }}">
                                @error('deal_points')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount', $data->discount ?? '') }}">
                                @error('discount')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="short_desc" class="form-label">Short Description</label>
                                <input type="text" name="short_desc" id="short_desc" class="form-control"
                                    value="{{ old('short_desc', $data->short_desc ?? '') }}">
                                @error('short_desc')
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

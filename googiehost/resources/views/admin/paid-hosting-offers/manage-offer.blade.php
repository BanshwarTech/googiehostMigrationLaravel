@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Paid Hosting Offers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Paid Hosting Offers</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('offer.paid') }}" class="btn btn-primary">
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
                            {{ isset($data->id) ? 'Update' : 'Create' }} Paid Hosting Offers
                        </h5>

                        <form class="row g-3" enctype="multipart/form-data" method="POST"
                            action="{{ isset($data->id) ? route('offer.paid.store', $data->id) : route('offer.paid.store') }}">
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
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if (!empty($data->image))
                                    <img src="{{ asset('storage/offers/paid/' . $data->image) }}" alt=""
                                        width="150">
                                @endif

                                @error('image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', $data->titl ?? '') }}">
                                @error('title')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="text" name="button_link" id="button_link" class="form-control"
                                    value="{{ old('button_link', $data->button_link ?? '') }}">
                                @error('button_link')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="offer_text" class="form-label">Offer Text</label>
                                <input type="text" class="form-control" name="offer_text" id="offer_text"
                                    value="{{ old('offer_text', $data->offer_text ?? '') }}">
                                @error('offer_text')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-12 col-md-12">
                                <label for="description" class="form-label"> Description</label>
                                <textarea name="description" class="tinymce-editor">
                                    {{ old('description', $data->description ?? '') }}
                                </textarea>
                                @error('description')
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

@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Hero Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Hero Section</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.hero-section') }}" class="btn btn-primary">
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
                            {{ isset($data->id) ? 'Update' : 'Create' }} Hero Section
                        </h5>

                        <form class="row g-3" method="POST"
                            action="{{ isset($data->id) ? route('hero.store', $data->id) : route('hero.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="page_id">Page Name</label>
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
                                <label for="title" class="form-label">Hero Title</label>
                                <textarea class="tinymce-editor" id="title" name="title"> {{ old('title', $data->title ?? '') }}</textarea>
                                @error('title')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="subtitle" class="form-label">Hero Subtitle</label>
                                <textarea class="tinymce-editor" id="subtitle" name="subtitle">{{ old('subtitle', $data->subtitle ?? '') }}</textarea>
                                @error('subtitle')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="listing_point" class="form-label">Listing Point</label>
                                <textarea class="tinymce-editor" id="listing_point" name="listing_point">{{ old('hero_title', $data->listing_point ?? '') }}</textarea>
                                @error('listing_point')
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

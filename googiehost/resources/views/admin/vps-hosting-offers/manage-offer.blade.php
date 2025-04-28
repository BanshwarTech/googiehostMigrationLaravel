@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage VPS Hosting Offers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">VPS Hosting Offers</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('offer.vps') }}" class="btn btn-primary">
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
                            {{ isset($data->id) ? 'Update' : 'Create' }} VPS Hosting Offers
                        </h5>

                        <form class="row g-3" enctype="multipart/form-data" method="POST"
                            action="{{ isset($data->id) ? route('offer.vps.store', $data->id) : route('offer.vps.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="mb-3 col-12 col-lg-3 col-md-3">
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

                            <div class="mb-3 col-12 col-lg-3 col-md-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', $data->title ?? '') }}">
                                @error('title')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-3 col-md-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    value="{{ old('price', $data->price ?? '') }}">
                                @error('price')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 col-12 col-lg-3 col-md-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if (!empty($data->image))
                                    <img src="{{ asset('storage/paidOffers/dediHosting/' . $data->image) }}" alt=""
                                        width="150">
                                @endif

                                @error('image')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="performance" class="form-label">Performance</label>
                                <input type="text" class="form-control" name="performance" id="performance"
                                    value="{{ old('performance', $data->performance ?? '') }}">
                                @error('performance')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="speed" class="form-label">Speed</label>
                                <input type="text" class="form-control" name="speed" id="speed"
                                    value="{{ old('speed', $data->speed ?? '') }}">
                                @error('speed')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="support" class="form-label">Support</label>
                                <input type="text" class="form-control" name="support" id="support"
                                    value="{{ old('support', $data->support ?? '') }}">
                                @error('support')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="response_time" class="form-label">Response Time</label>
                                <input type="text" class="form-control" name="response_time" id="response_time"
                                    value="{{ old('response_time', $data->response_time ?? '') }}">
                                @error('response_time')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="server_uptime" class="form-label">Server Uptime</label>
                                <input type="text" class="form-control" name="server_uptime" id="server_uptime"
                                    value="{{ old('server_uptime', $data->server_uptime ?? '') }}">
                                @error('server_uptime')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-4 col-md-4">
                                <label for="live_status" class="form-label">Live Status</label>
                                <input type="text" class="form-control" name="live_status" id="live_status"
                                    value="{{ old('live_status', $data->live_status ?? '') }}">
                                @error('live_status')
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

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="list_heading" class="form-label">List Heading</label>
                                <input type="text" name="list_heading" id="list_heading" class="form-control"
                                    value="{{ old('list_heading', $data->list_heading ?? '') }}">
                                @error('list_heading')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="list_point" class="form-label">List Point</label>
                                <textarea name="list_point" class="tinymce-editor">{{ old('list_point', $data->list_point ?? '') }}</textarea>
                                @error('list_point')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-lg-6 col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="tinymce-editor">{{ old('description', $data->description ?? '') }}</textarea>
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

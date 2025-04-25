@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Pages</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Pages</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.pages') }}" class="btn btn-primary">
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
                            {{ isset($data->id) ? 'Update' : 'Create' }} Pages
                        </h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="POST"
                            action="{{ isset($data->id) ? route('pages.store', $data->id) : route('pages.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control " id="floatingName"
                                        placeholder="Define Pages Name" name="page_name"
                                        value="{{ old('page_name', $data->page_name ?? '') }}">
                                    <label for="floatingName">Define Pages Name</label>
                                </div>
                                @error('page_name')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                    class="btn btn-primary col-12 col-lg-12 col-md-12">{{ isset($data->id) ? 'Update' : 'Create' }}</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection

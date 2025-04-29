@extends('admin.includes.layouts')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>Manage Privacy</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Privacy</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="row">


            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Update Privacy Section
                        </h5>

                        <form class="row g-3" method="POST" action="{{ route('privacy.manage.process') }}">
                            @csrf
                            <div class="mb-3 col-12 col-lg-12 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="tinymce-editor" id="description" name="description">{{ old('description', $data->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="message">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary col-12 col-lg-12 col-md-12">Update</button>
                            </div>

                        </form>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

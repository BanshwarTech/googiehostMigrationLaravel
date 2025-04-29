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
@endsection

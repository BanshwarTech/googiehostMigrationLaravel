@extends('includes.layout')
@section('page_title', 'Index')
@section('content')

    {{-- hero section --}}
    @include('includes.hero-section', ['data' => $data])
@endsection

@php
    $meta = config("meta.$pageName", [
        'title' => 'Default Title',
        'description' => 'Default description.',
        'keywords' => 'default, keywords',
        'schema' => '',
    ]);

@endphp
{{-- <pre>{{ var_dump(config("meta.$pageName")) }}</pre> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>{{ $meta['title'] }}</title>
    <meta name="description" content="{{ $meta['description'] }}">
    <meta name="keywords" content="{{ $meta['keywords'] }}">
    {{-- Render schema if it exists --}}
    @if (!empty($meta['schema']))
        {!! $meta['schema'] !!}
    @endif
    <!-- Favicons -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    {{-- <script src="https://kit.fontawesome.com/97ebc2bc67.js" crossorigin="anonymous"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <title>@yield('page_title')</title>
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet" />

    <style>
        .md-icon-star::before {
            content: '\e81b';
            font-family: "Font Awesome 6 Free";
            font-weight: 800;
            color: orange;
            font-style: normal;
            font-size: 20px;
            margin: 0 2px;
        }
    </style>
</head>

<body>
    @include('includes.header')

    @section('content')
    @show

    @include('includes.footer')
</body>

</html>

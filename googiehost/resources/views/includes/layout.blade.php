<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title></title>
    <!-- Favicons -->
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/97ebc2bc67.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>@yield('page_title')</title>
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet" />

    <style>
        .hero-left-section li {
            color: #fff;
            font-size: 18px;
            font-weight: 400;
            position: relative;
            padding-left: 25px;
            margin-bottom: 10px;
            list-style: none;
        }

        ul.list-check li::before {
            font-family: "Font Awesome 6 Free";
            content: "\f00c";
            /* fa-check */
            color: green;
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 0px;
            font-size: 18px;
            /* optional to control size */
        }

        .feature-card h5 {
            font-size: 20px;
            font-weight: 600;
            color: #2b0074;
            margin-bottom: 10px;
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

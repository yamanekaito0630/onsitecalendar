<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/onsitecalendar.css') }}">

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
</head>
<style>
    @media print {
        .no-print {
            display: none;
        }

        .calendar {
            width: 1040px !important;
        }

        body {
            zoom: 0.75;
            width: 1060px !important;
            margin: 0 auto;
            -webkit-print-color-adjust: exact;
        }
    }

    @page {
        size: A4 landscape; //横向き
    }
</style>
<body>
@component('admins.components.header', ['group'=>$group])
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 px-0">
            @component('admins.components.sidebar', ['group'=>$group, 'onsites'=>$onsites, 'members'=>$members])
            @endcomponent
        </div>
        <div class="col-lg-10 main">
            @yield('content')
        </div>
    </div>
</div>

@component('admins.components.footer')
@endcomponent
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</html>

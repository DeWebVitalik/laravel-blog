<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
@include('layouts.nav')
<main role="main" class="container">
    @yield('breadcrumbs')
    @include('flash::message')
    @yield('content')
</main><!-- /.container -->
@include('layouts.footer')
<script src="{{URL::asset('js/app.js')}}"></script>
</body>
</html>

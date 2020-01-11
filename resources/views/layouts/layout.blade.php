<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Blog Template for Bootstrap</title>
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    @include('layouts.header')
    @include('layouts.nav')
</div>
<main role="main" class="container">
    @include('flash::message')
    @yield('content')
</main><!-- /.container -->
@include('layouts.footer')
<script src="{{URL::asset('js/app.js')}}"></script>
</body>
</html>

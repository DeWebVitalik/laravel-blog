@extends('layouts.layout')
@section('title')
    Home | Blog
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('home') }}
@endsection
@section('content')
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 mb-4 border-bottom">
                Posts
            </h3>
            <div class="row mb-2">
                @forelse($posts as $post)
                    @include('layouts.post',compact('post'))
                @empty
                    <div class="col-md-12 text-center">
                        <h3 class="pb-3 mb-4border-bottom">
                            Posts not found
                        </h3>
                    </div>
                @endforelse
            </div>
            <nav class="blog-pagination">
                {{$posts->links()}}
            </nav>
        </div><!-- /.blog-main -->
    </div><!-- /.row -->

@endsection
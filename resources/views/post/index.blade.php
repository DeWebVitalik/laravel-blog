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
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <a class="text-dark" href="{{url('post/show/'.$post->id)}}">
                                    <h5 class="card-title">
                                        {{$post->name}}
                                    </h5>
                                </a>
                                <p class="card-text">{{$post->content}}</p>
                                <p class="card-text">
                                    <small class="text-muted">{{$post->created_at}}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="pb-3 mb-4border-bottom">
                        Posts not found
                    </h3>
                @endforelse
            </div>
            <nav class="blog-pagination">
                {{$posts->links()}}
            </nav>
        </div><!-- /.blog-main -->
    </div><!-- /.row -->

@endsection
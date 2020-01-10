@extends('layouts.layout')
@section('content')
    <div class="row">
        <aside class="col-md-3 blog-sidebar">
            <div>
                <h3 class="pb-3 mb-4 border-bottom">Categories</h3>
                <ol class="list-unstyled mb-0">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="p-3 mt-3 bg-light rounded">
                <h4>Actions</h4>
                <a class="btn btn-outline-primary" href="{{url('post/add')}}">Add post</a>
                <a class="btn btn-outline-primary" href="{{url('category/add')}}">Add category</a>
            </div>
        </aside><!-- /.blog-sidebar -->
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
                                <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
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
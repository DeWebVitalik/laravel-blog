@inject('Comments', 'App\Widgets\Comments')
@extends('layouts.layout')
@section('title')
    Post: {{$post->name}}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('post',$post) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 border-bottom">
                {{$post->name}}
            </h3>

            <div class="blog-post">
                <p class="blog-post-meta"> {{$post->created_at}}</p>
                {{$post->content}}
            </div><!-- /.blog-post -->

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="{{url('post/update/'.$post->id)}}">Update</a>
                <a class="btn btn-outline-danger" href="{{url('post/delete/'.$post->id)}}">Delete</a>
            </nav>
            @widget('Comments',[
                'id'=>$post->id,
                'boxName'=>$post->name,
                'action'=>route('addPostComment'),
                'type'=>$Comments::TYPE_POST
            ])
        </div>
        @include('layouts.sidebar')
    </div>
@endsection
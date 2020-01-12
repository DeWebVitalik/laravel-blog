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
                <p class="blog-post-meta"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->date}}</p>
                <p>
                    {!!$post->content!!}
                </p>
            </div><!-- /.blog-post -->

            <nav class="blog-pagination">
                @if($post->file)
                    <a class="btn btn-outline-primary" href="/userfile/{{$post->file}}"><i class="fa fa-paperclip"
                                                                                           aria-hidden="true"></i> {{$post->file}}
                    </a>
                @endif
                <a class="btn btn-outline-primary" href="{{route('postUpdate', $post->id)}}">Update</a>
                <a class="btn btn-outline-danger" href="{{route('postDelete', $post->id)}}">Delete</a>
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
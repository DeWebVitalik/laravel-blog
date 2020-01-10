@extends('layouts.layout')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 border-bottom">
            {{$post->name}}
        </h3>

        <div class="blog-post">
            <p class="blog-post-meta"> {{$post->created_at}}</p>

            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia
                bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac
                cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
                <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                <li>Donec id elit non mi porta gravida at eget metus.</li>
                <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
        </div><!-- /.blog-post -->

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{url('post/add')}}">Add new</a>
            <a class="btn btn-outline-primary" href="{{url('post/update/'.$post->id)}}">Update</a>
            <a class="btn btn-outline-danger" href="{{url('post/delete/'.$post->id)}}">Delete</a>
        </nav>
    </div>
@endsection
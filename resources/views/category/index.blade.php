@extends('layouts.layout')
@section('title')
    Categories
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 blog-main">
            <h3 class="pb-3 mb-4 border-bottom">
                Categories
            </h3>
            <div class="row mb-2">
                <div class="col-md-12">
                    <ul class="list-unstyled">
                        @forelse($categories as $category)
                            <li><a href="{{route('categoryShow',$category->id)}}">{{$category->name}}</a></li>
                        @empty
                            <h3 class="pb-3 mb-4border-bottom">
                                Categories not found
                            </h3>
                        @endforelse
                    </ul>
                </div>
            </div>
            <nav class="blog-pagination">
                {{$categories->links()}}
            </nav>
        </div><!-- /.blog-main -->
    </div><!-- /.row -->

@endsection
@inject('Comments', 'App\Widgets\Comments')
@section('title')
    Posts-{{$category->name}}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('category',$category) }}
@endsection
@extends('layouts.layout')
@section('content')
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 mb-4 border-bottom">
                {{$category->name}}
            </h3>
            <p style="font-size: 16px">
                {{$category->description}}
            </p>
            <div class="blog-pagination text-right">
                <a class="btn btn-outline-primary" href="{{route('categoryUpdate', $category->id)}}">Update</a>
                <a class="btn btn-outline-danger" href="{{route('categoryDelete', $category->id)}}">Delete</a>
            </div>
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
            @widget('Comments',[
            'id'=>$category->id,
            'boxName'=>$category->name,
            'action'=>route('addCategoryComment'),
            'type'=>$Comments::TYPE_CATEGORY
            ])
        </div><!-- /.blog-main -->
    </div><!-- /.row -->
@endsection
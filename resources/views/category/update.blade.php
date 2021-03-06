@extends('layouts.layout')
@section('title')
    Update: {{$category->name}}
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('categoryUpdate',$category) }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            @widget('Category')
        </div>
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 mb-4 border-bottom">
                Update category: {{$category->name}}
            </h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('categorySave', $category->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                           value="{{$category->name}}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"
                              rows="4">{{$category->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-success float-right">Save</button>
            </form>
        </div>
    </div><!-- /.row -->
@endsection
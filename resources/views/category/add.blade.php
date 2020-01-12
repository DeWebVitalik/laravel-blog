@extends('layouts.layout')
@section('title')
  Add category
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('categoryAdd') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            @widget('Category')
        </div>
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 mb-4 border-bottom">
                Add new category
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
            <form action="{{route('categorySave')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </form>
        </div>
    </div><!-- /.row -->

@endsection
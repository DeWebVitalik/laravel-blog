@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-3">
            @widget('Category')
        </div>
        <div class="col-md-9 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Add new post
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
            <form action="{{url('post/save')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Select category</label>
                            <select name="category_id" class="form-control" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Attach file</label>
                    <input type="file" name="file" class="form-control-file" id="file">
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
            </form>
        </div>
    </div><!-- /.row -->

@endsection
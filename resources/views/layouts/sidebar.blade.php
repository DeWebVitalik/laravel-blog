<aside class="col-md-3 blog-sidebar">
    <div>
        @widget('Category')
    </div>
    <div class="p-3 mt-3 bg-light rounded">
        <h4>Actions</h4>
        <a class="btn btn-outline-primary" href="{{url('post/add')}}">Add post</a>
        <a class="btn btn-outline-primary" href="{{url('category/add')}}">Add category</a>
    </div>
</aside><!-- /.blog-sidebar -->
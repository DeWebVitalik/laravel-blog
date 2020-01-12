<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <div class="my-0 mr-md-auto font-weight-normal blog-header-logo">Blog<sup>Laravel</sup></div>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a class="p-2 text-dark" href="{{route('categories')}}"><i class="fa fa-tags" aria-hidden="true"></i> Categories</a>
        <a class="p-2 text-dark" href="#"><i class="fa fa-github" aria-hidden="true"></i> Github</a>
    </nav>
    <a class="btn btn-outline-primary mr-3" href="{{route('categoryAdd')}}">Add category</a>
    <a class="btn btn-outline-primary" href="{{route('postAdd')}}">Add post</a>
</div>
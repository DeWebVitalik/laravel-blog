<div class="card">
    <div class="card-header">
        <h4 class="card-title mb-0">Categories</h4>
    </div>
    <ul class="list-group list-group-flush">
        @forelse($categories as $category)
            <li class="list-group-item"><a href="{{route('categoryShow',$category->id)}}">{{$category->name}}</a></li>
        @empty
            <li class="list-group-item text-center">
                Categories not found
            </li>
        @endforelse
    </ul>
</div>
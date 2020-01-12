<div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-250" style="overflow-x: hidden;">
        <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">
                <i class="fa fa-tags" aria-hidden="true"></i>
                <a href="{{route('categoryShow',$post->category_id)}}">{{$post->category->name}}</a>
            </strong>
            <h3 class="mb-0">
                <a class="text-dark" href="{{route('postShow', $post->id)}}">{{$post->name}}</a>
            </h3>
            <div class="mb-1 text-muted"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->date}}</div>
            <p class="card-text mb-auto">{{$post->littleContent}}</p>
            <a href="{{route('postShow', $post->id)}}">Continue reading</a>
        </div>
        @if($post->fileImage)
            <div class="post-image">
                <img class="card-img-right flex-auto d-none d-md-block" src="/userfile/{{$post->file}}"
                     alt="{{$post->name}}" style="max-height: 248px;">
            </div>
        @endif
    </div>
</div>

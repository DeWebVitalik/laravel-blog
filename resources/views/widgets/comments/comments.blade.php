<h4 class="pb-3 mb-4 border-bottom">
    Comments on {{$commentBoxName}}:
</h4>
<div class="comments-box">
    @forelse($comments as $comment)
        @include('widgets.comments.comment',compact('comment'))
    @empty
        <div class="alert alert-secondary text-center alert-comment-not-found">
            <h4 class="mb-0">Comments not found</h4>
        </div>
    @endforelse
</div>
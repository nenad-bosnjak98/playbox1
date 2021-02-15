@foreach($comments as $comment)
@if($comment->parent_id == null)
<div class="display-comment" style="margin-left: 14%">
    <strong class="bg-yellow-700">{{ $comment->user->name }}</strong>
    <p style="margin-bottom: 1%">{{ $comment->body }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="body" class="form-control text-black bg-gray-200 placeholder-black::placeholder pl-1" style="width:83.6%; padding-bottom:18px" placeholder="Want to reply?" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning bg-blue-500 mt-3 px-2 py-1 mb-3" value="Reply"/>
        </div>
    </form>
    @include('posts.commentsDisplay', ['comments' => $comment->replies])
</div>
@else
    <div class="display-comment" style="margin-left: 4.2%">
        <strong class="bg-yellow-700">{{ $comment->user->name }}</strong>
        <p style="margin-bottom: 1%">{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control text-black bg-gray-200 placeholder-black::placeholder pl-1" style="width:81.7%; padding-bottom:18px" placeholder="Want to reply?" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning bg-blue-500 mt-3 px-2 py-1 mb-3" value="Reply"/>
            </div>
        </form>
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endif
@endforeach


@extends('layouts.main')

@section('content')
<div class="mb-5" style="margin-top: 3.5%;
margin-bottom: 1%;
width: 73.3%;
background: rgba(140, 71, 230, 0.2);
border-radius: 10px;
margin-left: 26.4vh;
word-wrap: break-word;
vertical-align: top;
text-align: left;
font-size: 30px;
padding-left:3%;
padding-right:3%">
<img class="rounded" style="width:100%;padding-top:3%" src="/storage/cover_images/{{$post->cover_image}}">
   <!-- <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/"></div>  -->
    <div class="mb-7 pt-4 text-4xl"><h1>{{$post->title}} <hr></h1></div>
    <div class="mb-6">{{$post->body}}</div><hr>
    <small style="padding-bottom: 2%">Posted by {{$post->user->name}} at {{$post->created_at}}</small>
</div>

@if (!Auth::guest())
    @if(Auth::user()->id == $post->user->id)
<a class="bg-gray-200 hover:bg-blue-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-6 rounded-lg" style="margin-left: 16.3%;
margin-right: 53.4%;" href="/posts/{{$post->id}}/edit">Edit Post</a>
<div style="display: inline-block;">
{{Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])}}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'bg-gray-200 hover:bg-red-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-6 rounded-lg'])}}
{{Form::close()}}
</div>
@endif
@endif
<!--
<div id="disqus_thread" style="margin-left: 14%; margin-right: 14%; margin-top: 3%"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://playbox-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> -->
<hr style="margin-left:14%;margin-right: 14%;margin-top:1%">
@if (Auth::guest())
    <p style="text-align: center; margin-top:8%; font-size:30px">You need to be logged in to see the comments!</p>
@endif
@if (!Auth::guest())
<h2 class="underline" style="margin-left: 14%; margin-top:0.5%; margin-bottom:1%">Comments</h2>
  
    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

    <hr style="margin-left:14%;margin-right: 14%;margin-top:1%">
    <h4 class="underline" style="margin-left:14%;margin-top:0.6%">Add comment</h4>
        <form method="post" action="{{route('comments.store')}}">
            @csrf
            <div class="form-group">
                    <textarea class="form-control text-black" name="body" style="margin-left:14%;margin-top:0.6%; width:71.9%" placeholder="Want to join the conversation?"></textarea>
                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                    <input placeholder="Want to join the conversation?" type="submit" class="btn btn-success px-2 py-1 bg-red-400" value="Add Comment" style="margin-left: 14%" />
            </div>
        </form>
@endif
@endsection
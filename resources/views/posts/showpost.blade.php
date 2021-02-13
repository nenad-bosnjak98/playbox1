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
   <!-- <div><img style="box-sizing: border-box; width:100%; height: 300%" src="../storage/cover_images/"></div>  -->
    <div class="mb-7 pt-4 text-4xl"><h1>{{$post->title}} <hr></h1></div>
    <div class="mb-6">{{$post->body}}</div><hr>
    <small style="padding-bottom: 2%">Written on: {{$post->created_at}} </small>
</div>


<a class="bg-gray-200 hover:bg-blue-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-6 rounded-lg" style="margin-left: 16.3%;
margin-right: 53.4%;" href="/posts/{{$post->id}}/edit">Edit Post</a>
<div style="display: inline-block;">
{{Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST'])}}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'bg-gray-200 hover:bg-red-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-6 rounded-lg'])}}
{{Form::close()}}
</div>
@endsection
@extends('layouts.main')

@section('content')
    <h2 class="text-center mt-20 text-4xl underline">Edit Post</h2>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group mt-5" style="margin-left: 36.5%; padding-right: 50%">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => ['form-control', 'w-96', 'flex','pl-1', 'mb-3', 'bg-blue-300', 'text-black', 'placeholder-indigo-600'], 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group" style="margin-left: 36.5%">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => ['form-control', 'flex', 'pl-1', 'bg-blue-300', 'text-black', 'placeholder-indigo-600'], 'placeholder' => 'Start a discussion!'])}}
        </div>
        
        <div class="form-group" style="margin-left:36.5%; margin-top:0.6%">
            {{Form::file('cover_image')}}
        </div> 
        {{Form::hidden('_method','PUT')}}
        <div style="margin-left: 36.5%" class="mt-3 rounded">
        {{Form::submit('Submit', ['class'=>['btn btn-primary', 'bg-blue-500', 'pr-2', 'pl-2', 'rounded', 'pt-1', 'pb-1', 'text-red-400', 'cursor-pointer']])}}
        </div>
    {!! Form::close() !!}
@endsection
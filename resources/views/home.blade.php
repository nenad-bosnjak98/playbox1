@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header underline" style="font-size:40px; margin-left:50.2%; margin-top:5%; margin-bottom:1%">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p style=" margin-left: 14%;font-size:23px; text-align: center; margin-bottom:1.5%">Welcome, {{Auth::user()->name }}!</p> <br>
                </div>

                <div style="margin-left:49.6%;font-size: 24px; margin-bottom:2%">
                    Your Discussions
                </div>
                <hr style="margin-bottom:1%; margin-left:42%; margin-right:30%">
                <table class="table table-striped" style="margin-left: 43.5%;width:26%">
                    @if (count($posts) > 0)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td style="font-size:23px">{{$post->title}}</td>
                            <td><a class='bg-gray-200 hover:bg-green-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-5 rounded-lg' href="/posts/{{$post->id}}">View</a></td>
                            <td><a class='bg-gray-200 hover:bg-yellow-400 hover:text-white border border-gray-400 text-blue-700 font-bold py-2 px-5 rounded-lg' href="/posts/{{$post->id}}/edit">Edit</a></td>
                            <td>
                                {{Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])}}
                                {{Form::hidden('_method', "DELETE")}}
                                {{Form::submit('Delete', ['class'=> 'bg-gray-200 hover:bg-red-700 hover:text-white border border-gray-400 text-blue-700 font-bold py-1 px-5 rounded-lg'])}}
                        {{Form::close()}}
                    </td>
                        </tr>
                        @endforeach
                        @endif
                   </table>
                   @if(count($posts) == 0)   
                        <p style="margin-left: 47%; font-size:30px; margin-top:4%">You have no posts!</p>
                   @endif

            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('content')
<div class="container mx-auto  px-4  pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-yellow-400 text-3xl font-semibold underline">Drama</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
            @foreach ($topMovies as $top)
                <div class="mt-8">
    <a href="{{ route('movies.show', $top['id'])}}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$top['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
<!--     <div id="heart">
        <a href="#"><i class="heart fa fa-heart text-5xl -mt-12 z-5 absolute text-gray-300 bg-opacity-80 bg-yellow-400 pr-1 pl-1"></i></a>
    </div>-->
    <div class="mt-2">
        <a href="{{ route('movies.show', $top['id'])}}" class="text-lg mt-2  hover:text-gray-500">{{$top['title']}} </a>
        <div class="flex items-center text-gray-400">
            <span><i class="fas fa-star"></i></span>
            <span class="ml-1">{{$top['vote_average'] * 10 .'%'}}</span>
            <span class="mx-2"></span>
            <span>{{\Carbon\Carbon::parse($top['release_date'])->format('M d, Y')}}</span>
        </div>
        <div class="text-gray-400">
            @foreach ($top['genre_ids'] as $genre)
                {{$genres -> get($genre)}} @if (!$loop->last), @endif
            @endforeach
        </div>

    </div>
</div>
            @endforeach
        </div>
<hr/>


            <h2 class="uppercase tracking-wider text-yellow-400 text-3xl font-semibold underline mt-10">Horror</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
            @foreach ($horrorMovies as $horror)
            <div class="mt-8">
                <a href="{{ route('movies.show', $horror['id'])}}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$horror['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
            <!--     <div id="heart">
                    <a href="#"><i class="heart fa fa-heart text-5xl -mt-12 z-5 absolute text-gray-300 bg-opacity-80 bg-yellow-400 pr-1 pl-1"></i></a>
                </div>-->
                <div class="mt-2">
                    <a href="{{ route('movies.show', $horror['id'])}}" class="text-lg mt-2  hover:text-gray-500">{{$horror['title']}} </a>
                    <div class="flex items-center text-gray-400">
                        <span><i class="fas fa-star"></i></span>
                        <span class="ml-1">{{$horror['vote_average'] * 10 .'%'}}</span>
                        <span class="mx-2"></span>
                        <span>{{\Carbon\Carbon::parse($horror['release_date'])->format('M d, Y')}}</span>
                    </div>
                    <div class="text-gray-400">
                        @foreach ($horror['genre_ids'] as $genre)
                            {{$genres -> get($genre)}} @if (!$loop->last), @endif
                        @endforeach
                    </div>
            
                </div>
            </div>
            @endforeach
</div>
<hr/>

<h2 class="uppercase tracking-wider text-yellow-400 text-3xl font-semibold underline mt-10">Mystery</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($romanceMovies as $rom)
            <div class="mt-8">
                <a href="{{ route('movies.show', $rom['id'])}}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$rom['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
            <!--     <div id="heart">
                    <a href="#"><i class="heart fa fa-heart text-5xl -mt-12 z-5 absolute text-gray-300 bg-opacity-80 bg-yellow-400 pr-1 pl-1"></i></a>
                </div>-->
                <div class="mt-2">
                    <a href="{{ route('movies.show', $rom['id'])}}" class="text-lg mt-2  hover:text-gray-500">{{$rom['title']}} </a>
                    <div class="flex items-center text-gray-400">
                        <span><i class="fas fa-star"></i></span>
                        <span class="ml-1">{{$rom['vote_average'] * 10 .'%'}}</span>
                        <span class="mx-2"></span>
                        <span>{{\Carbon\Carbon::parse($rom['release_date'])->format('M d, Y')}}</span>
                    </div>
                    <div class="text-gray-400">
                        @foreach ($rom['genre_ids'] as $genre)
                            {{$genres -> get($genre)}} @if (!$loop->last), @endif
                        @endforeach
                    </div>
            
                </div>
            </div>
            @endforeach
</div>


</div>
@endsection
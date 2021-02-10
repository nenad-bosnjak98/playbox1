@extends('layouts.main')

@section('content')
    <div class="container mx-auto  px-4  pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-400 text-3xl font-semibold underline">Popular Movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie='$movie' :genres='$genres'/>
                @endforeach
                
            </div>
<!--
            <h2 class="uppercase tracking-wider text-yellow-400 text-3xl font-semibold underline mt-10">Popular TV Series</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
                @foreach ($popularSeries as $pop)
                <div class="mt-8">
                <a href="{{ route('movies.show', $pop['id'])}}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$pop['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="{{ route('movies.show', $pop['id'])}}" class="text-lg mt-2  hover:text-gray-500">{{$pop['name']}} </a>
                    <div class="flex items-center text-gray-400">
                        <span><i class="fas fa-star"></i></span>
                        <span class="ml-1">{{$pop['vote_average'] * 10 .'%'}}</span>
                        <span class="mx-2"></span>
                        <span>{{\Carbon\Carbon::parse($pop['first_air_date'])->format('M d, Y')}}</span>
                    </div>
                    <div class="text-gray-400">
                        @foreach ($pop['genre_ids'] as $genre)
                            {{$genres -> get($genre)}} @if (!$loop->last), @endif
                        @endforeach
                    </div>
            
                </div>
            </div>
                @endforeach
                
            </div>
        -->

        </div>
    </div>
@endsection
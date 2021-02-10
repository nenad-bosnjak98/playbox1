@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $movie['title'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <span><i class="fas fa-star"></i></span>
                <span class="ml-1">{{ $movie['vote_average'] * 10 .'%' }}</span>
                <span class="mx-2">|</span>
                <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                <span class="mx-2">|</span>
                <span>
                    @foreach ($movie['genres'] as $genre)
                        {{$genre['name']}} @if (!$loop->last), @endif
                    @endforeach
            </span>
        </div>
            <p class="text-gray-300 mt-8">
                {{ $movie['overview'] }}
            </p>
            <div class="mt-12">
                <h4 class="text-white font-semibold underline">Featured Crew</h4>

                <div class="flex flex-wrap mt-4">
                    @foreach(array_slice($movie['credits']['crew'], 0, 6) as $crew)
                        @if ($loop->last < 2)
                        <div class="mr-9 mb-4">
                            <div>{{ $crew['name'] }}</div>
                            <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                        </div>
                        @endif

                    @endforeach
            </div>
            <div x-data="{ isOpen: false }">
                @if (count($movie['videos']['results']) > 0)
                <div class="mt-12">
                    <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                    <i class="far fa-play-circle"></i>
                    <span class="ml-2">Play Trailer</span>
                </button>
                </div>

                <template x-if="isOpen">
                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="text-3xl leading-none hover:text-gray-300">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                @endif

            </div>


        </div>

    </div>
</div>

<div class="movie-cast border-b border-gray-800 border-t border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach (array_slice($movie['credits']['cast'], 0, 10) as $cast)
                @if($cast['profile_path'])
                <div class="mt-8">
                    <a href="{{ route('actors.show', $cast['id']) }}">
                        <img src="{{ 'https://image.tmdb.org/t/p/original/'.$cast['profile_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                        <div class="text-sm text-gray-400">
                            {{ $cast['character'] }}
                        </div>
                    </div>
                </div>
                @else 
                <div class="mt-8">
                    <a href="#">
                        <img src="https://via.placeholder.com/300/000000/FFFFFF?text=No Image" alt="poster" class="w-72 h-full pb-14 -mb-14">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                        <div class="text-sm text-gray-400">
                            {{ $cast['character'] }}
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

 <div class="movie-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach (array_slice($movie['images']['backdrops'], 0, 9) as $image)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
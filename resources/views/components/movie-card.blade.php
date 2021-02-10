<div class="mt-8">
    <a href="{{ route('movies.show', $movie['id'])}}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
<!--     <div id="heart">
        <a href="#"><i class="heart fa fa-heart text-5xl -mt-12 z-5 absolute text-gray-300 bg-opacity-80 bg-yellow-400 pr-1 pl-1"></i></a>
    </div>-->
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id'])}}" class="text-lg mt-2  hover:text-gray-500">{{$movie['title']}} </a>
        <div class="flex items-center text-gray-400">
            <span><i class="fas fa-star"></i></span>
            <span class="ml-1">{{$movie['vote_average'] * 10 .'%'}}</span>
            <span class="mx-2"></span>
            <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
        </div>
        <div class="text-gray-400">
            @foreach ($movie['genre_ids'] as $genre)
                {{$genres -> get($genre)}} @if (!$loop->last), @endif
            @endforeach
        </div>

    </div>
</div>
<div class="relative" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input 
    wire:model.debounce.500ms="search" 
    type="text" 
    class="bg-gray-800 text-2xl rounded-full w-72 ml-12 pl-8 px-3 py-1 focus:outline-none focus:shadow-outline" 
    placeholder="Search"
    x-ref="search"
        @keydown.window="
            if (event.keyCode === 111) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >
    <div class="absolute top-0">
        <i class="fas fa-search mt-3 ml-14"></i>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-6 mt-5 text-2xl"></div>

    @if(strlen($search) >= 2)
    <div class="absolute bg-gray-500 text-xl  rounded w-80 mt-4" x-show.transition.opacity="isOpen" >
        @if($searchResults->count() > 0)
        <ul>
            @foreach ($searchResults as $result)
                <li class="border-b border-gray-700">
                    <a href="{{ route('movies.show', $result['id'])}}" class="block hover:bg-gray-700 px-3 py-3 flex items-center" @if ($loop->last) @keydown.tab="isOpen = false" @endif>
                        @if ($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                        @else
                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                        @endif
                        <span class="ml-4"> {{$result['title']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @else 
            <div class="px-3 py-3">No search results for '{{$search}}' </div>
        @endif
    </div>
    @endif
</div>
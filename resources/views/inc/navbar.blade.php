<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="border-b  border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center text-xl">
                <li>
                    <a href="{{ route('index') }}"><i class="far fa-play-circle text-5xl">  Playbox</i></a>
                </li>
                <li class="md:ml-16">
                    <a href="{{ route('movies') }}" class="hover:text-gray-500">Movies</a>
                </li>
                <li class="md:ml-10">
                    <a href="{{ route('series') }}" class="hover:text-gray-500">Series</a>
                </li>
                <li class="md:ml-10">
                    <a href="{{ route('actors') }}" class="hover:text-gray-500">Actors</a>
                </li>
                <li class="md:ml-10">
                    <a href="/posts" class="hover:text-gray-500">Discussion</a>
                </li>
            </ul>
            <div class="flex items-center">
                @livewire('search-dropdown')
            </div>
        </div>
    </nav>
</body>
</html>
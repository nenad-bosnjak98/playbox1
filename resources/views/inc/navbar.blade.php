<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="z-10 border-b border-gray-800 bg-gray-600" x-data="scrollToReveal()" 
    x-ref="navbar"
    x-on:scroll.window="scroll()"
    x-bind:class="{
                  'sticky top-0': sticky,
                  'relative': !sticky,
                  }">
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
            <ul class="flex flex-col md:flex-row items-center text-xl">
            @guest
                            @if (Route::has('login'))
                                <li class="-ml-48 -mr-14 hover:text-blue-500">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="ml-24 hover:text-red-500">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle bg-yellow-400 rounded px-2 py-1 -ml-10 text-black" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <div class="dropdown-menu dropdown-menu-right ml-3 bg-gray-900 rounded px-2 py-1 w-48" aria-labelledby="navbarDropdown">
                                <a  class="log" href='/posts/create'>Create Post</a><br><hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                        <ul>

        </div>
    </nav>
</body>

<script>
    function scrollToReveal() {
  return {
    sticky: false,
    lastPos: window.scrollY + 0,
    scroll() {
      this.sticky = window.scrollY > this.$refs.navbar.offsetHeight && this.lastPos > window.scrollY;
      this.lastPos = window.scrollY;
    }
  }
}
</script>
</html>
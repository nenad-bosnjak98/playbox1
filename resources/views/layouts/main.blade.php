<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  <link rel="stylesheet" href="{{asset('css/indexlogin.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Playbox</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-mono bg-gray-900 text-white mb-3">

    @include('inc.navbar')
    @include('inc.messages')
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>
</html>
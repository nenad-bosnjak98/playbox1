@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        {{$error}}
    </div>
    @endforeach
@endif

@if(session('success'))
    <div class="bg-green-300 text-blue-800 px-4 py-3 rounded relative text-center ml-60 mr-60 text-3xl" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        {{session('error')}}
    </div>
@endif
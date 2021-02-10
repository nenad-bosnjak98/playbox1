@extends('layouts.main')

@section('content')
    @if(count($posts) > 0)
        @foreach ($posts as $post)

            <div class="mt-10 bg-gray-900 flex items-center justify-center px-5 py-5">
                <div class="bg-indigo-600 text-white rounded shadow-xl py-5 px-5 w-full lg:w-10/12 xl:w-3/4" x-data="{welcomeMessageShow:true}" x-show="welcomeMessageShow" x-transition:enter="transition-all ease duration-500 transform" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease duration-500 transform" x-transition:leave-end="opacity-0 scale-90">
                    <div class="flex flex-wrap -mx-3 items-center">
                        <div class="w-1/4 px-3 text-center hidden md:block">
                            <div class="p-5 xl:px-8 md:py-5">
                                
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 md:w-2/4 px-3 text-left">
                            <div class="p-5 xl:px-8 md:py-5">
                                <h3 class="text-2xl"> {{$post->title}} </h3>
                                <h5 class="text-xl mb-3">Posted by ....... at {{$post->created_at}}</h5>
                                <p class="text-sm text-indigo-200">{{$post->body}}</p>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/2 md:w-1/4 px-3 text-center">
                            <div class="p-5 xl:px-8 md:py-5">
                                <a class="block w-full py-2 px-4 rounded text-indigo-600 bg-gray-200 hover:bg-white hover:text-gray-900 focus:outline-none transition duration-150 ease-in-out mb-3" href="https://codepen.io/ScottWindon" target="_blank">Find out more?</a>
                                <button class="w-full py-2 px-4 rounded text-white bg-indigo-900 hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out" @click.prevent="welcomeMessageShow=false;setTimeout(()=>{welcomeMessageShow=true},2000)">No thanks</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endforeach
        <div class="pr-80 pl-80">
            {{$posts->links()}}
        </div>
    @else 
        <p>No posts found!</p>
    @endif
@endsection
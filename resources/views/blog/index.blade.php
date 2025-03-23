@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-5xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300" style="margin-top: 1.5rem; margin-bottom: 1rem;">
            For the Lovers of All Things Pretty ✶
        </h1>
        <p style="margin-bottom: 1.5rem">A collection of musings, inspirations, and timeless style.</p>
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if ($posts->isEmpty())
    <!-- Display message when no posts exist -->
    <div class="w-full h-[50vh] flex items-center justify-center">
    <p class="text-2xl text-gray-500 italic">
        A Quiet Moment—The Story Hasn't Begun… Stay Tuned ✧
    </p>
</div>
@else
    <!-- Display posts -->
    <div class="w-4/5 m-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" style="margin-top: 1rem; margin-bottom: 2rem;">
        @foreach ($posts as $post)
            <div class="card blog-post">
                @if ($post->media->isNotEmpty())
                    <img 
                        src="{{ asset('storage/' . $post->media->first()->file_path) }}" 
                        alt="Post Image" 
                        class="w-full h-48 object-contain"
                    >
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <svg
                            class="w-12 h-12 text-gray-500"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                        </svg>
                    </div>
                @endif
                <div class="card__content">
                    <p class="card__title">{{ $post->title }}</p>
                    <p class="card__description">{{ $post->description }}</p>
                    <div class="text-sm text-gray-500 mt-2"> <!-- Added "Created On" -->
                        Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </div>
                    <a href="/blog/{{ $post->slug }}" class="mt-4 inline-block border 1px text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
                        Read On
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
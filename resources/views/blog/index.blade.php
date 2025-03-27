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
    <script>
        console.log("Session Message: {{ session()->get('message') }}");
    </script>
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
    <div class="w-4/5 m-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 py-8">
        @foreach ($posts as $post)
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md hover:shadow-lg transition-shadow duration-300 h-full">
                <!-- Media section -->
                <div class="relative mx-4 -mt-6 h-48 overflow-hidden rounded-xl shadow-lg">
                    @if ($post->media->isNotEmpty())
                        @if ($post->media->first()->file_type === 'video')
                            <video controls class="w-full h-full object-cover">
                                <source src="{{ asset('storage/' . $post->media->first()->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img 
                                src="{{ asset('storage/' . $post->media->first()->file_path) }}" 
                                alt="Post Image" 
                                class="w-full h-full object-cover"
                            >
                        @endif
                    @else
                        <!-- Fallback for no media -->
                        <div class="w-full h-full bg-gradient-to-r from-pink-100 to-purple-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 5H4V19L13.2923 9.70649C13.6828 9.31595 14.3159 9.31591 14.7065 9.70641L20 15.0104V5ZM2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Content section -->
                <div class="p-6 flex-grow">
                    <h5 class="mb-2 text-xl font-semibold leading-snug text-gray-800 line-clamp-2">
                        {{ $post->title }}
                    </h5>
                    <p class="text-base font-light leading-relaxed text-gray-600 line-clamp-3">
                        {{ $post->description }}
                    </p>
                    <div class="text-sm text-gray-500 mt-3">
                        Published on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </div>
                </div>
                
                <!-- Button section -->
                <div class="p-6 pt-0">
                    <a href="/blog/{{ $post->slug }}" class="button-wrap">
                        <div class="button-shadow"></div>
                        <button class="custom-submit-button">
                            <span>Unveil More</span>
                        </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
@if ($posts->hasPages())
    <div class="w-4/5 m-auto py-8">
        {{ $posts->links() }}
    </div>
@endif
@endsection
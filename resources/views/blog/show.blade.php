@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
            {{ $post->title }}
        </h1>
    </div>
</div>

<!-- Form Container -->
<div class="w-4/5 m-auto pt-10 relative z-10 flex flex-col lg:flex-row gap-8"
style="
    background-image: url('/images/deer-bg.jpg');
    background-attachment: fixed;
    background-repeat: repeat;
    background-size: 300px;
    padding: 3rem;
    margin-bottom: 2rem;
  ">
    <!-- Carousel for Images/Videos -->
    <div class="w-full lg:w-1/2 relative overflow-hidden bg-white rounded-lg shadow-sm group"> <!-- Added group class -->
        <!-- Carousel Content - Single item visible at a time -->
        <div id="carouselContent" class="flex transition-transform duration-300 ease-in-out">
            @foreach ($post->media as $media)
                <div class="w-full flex justify-center items-center bg-white rounded-lg overflow-hidden" style="min-height: 400px; max-height: 600px; padding-top: 1rem; padding-bottom: 1rem;">
                    @if ($media->file_type === 'image')
                        <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image"
                            class="max-w-full max-h-full object-scale-down">
                    @elseif ($media->file_type === 'video')
                        <video controls class="w-full h-auto max-h-[600px] object-contain rounded-lg">
                            <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons - Hidden by default, shown on hover -->
        @if ($post->media->count() > 1)
            <button id="prevButton" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm text-gray-800 hover:bg-white hover:text-gray-900 w-12 h-12 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 z-20 flex items-center justify-center border border-gray-200 opacity-0 group-hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextButton" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 backdrop-blur-sm text-gray-800 hover:bg-white hover:text-gray-900 w-12 h-12 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 z-20 flex items-center justify-center border border-gray-200 opacity-0 group-hover:opacity-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        @endif
    </div>

    <!-- Title and Description Section -->
    <div class="w-full lg:w-1/2 space-y-6 pl-12 bg-white p-6 rounded-lg shadow-sm">
        <span class="text-gray-500">
            A tale by <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Published on
            {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <div class="post-description whitespace-pre-wrap text-lg text-gray-700 leading-8 font-light">
            {{ $post->description }}
        </div>
    </div>
</div>

<!-- Edit and Delete Buttons (for Admins) -->
@if (Auth::check() && Auth::id() === 1)
    <div class="w-4/5 m-auto flex gap-4 py-4">
        <!-- Edit Button -->
        <a href="/blog/{{ $post->slug }}/edit"
            class="border border-gray-700 text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
            Edit Post
        </a>

        <!-- Delete Button -->
        <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block" id="deleteForm">
            @csrf
            @method('delete')

            <button
                type="button"
                onclick="confirmDelete()"
                class="border border-gray-700 text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
                Delete Post
            </button>
        </form>
    </div>
@endif

<!-- Add SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    }

    // Enhanced Carousel Functionality
    document.addEventListener('DOMContentLoaded', function () {
        const carouselContent = document.getElementById('carouselContent');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentIndex = 0;
        const totalItems = document.querySelectorAll('#carouselContent > div').length;

        // Set initial position and hide other slides
        function initializeCarousel() {
            document.querySelectorAll('#carouselContent > div').forEach((slide, index) => {
                slide.style.display = index === 0 ? 'flex' : 'none';
            });
        }

        function updateCarousel() {
            // Hide all slides
            document.querySelectorAll('#carouselContent > div').forEach(slide => {
                slide.style.display = 'none';
            });
            
            // Show current slide
            const currentSlide = document.querySelector(`#carouselContent > div:nth-child(${currentIndex + 1})`);
            if (currentSlide) {
                currentSlide.style.display = 'flex';
            }
        }

        if (prevButton && nextButton) {
            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalItems - 1;
                updateCarousel();
            });

            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                updateCarousel();
            });
        }

        // Initialize on load
        initializeCarousel();

        // Handle keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalItems - 1;
                updateCarousel();
            } else if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                updateCarousel();
            }
        });
    });
</script>

@endsection
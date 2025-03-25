@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
            {{ $post->title }}
        </h1>
    </div>
</div>

<!-- Form Container -->
<div class="w-4/5 m-auto pt-10 relative z-10 flex flex-col lg:flex-row gap-8">
    <!-- Carousel for Images/Videos -->
    <div class="w-full lg:w-1/2 relative overflow-hidden">
        <!-- Carousel Content -->
        <div id="carouselContent" class="flex transition-transform duration-300 ease-in-out">
            @foreach ($post->media as $media)
                <div class="min-w-full">
                    @if ($media->file_type === 'image')
                        <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image"
                            class="w-full h-auto max-h-[600px] object-cover rounded-lg shadow-lg">
                    @elseif ($media->file_type === 'video')
                        <video controls class="w-full h-auto max-h-[600px] object-cover rounded-lg shadow-lg">
                            <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        @if ($post->media->count() > 1)
            <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full z-10 opacity-75 hover:opacity-100 ml-4">
                &larr;
            </button>
            <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full z-10 opacity-75 hover:opacity-100 mr-4">
                &rarr;
            </button>
        @endif
    </div>

    <!-- Title and Description Section -->
    <div class="w-full lg:w-1/2 space-y-6" style="padding-left: 12rem;"> <!-- Added pl-8 to push content to the right -->
        <span class="text-gray-500">
            A tale by <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Published on
            {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>
</div>

<!-- Edit and Delete Buttons (for Admins) -->
@if (Auth::check() && Auth::id() === 1)
    <div class="w-4/5 m-auto flex gap-4" style="padding-bottom: 1rem; padding-top: 1rem;">
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
                document.getElementById('deleteForm').submit(); // Submit the form
                Swal.fire({
                    title: "Deleted!",
                    text: "Your post has been deleted.",
                    icon: "success"
                });
            }
        });
    }

    // Carousel Functionality
    document.addEventListener('DOMContentLoaded', function () {
        const carouselContent = document.getElementById('carouselContent');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
        let currentIndex = 0;

        const totalItems = document.querySelectorAll('#carouselContent > div').length;

        function updateCarousel() {
            const offset = -currentIndex * 100;
            carouselContent.style.transform = `translateX(${offset}%)`;
        }

        if (prevButton && nextButton) {
            prevButton.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalItems - 1;
                }
                updateCarousel();
            });

            nextButton.addEventListener('click', () => {
                if (currentIndex < totalItems - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateCarousel();
            });
        }
    });
</script>

@endsection
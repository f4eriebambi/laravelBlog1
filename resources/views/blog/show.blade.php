@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto pt-20">
        <!-- Display all images/videos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach ($post->media as $media)
                @if ($media->file_type === 'image')
                    <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image"
                        class="w-full h-64 object-cover rounded-lg shadow-lg">
                @elseif ($media->file_type === 'video')
                    <video controls class="w-full h-64 object-cover rounded-lg shadow-lg">
                        <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            @endforeach
        </div>

        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on
            {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>
    </div>

    @if (Auth::check() && Auth::id() === 1)
        <div class="w-4/5 m-auto pt-20">
            <!-- Edit Button -->
            <a href="/blog/{{ $post->slug }}/edit"
                class="bg-blue-500 uppercase text-white text-xs font-extrabold py-3 px-5 rounded-3xl hover:bg-blue-600">
                Edit Post
            </a>

            <!-- Delete Button -->
            <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block">
                @csrf
                @method('delete')

                <button
                    class="delete-button bg-red-500 uppercase text-white text-xs font-extrabold py-3 px-5 rounded-3xl ml-4 hover:bg-red-600"
                    type="button">
                    Delete
                </button>
            </form>
        </div>
    @endif
@endsection

<!-- Add this modal structure at the bottom of your file, before the closing </body> tag -->
<div id="deleteModal" class="fixed z-50 inset-0 hidden bg-black bg-opacity-50 justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-lg font-semibold mb-4">Are you sure you want to delete this post?</p>
        <div class="flex justify-end space-x-4">
            <button id="cancelDelete" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded">Yes, Delete</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        let deleteForm = null;

        // Open modal when delete button is clicked
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                deleteForm = this.closest('form');
                deleteModal.classList.remove('hidden');
            });
        });

        // Close modal and do nothing if cancel is clicked
        cancelDelete.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });

        // Submit the delete form if confirm is clicked
        confirmDelete.addEventListener('click', function() {
            deleteForm.submit();
            deleteModal.classList.add('hidden');
        });
    });
</script>
@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif

@if (Auth::check() && Auth::id() === 1)
    <div class="pt-15 w-4/5 m-auto">
        <a 
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>
    </div>
@endif

@foreach ($posts as $post)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <!-- Display the first image (if available) -->
        @if ($post->media->isNotEmpty())
            <img src="{{ asset('storage/' . $post->media->first()->file_path) }}" alt="Post Image"
                class="w-full h-64 object-cover rounded-lg shadow-lg">
        @else
            <!-- Placeholder if no images exist -->
            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-lg">
                <span class="text-gray-500">No Image</span>
            </div>
        @endif
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{ $post->title }}
        </h2>

        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>

        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>

        <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Keep Reading
        </a>

        @if (Auth::check() && Auth::id() === 1)
            <span class="float-right">
                <a 
                    href="/blog/{{ $post->slug }}/edit"
                    class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                    Edit
                </a>
            </span>

            <span class="float-right">
                <form 
                    action="/blog/{{ $post->slug }}"
                    method="POST">
                    @csrf
                    @method('delete')

                    <button
                        class="delete-button text-red-500 pr-3"
                        type="button"> <!-- Change type to "button" to prevent form submission -->
                        Delete
                    </button>
                </form>
            </span>
        @endif
    </div>
</div>
@endforeach

@endsection

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
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        let deleteForm = null;

        // Open modal when delete button is clicked
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                deleteForm = this.closest('form');
                deleteModal.classList.remove('hidden');
            });
        });

        // Close modal and do nothing if cancel is clicked
        cancelDelete.addEventListener('click', function () {
            deleteModal.classList.add('hidden');
        });

        // Submit the delete form if confirm is clicked
        confirmDelete.addEventListener('click', function () {
            deleteForm.submit();
            deleteModal.classList.add('hidden');
        });
    });
</script>
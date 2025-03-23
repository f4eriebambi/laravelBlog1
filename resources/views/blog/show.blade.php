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
            <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block" id="deleteForm">
                @csrf
                @method('delete')

                <button
                    class="delete-button bg-red-500 uppercase text-white text-xs font-extrabold py-3 px-5 rounded-3xl ml-4 hover:bg-red-600"
                    type="button"
                    onclick="confirmDelete()">
                    Delete
                </button>
            </form>
        </div>
    @endif
@endsection

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
</script>
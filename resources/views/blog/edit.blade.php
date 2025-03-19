@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Post
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data"
        id="edit-post-form">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea>

        <!-- Existing Media with Remove Buttons -->
        <div class="grid grid-cols-3 gap-4 mt-10" id="existing-media">
            @foreach ($post->media as $media)
                <div class="relative group" data-media-id="{{ $media->id }}">
                    @if ($media->file_type === 'image')
                        <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image" 
                            class="w-full h-48 object-cover rounded-lg shadow-lg">
                    @elseif ($media->file_type === 'video')
                        <video controls class="w-full h-48 object-cover rounded-lg shadow-lg">
                            <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                    <button 
                        type="button" 
                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity delete-existing-media"
                    >
                        ✕
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Hidden input to track deleted media IDs -->
        <input type="hidden" name="deleted_media" id="deleted-media-ids" value="">

        <!-- Allow adding new media -->
        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Add more files (images/videos)
                </span>
                <input 
                    type="file"
                    name="media[]"
                    id="media-input"
                    class="hidden"
                    multiple
                    accept="image/*, video/*">
            </label>
        </div>

        <!-- Preview new media -->
        <div id="media-preview" class="grid grid-cols-3 gap-4 mt-10"></div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Update Post
        </button>
    </form>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed z-50 inset-0 hidden bg-black bg-opacity-50 justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <p class="text-lg font-semibold mb-4">Are you sure you want to delete this media?</p>
        <div class="flex justify-end space-x-4">
            <button id="cancelDelete" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            <button id="confirmDelete" class="bg-red-500 text-white px-4 py-2 rounded">Yes, Delete</button>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Image Preview Handling
    document.getElementById('media-input').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = '';

        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const mediaElement = file.type.startsWith('image') 
                    ? `<img src="${e.target.result}" alt="Preview" class="w-full h-48 object-cover rounded-lg">`
                    : `<video controls class="w-full h-48 object-cover rounded-lg">
                          <source src="${e.target.result}" type="${file.type}">
                          Your browser does not support the video tag.
                       </video>`;

                const mediaContainer = document.createElement('div');
                mediaContainer.className = 'relative';
                mediaContainer.innerHTML = mediaElement;
                previewContainer.appendChild(mediaContainer);
            };
            reader.readAsDataURL(file);
        }
    });

    // Delete Media Handling
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        let currentMedia = null;
        let deletedMediaIds = [];

        document.querySelectorAll('.delete-existing-media').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                currentMedia = {
                    element: this.closest('.relative'),
                    id: this.closest('.relative').dataset.mediaId
                };
                deleteModal.classList.remove('hidden');
            });
        });

        cancelDelete.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
            currentMedia = null;
        });

        confirmDelete.addEventListener('click', function() {
            if (currentMedia) {
                // Add to deletion list
                deletedMediaIds.push(currentMedia.id);
                document.getElementById('deleted-media-ids').value = deletedMediaIds.join(',');
                
                // Visual feedback
                currentMedia.element.style.opacity = '0.3';
                currentMedia.element.querySelector('button').disabled = true;
                
                deleteModal.classList.add('hidden');
                currentMedia = null;
            }
        });
    });
</script>

@endsection
@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
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

<!-- Background Image Pseudo-Element -->
<div class="form-background"></div>

<!-- Form Container -->
<div class="w-4/5 m-auto pt-10 relative z-10">
    <form 
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data"
        id="edit-post-form"
        class="flex flex-col lg:flex-row gap-8">
        @csrf
        @method('PUT')

        <!-- Hidden input to track deleted media IDs -->
        <input type="hidden" name="deleted_media" id="deleted-media-ids" value="">

        <!-- Left Column: Title and Description -->
        <div class="w-full lg:w-1/2 space-y-8">
            <!-- Title Input -->
            <input 
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none focus:border-blue-500 transition-colors duration-300">

            <!-- Description Input -->
            <textarea 
                name="description"
                placeholder="Description..."
                class="py-10 bg-transparent block border-b-2 w-full h-60 text-xl outline-none focus:border-blue-500 transition-colors duration-300">{{ $post->description }}</textarea>
        </div>

        <!-- Right Column: Media Uploader -->
        <div class="w-full lg:w-1/2">
            <div class="media-upload-container">
                <div class="media-upload-header">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Browse files to upload!</p>
                </div>
                <label for="media-input" class="media-upload-footer">
                    <svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                        <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                    </svg>
                    <p>No files selected</p>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="currentColor" stroke-width="2"></path>
                        <path d="M19.5 5H4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="currentColor" stroke-width="2"></path>
                    </svg>
                </label>
                <input 
                    type="file"
                    name="media[]"
                    id="media-input"
                    class="hidden"
                    multiple
                    accept="image/*, video/*">
            </div>
        </div>
    </form>

    <!-- Existing Media with Remove Buttons -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-10" id="existing-media">
        @foreach ($post->media as $media)
            <div class="relative group" data-media-id="{{ $media->id }}">
                @if ($media->file_type === 'image')
                    <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image" 
                        class="w-full h-72 object-cover rounded-lg shadow-lg">
                @elseif ($media->file_type === 'video')
                    <video controls class="w-full h-72 object-cover rounded-lg shadow-lg">
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

    <!-- Preview new media -->
    <div id="media-preview" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-10" style="margin-bottom: 1rem;"></div>

    <!-- Submit Button -->
    <div class="button-wrap" style="margin-bottom: 1.5rem;">
        <button type="submit" form="edit-post-form" class="custom-submit-button">
            <span>Update Post</span>
        </button>
        <div class="button-shadow"></div>
    </div>
</div>

<!-- Add SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Track deleted media IDs
    let deletedMediaIds = [];

    // Delete Media Handling
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-existing-media').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const mediaElement = this.closest('.relative');
                const mediaId = mediaElement.dataset.mediaId;

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
                        // Add to deletion list
                        deletedMediaIds.push(mediaId);
                        document.getElementById('deleted-media-ids').value = deletedMediaIds.join(',');

                        // Visual feedback: Grey out the media element
                        mediaElement.style.opacity = '0.3';
                        mediaElement.querySelector('button').disabled = true;

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your media has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    });

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
                    ? `<img src="${e.target.result}" alt="Preview" class="w-full h-72 object-cover rounded-lg">`
                    : `<video controls class="w-full h-72 object-cover rounded-lg">
                          <source src="${e.target.result}" type="${file.type}">
                          Your browser does not support the video tag.
                       </video>`;

                const mediaContainer = document.createElement('div');
                mediaContainer.className = 'relative group';
                mediaContainer.innerHTML = `
                    ${mediaElement}
                    <button 
                        type="button" 
                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity"
                        onclick="removeFile(${i})"
                    >
                        ✕
                    </button>
                `;

                previewContainer.appendChild(mediaContainer);
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove new media file from preview
    function removeFile(index) {
        const previewContainer = document.getElementById('media-preview');
        const fileInput = document.getElementById('media-input');
        const files = Array.from(fileInput.files);
        files.splice(index, 1);

        // Update the file input
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;

        // Update the preview
        updatePreview();
    }

    // Update media preview
    function updatePreview() {
        const previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = '';

        const files = document.getElementById('media-input').files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const mediaElement = file.type.startsWith('image') 
                    ? `<img src="${e.target.result}" alt="Preview" class="w-full h-72 object-cover rounded-lg">`
                    : `<video controls class="w-full h-72 object-cover rounded-lg">
                          <source src="${e.target.result}" type="${file.type}">
                          Your browser does not support the video tag.
                       </video>`;

                const mediaContainer = document.createElement('div');
                mediaContainer.className = 'relative group';
                mediaContainer.innerHTML = `
                    ${mediaElement}
                    <button 
                        type="button" 
                        class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity"
                        onclick="removeFile(${i})"
                    >
                        ✕
                    </button>
                `;

                previewContainer.appendChild(mediaContainer);
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
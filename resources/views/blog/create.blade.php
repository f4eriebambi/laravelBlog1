@extends('layouts.app')

@section('content')
<div class="min-h-screen relative">
    <!-- Background Image Pseudo-Element -->
    <div class="form-background"></div>
    
    <!-- Header Section -->
    <div class="w-full max-w-6xl mx-auto px-6 pt-8 pb-6 text-center relative z-10">
        <div class="border-b border-gray-200 pb-6">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300">
                Create Your Story
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">Share your story with the world</p>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="w-full max-w-6xl mx-auto px-6 mb-6 relative z-10">
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <ul class="space-y-2">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

            <!-- Form Container -->
        <div class="w-full max-w-6xl mx-auto px-6 pb-12 relative z-10">
            <form 
                action="/blog"
                method="POST"
                enctype="multipart/form-data"
                id="create-post-form"
                class="flex flex-col lg:flex-row gap-8 lg:gap-16"> <!-- Increased gap -->
                @csrf

                <!-- Left Column: Title and Description -->
                <div class="w-full lg:w-1/2 space-y-6 lg:pr-8"> <!-- Added right padding -->
                    <!-- Title Input -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Post Title
                        </label>
                        <input 
                            type="text"
                            name="title"
                            placeholder="Name Your Narrative..."
                            class="w-full px-4 py-3 text-lg bg-white/90 backdrop-blur-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 outline-none">
                    </div>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea 
                            name="description"
                            placeholder="Set the Scene..."
                            rows="8"
                            class="w-full px-4 py-3 text-base bg-white/90 backdrop-blur-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 outline-none resize-vertical whitespace-pre-wrap"
                        ></textarea>
                    </div>
                </div>

                <!-- Right Column: Media Uploader -->
                <div class="w-full lg:w-1/2 space-y-6 lg:pl-8"> <!-- Added left padding -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Media Files
                        </label>
                        <div class="media-upload-container">
                            <div class="media-upload-header">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-sm">Drag & drop files here or click to browse</p>
                                <p class="text-xs text-gray-500">Support for images and videos (Max 10 files)</p>
                            </div>
                            <label for="media-input" class="media-upload-footer">
                                <svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                    <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                                </svg>
                                <p class="text-sm">No files selected</p>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="currentColor" stroke-width="2"></path>
                                    <path d="M19.5 5H4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 极2.44772 14 3V5H10V3Z" stroke="currentColor" stroke-width="2"></path>
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
                </div>
            </form>

        <!-- Media Previews -->
        <div id="media-preview" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-8"></div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-8">
            <div class="button-wrap">
                <button type="submit" form="create-post-form" class="custom-submit-button">
                    <span>Publish Post</span>
                </button>
                <div class="button-shadow"></div>
            </div>
        </div>
    </div>
</div>

<script>
    let uploadedFiles = []; // Array to track selected files
    const MAX_FILES = 10; // Define the maximum number of files

    document.getElementById('media-input').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('media-preview');
        
        // Check if adding these files would exceed the limit
        if (uploadedFiles.length + event.target.files.length > MAX_FILES) {
             Swal.fire({
                title: 'Too Many Files',
                text: `Keep it curated—only ${MAX_FILES} files can be uploaded. You already have ${uploadedFiles.length} files selected.`,
                icon: 'warning',
                confirmButtonText: 'Understood!',
                confirmButtonColor: '#3085d6',
            });
            this.value = ''; // Clear the input
            return;
        }

        // Add new files to the array
        uploadedFiles = [...uploadedFiles, ...Array.from(event.target.files)];

        updatePreview();
        updateFileInput();
        updateFileLabel();
    });

    function updatePreview() {
        const previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = '';

        if (uploadedFiles.length === 0) return;

        // Show file count
        const countElement = document.createElement('div');
        countElement.className = 'col-span-full text-center mb-4 text-sm text-gray-600 bg-white/80 backdrop-blur-sm rounded-lg p-2';
        countElement.textContent = `Files selected: ${uploadedFiles.length}/${MAX_FILES}`;
        previewContainer.appendChild(countElement);

        uploadedFiles.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const mediaElement = file.type.startsWith('image') 
                    ? `<img src="${e.target.result}" alt="Preview" class="w-full h-48 object-cover rounded-lg">`
                    : `<video controls class="w-full h-48 object-cover rounded-lg">
                          <source src="${e.target.result}" type="${file.type}">
                          Your browser does not support the video tag.
                       </video>`;

                const mediaContainer = document.createElement('div');
                mediaContainer.className = 'relative group bg-white/90 backdrop-blur-sm rounded-lg p-2 shadow-md hover:shadow-lg transition-all duration-300';
                mediaContainer.setAttribute('data-file-index', index);
                mediaContainer.innerHTML = `
                    ${mediaElement}
                    <button 
                        type="button" 
                        class="absolute top-3 right-3 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 text-sm"
                        onclick="removeFile(${index})"
                        title="Remove file"
                    >
                        ✕
                    </button>
                `;

                previewContainer.appendChild(mediaContainer);
            };

            reader.readAsDataURL(file);
        });

        // Initialize sortable after preview is updated
        initializeSortable();
    }

    function updateFileLabel() {
        const label = document.querySelector('.media-upload-footer p');
        if (uploadedFiles.length === 0) {
            label.textContent = 'No files selected';
        } else if (uploadedFiles.length === 1) {
            label.textContent = '1 file selected';
        } else {
            label.textContent = `${uploadedFiles.length} files selected`;
        }
    }

    function removeFile(index) {
        uploadedFiles.splice(index, 1); // Remove the file from the array
        updatePreview();
        updateFileInput();
        updateFileLabel();
    }

    function updateFileInput() {
        // Convert array back to FileList
        const dataTransfer = new DataTransfer();
        uploadedFiles.forEach(file => dataTransfer.items.add(file));
        
        // Update the file input
        document.getElementById('media-input').files = dataTransfer.files;
    }

    // Add drag and drop functionality
    function initializeSortable() {
        new Sortable(document.getElementById('media-preview'), {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function() {
                // Get the new order of media items
                const order = Array.from(document.querySelectorAll('#media-preview .relative'))
                    .map(el => el.dataset.fileIndex || el.dataset.mediaId);
                
                // For new uploads (create)
                if (document.getElementById('create-post-form')) {
                    uploadedFiles = order.map(index => uploadedFiles[index]);
                    updateFileInput();
                }
                // For existing media (edit)
                else if (document.getElementById('edit-post-form')) {
                    const postId = {{ $post->id ?? 'null' }};
                    if (postId) {
                        fetch(`/blog/${postId}/reorder-media`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                order: order
                            })
                        });
                    }
                }
            }
        });
    }

    // Drag and drop functionality for the upload area
    const uploadArea = document.querySelector('.media-upload-container');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        uploadArea.classList.add('drag-over');
    }

    function unhighlight() {
        uploadArea.classList.remove('drag-over');
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (uploadedFiles.length + files.length > MAX_FILES) {
            Swal.fire({
                title: 'Too Many Files',
                text: `Keep it curated—only ${MAX_FILES} files can be uploaded.`,
                icon: 'warning',
                confirmButtonText: 'Understood!',
            });
            return;
        }

        uploadedFiles = [...uploadedFiles, ...Array.from(files)];
        updatePreview();
        updateFileInput();
        updateFileLabel();
    }
</script>

@endsection
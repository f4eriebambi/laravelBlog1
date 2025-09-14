@extends('layouts.app')

@section('content')
<div class="min-h-screen relative bg-white">
    <!-- Background Image Pseudo-Element -->
    <div class="form-background"></div>
    
    <!-- Header Section -->
    <div class="w-full max-w-6xl mx-auto px-6 pt-8 pb-6 text-center relative z-10">
        <div class="border-b border-gray-200 pb-6">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 dark:text-white hover:text-gray-600 transition-colors duration-300">
                Update Post
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">Refine your story</p>
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
                action="/blog/{{ $post->slug }}"
                method="POST"
                enctype="multipart/form-data"
                id="edit-post-form"
                class="flex flex-col lg:flex-row gap-8 lg:gap-16"> <!-- Increased gap -->
                @csrf
                @method('PUT')

                <!-- Hidden input to track deleted media IDs -->
                <input type="hidden" name="deleted_media" id="deleted-media-ids" value="">

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
                            value="{{ $post->title }}"
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
                        >{{ $post->description }}</textarea>
                    </div>
                </div>

                <!-- Right Column: Media Uploader -->
                <div class="w-full lg:w-1/2 space-y-6 lg:pl-8"> <!-- Added left padding -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Add New Media Files
                        </label>
                        <div class="media-upload-container">
                            <div class="media-upload-header">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 极17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14极C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-sm">Drag & drop files here or click to browse</p>
                                <p class="text-xs text-gray-500">Support for images and videos (Max 10 files total)</p>
                            </div>
                            <label for="media-input" class="media-upload-footer">
                                <svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                    <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                                </svg>
                                <p class="text-sm">No files selected</p>
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534极C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="currentColor" stroke-width="2"></path>
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
                </div>
            </form>

        <!-- Existing Media Section -->
        @if($post->media && $post->media->count() > 0)
        <div class="mt-12 relative z-10">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Current Media Files</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="existing-media">
                @foreach ($post->media as $media)
                    <div class="relative group bg-white/90 backdrop-blur-sm rounded-lg p-2 shadow-md hover:shadow-lg transition-all duration-300" data-media-id="{{ $media->id }}">
                        @if ($media->file_type === 'image')
                            <img src="{{ asset('storage/' . $media->file_path) }}" alt="Post Image" 
                                class="w-full h-48 object-cover rounded-lg">
                        @elseif ($media->file_type === 'video')
                            <video controls class="w-full h-48 object-cover rounded-lg">
                                <source src="{{ asset('storage/' . $media->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <button 
                            type="button" 
                            class="absolute top-3 right-3 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 text-sm delete-existing-media"
                            title="Delete media"
                        >
                            ✕
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- New Media Preview Section -->
        <div id="media-preview" class="mt-8 relative z-10"></div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-8 relative z-10">
            <div class="button-wrap">
                <button type="submit" form="edit-post-form" class="custom-submit-button">
                    <span>Update Post</span>
                </button>
                <div class="button-shadow"></div>
            </div>
        </div>
    </div>
</div>

<!-- Add SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Track deleted media IDs
    let deletedMediaIds = [];
    const MAX_FILES = 10;
    let newFiles = [];

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Delete Media Handling
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
                        deletedMediaIds.push(mediaId);
                        document.getElementById('deleted-media-ids').value = deletedMediaIds.join(',');
                        mediaElement.style.opacity = '0.3';
                        mediaElement.querySelector('button').disabled = true;
                        Swal.fire("Deleted!", "Your media has been deleted—time to make space for new treasures", "success");
                    }
                });
            });
        });

        // Initialize Sortable for EXISTING media
        if (document.getElementById('existing-media')) {
            new Sortable(document.getElementById('existing-media'), {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function() {
                    const order = Array.from(document.querySelectorAll('#existing-media .relative'))
                        .map(el => el.dataset.mediaId);

                    console.log('Sending order:', order);
                    
                    fetch(`/blog/{{ $post->id }}/reorder-media`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        credentials: 'include',
                        body: JSON.stringify({ order: order })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Reorder success:', data);
                    })
                    .catch(error => {
                        console.error('Reorder error:', error);
                        Swal.fire('Error', 'Failed to save new order', 'error');
                    });
                }
            });
        }

        // Image Preview Handling
        document.getElementById('media-input').addEventListener('change', function(event) {
            const existingMediaCount = document.querySelectorAll('#existing-media > div:not([style*="opacity: 0.3"])').length;
            
            if (existingMediaCount - deletedMediaIds.length + newFiles.length + event.target.files.length > MAX_FILES) {
                Swal.fire({
                    title: 'Too Many Files',
                    text: `Maximum ${MAX_FILES} files allowed. You have ${existingMediaCount - deletedMediaIds.length + newFiles.length} files.`,
                    icon: 'warning'
                });
                this.value = '';
                return;
            }

            newFiles = [...newFiles, ...Array.from(event.target.files)];
            updatePreview();
            updateFileLabel();
        });

        // Drag and drop functionality
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
            
            const existingMediaCount = document.querySelectorAll('#existing-media > div:not([style*="opacity: 0.3"])').length;
            
            if (existingMediaCount - deletedMediaIds.length + newFiles.length + files.length > MAX_FILES) {
                Swal.fire({
                    title: 'Too Many Files',
                    text: `Keep it curated—only ${MAX_FILES} files can be uploaded.`,
                    icon: 'warning',
                    confirmButtonText: 'Understood!',
                });
                return;
            }

            newFiles = [...newFiles, ...Array.from(files)];
            updatePreview();
            updateFileInput();
            updateFileLabel();
        }
    });

    // Update media preview
    function updatePreview() {
        const previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = '';

        if (newFiles.length === 0) return;

        // Add section header
        const header = document.createElement('h3');
        header.className = 'text-lg font-semibold text-gray-800 dark:text-white mb-4';
        header.textContent = 'New Media Files';
        previewContainer.appendChild(header);

        // Create grid container for new media
        const gridContainer = document.createElement('div');
        gridContainer.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4';
        gridContainer.id = 'new-media-grid';

        const existingMediaCount = document.querySelectorAll('#existing-media > div:not([style*="opacity: 0.3"])').length;
        const totalFiles = existingMediaCount - deletedMediaIds.length + newFiles.length;

        // Show file count
        const countElement = document.createElement('div');
        countElement.className = 'col-span-full text-center mb-4 text-sm text-gray-600 bg-white/80 backdrop-blur-sm rounded-lg p-2';
        countElement.textContent = `Total files: ${totalFiles}/${MAX_FILES} (${newFiles.length} new)`;
        gridContainer.appendChild(countElement);

        newFiles.forEach((file, index) => {
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
                    <button type="button" class="absolute top-3 right-3 bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-200 text-sm" onclick="removeFile(${index})" title="Remove file">
                        ✕
                    </button>
                `;
                gridContainer.appendChild(mediaContainer);
            };
            reader.readAsDataURL(file);
        });

        previewContainer.appendChild(gridContainer);

        // Initialize Sortable for NEW media preview
        new Sortable(gridContainer, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function() {
                const newOrder = Array.from(document.querySelectorAll('#new-media-grid .relative'))
                    .map(el => parseInt(el.dataset.fileIndex));
                
                newFiles = newOrder.map(index => newFiles[index]);
                
                const dataTransfer = new DataTransfer();
                newFiles.forEach(file => dataTransfer.items.add(file));
                document.getElementById('media-input').files = dataTransfer.files;
            }
        });
    }

    function updateFileLabel() {
        const label = document.querySelector('.media-upload-footer p');
        if (newFiles.length === 0) {
            label.textContent = 'No files selected';
        } else if (newFiles.length === 1) {
            label.textContent = '1 file selected';
        } else {
            label.textContent = `${newFiles.length} files selected`;
        }
    }

    function removeFile(index) {
        newFiles.splice(index, 1);
        const dataTransfer = new DataTransfer();
        newFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById('media-input').files = dataTransfer.files;
        updatePreview();
        updateFileLabel();
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        newFiles.forEach(file => dataTransfer.items.add(file));
        document.getElementById('media-input').files = dataTransfer.files;
    }
</script>

@endsection
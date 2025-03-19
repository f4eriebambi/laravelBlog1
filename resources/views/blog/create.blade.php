@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
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
        action="/blog"
        method="POST"
        enctype="multipart/form-data"
        id="create-post-form">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select files (images/videos)
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

        <!-- Image Previews -->
        <div id="media-preview" class="grid grid-cols-3 gap-4 mt-10"></div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Submit Post
        </button>
    </form>
</div>

<!-- Add JavaScript for Image Previews -->
<script>
    document.getElementById('media-input').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('media-preview');
        previewContainer.innerHTML = ''; // Clear previous previews

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
                mediaContainer.innerHTML = `
                    ${mediaElement}
                `;

                previewContainer.appendChild(mediaContainer);
            };

            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
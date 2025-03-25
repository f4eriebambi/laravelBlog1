@extends('layouts.app')

@section('title', 'My Fragrance Wardrobe | offduty ⋆｡☆ faerie')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add DM Serif Font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Fragrance Wardrobe Section with Background -->
    <div class="perfume-mixer-background min-h-screen p-6">
        <div class="container mx-auto bg-white bg-opacity-70 rounded-lg shadow-lg p-8" style="max-width: 1200px;">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-800">My Fragrance Wardrobe</h1>
                <p class="mt-4 text-gray-600">Your collection of signature scents, carefully preserved—each bottle holds memories of your creative essence.</p>

                <div class="flex justify-center space-x-4 mt-6">
        <a href="/perfume-mixer" 
           class="border border-gray-700 text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
            Back to the Lab
        </a>
    </div>
            </div>

            <!-- Blends Grid -->
            @if($blends->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-600 text-lg">An empty canvas for your perfect fragrance *:･༄.° Craft your signature scent in the <a href="/perfume-mixer" class="text-blue-600 hover:underline">Virtual Perfume Mixer</a>, let your essence unfold!</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blends as $blend)
                        @php
                            $notes = explode(', ', $blend->notes);
                            $colors = ['#FF9AA2', '#FFB7B2', '#FFDAC1', '#E2F0CB', '#B5EAD7', '#C7CEEA'];
                        @endphp
                        
                        <div class="blend-card relative group bg-white bg-opacity-80 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                            <!-- Action Buttons (shown on hover) -->
                            <div class="absolute top-4 left-0 right-0 py-2 flex justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
    @if($blend->recommended_perfume_id)
        <a href="{{ $blend->recommendedPerfume->buy_link ?? '#' }}" 
           target="_blank"
           class="perfumeRec-modal-button"
           style="padding: 0.4rem 1.2rem; font-size: 0.95rem;">
            Buy
        </a>
    @endif
    <button class="delete-blend perfumeRec-modal-button" 
            data-blend-id="{{ $blend->id }}"
            style="padding: 0.4rem 1.2rem; font-size: 0.95rem; margin-left: 12px;">
        Remove
    </button>
</div>
                            <!-- Perfume Bottle -->
                            <div class="flex flex-col items-center mb-4">
                                <div class="perfume-bottle w-24 relative" style="height: 200px">
    <!-- Fill Layer -->
    <div class="fill absolute bottom-0 left-0 right-0 transition-all duration-500" 
         style="height: 100%; clip-path: polygon(9% 42%, 90% 42%, 90% 100%, 9% 100%);
                background: linear-gradient(to top, {{ $blend->colors ?? '#B5EAD7,#C7CEEA' }});">
    </div>
    <!-- Bottle Image -->
    <img src="/images/perfume-bottle.png" alt="Perfume Bottle" 
         class="bottle-image w-full object-cover absolute top-0 left-0 z-10" 
         style="height: 250px">
</div>
                            </div>

                            <!-- Blend Details -->
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $blend->perfume_name }}</h3>
                                <p class="text-sm text-gray-600 mb-3">
                                    <span class="font-medium">Notes:</span> {{ $blend->notes }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    Created {{ $blend->created_at->diffForHumans() }}
                                </p>
                            </div>

                            
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        // Handle delete blend actions
        document.querySelectorAll('.delete-blend').forEach(button => {
            button.addEventListener('click', function() {
                const blendId = this.getAttribute('data-blend-id');
                
                Swal.fire({
                    title: 'Erase This Scent?',
                    text: "A single breath, a final farewell—this fragrance will be no more.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Erase it',
                    cancelButtonText: 'Not yet',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/special-feature/fragrance-wardrobe/${blendId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'A Chapter Closes.',
                                    'This scent has been removed, making way for a new creation.',
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error',
                                'Something went wrong...',
                                'error'
                            );
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection
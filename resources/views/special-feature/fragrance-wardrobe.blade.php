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
    <!-- Add Playfair Display Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Fragrance Wardrobe Section with Background -->
    <div class="perfume-mixer-background min-h-screen p-6 py-12">
        <div class="container mx-auto bg-white bg-opacity-90 rounded-2xl shadow-xl p-8 backdrop-blur-sm" style="max-width: 1300px;">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 font-playfair" style="font-family: 'Playfair Display', serif;">My Fragrance Wardrobe</h1>
                <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                    Your collection of signature scents, carefully preserved—each bottle holds memories of your creative essence.
                </p>

                <div class="flex justify-center space-x-6 mt-8">
                    <a href="/perfume-mixer" 
                       class="border-2 border-gray-300 text-center bg-white text-gray-700 py-3 px-6 font-semibold text-lg uppercase hover:bg-gray-800 hover:text-white hover:border-gray-800 transition-all duration-300 rounded-full">
                        Back to the Lab
                    </a>
                </div>
            </div>

            <!-- Blends Grid -->
            @if($blends->isEmpty())
                <div class="text-center py-16 bg-white bg-opacity-70 rounded-xl shadow-inner">
                    <div class="max-w-md mx-auto">
                        <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        <p class="text-gray-600 text-lg italic">
                            An empty canvas for your perfect fragrance *:･༄.° Craft your signature scent in the 
                            <a href="/perfume-mixer" class="text-blue-600 hover:underline font-medium">Virtual Perfume Mixer</a>, 
                            let your essence unfold!
                        </p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($blends as $blend)
                        @php
                            $notes = explode(', ', $blend->notes);
                            $colors = ['#FF9AA2', '#FFB7B2', '#FFDAC1', '#E2F0CB', '#B5EAD7', '#C7CEEA'];
                        @endphp
                        
                        <div class="blend-card relative group bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-gray-200 transform hover:-translate-y-1">
                            <!-- Action Buttons -->
                            <div class="absolute top-4 right-4 flex space-x-2 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                @if($blend->recommended_perfume_id)
                                    <a href="{{ $blend->recommendedPerfume->buy_link ?? '#' }}" 
   target="_blank"
   class="perfumeRec-modal-button text-xs">
    Buy
</a>
                                @endif
                                <button class="delete-blend perfumeRec-modal-button text-xs" 
        data-blend-id="{{ $blend->id }}">
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
                                    <!-- Bottle Image - Reverted to original -->
                                    <img src="/images/perfume-bottle.png" alt="Perfume Bottle" 
                                         class="bottle-image w-full object-cover absolute top-0 left-0 z-10" 
                                         style="height: 250px">
                                </div>
                            </div>

                            <!-- Blend Details -->
                            <div class="text-center">
                                <h3 class="text-xl font-semibold text-gray-800 mb-3 font-playfair" style="font-family: 'Playfair Display', serif;">
                                    {{ $blend->perfume_name }}
                                </h3>
                                <div class="mb-4">
                                    <span class="text-sm font-medium text-gray-600 block mb-2">Notes:</span>
                                    <div class="flex flex-wrap justify-center gap-2">
                                        @foreach($notes as $note)
                                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">
                                                {{ trim($note) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 italic">
                                    Created {{ $blend->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <style>
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .blend-card {
            background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .blend-card:hover {
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        /* Original button styles from _virtual-perfume-mix.css */
        .perfumeRec-modal-button {
            --border-width: clamp(1px, 0.0625em, 4px);
            all: unset;
            cursor: pointer;
            position: relative;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            pointer-events: auto;
            z-index: 3;
            background: linear-gradient(
                -75deg,
                rgba(255, 255, 255, 0.05),
                rgba(255, 255, 255, 0.2),
                rgba(255, 255, 255, 0.05)
            );
            border-radius: 999vw;
            box-shadow: inset 0 0.125em 0.125em rgba(0, 0, 0, 0.05),
                inset 0 -0.125em 0.125em rgba(255, 255, 255, 0.5),
                0 0.25em 0.125em -0.125em rgba(0, 0, 0, 0.2),
                0 0 0.1em 0.25em inset rgba(255, 255, 255, 0.2),
                0 0 0 0 rgba(255, 255, 255, 1);
            backdrop-filter: blur(clamp(1px, 0.125em, 4px));
            transition: all 400ms cubic-bezier(0.25, 1, 0.5, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            padding: 12px 24px;
        }

        .perfumeRec-modal-button:hover {
            transform: scale(0.975);
            backdrop-filter: blur(0.01em);
            box-shadow: inset 0 0.125em 0.125em rgba(0, 0, 0, 0.05),
                inset 0 -0.125em 0.125em rgba(255, 255, 255, 0.5),
                0 0.15em 0.05em -0.1em rgba(0, 0, 0, 0.25),
                0 0 0.05em 0.1em inset rgba(255, 255, 255, 0.5),
                0 0 0 0 rgba(255, 255, 255, 1);
        }

        .perfumeRec-modal-button span {
            position: relative;
            display: block;
            user-select: none;
            font-family: "Inter", sans-serif;
            letter-spacing: -0.05em;
            font-weight: 500;
            font-size: 1em;
            color: rgba(50, 50, 50, 1);
            text-shadow: 0em 0.25em 0.05em rgba(0, 0, 0, 0.1);
            transition: all 400ms cubic-bezier(0.25, 1, 0.5, 1);
            padding-inline: 1.5em;
            padding-block: 0.875em;
        }
    </style>

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
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'bg-red-600 hover:bg-red-700 px-6 py-2 rounded-full',
                        cancelButton: 'bg-gray-300 hover:bg-gray-400 px-6 py-2 rounded-full'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/fragrance-wardrobe/${blendId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'A Chapter Closes.',
                                text: 'This scent has been removed, making way for a new creation.',
                                icon: 'success',
                                customClass: {
                                    popup: 'rounded-2xl'
                                }
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            throw new Error(data.message || 'Deletion failed');
                        }
                    })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error',
                                text: 'Something went wrong...',
                                icon: 'error',
                                customClass: {
                                    popup: 'rounded-2xl'
                                }
                            });
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection
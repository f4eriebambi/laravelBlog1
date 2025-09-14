@extends('layouts.app')

@section('title', 'Virtual Perfume Mixer | offduty ⋆｡☆ faerie')

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
    <!-- Virtual Perfume Mixer Section with Background -->
    <div class="perfume-mixer-background min-h-screen flex items-center justify-center p-6" style="zoom: 88%;">
        <div class="container mx-auto bg-white bg-opacity-90 rounded-2xl shadow-xl p-8 backdrop-blur-sm" style="max-width: 1300px;">
            <!-- Welcome Screen -->
            <div class="text-center" style="margin-bottom: 1.5rem;">
    <h1 class="text-5xl font-bold text-gray-800 font-playfair" style="font-family: 'Playfair Display', serif;">Virtual Perfume Mixer</h1>
    <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
        Step into your personal scent atelier. Choose up to three notes, blend them together, and let your signature fragrance take shape. What story will your scent tell?
    </p>
</div>

            <!-- Mix and Restart Buttons -->
            <div class="text-center" style="margin-bottom: 2rem;">
    <button id="mix-button" class="border-2 border-gray-300 text-center bg-white text-gray-700 py-3 px-6 font-semibold text-lg uppercase hover:bg-gray-800 hover:text-white hover:border-gray-800 transition-all duration-300 rounded-full">
        Mix
    </button>
    <button id="restart-button" class="border-2 border-gray-300 text-center bg-white text-gray-700 py-3 px-6 font-semibold text-lg uppercase hover:bg-gray-800 hover:text-white hover:border-gray-800 transition-all duration-300 rounded-full">
        Restart
    </button>
</div>

            <!-- Fragrance Notes and Perfume Bottle -->
            <div class="notes-container" style="display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; margin-left: 80px;">
                <!-- Left Notes -->
                <div class="notes-column" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-right: 60px;">
                    @foreach($notes as $index => $note)
                        @if($index < count($notes) / 2)
                            <div class="note p-5 bg-white rounded-xl shadow-md text-center cursor-pointer hover:bg-gray-50 transition-all duration-300 hover:shadow-lg border border-gray-100"
                                data-note-id="{{ $note->id }}"
                                data-color="{{ $note->category->color_code }}" 
                                data-description="{{ $note->category->description }}">
                                <p class="text-lg font-semibold text-gray-800">{{ $note->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Center Section (Scent Description and Perfume Bottle) -->
                <div class="center-section" style="display: flex; flex-direction: column; align-items: center; margin: 0 2rem;">
                    <!-- Scent Description -->
                    <div id="scent-description" class="text-gray-700 text-center mb-4" style="max-width: 200px; font-family: 'DM Serif Display', serif;"></div>

                    <!-- Perfume Bottle and Description -->
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div class="perfume-bottle w-32 relative" style="height: 260px">
                            <!-- Fill Layer -->
                            <div class="fill absolute bottom-0 left-0 right-0 transition-all duration-500" style="height: 0%; clip-path: polygon(9% 42%, 90% 42%, 90% 100%, 9% 100%);"></div>
                            <!-- Bottle Image (Transparent PNG) -->
                            <img src="/images/perfume-bottle.png" alt="Perfume Bottle" class="bottle-image w-full object-cover absolute top-0 left-0 z-10" style="height: 319px">
                        </div>
                        <!-- Add a new section for category descriptions -->
                        <div id="category-description" class="mt-4 text-gray-700 italic text-center" style="max-width: 200px;"></div>
                    </div>
                </div>

                <!-- Right Notes -->
                <div class="notes-column" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin-left: 60px;">
                    @foreach($notes as $index => $note)
                        @if($index >= count($notes) / 2)
                            <div class="note p-5 bg-white rounded-xl shadow-md text-center cursor-pointer hover:bg-gray-50 transition-all duration-300 hover:shadow-lg border border-gray-100"
                                data-note-id="{{ $note->id }}"
                                data-color="{{ $note->category->color_code }}" 
                                data-description="{{ $note->category->description }}">
                                <p class="text-lg font-semibold text-gray-800">{{ $note->name }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        const notes = [];
        const maxNotes = 3;

document.querySelectorAll('.note').forEach(note => {
    note.addEventListener('click', () => {
        if (notes.length < maxNotes) {
            const noteId = note.dataset.noteId;
            const noteName = note.querySelector('p').textContent;
            const noteColor = note.dataset.color;
            const noteDescription = note.dataset.description;

            notes.push({ id: noteId, name: noteName, color: noteColor, description: noteDescription });

            // Update bottle fill
            updateBottleFill(notes);

            // Update category description
            const categoryDescription = document.getElementById('category-description');
            categoryDescription.textContent = noteDescription;
            categoryDescription.classList.add('show');

            // Update scent description
            const scentDescription = document.getElementById('scent-description');
            scentDescription.textContent = `Your fragrance unfolds with whispers of ${notes.map(n => n.name).join(', ')}—a symphony of scent crafted just for you.`;
        } else {
            // Show SweetAlert when trying to add more than 3 notes
            Swal.fire({
                icon: 'info',
                title: 'Elegance in Simplicity',
                text: 'Your blend is limited to three notes—choose wisely.',
                confirmButtonText: 'Got it!'
            });
        }
    });
});

        function updateBottleFill(selectedNotes) {
            const bottleFill = document.querySelector('.perfume-bottle .fill');
            const colors = selectedNotes.map(note => note.color);
            const fillHeight = (selectedNotes.length / maxNotes) * 100;

            let background = colors.length === 1 ? colors[0] : `linear-gradient(to top, ${colors.join(', ')})`;
            bottleFill.style.background = background;
            bottleFill.style.height = `${fillHeight}%`;
        }

        document.getElementById('mix-button').addEventListener('click', () => {
            if (notes.length === maxNotes) {
                fetch('/perfume-mixer/mix', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' },
                    body: JSON.stringify({ notes: notes.map(n => n.name) }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        // Use SweetAlert2 for error messages
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong in the lab… Let\'s try that again!',
                        });
                    } else if (data.custom) {
                        // Use SweetAlert2 for custom blends
                        Swal.fire({
                            title: 'A Fragrance Born from You',
                            text: 'Your essence, bottled in perfection.',
                            html: `
                                <p>⠀⠀⠀⢸⣦⡀⠀⠀⠀⠀⢀⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⢸⣏⠻⣶⣤⡶⢾⡿⠁⠀⢠⣄⡀⢀⣴⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⣀⣼⠷⠀⠀⠁⢀⣿⠃⠀⠀⢀⣿⣿⣿⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠴⣾⣯⣅⣀⠀⠀⠀⠈⢻⣦⡀⠒⠻⠿⣿⡿⠿⠓⠂⠀⠀⢀⡇⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠉⢻⡇⣤⣾⣿⣷⣿⣿⣤⠀⠀⣿⠁⠀⠀⠀⢀⣴⣿⣿⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠸⣿⡿⠏⠀⢀⠀⠀⠿⣶⣤⣤⣤⣄⣀⣴⣿⡿⢻⣿⡆⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠟⠁⠀⢀⣼⠀⠀⠀⠹⣿⣟⠿⠿⠿⡿⠋⠀⠘⣿⣇⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⢳⣶⣶⣿⣿⣇⣀⠀⠀⠙⣿⣆⠀⠀⠀⠀⠀⠀⠛⠿⣿⣦⣤⣀⠀⠀
⠀⠀⠀⠀⠀⠀⣹⣿⣿⣿⣿⠿⠋⠁⠀⣹⣿⠳⠀⠀⠀⠀⠀⠀⢀⣠⣽⣿⡿⠟⠃
⠀⠀⠀⠀⠀⢰⠿⠛⠻⢿⡇⠀⠀⠀⣰⣿⠏⠀⠀⢀⠀⠀⠀⣾⣿⠟⠋⠁⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠋⠀⠀⣰⣿⣿⣾⣿⠿⢿⣷⣀⢀⣿⡇⠁⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠋⠉⠁⠀⠀⠀⠀⠙⢿⣿⣿⠇⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⢿⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠀⠀⠀⠀⠀⠀⠀</p>
                                <p class="text-sm text-gray-500">Notes: <span class="font-semibold">${data.notes}</span></p>
                                <input type="hidden" id="blend-name" value="${data.name}">
        <input type="hidden" id="blend-notes" value="${data.notes}">
        <button id="tuck-away" class="perfumeRec-modal-button">
            Tuck this treasure away in your Fragrance Wardrobe
        </button>
                            `,
                            confirmButtonText: 'Try Again !',
                            didClose: () => {
                                resetPerfume(); // Reset perfume when modal is closed
                            }
                        });
                    } else if (data.partial_match) {
                        // Use SweetAlert2 for partial matches
                        Swal.fire({
    title: 'A Whisper Away from Perfection ✦!',
    imageUrl: data.image, // Use the image URL from the response
    imageAlt: 'Recommended Perfume',
                                imageHeight: '350px',
    html: `
        <p class="text-sm text-gray-500" style="margin-bottom: 1rem; font-size: 20px;">While this isn't an exact match, we think you'll adore this fragrance—it carries the essence of your creation.</p>
        <p class="text-lg font-semibold mt-4" style="margin-bottom: 1rem; font-size: 25px;">${data.name}</p>
        <p class="text-sm text-gray-500 mt-2" style="margin-bottom: 1.5rem; font-size: 20px;">${data.description}</p>
        <input type="hidden" id="blend-name" value="${data.name}">
        <input type="hidden" id="blend-notes" value="${data.notes}">
        <input type="hidden" id="perfume-id" value="${data.perfume_id}">
        <a href="${data.buy_link}" target="_blank" class="perfumeRec-modal-button" style="margin-bottom: 1rem;">
            Bring this scent to life—shop now
        </a>
        <button id="tuck-away" class="perfumeRec-modal-button" style="margin-bottom: 1rem;">
            Tuck this treasure away in your Fragrance Wardrobe
        </button>
    `,
    confirmButtonText: 'Try Again !',
    didClose: () => {
        resetPerfume(); // Reset perfume when modal is closed
    }
});
                    } else {
                        // Use SweetAlert2 for recommended perfumes
                        Swal.fire({
                            title: 'Perfection Captured in a Bottle', 
                            text: data.description, // Perfume description 
                            imageUrl: data.image, // Use the image URL from the response
                            imageAlt: 'Recommended Perfume',
                            imageHeight: '350px',
                            html: `
                                <p class="text-lg font-semibold mt-4" style="margin-bottom: 1rem; font-size: 25px;">${data.name}</p>
        <p class="text-sm text-gray-500 mt-2" style="margin-bottom: 1rem; font-size: 20px;">${data.description}</p>
        <input type="hidden" id="blend-name" value="${data.name}">
        <input type="hidden" id="blend-notes" value="${data.notes}">
        <input type="hidden" id="perfume-id" value="${data.perfume_id}">
        <a href="${data.buy_link}" target="_blank" class="perfumeRec-modal-button">
            Bring this scent to life—shop now
        </a>
        <button id="tuck-away" class="perfumeRec-modal-button mt-4">
            Tuck this treasure away in your Fragrance Wardrobe
        </button>
                            `,
                            confirmButtonText: 'Try Again !',
                            didClose: () => {
                                resetPerfume(); // Reset perfume when modal is closed
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Use SweetAlert2 for fetch errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request. Please try again.',
                    });
                });
            } else {
                // Use SweetAlert2 for not enough notes
                Swal.fire({
                    icon: 'warning',
                    title: 'Not Enough Notes',
                    text: 'Your fragrance story needs more depth! Pick exactly three notes to craft your perfect blend.',
                });
            }
        });

        document.getElementById('restart-button').addEventListener('click', () => {
            resetPerfume();
        });

        function resetPerfume() {
            notes.length = 0;
            const bottleFill = document.querySelector('.perfume-bottle .fill');
            bottleFill.style.height = '0%';
            bottleFill.style.background = 'transparent';
            document.getElementById('scent-description').textContent = '';
            document.getElementById('category-description').textContent = '';
        }

        // Handle click events on the "Tuck away" button in SweetAlert modals
document.addEventListener('click', function(e) {
    if (e.target && e.target.id === 'tuck-away') {
        @auth
            // Get values from hidden inputs
            const blendName = document.getElementById('blend-name')?.value;
            const blendNotes = document.getElementById('blend-notes')?.value;
            const perfumeId = document.getElementById('perfume-id')?.value;

            // Prepare blend data
            const blendData = {
                blend_name: blendName,
                blend_notes: blendNotes || notes.map(n => n.name).join(', '),
                perfume_id: perfumeId || null,
                colors: notes.map(note => note.color).join(',') // Store colors as "color1,color2,color3"
            };

            console.log('Saving blend with colors:', blendData); // Debugging

            // Save the blend
            fetch('/save-blend', {
                method: 'POST',
                headers: { 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(blendData)
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
            icon: 'success',
            title: 'Cherished & Collected!',
            html: `
                <p>Your custom fragrance now lives in your Fragrance Wardrobe.</p>
                <div class="mt-4 flex justify-center space-x-4">
                    <button onclick="window.location.href='/fragrance-wardrobe'" 
                            class="perfumeRec-modal-button">
                        Go to Wardrobe
                    </button>
                    <button onclick="resetPerfume(); Swal.close();" 
                            class="perfumeRec-modal-button">
                        Perfect!
                    </button>
                </div>
            `,
            showConfirmButton: false
        });
    } else if (data.message === 'limit_reached') {
        Swal.fire({
            title: 'Wardrobe Overflow!',
            text: 'Your fragrance wardrobe is brimming with beauty! You can only keep up to 6 scents at a time. To add a new one, you\'ll need to part with one (or more) first.',
            icon: 'info',
            confirmButtonText: 'Manage Wardrobe',
            cancelButtonText: 'Keep Everything',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/fragrance-wardrobe';
            }
        });
    } else {
        throw new Error('Save failed');
    }
})
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to save your blend. Please try again.'
                });
            });
        @else
            // Unauthenticated user logic
            Swal.fire({
                icon: 'info',
                title: 'Secure Your Signature Scents.',
                html: 'Don\'t lose your masterpiece—Secure it now or choose later.',
                showDenyButton: true,
                confirmButtonText: 'Register',
                denyButtonText: 'Perhaps Later',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/register';
                } else if (result.isDenied) {
                    // Do nothing, just close the alert
                }
            });
        @endauth
    }
});
    </script>
</body>
</html>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Perfume Mixer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <!-- Welcome Screen -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Virtual Perfume Mixer</h1>
            <p class="mt-4 text-gray-600">Step into your personal scent atelier. Choose up to three notes, blend them together, and let your signature fragrance take shape. What story will your scent tell?</p>
        </div>

        <!-- Fragrance Notes -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    @foreach($notes as $note)
        <div class="note p-4 bg-white rounded-lg shadow-md text-center cursor-pointer hover:bg-gray-50 transition-colors" data-note-id="{{ $note->id }}" data-color="{{ $note->category->color }}" data-description="{{ $note->category->description }}">
            <p class="text-lg font-semibold text-gray-800">{{ $note->name }}</p>
            <!-- Remove the description here -->
        </div>
    @endforeach
</div>

<!-- Perfume Bottle and Description -->
<div class="flex justify-center mb-8">
    <div class="perfume-bottle w-32 h-64 bg-gray-200 rounded-lg relative overflow-hidden">
        <div class="fill absolute bottom-0 left-0 right-0 transition-all duration-500" style="height: 0%; background: linear-gradient(to bottom, transparent);"></div>
    </div>
    <!-- Add a new section for category descriptions -->
    <div id="category-description" class="ml-4 text-gray-700 italic"></div>
</div>

        <!-- Scent Description -->
        <div class="text-center mb-8">
            <p id="scent-description" class="text-gray-700"></p>
        </div>

        <!-- Mix Button -->
        <div class="text-center mb-8">
            <button id="mix-button" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">Mix</button>
            <button id="restart-button" class="ml-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Restart</button>
        </div>

        <!-- Result Section -->
        <div class="text-center mb-8">
            <!-- Recommended Perfume (Hidden by Default) -->
            <div id="recommended-perfume" class="mt-4 hidden">
                <!-- Perfume Image (Placeholder: /images/NINGNING.jpg) -->
                <img id="perfume-image" src="/images/NINGNING.jpg" alt="Recommended Perfume" class="mx-auto w-32 h-32 object-cover rounded-lg">
                <!-- Buy Now Link -->
                <a id="buy-link" href="#" target="_blank" class="mt-2 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Bring this scent to life—shop now</a>
                <!-- Perfume Name -->
                <p id="perfume-name" class="mt-2 text-lg font-semibold text-gray-800">We've bottled up your perfect match! Meet <span id="perfume-name-text"></span>—a scent that mirrors your unique creation.</p>
            </div>

            <!-- Custom Blend (Hidden by Default) -->
            <div id="custom-blend" class="mt-4 hidden">
                <!-- Custom Blend Name -->
                <p class="text-gray-700">Your creation is pure magic! Introducing: <strong id="custom-name" class="text-gray-800"></strong>. A scent as unforgettable as you.</p>
                <!-- Custom Blend Notes -->
                <p class="text-sm text-gray-500">Notes: <span id="custom-notes" class="font-semibold"></span></p>
            </div>
        </div>

        <!-- Save Blend Form (Optional) -->
        <form id="save-blend" action="/perfume-mixer/save" method="POST" class="text-center">
            @csrf
            <input type="hidden" name="notes" id="saved-notes">
            <input type="hidden" name="perfume_name" id="saved-perfume-name">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">Tuck this treasure away in your Fragrance Wardrobe</button>
        </form>
    </div>

    <script>
        // JavaScript for interactivity
        const notes = [];
        const maxNotes = 3;

        // Add Note
document.querySelectorAll('.note').forEach(note => {
    note.addEventListener('click', () => {
        if (notes.length < maxNotes) {
            const noteId = note.dataset.noteId;
            const noteName = note.querySelector('p').textContent;
            const noteColor = note.dataset.color;
            const noteDescription = note.dataset.description;

            notes.push({ id: noteId, name: noteName, color: noteColor, description: noteDescription });

            // Update bottle fill
            const bottleFill = document.querySelector('.perfume-bottle .fill');
            const currentColors = bottleFill.style.background.match(/rgba?\([^)]+\)/g) || [];
            currentColors.push(noteColor);
            bottleFill.style.background = `linear-gradient(to bottom, ${currentColors.join(', ')})`;
            bottleFill.style.height = `${(notes.length / maxNotes) * 100}%`;

            // Update category description
            const categoryDescription = document.getElementById('category-description');
            categoryDescription.textContent = noteDescription;

            // Hide the category description after 5 seconds
            setTimeout(() => {
                categoryDescription.textContent = '';
            }, 2000);

            // Update scent description
            const scentDescription = document.getElementById('scent-description');
            scentDescription.textContent = `Your fragrance unfolds with whispers of ${notes.map(n => n.name).join(', ')}—a symphony of scent crafted just for you.`;
        }
    });
});

       // Mix Button
document.getElementById('mix-button').addEventListener('click', () => {
    if (notes.length === maxNotes) {
        fetch('/perfume-mixer/mix', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' },
            body: JSON.stringify({ notes: notes.map(n => n.name) }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong in the lab… Let\'s try that again!',
                });
            } else if (data.custom) {
                // Display custom blend
                document.getElementById('custom-blend').classList.remove('hidden');
                document.getElementById('custom-name').textContent = data.name;
                document.getElementById('custom-notes').textContent = data.notes;
                document.getElementById('recommended-perfume').classList.add('hidden');
            } else {
                // Display recommended perfume
                document.getElementById('recommended-perfume').classList.remove('hidden');
                document.getElementById('perfume-image').src = data.image;
                document.getElementById('buy-link').href = data.buy_link;
                document.getElementById('perfume-name-text').textContent = data.name;
                document.getElementById('scent-description').textContent = data.description;
                document.getElementById('custom-blend').classList.add('hidden');

                // Show partial match modal if applicable
                if (data.partial_match) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Close Enough!',
                        text: "A near-perfect potion! While this isn't an exact match, we think you'll adore this fragrance—it carries the essence of your creation.",
                        confirmButtonText: 'Got it!',
                    });
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Uh-oh! It looks like the magic fizzled out. Try again, and let\'s mix up something beautiful.',
            });
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Not Enough Notes',
            text: 'Your fragrance story needs more depth! Pick exactly three notes to craft your perfect blend.',
        });
    }
});

        // Restart Button
        document.getElementById('restart-button').addEventListener('click', () => {
            notes.length = 0; // Clear selected notes
            document.querySelector('.perfume-bottle .fill').style.height = '0%'; // Reset bottle fill
            document.getElementById('scent-description').textContent = ''; // Clear scent description
            document.getElementById('recommended-perfume').classList.add('hidden'); // Hide recommended perfume
            document.getElementById('custom-blend').classList.add('hidden'); // Hide custom blend
        });
    </script>
</body>
</html>
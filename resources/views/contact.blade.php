@extends('layouts.app')

@section('title', 'A Message for Me? | offduty ⋆｡☆ faerie')

@section('content')
    <div class="contact-container">
        <div class="contact-card">
            <div class="contact-header">
                Send a Love Note ᝰ.ᐟ
            </div>

            <!-- Image -->
            <div class="contact-image">
                <img src="https://i.pinimg.com/originals/4e/93/f2/4e93f2dde00dfc96b97c99141f3f9a01.gif" alt="Image"
                    class="contact-image__img">
            </div>

            <div class="contact-intro">
                Have a question, a thought, or simply something lovely to say? Leave me a note—I'd love to hear from you.
                What would you say if the stars were listening?
            </div>

            <form action="https://formspree.io/f/xvgkrqnn" method="POST" id="contact-form" class="contact-body">
                <!-- Optional: Auto-reply -->
                {{-- <input type="hidden" name="_replyto" value="DYNAMIC_EMAIL_FROM_FORM"> --}}

                <!-- Optional: Email subject -->
                <input type="hidden" name="_subject" value="New Love Note from Your Blog">

                <div class="contact-body__field">
                    <label for="name">Your Name (or a lovely alias)</label>
                    <input type="text" name="name" id="name" placeholder="A name written in the stars…" required />
                </div>

                <div class="contact-body__field">
                    <label for="email">A Way to Reach You</label>
                    <input type="email" name="email" id="email" placeholder="Where secret letters await…" required />
                </div>

                <div class="contact-body__field">
                    <label for="message">Your Message (A Whisper, a Thought, a Note)</label>
                    <textarea rows="5" name="message" id="message" placeholder="Perfumed letters and velvet whispers—I await your reply in candlelight…" required></textarea>
                </div>

                <button type="submit" class="contact-body__submit">Tie It With a Ribbon</button>
            </form>
        </div>
    </div>

    <!-- Add SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Submit the form via fetch
            fetch(this.action, {
                    method: this.method,
                    body: new FormData(this),
                    headers: {
                        'Accept': 'application/json' // required for Formspree
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // success : Show SweetAlert confirmation
                        Swal.fire({
                            title: "Like a delicate perfume...",
                            html: `
                    Your message lingers beautifully. I’ll reply as soon as I can. </br>
                    ────୨ৎ──── </br>
⬜⬜⬛⬛⬜⬜⬜⬛⬛⬜⬜
⬜⬛⬜⬜⬛⬜⬛⬜⬜⬛⬜
⬛⬜⬜⬜⬜⬛⬜⬜⬜⬜⬛
⬛⬜⬜⬜⬜⬜⬜⬜⬜⬜⬛
⬛⬜⬜⬜⬜⬜⬜⬜⬜⬜⬛
⬜⬛⬜⬜⬜⬜⬜⬜⬜⬛⬜
⬜⬜⬛⬜⬜⬜⬜⬜⬛⬜⬜
⬜⬜⬜⬛⬜⬜⬜⬛⬜⬜⬜
⬜⬜⬜⬜⬛⬜⬛⬜⬜⬜⬜
⬜⬜⬜⬜⬜⬛⬜⬜⬜⬜⬜
                `,
                            icon: "success",
                            confirmButtonText: "Close"
                        });
                        this.reset();
                    } else {
                        throw new Error('Form submission failed');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: "Oops!",
                        text: "Something went wrong. Please try again.",
                        icon: "error",
                        confirmButtonText: "Close"
                    });
                });
        });
    </script>
@endsection

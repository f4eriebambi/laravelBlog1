@extends('layouts.app')

@section('content')
    <!-- Hero Section with Background Image -->
    <div class="about-hero">
        <div class="about-hero-overlay"></div>
        <div class="about-hero-content">
            <h1 class="about-hero-title noto-serif-light">About Me</h1>
            <p class="about-hero-text noto-serif-regular">
                Welcome to my world of fashion, fragrance, and all things beautiful.
            </p>
            <p class="about-hero-text noto-serif-light">
                This blog is a curated space where elegance meets enchantment, a place where style tells a story, and scent
                lingers like the whispers of a forgotten fairytale. Here, I share my love for timeless beauty, guiding you
                through the art of dressing, the magic of perfume, and the inspiration behind the trends that captivate our
                imagination. Step into a realm where fashion is more than fabric and fragrance more than a bottle—it’s an
                experience, a mood, a dream.
            </p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="about-content">
        <div class="about-text">
            <h2 class="about-text-title">Faerie's Story</h2>
            <p class="about-text-paragraph">
                Once upon a time, in a world just beyond the veil of the ordinary, lived a faerie with a heart woven from
                silk and stardust. She wasn’t like the others—her wings shimmered with hues of vintage lace and golden
                light, and wherever she went, she left a trail of perfume that lingered like a love letter on the wind.
            </p>
            <p class="about-text-paragraph">
                She spent her days collecting whispers of elegance—stories sewn into corsets of the past, secrets hidden in
                the folds of couture gowns, and the delicate poetry of fragrances bottled like stolen moments. Her nights
                were filled with dreams spun from moonlight and roses, where she danced through meadows of lavender and wove
                silver threads into the fabric of the world.
            </p>
            <p class="about-text-paragraph">
                But the faerie knew that beauty was meant to be shared. So, she gathered her treasures—wisps of chiffon,
                pearls of wisdom, the artistry of scent—and created a place where dreamers like you could step into her
                enchanted world. A place where perfume speaks, fashion tells tales, and every detail is a spell waiting to
                be cast.
            </p>
            <p class="about-text-paragraph">
                This is more than a blog; it’s an invitation to indulge in the extraordinary. Welcome to a story that never
                truly ends.
            </p>
        </div>
    </div>

    <!-- Call to Action Section -->
    {{-- <div class="about-cta">
        <div class="about-cta-content">
            <!-- Community Images -->
            <div class="about-cta-image-container">
                <div class="about-cta-image"></div>
            </div> --}}
<div class="about-cta">
    <!-- Full-width image container -->
    <div class="about-cta-image-container">
        <div class="about-cta-image"></div>
    </div>
    <div class="about-cta-content">
            <h2 class="about-cta-title">Join My World ── </h2>
            <p class="about-cta-text">
                Be part of a place where beauty is an art form, and every detail is an invitation to dream. Stay inspired,
                discover new favorites, and immerse yourself in a space where fashion and fragrance become poetry.
            </p>
            <div class="button-container">
            <div class="button-wrap">
                <a href="/register" class="custom-signup-button">
                    <span>Sign Up</span>
                </a>
                <div class="button-shadow"></div>
            </div>
        </div>
            <!-- Image and ASCII Art Container -->
            <div class="ascii-art-container">
                <img src="/images/asciiArtImage.jpg" alt="Background Image" hvjv
                    class="ascii-art-image">
                <pre class="ascii-art">
            ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠆⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣀⠀⠠⠷⠀⠀⢀⣠⠴⢦
⢠⣶⡢⢤⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠛⠋⠀⠀⠀⣠⡶⠋⡴⢃⡟
⠈⢷⣉⠢⣘⣟⠲⢄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⡄⠀⠀⡤⠃⢀⡴⠋⣱⡷⣫⣶⠏⠀
⠀⠀⢻⡉⠙⠛⢦⠈⠙⠦⣄⠀⠀⠀⡖⠶⢤⣤⡄⢀⣀⣀⣀⡀⠀⢀⣀⣤⡀⢀⡴⡿⠁⣰⠟⠋⡀⠃⠀⠀
⠀⠀⠀⠙⢶⡦⠤⣝⣦⣄⠘⡷⣄⡀⠃⣼⣿⣿⣷⣿⠏⠉⠉⠁⠀⠙⠉⢀⡷⠋⢸⢃⠜⢁⣠⡾⠁⠀⠀⠀
⠀⠀⠀⠀⠀⠙⠷⣄⡀⠈⠑⢷⡄⢹⠇⠀⠿⢿⣿⠋⠀⠀⠀⠀⠀⠀⠀⢸⠀⢠⡿⠛⠉⣴⠏⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠈⠻⣝⠒⠦⣝⣎⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠜⣣⣫⣴⣲⠟⠁⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⢓⠒⠂⢿⠀⠀⠘⠻⠇⢀⣀⠰⠿⠋⠀⠀⢀⣯⣿⣿⡿⠃⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢈⣹⡟⠾⣧⡀⠀⠀⠀⠀⠉⠀⠀⠀⠀⣀⣞⣷⠿⠿⠄⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠀⠀⣨⡧⠘⠿⠦⣤⠀⢰⠄⠐⠃⠈⢿⣍⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠄⢀⣠⣶⡅⠀⠀⠀⠀⠀⢠⠀⠀⠀⠀⠀⠠⣿⡒⠲⠤⣄⣀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠸⢂⣴⣞⣩⣼⣯⠀⠀⠀⠀⠀⠀⢘⡆⠀⠀⠀⠀⠀⠵⣌⣉⠛⢥⡭⠷⢦⡀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠰⣿⡾⠭⠿⣛⠁⠀⠀⠀⠀⠀⠀⠈⠀⠀⠀⠀⠀⠀⠀⢾⡉⠉⠉⠉⠉⠋⠁⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠠⣷⠆⠀⠲⠀⢠⡟⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠁⠀⠛⢀⡄⢹⣇⠀⠀⠀⠀⢸⠀⠀⠀⢰⠀⠀⠀⢠⡄⠀⠈⢷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠲⡦⢀⣴⠒⠛⠋⠉⢠⣟⠀⠀⠀⠀⢀⠴⠀⠀⢸⡆⠀⠀⣸⡈⠀⣰⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⢸⡆⠀⠀⠀⠀⢼⣿⡆⠀⠀⠀⢸⣆⣀⡀⢸⡋⠀⠀⣿⡿⡦⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⢶⣄⠀⠀⠀⠀⠙⠛⠞⠛⠛⠛⠉⠉⠙⣿⣿⠂⠃⠙⠛⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠰⠀⣠⡈⠈⡦⢶⡄⢀⣤⢀⠀⠀⠀⠀⠀⣀⣤⠋⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠈⠀⠀⠀⠀⠀⠀⠁⠈⠁⠀⠋⠘⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
</pre>
            </div>
            {{-- <a href="/register" class="about-signup-button">
                <span>Sign Up</span>
            </a> --}}
    </div>
</div>
<div class="about-cta-image-container">
        <div class="about-cta-image"></div>
    </div>
@endsection

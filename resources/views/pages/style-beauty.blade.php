@extends('layouts.app')

@section('title', 'A Love Letter to Style ♡ | offduty ⋆｡☆ faerie')

@section('content')
<style>
    h1, h2, h3, h4, h5, h6 {
    font-family: 'DM Serif Text', serif !important;
    letter-spacing: -0.02em;
}

.dm-serif-text-regular {
    font-family: 'DM Serif Text', serif !important;
    letter-spacing: -0.02em;
}

/* Apply Cormorant Garamond ONLY to body text paragraphs within sections */
.style-beauty-section p {
    font-family: 'Cormorant Garamond', serif !important;
    color: #333;
}

/* Apply Cormorant Garamond to the italic subtitle in hero */
.hero-bg .content-container p {
    font-family: 'Cormorant Garamond', serif !important;
    color: #333;
}

/* Apply Cormorant Garamond to the closing quote paragraphs */
.quote-decoration p {
    font-family: 'Cormorant Garamond', serif !important;
    color: #333;
}

.hero-bg {
    background-image: url('/images/ballet-shoes.jpg');
}

.content-container {
    background-color: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(4px);
}

.section-title {
    position: relative;
    display: inline-block;
    padding-bottom: 0.5rem;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60%;
    height: 2px;
    background: linear-gradient(90deg, #444e71, transparent);
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.1);
}

.elegant-border {
    border: 1px solid rgba(68, 78, 113, 0.2);
}

.text-shadow {
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.quote-decoration:before {
    content: '"';
    font-size: 4rem;
    color: rgba(68, 78, 113, 0.1);
    position: absolute;
    left: -1.5rem;
    top: -1.5rem;
    font-family: 'DM Serif Text', serif;
}

.main-content-bg {
    background-image: url('/images/ballet-shoes.jpg');
}

@media (max-width: 768px) {
    .section-title:after {
        width: 40%;
    }
    
    .quote-decoration:before {
        left: -0.5rem;
        top: -1rem;
        font-size: 3rem;
    }
}
</style>

<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">

<div class="min-h-screen bg-[#faf7f5]">
    <!-- Hero Section -->
    <div class="hero-bg pt-24 pb-32 px-4 flex items-center justify-center">
        <div class="content-container rounded-lg p-8 md:p-12 max-w-5xl w-full mx-4">
            <div class="text-center">
                <h1 class="text-4xl md:text-4xl font-bold text-gray-800 dm-serif-text-regular mb-6 text-shadow style-beauty">
                    The Dollhouse Diaries
                </h1>
                <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto leading-relaxed italic">
                    Where beauty meets edge in a symphony of dark elegance—where delicate lace collides with razor-sharp tailoring, and softness wears its strength like a second skin
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content with Background -->
    <div class="main-content-bg">
        <div class="max-w-6xl mx-auto px-4 py-12 -mt-20 relative z-10">
            <!-- Runway Chronicles Section -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 hover-lift style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular section-title">Runway Chronicles</h2>
                <p class="text-gray-600 mb-8 text-xl italic">
                    Capturing fashion's most mesmerizing moments
                </p>
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <p class="text-gray-700 mb-5 text-lg leading-relaxed">
                            The runway is where fashion's wildest dreams come to life—but it doesn't have to stay there. Whether it's a sculptural gown from Paris Fashion Week or the effortless draping of a Milanese designer, I'll show you how to take high-fashion moments and weave them into your everyday wardrobe.
                        </p>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            From deconstructing silhouettes to finding affordable alternatives, here's how to embody couture energy wherever you go.
                        </p>
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border">
                        <img src="/images/runway-chronicles.gif" alt="Runway inspiration" class="w-full h-72 object-cover">
                    </div>
                </div>
            </section>

            <!-- Fashion in Motion Section -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 hover-lift style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular">📹 Fashion in Motion</h2>
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div class="rounded-lg overflow-hidden elegant-border">
                        <video controls class="w-full h-96 object-cover hover:scale-105 transition-transform duration-400">
                            <source src="/videos/dolce&g.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div>
                        <div class="text-gray-700 space-y-5 text-lg leading-relaxed">
                            <p>There's something almost hypnotic about the way fabric moves—how it breathes, flows, and tells a story with every step. The soft sway of chiffon catching the air like a whispered secret, the bold, structured confidence of a perfectly tailored suit, the glistening allure of sequins shimmering under flashing lights.</p>
                            <p>Step into the dreamscape of Dolce & Gabbana's 1995 runway—where Old Hollywood glamour meets sultry Italian allure. Picture the slow-motion elegance of silk dresses trailing behind statuesque models, the edge of lace corsets paired with sleek leather, the seductive confidence of a deep red lip and a piercing gaze.</p>
                            <p>Here, you'll find curated runway clips, designer showcases, and those breathtaking fashion moments that transport you into another world. The way a garment moves is just as important as how it looks—every swish, every flicker of fabric under the lights, every powerful strut down the runway.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Vogue Beauty Secrets Section -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 hover-lift style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular section-title">💄 Vogue Beauty Secrets & Beyond</h2>
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <p class="text-gray-700 mb-5 text-lg leading-relaxed">
                            The transformative power of beauty is no secret. Inspired by Vogue's intimate beauty videos, I'll explore the routines of icons—their fragrances, their rituals, and their effortlessly enchanting allure.
                        </p>
                        <p class="text-gray-700 mb-8 text-lg leading-relaxed">
                            From the perfect dewy base to a scent that lingers like a love letter, let's uncover the secrets behind looking and feeling ethereal.
                        </p>
                        <div class="grid grid-cols-2 gap-4">
                            @for($i = 0; $i < 2; $i++)
                            <div class="elegant-border rounded overflow-hidden">
                                <img src="/images/beauty-img.jpg" alt="Beauty tip {{$i+1}}" class="w-full h-40 object-cover">
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div>
                        <div class="rounded-lg overflow-hidden elegant-border hover:scale-105 transition-transform duration-400 relative">
                            <a href="https://youtu.be/g_egyx3GLys?si=SVm8yk8xKI7elc0x" target="_blank" class="block">
                                <img src="/images/alexVogueBS.jpg" alt="Beauty secrets" class="w-full h-96 object-cover hover:opacity-90 transition">
                            </a>
                            <div class="absolute bottom-2 left-2 bg-black bg-opacity-70 text-white px-3 py-1 rounded text-sm">
                                Click to watch video
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Moodboards Section - NO SECTION HOVER, ONLY INDIVIDUAL MOODBOARDS -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular section-title">🎀 Style & Aesthetic Moodboards</h2>
                <div class="moodboard-grid grid grid-cols-2 md:grid-cols-3 gap-5 mb-8">
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd1.jpg" alt="Moodboard 1" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd2.jpg" alt="Moodboard 2" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd3.jpg" alt="Moodboard 3" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd4.jpg" alt="Moodboard 4" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd5.jpg" alt="Moodboard 5" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden elegant-border transform hover:scale-105 transition duration-300">
                        <img src="/images/mdbd6.jpg" alt="Moodboard 6" class="w-full h-64 object-cover">
                    </div>
                </div>
                <p class="text-gray-700 mb-5 text-lg leading-relaxed">
                    Fashion isn't just about clothing—it's a feeling, an atmosphere, a world of its own. Whether you're drawn to the softness of balletcore, the mystery of dark academia, or the effortless luxury of '90s minimalism, these moodboards will help you build an aesthetic that speaks to your soul.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Each curated board tells a visual story—a collision of textures, tones, and timeless references. From the delicate drape of silk to the sharp lines of structured tailoring, these images capture the essence of style as self-expression.
                </p>
            </section>

            <!-- Style Guide Section -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 hover-lift style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular section-title">The Style Guide</h2>
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div class="grid grid-cols-1 gap-5">
                        <div class="elegant-border rounded overflow-hidden">
                            <img src="/images/ji-style1.jpg" alt="Style guide 1" class="w-full h-52 object-cover">
                        </div>
                        <div class="elegant-border rounded overflow-hidden">
                            <img src="/images/ji-style2.jpg" alt="Style guide 2" class="w-full h-52 object-cover">
                        </div>
                        <div class="elegant-border rounded overflow-hidden">
                            <img src="/images/ji-style3.jpg" alt="Style guide 3" class="w-full h-52 object-cover">
                        </div>
                    </div>
                    <div>
                        <div class="text-gray-700 space-y-5 text-lg leading-relaxed">
                            <p>Timeless style isn't about keeping up—it's about knowing yourself so deeply that every piece you wear feels like a second skin. It's the confidence in a perfectly draped coat, the romance of a vintage slip, the edge of a sharp-shouldered blazer.</p>
                            <p>This guide is your key to curating a wardrobe that reflects your unique energy. We'll explore the alchemy of silhouettes—how a cinched waist can create drama, how fluid lines can embody ease, how texture and layering can transform a simple look into something extraordinary.</p>
                            <p>Dressing well is an art, and I'll help you master it with ease—from understanding the quiet power of monochrome dressing to the magic of the perfect heel. This is more than just a style guide; it's a grimoire for looking effortlessly divine.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Scent & Style Pairing Section - NO HOVER AT ALL -->
            <section class="bg-white rounded-xl shadow-sm elegant-border p-6 md:p-8 mb-12 style-beauty-section">
                <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular section-title">Scent & Style Pairing</h2>
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <p class="text-gray-700 mb-5 text-lg leading-relaxed">
                            Fashion and fragrance go hand in hand—after all, what is an outfit without the right scent to complete it? Whether you're wearing an airy linen dress that calls for a delicate floral mist or an edgy leather jacket that begs for a bold, spicy fragrance.
                        </p>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            I'll help you match your scents to your style, ensuring every detail of your look is perfectly curated. From morning coffees to midnight adventures, we'll find the olfactory notes that make your heart sing and your confidence shine.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="elegant-border rounded overflow-hidden">
                            <img src="/images/matchaPerf.jpg" alt="Scent pairing 1" class="w-full h-60 object-cover">
                        </div>
                        <div class="elegant-border rounded overflow-hidden">
                            <img src="/images/girl-style.jpg" alt="Scent pairing 2" class="w-full h-60 object-cover">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <!-- Closing Statement - Outside background -->
    <div class="bg-[#faf7f5] py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto pt-10 border-t border-[#444e71] relative quote-decoration">
                <p class="text-xl italic text-gray-700 mb-6 leading-relaxed">
                    Style is a love language, a daydream woven into fabric and fragrance. It's the way lace kisses your skin, the soft echo of heels on pavement, the perfume that lingers like a memory. 
                </p>
                <p class="text-2xl font-medium text-black dm-serif-text-regular">
                    Here, fashion is more than just getting dressed—it's storytelling, self-discovery, and a little bit of magic.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
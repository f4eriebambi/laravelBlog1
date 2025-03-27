@extends('layouts.app')

@section('title', 'A Love Letter to Style ♡ | offduty ⋆｡☆ faerie')

@section('content')
<div class="min-h-screen" style="background-image: url('/images/ballet-shoes.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: repeat;
        background-size: auto;
        opacity: 0.9;">
        <div class="w-4/5 m-auto py-10" style="background-color: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(2px);">
    <!-- Hero Header -->
    <div class="w-full py-16">
        <div class="w-4/5 m-auto text-center">
            <h1 class="text-5xl font-bold text-gray-800 dm-serif-text-regular">
                The Dollhouse Diaries
            </h1>
            <p class="text-xl text-gray-600 mb-8 pt-4 max-w-3xl mx-auto">
                Where beauty meets edge in a symphony of dark elegance—<br>where delicate lace collides with razor-sharp tailoring,<br>and softness wears its strength like a second skin
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-4/5 m-auto space-y-16 py-12">
        <!-- Runway to Reality Section -->
        <section class="py-8">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular border-b border-[#444e71] pb-2">Runway Chronicles</h2>
            <p class="text-gray-600 mb-6" style="font-size: 1.2rem;">
                Capturing fashion's most mesmerizing moments
            </p>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div style="font-size: 1.25rem;">
                    <p class="text-gray-600 mb-4">
                        The runway is where fashion's wildest dreams come to life—but it doesn't have to stay there. Whether it's a sculptural gown from Paris Fashion Week or the effortless draping of a Milanese designer, I'll show you how to take high-fashion moments and weave them into your everyday wardrobe.
                    </p>
                    <p class="text-gray-600">
                        From deconstructing silhouettes to finding affordable alternatives, here's how to embody couture energy wherever you go.
                    </p>
                </div>
                 <div class="rounded-lg overflow-hidden">
                    <img src="/images/runway-chronicles.gif" alt="Runway inspiration" class="w-full h-64 object-contain">
                </div>
            </div>
        </section>

        <!-- Fashion in Motion Section -->
        <section class="py-8 p-6 rounded-lg">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular">📹 Fashion in Motion</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="rounded-lg overflow-hidden border border-[#444e71]">
        <video controls class="w-full h-96 object-cover hover:scale-105 transition-transform duration-400">
            <source src="/videos/dolce&g.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
                <div style="
    font-size: 1.1rem;
">
                   <div class="text-gray-600 space-y-4">
    <p>
        There’s something almost hypnotic about the way fabric moves—how it breathes, flows, and tells a story with every step. The soft sway of chiffon catching the air like a whispered secret, the bold, structured confidence of a perfectly tailored suit, the glistening allure of sequins shimmering under flashing lights. Fashion is more than just clothing; it’s movement, attitude, a living expression of beauty.
    </p>
    <p>
        Step into the dreamscape of Dolce & Gabbana’s 1995 runway—where Old Hollywood glamour meets sultry Italian allure. Picture the slow-motion elegance of silk dresses trailing behind statuesque models, the edge of lace corsets paired with sleek leather, the seductive confidence of a deep red lip and a piercing gaze. These are the cinematic moments that make fashion feel like poetry in motion.
    </p>
    <p>
        Here, you'll find curated runway clips, designer showcases, and those breathtaking fashion moments that transport you into another world. The way a garment moves is just as important as how it looks—every swish, every flicker of fabric under the lights, every powerful strut down the runway.
    </p>
    <p>
        Let’s watch, admire, and let the rhythm of fashion inspire us to embody the elegance, drama, and artistry in our own wardrobes. After all, style is not just what you wear—it’s how you wear it.
    </p>
</div>
                </div>
            </div>
        </section>

        <!-- Vogue Beauty Secrets Section -->
        <section class="py-8">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular border-b border-[#444e71] pb-2">💄 Vogue Beauty Secrets & Beyond</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="text-gray-600 mb-4">
                        The transformative power of beauty is no secret. Inspired by Vogue's intimate beauty videos, I'll explore the routines of icons—their fragrances, their rituals, and their effortlessly enchanting allure.
                    </p>
                    <p class="text-gray-600 mb-6">
                        From the perfect dewy base to a scent that lingers like a love letter, let's uncover the secrets behind looking and feeling ethereal.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @for($i = 0; $i < 2; $i++)
                        <div class="border border-[#444e71] rounded overflow-hidden">
                            <img src="/images/beauty-img.jpg" alt="Beauty tip {{$i+1}}" class="w-full h-32 object-cover">
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="rounded-lg overflow-hidden border border-[#444e71] hover:scale-105 transition-transform duration-400">
                    <a href="https://youtu.be/g_egyx3GLys?si=SVm8yk8xKI7elc0x" target="_blank" class="block">
            <img src="/images/alexVogueBS.jpg" alt="Beauty secrets" class="w-full h-96 object-cover hover:opacity-90 transition">
        </a>
                </div>
            </div>
        </section>

        <!-- Moodboards Section - With Added Text -->
        <section class="py-8">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular border-b border-[#444e71] pb-2">🎀 Style & Aesthetic Moodboards</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd1.jpg" alt="Moodboard 1" class="w-full h-80 object-cover">
        </div>
        <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd2.jpg" alt="Moodboard 2" class="w-full h-80 object-cover">
        </div>
        <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd3.jpg" alt="Moodboard 3" class="w-full h-80 object-cover">
        </div>
        <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd4.jpg" alt="Moodboard 4" class="w-full h-80 object-cover">
        </div>
        <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd5.jpg" alt="Moodboard 5" class="w-full h-80 object-cover">
        </div>
        <div class="rounded-lg overflow-hidden border border-[#444e71] transform hover:scale-105 transition duration-300">
            <img src="/images/mdbd6.jpg" alt="Moodboard 6" class="w-full h-80 object-cover">
        </div>
            </div>
            <p class="text-gray-600 mb-4">
                Fashion isn't just about clothing—it's a feeling, an atmosphere, a world of its own. Whether you're drawn to the softness of balletcore, the mystery of dark academia, or the effortless luxury of '90s minimalism, these moodboards will help you build an aesthetic that speaks to your soul.
            </p>
            <p class="text-gray-600">
                Each curated board tells a visual story—a collision of textures, tones, and timeless references. From the delicate drape of silk to the sharp lines of structured tailoring, these images capture the essence of style as self-expression. Let them inspire your next sartorial chapter.
            </p>
        </section>

         <!-- Style Guide Section -->
        <section class="py-8">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular border-b border-[#444e71] pb-2">The Style Guide</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="grid grid-cols-1 gap-4">
                    <div class="border border-[#444e71] rounded overflow-hidden">
                    <img src="/images/ji-style1.jpg" alt="Style guide 1" class="w-full h-48 object-cover">
                </div>
                <div class="border border-[#444e71] rounded overflow-hidden">
                    <img src="/images/ji-style2.jpg" alt="Style guide 2" class="w-full h-48 object-cover">
                </div>
                <div class="border border-[#444e71] rounded overflow-hidden">
                    <img src="/images/ji-style3.jpg" alt="Style guide 3" class="w-full h-48 object-cover">
                </div>
                </div>
                <div style="
    font-size: 1.1rem;
">
                    <div class="text-gray-600 space-y-4">
    <p>
        Timeless style isn’t about keeping up—it’s about knowing yourself so deeply that every piece you wear feels like a second skin. It’s the confidence in a perfectly draped coat, the romance of a vintage slip, the edge of a sharp-shouldered blazer. True style is an extension of your essence, a language spoken in fabric and form.
    </p>
    <p>
        This guide is your key to curating a wardrobe that reflects your unique energy. We’ll explore the alchemy of silhouettes—how a cinched waist can create drama, how fluid lines can embody ease, how texture and layering can transform a simple look into something extraordinary. Every stitch carries intention, and every outfit is a love letter to the self.
    </p>
    <p>
        Dressing well is an art, and I’ll help you master it with ease—from understanding the quiet power of monochrome dressing to the magic of the perfect heel. This is more than just a style guide; it’s a grimoire for looking effortlessly divine, where every choice you make is a spell cast in silk, lace, and leather.
    </p>
</div>
                </div>
            </div>
        </section>

        <!-- Scent & Style Pairing Section -->
        <section class="py-8">
            <h2 class="text-3xl font-bold mb-6 text-[#444e71] dm-serif-text-regular border-b border-[#444e71] pb-2">Scent & Style Pairing</h2>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="text-gray-600 mb-4">
                        Fashion and fragrance go hand in hand—after all, what is an outfit without the right scent to complete it? Whether you're wearing an airy linen dress that calls for a delicate floral mist or an edgy leather jacket that begs for a bold, spicy fragrance. Like the perfect accessory, fragrance should elevate your ensemble, whispering secrets about who you are before you speak a word. It's the invisible thread that ties your look together.
                    </p>
                    <p class="text-gray-600">
                        I'll help you match your scents to your style, ensuring every detail of your look is perfectly curated. From morning coffees to midnight adventures, we'll find the olfactory notes that make your heart sing and your confidence shine.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                <div class="border border-[#444e71] rounded overflow-hidden hover:scale-105 transition-transform duration-400">
                    <img src="/images/matchaPerf.jpg" alt="Scent pairing 1" class="w-full h-35 object-cover">
                </div>
                <div class="border border-[#444e71] rounded overflow-hidden hover:scale-105 transition-transform duration-400">
                    <img src="/images/girl-style.jpg" alt="Scent pairing 2" class="w-full h-35 object-cover">
                </div>
            </div>
                </div>
            </div>
        </section>

        <!-- Updated Closing Statement -->
        <div class="text-center mt-12 max-w-3xl mx-auto pt-8 border-t border-[#444e71]" style="padding-top: 1.25rem;">
            <p class="text-lg italic text-gray-600 leading-relaxed" style="padding-bottom: 2rem;">
                Style is a love language, a daydream woven into fabric and fragrance. It's the way lace kisses your skin, the soft echo of heels on pavement, the perfume that lingers like a memory. 
                <p class="text-2xl font-medium text-black dm-serif-text-regular">Here, fashion is more than just getting dressed—it's storytelling, self-discovery, and a little bit of magic. Whether you're here to find inspiration, a signature scent, or a feeling you can't quite name, I hope you leave wrapped in beauty, ready to make the world your runway.
                </p>
            </p>
        </div>
    </div>
</div>
</div>
@endsection
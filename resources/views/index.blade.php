@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-left">
                <h1 class="text-5xl uppercase font-bold text-shadow-md pb-14 dm-serif-text-regular text-custom-color">
                    Fashion, Fragrance and All Things Pretty
                </h1>
                <a 
    href="/blog"
    class="border 1px text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
    Unravel Timeless Beauty →
</a>
            </div>
        </div>
    </div>

    <div>
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 gray-background">
            <div class="video-container">
                <video autoplay muted loop>
                    <source src="/videos/orabella.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>        
    
            <div class="m-auto sm:m-auto text-left w-4/5 block">
                <h2 class="text-3xl font-extrabold text-gray-600">
                    Exploring the World of Perfumes
                </h2>
                
                <p class="py-8 text-gray-500 text-s">
                    Discover the art of fragrance and the secrets behind the most captivating scents. From the delicate floral notes to the deep, musky undertones, each perfume tells a unique story.
                </p>
            
                <p class="font-extrabold text-gray-600 text-s pb-9">
                    Dive into the world of perfumes, where each scent tells a story. Learn about the intricate notes that compose a fragrance, the artistry behind its creation, and how to find the perfect scent that resonates with your essence.
                </p>
    
                <p class="text-gray-500 text-s pb-9">
                    Immerse yourself in a curated space where fragrances are celebrated. Whether you're seeking a scent for a special occasion, a signature fragrance, or simply exploring the nuances of olfactory art, this is your invitation to indulge in the luxurious world of perfumes.
                </p>
    
                <div class="flex items-center space-x-4 pb-9">
                    <img src="/images/perfume_icon.jpg" width="70" alt="Icon" class="rounded-full">
                    <p class="text-gray-500 text-s">
                        "Fragrance is the unseen whisper that lingers, an invisible signature of your essence." - Unknown
                    </p>
                </div>
            
                <a href="/blog" class="uppercase bg-gray-50 text-gray-700 text-s font-extrabold py-3 px-8 hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300 sm:px-6 sm:py-2">
                    Come Indulge →
                </a>
            </div>
        </div>
    </div>
    
    <div class="max-w-4xl mx-auto custom-padding">
        <div class="custom-section">
            <div class="relative grid grid-cols-2 gap-0">
                <div class="relative">
                    <img src="/images/taylorR_spilt1.jpg" alt="" class="w-full h-full object-cover">
                </div>
                <div class="relative">
                    <img src="/images/aestheticBoard_spilt2.jpg" alt="" class="w-full h-full object-cover">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-black text-white text-center p-4 col-span-2 custom-opacity-overlay">
                    <p class="text-xl font-bold">
                        Not sure what to wear? We’ve got you covered! Explore outfit inspirations, seasonal trends, and styling tips to elevate your wardrobe. 
                        <br>
                        Discover the perfect look for every occasion and let your style speak volumes.
                    </p>
                </div>
            </div>
        </div>
    </div>

   <!-- Explore Section with Background -->
<div class="explore-section">
    <div class="overlay"></div>
    <div class="content">
        <h2 class="text-3xl font-bold dm-serif-text-regular text-white">
            So, We’d Like to Invite You to Explore the World of an  <span class="meie-script-regular"> offduty ⋆｡☆ fairy </span> !
        </h2>
        <p class="text-xl text-gray-200 mt-6">
            Here’s a glimpse of what we have in store for you...
        </p>
    </div>
</div>

<!-- Auto-Scrolling Carousel -->
<div class="relative w-full overflow-hidden py-10" style="z-index: 1;">
    <div class="flex space-x-8 animate-scroll">
        <!-- Fragrance Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/tomFord.jpg" alt="Fragrance Reviews" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Fragrance of the Month: Discover the most captivating scents for every season.
            </p>
        </div>

        <!-- Style Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/fitspo.jpg" alt="Style Guides" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Style Guides: Elevate your wardrobe with our curated looks.
            </p>
        </div>

        <!-- Beauty & Makeup Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/lilyVogueBS.jpg" alt="Beauty & Makeup" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Beauty & Makeup: Explore Vogue's iconic celebrity looks and YouTubers' top tutorials.
            </p>
        </div>

        <!-- Runway Looks Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/glowRunway.jpg" alt="Runway Looks" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Runway Inspo: Iconic and modern runway fashion to inspire your style.
            </p>
        </div>

        <!-- Celebrity Fashion Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/posh_becks.jpg" alt="Celebrity Fashion" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Celebrity Fashion: Relive iconic looks from the 2000s and 2010s.
            </p>
        </div>

        <!-- Fashion & Fragrance Pairings Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/prettyImage.jpg" alt="Fashion & Fragrance Pairings" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Perfect Pairings: Match your outfit with the ideal fragrance.
            </p>
        </div>

        <!-- Aesthetic Photos Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/aestheticImage.jpg" alt="Aesthetic Photos" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Visual Inspo: Stunning photos to spark your creativity.
            </p>
        </div>

        <!-- Aesthetic Moodboards Section -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/moodboard.jpg" alt="Aesthetic Moodboards" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Moodboards: Curated inspiration for a chic and stylish life.
            </p>
        </div>

        <!-- Duplicate Items for Seamless Loop -->
        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/tomFord.jpg" alt="Fragrance Reviews" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Fragrance of the Month: Discover the most captivating scents for every season.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/fitspo.jpg" alt="Style Guides" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Style Guides: Elevate your wardrobe with our curated looks.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/lilyVogueBS.jpg" alt="Beauty & Makeup" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Beauty & Makeup: Explore Vogue's iconic celebrity looks and YouTubers' top tutorials.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/glowRunway.jpg" alt="Runway Looks" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Runway Inspo: Iconic and modern runway fashion to inspire your style.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/posh_becks.jpg" alt="Celebrity Fashion" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Celebrity Fashion: Relive iconic looks from the 2000s and 2010s.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/prettyImage.jpg" alt="Fashion & Fragrance Pairings" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Perfect Pairings: Match your outfit with the ideal fragrance.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/aestheticImage.jpg" alt="Aesthetic Photos" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Visual Inspo: Stunning photos to spark your creativity.
            </p>
        </div>

        <div class="min-w-[300px]">
            <div class="w-full h-64 overflow-hidden rounded-lg">
                <img src="/images/moodboard.jpg" alt="Aesthetic Moodboards" class="w-full h-full object-cover">
            </div>
            <p class="text-center text-gray-600 mt-4">
                Moodboards: Curated inspiration for a chic and stylish life.
            </p>
        </div>
    </div>
</div>
@endsection
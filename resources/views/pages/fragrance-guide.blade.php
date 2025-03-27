@extends('layouts.app')

@section('content')
<div class="fragrance-guide-background min-h-screen" style="background-image: url('https://i.pinimg.com/736x/28/84/ec/2884ec7c2571def984c0545e672b297f.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: repeat;
        background-size: auto;">
    <div class="fragrance-guide-content w-4/5 m-auto py-10" style="background-color: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(2px);">
        
        <!-- Header Section -->
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-800 dm-serif-text-regular">
                It Girl's Guide to Fragrance
            </h1>
            <p class="text-xl text-gray-600 mb-8 pt-4 max-w-3xl mx-auto">
                Perfume is more than just a scent—it's a statement, a mood, an invisible accessory that lingers in the air like a whispered secret.
            </p>
        </div>

        <div class="w-4/5 m-auto space-y-16 pb-20">
            <!-- Monthly Fragrance Section -->
            <section class="py-8 relative">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="md:w-1/3">
                        <img src="https://i.pinimg.com/736x/a6/1e/e2/a61ee2ae8f30e52c71ac855f36a437da.jpg" 
                             alt="Mad Love Perfume" 
                             class="w-full h-80 object-contain mx-auto hover:scale-105 transition-transform duration-300"
                             style="filter: grayscale(20%) contrast(90%); max-height: 400px;">
                    </div>
                    
                    <div class="md:w-2/3">
                        <h2 class="text-2xl font-semibold text-gray-800 dm-serif-text-regular mb-4">Fragrance of the Month: Mad Love</h2>
                        <p class="text-gray-600 mb-4">
                            This month's signature scent is Mad Love by Katy Perry—a sweet, flirty fragrance that feels like a love letter wrapped in pink. The perfect balance of playful and sophisticated, it opens with a burst of juicy apple and sorbet that dances on the skin.
                        </p>
                        <p class="text-gray-600 mb-4">
                            As the fragrance develops, creamy peony and jasmine emerge like the unfolding petals of a flower in bloom, while the warm embrace of coconut-vanilla base notes lingers on the skin for hours.
                        </p>
                        <p class="text-gray-600 mb-8">
                            Mad Love layers beautifully with soft vanilla or fruity floral scents, making it perfect for those who adore a touch of sweetness. The bottle itself—a whimsical heart with delicate detailing—makes it as pretty on your vanity as the scent is on your skin.
                        </p>
                        <a href="https://www.cloud10beauty.com/products/katy-perry-mad-love-eau-de-parfum"
                           class="inline-block border border-gray-300 bg-white text-gray-700 py-3 px-6 font-bold text-lg uppercase hover:bg-gray-800 hover:text-white transition-colors duration-300 rounded-full shadow-sm" target="_blank">
                            Discover Mad Love →
                        </a>
                    </div>
                </div>
            </section>

            <!-- Fragrance Structure Section -->
            <section class="py-4">
                <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dm-serif-text-regular border-b-2 border-gray/20 pb-2 inline-block">The Structure of Fragrance</h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Top Notes -->
                    <div class="p-8 bg-white bg-opacity-70 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Top Notes</h3>
                        <div class="w-16 h-1 bg-[#9f0000] my-4"></div>
                        <p class="text-gray-700">
                            The first impression of any fragrance, top notes are the initial burst of scent that greet your senses. These volatile compounds evaporate quickly but create that all-important first impression. Common top notes include citrus, light fruits, and fresh herbs. They typically last 5-15 minutes before transitioning.
                        </p>
                    </div>
                    
                    <!-- Middle Notes -->
                    <div class="p-8 bg-white bg-opacity-70 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Heart Notes</h3>
                        <div class="w-16 h-1 bg-[#9f0000] my-4"></div>
                        <p class="text-gray-700">
                            Emerging after the top notes dissipate, heart notes form the core personality of the fragrance. These medium-weight molecules last several hours and often include floral or spicy accords. This is the true character of the perfume—where rose, jasmine, or cinnamon might make their appearance known.
                        </p>
                    </div>
                    
                    <!-- Base Notes -->
                    <div class="p-8 bg-white bg-opacity-70 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                        <h3 class="text-2xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Base Notes</h3>
                        <div class="w-16 h-1 bg-[#9f0000] my-4"></div>
                        <p class="text-gray-700">
                            The foundation that gives a fragrance its longevity, base notes can last up to 24 hours on skin. These heavy molecules provide depth and warmth to the overall composition. Think vanilla, musk, woods, and amber—notes that linger like a soft whisper long after application.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Fragrance Categories Section -->
            <section class="py-4">
                <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dm-serif-text-regular border-b-2 border-gray/20 pb-2 inline-block">Essential Fragrance Categories</h2>
                <p class="text-gray-600 text-center max-w-2xl mx-auto mb-8">
                    A well-rounded fragrance collection should offer scents for every mood and occasion. These are the fundamental categories to explore:
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="group">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://i.pinimg.com/736x/d0/a1/2a/d0a12a67028209c1713e6f381ed42e23.jpg" 
                                 alt="Floral Fragrances" 
                                 class="w-full h-64 object-cover mb-2 ">
                        </div>
                        <h3 class="font-semibold text-center mt-2">Floral</h3>
                    </div>
                    <div class="group">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://fimgs.net/mdimg/perfume/375x500.98448.jpg" 
                                 alt="Citrus Fragrances" 
                                 class="w-full h-64 object-cover mb-2 ">
                        </div>
                        <h3 class="font-semibold text-center mt-2">Citrus</h3>
                    </div>
                    <div class="group">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://i.pinimg.com/736x/c9/89/b3/c989b3a396682382056cd9ae26a91a24.jpg" 
                                 alt="Woody Fragrances" 
                                 class="w-full h-64 object-cover mb-2 ">
                        </div>
                        <h3 class="font-semibold text-center mt-2">Woody</h3>
                    </div>
                    <div class="group">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://i.pinimg.com/736x/46/82/c3/4682c3698c78546bc5f9ea4abde28f33.jpg" 
                                 alt="Gourmand Fragrances" 
                                 class="w-full h-64 object-cover mb-2 ">
                        </div>
                        <h3 class="font-semibold text-center mt-2">Gourmand</h3>
                    </div>
                </div>
            </section>

            <!-- Scent Pairings Section -->
            <section class="py-4">
                <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dm-serif-text-regular border-b-2 border-gray/20 pb-2 inline-block">Scent Pairings</h2>
                <p class="text-gray-600 text-center max-w-3xl mx-auto mb-8">
                    These complementary fragrance combinations create something greater than the sum of their parts—alchemical marriages where two scents unite to form something entirely new and magical. Like the perfect outfit, the right fragrance pairing can elevate your mood and leave a lasting impression.
                </p>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Pairing 1 -->
                    <div class="p-6 bg-white bg-opacity-70 rounded-xl hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Rose + Vanilla</h3>
                        <p class="text-gray-700">
                            The romantic elegance of rose petals meets the comforting warmth of vanilla. This pairing creates a scent that's both sophisticated and cozy. Try layering a rose-forward fragrance with a vanilla body oil for a luxurious effect that lasts all day.
                        </p>
                    </div>
                    
                    <!-- Pairing 2 -->
                    <div class="p-6 bg-white bg-opacity-70 rounded-xl hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Vanilla + Fruity</h3>
                        <p class="text-gray-700">
                            A playful yet refined combination where creamy vanilla softens the vibrant energy of fruity notes. The sweetness of berries or peach finds balance against vanilla's richness, creating a scent that's youthful but never juvenile.
                        </p>
                    </div>
                    
                    <!-- Pairing 3 -->
                    <div class="p-6 bg-white bg-opacity-70 rounded-xl hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Spice + Floral</h3>
                        <p class="text-gray-700">
                            For those who love contrast, this pairing balances the warmth of spices with the freshness of florals. Imagine cardamom or cinnamon lending depth to a bright peony or jasmine scent—perfect for evening wear or cooler months.
                        </p>
                    </div>
                    
                    <!-- Pairing 4 -->
                    <div class="p-6 bg-white bg-opacity-70 rounded-xl hover:shadow-md transition-shadow">
                        <h3 class="text-xl font-semibold mb-3 text-gray-800 dm-serif-text-regular">Fruity + Musk</h3>
                        <p class="text-gray-700">
                            The innocence of fruit meets the sensuality of musk in this unexpectedly sophisticated pairing. A sparkling pear or blackcurrant note gains intrigue when grounded by clean musk, creating dimension and longevity.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Application Guide Section -->
            <section class="py-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 dm-serif-text-regular inline-block border-b-2 border-gray/20 pb-2">
                        How Do You Apply Them?
                    </h2>
                    <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                        Mastering fragrance application is an art that enhances longevity and creates your signature scent trail.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-12">
                    <div class="bg-white bg-opacity-70 p-8 rounded-xl shadow-sm">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 border-b-2 border-gray/20 pb-2 dm-serif-text-regular">Pulse Points</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Behind the ears - helps diffuse fragrance throughout the day</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Inner wrists - where blood vessels are close to the skin</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Base of throat - creates a beautiful scent trail</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Behind knees - helps fragrance rise throughout the day</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Inner elbows - warm area that holds scent well</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Ankles - creates a subtle scent bubble as you move</span>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white bg-opacity-70 p-8 rounded-xl shadow-sm">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800 border-b-2 border-gray/20 pb-2 dm-serif-text-regular">Pro Tips</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Apply to moisturized skin for better longevity</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Don't rub - it breaks down the fragrance molecules</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Store in cool, dark places to preserve the scent</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Consider seasonal variations in scent strength</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Spray hair brushes for a subtle, lasting effect</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Layer with matching-scented lotions for intensity</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-[#830000] text-xl mr-3">𓆩♥𓆪</span>
                                <span class="text-gray-600">Apply to clothing (sparingly) for extended wear</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <!-- Closing Statement -->
<div class="text-center mt-16 max-w-3xl mx-auto p-8 rounded-xl shadow-sm relative overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="https://i.pinimg.com/736x/0e/4b/3d/0e4b3dd80c164898dc545f2d0a4efc4b.jpg" 
             alt="Perfume aesthetic background" 
             class="w-full h-full object-cover"
             style="filter: brightness(0.8);">
        <div class="absolute inset-0 bg-white bg-opacity-70"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10">
        <p class="text-lg text-gray-600 leading-relaxed">
            Fragrance is a personal signature, an invisible accessory that lingers in memory long after you've left the room. It's the finishing touch to your identity, the olfactory equivalent of your handwriting.
        </p>
        
        <div class="my-8 border-t border-gray/20 w-1/4 mx-auto"></div>
        
        <p class="text-lg italic text-gray-600 mb-8">
            Somewhere, in a world scented with roses and vanilla clouds, a girl lingers at her vanity, misting her pulse points with the fragrance of a dream. She presses, never rubs, lets the notes settle like a secret only she knows.
        </p>
        
        <p class="text-2xl font-medium text-[#9f0000] dm-serif-text-regular">
            Let your fragrance be your signature. The story continues with every spritz. 𓇢𓆸 
        </p>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
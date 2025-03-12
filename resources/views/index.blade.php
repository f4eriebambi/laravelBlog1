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

    <div class="gray-background">
        <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15">
            <div>
                <video width="700" autoplay muted loop>
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
                    <img src="https://i.pinimg.com/736x/c1/46/a1/c146a17dc7d42d7eca6bcf448ae6b03b.jpg" width="70" alt="Icon" class="rounded-full">
                    <p class="text-gray-500 text-s">
                        "Fragrance is the unseen whisper that lingers, an invisible signature of your essence." - Unknown
                    </p>
                </div>
            
                {{-- this will be going to fragrance page or smthng --}} 
                <a 
                    href="/blog"
                    class="uppercase bg-gray-50 text-gray-700 text-s font-extrabold py-3 px-8 hover:bg-gray-700 hover:text-gray-50 transition-colors duration-300">
                    Come Indulge →
            </a>
            </div>
        </div>
    </div>
    {{-- <a 
                    href="/blog"
                    class="uppercase bg-gray-50 text-gray-700 text-s font-extrabold py-3 px-8">
                    Come Indulge →
                </a> --}}
    

    <div class="max-w-4xl mx-auto p-15">
        <div class="relative grid grid-cols-2 gap-0">
            <div class="relative">
                <img src="https://i.pinimg.com/736x/a4/22/ae/a422ae5b2bdb25148284291a0cf1dc77.jpg" alt="" class="w-full h-full object-cover">
            </div>
            <div class="relative">
                <img src="https://i.pinimg.com/736x/d7/bd/03/d7bd036582842563558c21eef156d7fa.jpg" alt="" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-center p-4 col-span-2">
                <p class="text-xl font-bold">
                    Not sure what to wear? We’ve got you covered! Explore outfit inspirations, seasonal trends, and styling tips to elevate your wardrobe.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>

        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque exercitationem saepe enim veritatis, eos temporibus quaerat facere consectetur qui.
        </p>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
        <div class="flex bg-yellow-700 text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    PHP
                </span>

                <h3 class="text-xl font-bold py-10">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas necessitatibus dolorum error culpa laboriosam. Enim voluptas earum repudiandae consequuntur ad? Expedita labore aspernatur facilis quasi ex? Nemo hic placeat et?
                </h3>

                <a 
                    href=""
                    class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                    Find Out More
                </a>
            </div>
        </div>
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>
    </div>
@endsection
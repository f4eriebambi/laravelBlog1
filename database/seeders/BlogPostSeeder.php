<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create default user first
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'fae (admin)',
            'email' => 'admin123@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Pyhveq!eRpPb2LM'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert all blog posts
        $posts = [
            [
                'id' => 22,
                'slug' => 'soft-creatures-a-moodboard-collection',
                'title' => 'Soft Creatures: A Moodboard Collection ♡',
                'description' => 'A visual love letter to the tender and the timeless—Lamb Girl, Mouse, Puppy, and Deer—each embodying a different shade of softness. From the delicate innocence of lamb pastels to the quiet charm of a meadow mouse, the playful warmth of a puppy, and the gentle elegance of a woodland deer. This carousel captures a world of dreamy nostalgia, muted hues, and cozy textures, where sweetness and serenity intertwine. Let yourself be wrapped in the quiet magic of soft creatures. ♡',
                'image_path' => null,
                'created_at' => '2025-03-25 15:00:09',
                'updated_at' => '2025-09-13 21:38:05',
                'user_id' => 1,
            ],
            [
                'id' => 23,
                'slug' => 'a-gentle-reminder-2',
                'title' => 'A Gentle Reminder 🍓',
                'description' => 'The world holds so many small joys—strawberries, the color blue, the warmth of a familiar voice. Even in sorrow, kindness finds its way to you.',
                'image_path' => null,
                'created_at' => '2025-03-25 15:09:21',
                'updated_at' => '2025-09-13 21:04:42',
                'user_id' => 1,
            ],
            [
                'id' => 25,
                'slug' => 'ethereal-icons-anok-yai-alex-consani-paloma-elsesser-for-harper-s-bazaar',
                'title' => 'Ethereal Icons: Anok Yai, Alex Consani & Paloma Elsesser for Harper\'s Bazaar 🤍',
                'description' => 'A moment of beauty, strength, and elegance—Anok Yai, Alex Consani, and Paloma Elsesser grace the cover of Harper\'s Bazaar April 2025, captured through the lens of Ethan James Green. Their presence is a statement, a celebration of individuality and high fashion\'s evolving narrative. Draped in ethereal textures and commanding silhouettes, they embody a new era of style—where diversity, confidence, and artistry meet. An editorial that lingers like a masterpiece, both striking and timeless. ✧',
                'image_path' => null,
                'created_at' => '2025-03-25 15:18:01',
                'updated_at' => '2025-09-13 21:11:36',
                'user_id' => 1,
            ],
            [
                'id' => 26,
                'slug' => 'donatella-versace-forever-fashion-fairy-godmother-2',
                'title' => 'Donatella Versace: Forever Fashion Fairy Godmother ✨',
                'description' => "Donatella Versace, the iconic force behind the legendary Versace brand, has reigned as the ultimate fashion fairy godmother for decades. After taking the helm of Versace following her brother Gianni's untimely death, she has boldly reshaped the fashion world with her fearless vision and unmistakable style.\r\n\r\nNow, as Donatella steps down, her legacy remains cemented. She's not only preserved the glamour and sensuality of Versace but has elevated it to new heights. Forever the queen of couture, her influence on fashion and the industry will continue to shine brightly for years to come. ✨👑",
                'image_path' => null,
                'created_at' => '2025-03-25 15:27:18',
                'updated_at' => '2025-09-13 22:12:18',
                'user_id' => 1,
            ],
            [
                'id' => 27,
                'slug' => 'zendaya-and-law-roach-the-iconic-duo-that-you-are-2',
                'title' => 'Zendaya and Law Roach: The Iconic Duo That You Are! ★',
                'description' => "Zendaya and Law Roach—two names that have become synonymous with style, innovation, and unforgettable fashion moments. From red carpets to magazine covers, their partnership has been a masterclass in creating bold, statement-making looks. Law Roach, the visionary stylist, and Zendaya, the effortlessly chic muse, have redefined what it means to be iconic.💫\r\n\r\nTogether, they've proved that fashion is more than just clothing—it's art, it's empowerment, and above all, it's a celebration of individuality. Through every outfit, every moment, this dynamic duo continues to set trends, break barriers, and remind us that style is a powerful form of expression.",
                'image_path' => null,
                'created_at' => '2025-03-25 15:28:57',
                'updated_at' => '2025-09-13 21:33:06',
                'user_id' => 1,
            ],
            [
                'id' => 28,
                'slug' => 'ballet-of-beauty',
                'title' => 'Ballet of Beauty',
                'description' => "⢠⡏⠉⠑⢄⠀⠀⠀⡠⠋⠉⢱⡀\r\n⡇⠙⠒⠒⠬⡗⢒⢮⠄⠒⠒⠁⢣\r\n⠇⠀⠈⠁⢁⡷⠤⢮⠈⠁⠀⠀⡌\r\n⠘⢄⣀⡰⢻⠁⠀⠘⡕⢄⣀⡰⠁\r\n⠀⡎⠘⢀⠇⠀⠀⠀⢱⠈⠂⠡⠀\r\n⠀⠑⢄⡜⠢⡀⠀⢀⠔⠇⡴⠃⠀\r\n⠀⠀⠀⠑⠠⠚⠀⠓⠔⠋⠀⠀⠀",
                'image_path' => null,
                'created_at' => '2025-03-26 00:19:27',
                'updated_at' => '2025-09-13 21:07:13',
                'user_id' => 1,
            ],
            [
                'id' => 31,
                'slug' => 'vivienne-westwood-lighters-a-spark-of-punk-and-elegance',
                'title' => 'Vivienne Westwood Lighters: A Spark of Punk and Elegance',
                'description' => 'Vivienne Westwood, the queen of punk, brings her rebellious spirit to something as simple as a lighter. These iconic pieces are more than just functional—they\'re a statement. With bold, unique designs, they capture the essence of Westwood\'s revolutionary style. Perfect for igniting creativity and style wherever you go, these lighters are the perfect fusion of edge and elegance, just like the designer herself.',
                'image_path' => null,
                'created_at' => '2025-03-26 01:24:06',
                'updated_at' => '2025-09-13 21:26:34',
                'user_id' => 1,
            ],
            [
                'id' => 32,
                'slug' => 'the-miu-miu-ss23-cargo-bag-utility-meets-luxury-2',
                'title' => 'The Miu Miu SS23 Cargo Bag: Utility Meets Luxury',
                'description' => 'Miu Miu\'s SS23 Cargo Bag is the perfect blend of practicality and high-fashion luxury. Combining a utilitarian design with a chic, sophisticated twist, this bag is a must-have for anyone looking to upgrade their everyday style. From its functional compartments to its sleek silhouette, it\'s an accessory that speaks volumes without saying a word. Effortless, stylish, and oh-so-covetable. 👜',
                'image_path' => null,
                'created_at' => '2025-03-26 01:25:23',
                'updated_at' => '2025-09-13 21:04:54',
                'user_id' => 1,
            ],
            [
                'id' => 33,
                'slug' => 'bella-hadid-in-di-petsa-wet-look-perfection-2',
                'title' => 'Bella Hadid in Di Petsa: Wet Look Perfection',
                'description' => 'Bella Hadid turns heads in this stunning \'wet look\' mini dress by Di Petsa, a true embodiment of sensuality and fashion innovation. The sleek, shiny material hugs her body perfectly, creating a striking, almost liquid effect that highlights her runway-ready presence. This is high-fashion at its most daring—bold, futuristic, and unforgettable.',
                'image_path' => null,
                'created_at' => '2025-03-26 01:26:02',
                'updated_at' => '2025-09-13 21:39:56',
                'user_id' => 1,
            ],
            [
                'id' => 34,
                'slug' => 'anok-yai-street-style-queen-2',
                'title' => 'Anok Yai: Street Style Queen',
                'description' => 'Anok Yai\'s street style is a lesson in effortless cool, blending high fashion with laid-back chic. Whether she\'s sporting oversized jackets or sleek, tailored pieces, Anok has a way of turning everyday outfits into runway moments. Her looks are always confident, always curated, and always on point—making her a true icon in the world of street fashion.',
                'image_path' => null,
                'created_at' => '2025-03-26 01:26:29',
                'updated_at' => '2025-09-13 21:41:50',
                'user_id' => 1,
            ],
            [
                'id' => 35,
                'slug' => 'the-power-of-grace-2',
                'title' => 'The Power of Grace',
                'description' => ".｡ﾟﾟ･｡･  ིྀ⋆.\r\n𐙚.    𝐻𝑒𝑟 𝑠𝑜𝑓𝑡𝑛𝑒𝑠𝑠 𝑖𝑠 ℎ𝑒𝑟 𝑝𝑜𝑤𝑒𝑟 \r\n　ﾟ་･ . ･་𐙚",
                'image_path' => null,
                'created_at' => '2025-03-26 01:27:42',
                'updated_at' => '2025-09-13 21:05:04',
                'user_id' => 1,
            ],
            [
                'id' => 36,
                'slug' => 'the-art-of-being',
                'title' => 'The Art of Being',
                'description' => "𝑏𝑒𝑎𝑢𝑡𝑦  𝑏𝑒𝑔𝑖𝑛𝑠  𝑡ℎ𝑒  𝑚𝑜𝑚𝑒𝑛𝑡  \r\n⠀⠀⠀⠀⠀   𝑦𝑜𝑢  𝑑𝑒𝑐𝑖𝑑𝑒  𝑡𝑜  𝑏𝑒  𝑦𝑜𝑢𝑟𝑠𝑒𝑙𝑓\r\n\r\n   ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⠉⢳⣰⠋⠙⡆⠀⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⢧⡀⠁⢀⡜⠁⠀⠀⠀⠀⠀⠀\r\n⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⠷⠋⠀⠀",
                'image_path' => null,
                'created_at' => '2025-03-26 01:28:18',
                'updated_at' => '2025-09-13 22:12:40',
                'user_id' => 1,
            ],
            [
                'id' => 37,
                'slug' => 'mesmerized-by-wested-arin-the-ultimate-muse',
                'title' => 'Mesmerized by wested_arin: The Ultimate Muse',
                'description' => "🌸 — a quiet glimpse of wested_arin in motion — the muse, effortlessly enchanting ~~ !! 🐇\r\nhttps://www.youtube.com/@wested_arin908, your new fave <3",
                'image_path' => null,
                'created_at' => '2025-03-26 01:29:09',
                'updated_at' => '2025-09-13 22:08:22',
                'user_id' => 1,
            ],
            [
                'id' => 38,
                'slug' => 'the-simple-life-paris-nicole-s-legendary-era',
                'title' => 'The Simple Life: Paris & Nicole\'s Legendary Era',
                'description' => 'Iconic. Hilarious. Real. Paris Hilton and Nicole Richie gave us The Simple Life, a show that not only captured the chaos of \'normal life\' but turned it into an unforgettable series of legendary moments. These two brought a special kind of magic to TV, effortlessly blending humor, glamour, and realness. From farm life to luxury, their adventures will always be remembered as a defining moment of 2000s pop culture. Paris and Nicole forever—an iconic duo we\'ll never forget.',
                'image_path' => null,
                'created_at' => '2025-03-26 01:29:47',
                'updated_at' => '2025-09-13 21:26:00',
                'user_id' => 1,
            ],
            [
                'id' => 39,
                'slug' => 'mis-teeq-brings-the-glam-to-hello-kitty-s-30th-birthday-bash-2',
                'title' => 'Mis-Teeq Brings the Glam to Hello Kitty\'s 30th Birthday Bash 🎉',
                'description' => 'Fashion appreciation post 💋 Mis-Teeq absolutely slayed at the Hello Kitty Celebrates 30 Years of Cute event at Rockefeller Center in New York, 2004! From their bold looks to their undeniable style, these queens brought the energy and effortlessly captured the vibe of this iconic celebration. A moment to remember in both fashion and fun! ✨ #MisTeeq #HelloKitty #FashionGoals',
                'image_path' => null,
                'created_at' => '2025-03-26 01:30:26',
                'updated_at' => '2025-09-13 21:06:58',
                'user_id' => 1,
            ],
            [
                'id' => 40,
                'slug' => 'the-peace-in-solitude-embracing-the-joy-of-being-alone',
                'title' => 'The Peace in Solitude: Embracing the Joy of Being Alone',
                'description' => 'In a world that often celebrates constant connection, it\'s easy to forget the serenity that comes with solitude. This image reminds us that being alone isn\'t synonymous with boredom—it\'s an opportunity to find peace within. Every day, we realize that moments of solitude are not empty but rather filled with clarity, reflection, and tranquility. Embrace the quiet and discover the beauty in the stillness of your own company.',
                'image_path' => null,
                'created_at' => '2025-03-26 01:32:18',
                'updated_at' => '2025-09-13 21:45:25',
                'user_id' => 1,
            ],
            [
                'id' => 41,
                'slug' => 'the-timeless-bond-hubert-de-givenchy-audrey-hepburn',
                'title' => 'The Timeless Bond: Hubert de Givenchy & Audrey Hepburn',
                'description' => "The iconic partnership between French couturier Hubert de Givenchy and Hollywood legend Audrey Hepburn began in 1954, marking the start of one of fashion's most enduring and celebrated designer-muse relationships. It all began during the filming of Sabrina, when Audrey visited Givenchy's Paris atelier to discuss the possibility of wearing his designs for the film.\r\n\r\nAt the time, Givenchy, just 26 years old and working tirelessly on his fourth collection, was expecting a visit from Katharine Hepburn, a far more established movie star. Instead, Audrey arrived, bringing with her an effortless elegance that would become synonymous with Givenchy's creations. Their bond would grow from a professional partnership to a deeply personal friendship that would last a lifetime.\r\n\r\nAudrey Hepburn's most iconic moments, particularly in Breakfast at Tiffany's (1961), were defined by Givenchy's designs. The legendary little black dress from the film's opening sequence remains one of the most celebrated fashion moments in history. Hepburn's choice to wear Givenchy wasn't just for red carpets—it was a relationship built on trust and admiration, leading to Givenchy designing her wedding dress for her second marriage to Andrea Dotti in 1969.\r\n\r\nBefore her death, Hepburn gave Givenchy a navy blue quilted coat, telling him, \"When you are sad, wear this and it will give you courage.\" Even decades after her passing, Givenchy recalled the moment with deep emotion, saying, \"From Geneva to Paris, I wept in the jacket she had given me.\"\r\n\r\nFrom their first meeting in 1954 to their enduring friendship, Audrey Hepburn and Hubert de Givenchy crafted not just iconic looks but a legacy. Hepburn's beauty, grace, and elegance were timelessly reflected in Givenchy's designs, forever shaping the world of fashion. Together, they created a partnership that transcended fashion, becoming an indelible part of both cinematic and sartorial history.",
                'image_path' => null,
                'created_at' => '2025-03-26 01:32:50',
                'updated_at' => '2025-09-13 21:15:05',
                'user_id' => 1,
            ],
            [
                'id' => 43,
                'slug' => 'soft-steps-gentle-stares',
                'title' => 'Soft Steps & Gentle Stares ۶ৎ𐂂',
                'description' => 'a quiet gaze through the trees, dewdrops on lashes, the hush of the forest wrapping around you like lace. soft ears twitch, a heart that beats like falling petals—this is the deer girl, delicate but never lost. 𖦹₊˚⊹♡',
                'image_path' => null,
                'created_at' => '2025-03-26 06:22:36',
                'updated_at' => '2025-09-13 22:40:19',
                'user_id' => 1,
            ],
        ];

        // Insert posts
        DB::table('posts')->insert($posts);

        // Insert post media relationships
        $postMedia = [
            ['id' => 1, 'post_id' => 32, 'file_path' => 'post_media/PVEs4bNlRIOyk5ihUZsPVVqVQWjKa2xVIpOFCgzV.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 20:58:45', 'updated_at' => '2025-09-13 20:58:45', 'position' => null],
            ['id' => 3, 'post_id' => 23, 'file_path' => 'post_media/m9EMuIxtCEGRzd0bENcQONoRGn8w07VjxxRRRLFm.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:04:42', 'updated_at' => '2025-09-13 21:04:42', 'position' => null],
            ['id' => 4, 'post_id' => 39, 'file_path' => 'post_media/nPOOesV78K1az6uQ2dcgzKBlWcGtCDzU2dOc6pFS.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:06:58', 'updated_at' => '2025-09-13 21:06:58', 'position' => null],
            ['id' => 5, 'post_id' => 25, 'file_path' => 'post_media/gD9U2iMcQrKIKkFbwzZcvzkjA0HIlkhhbobB7uqh.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 6, 'post_id' => 25, 'file_path' => 'post_media/CLhN6av1hOeKluj4azkzO5QUrleUxl4yEQQH7scd.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 7, 'post_id' => 25, 'file_path' => 'post_media/zMMEnRftUI7UZjdnO1PTIsfVWS8txJONlpuloAFv.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 8, 'post_id' => 25, 'file_path' => 'post_media/AGJIBrvj7am7P4ZGDvkSmU8pWdYNAK4TavKxTqRY.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 9, 'post_id' => 25, 'file_path' => 'post_media/AlaGCihztKQJ1sV7Y8b81goKaZVmPVxhgGaszxKQ.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 10, 'post_id' => 25, 'file_path' => 'post_media/RaXWvbHH8skzvyQEH1fPGeqloW0CCrsDHOJZ4OyU.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 11, 'post_id' => 25, 'file_path' => 'post_media/AAtUG9HXlSNsn5rfV0nPgqF8ttVafPD48eYmfVJ7.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 12, 'post_id' => 25, 'file_path' => 'post_media/5gcdyy30mb8S8zENmH5RlFzAYyTnd5Hvu8Cxdd9P.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:11:36', 'updated_at' => '2025-09-13 21:11:36', 'position' => null],
            ['id' => 13, 'post_id' => 41, 'file_path' => 'post_media/urbXHmORzrn6X678bwBYMsx3nwyp2EcsDa1PUyU9.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 14, 'post_id' => 41, 'file_path' => 'post_media/lVpHstZrwBHemRUoTEWBxuQa144GMsZ2wIYdqnAo.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 15, 'post_id' => 41, 'file_path' => 'post_media/e0gn1v8Mxoxp2eC9FNAeq7UDwv9Q2grTnrhMwpmS.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 16, 'post_id' => 41, 'file_path' => 'post_media/RTM6FHP54YdMcW3eW4IVTdmGzUIn9T3Tu6RS8Js1.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 17, 'post_id' => 41, 'file_path' => 'post_media/7ywlnhKGmFo5vbbExTGmmdBaLn69xgxwqQcrI4wX.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 18, 'post_id' => 41, 'file_path' => 'post_media/g2GkaMaSC0fkciJPsvHFQppBNoUlBH3cNQgBqiA2.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:15:05', 'updated_at' => '2025-09-13 21:15:05', 'position' => null],
            ['id' => 19, 'post_id' => 38, 'file_path' => 'post_media/4HeWFVzSvctwuMcRoEHDCHSSdvjihm1r3DFZXwcr.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:25:20', 'updated_at' => '2025-09-13 21:25:51', 'position' => 1],
            ['id' => 20, 'post_id' => 38, 'file_path' => 'post_media/Xwvetzsp0s1uVR6Jwnkg3I8mDii3LixpkTenWNHN.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:25:20', 'updated_at' => '2025-09-13 21:25:51', 'position' => 2],
            ['id' => 22, 'post_id' => 38, 'file_path' => 'post_media/ahAOiCFMFOZiNbaODIU4BWhob4iZuJkhFFFA0m6T.mp4', 'file_type' => 'video', 'created_at' => '2025-09-13 21:25:20', 'updated_at' => '2025-09-13 21:25:51', 'position' => 4],
            ['id' => 23, 'post_id' => 38, 'file_path' => 'post_media/RRPcR1zcAKPg3z8W2gwRCn0g53Csj4AmA2awiYvm.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:25:20', 'updated_at' => '2025-09-13 21:25:51', 'position' => 5],
            ['id' => 24, 'post_id' => 38, 'file_path' => 'post_media/Vn1MQRLvUfGHXEx64eaGQ64JwF7Fhz7KEWicsBgA.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:25:43', 'updated_at' => '2025-09-13 21:25:51', 'position' => 0],
            ['id' => 25, 'post_id' => 31, 'file_path' => 'post_media/WQ3MXEYGPaVix4QO6eMmWgd9SUlLxLEDL2dEXm37.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:26:34', 'updated_at' => '2025-09-13 21:26:34', 'position' => null],
            ['id' => 26, 'post_id' => 27, 'file_path' => 'post_media/SG6F1enmNwDHwA8w589RgjrpBET44rKAKjhl6EtR.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:33:06', 'updated_at' => '2025-09-13 21:33:06', 'position' => null],
            ['id' => 27, 'post_id' => 27, 'file_path' => 'post_media/qnYX67QZ52ueXm1SYNNOU4PKyH0GK4ATBCpKu4Eh.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:33:06', 'updated_at' => '2025-09-13 21:33:06', 'position' => null],
            ['id' => 28, 'post_id' => 27, 'file_path' => 'post_media/n2arqAGVRE4h1BsUnPC9eNOQZQEuVjjFqBq8Z1rC.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:33:06', 'updated_at' => '2025-09-13 21:33:06', 'position' => null],
            ['id' => 29, 'post_id' => 27, 'file_path' => 'post_media/sWcUBCqBk2xoFZd66cAAn8pgiCezB7wbjHd2citu.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:33:06', 'updated_at' => '2025-09-13 21:33:06', 'position' => null],
            ['id' => 30, 'post_id' => 22, 'file_path' => 'post_media/cIAmcMA2R9zCh6diY5KYQSvsDwAgSTQJiZbdkOkn.png', 'file_type' => 'image', 'created_at' => '2025-09-13 21:38:05', 'updated_at' => '2025-09-13 21:38:05', 'position' => null],
            ['id' => 31, 'post_id' => 22, 'file_path' => 'post_media/LTGO9lDYV81jmUshomqT4mx5aB24VPVr4XOKiqQR.png', 'file_type' => 'image', 'created_at' => '2025-09-13 21:38:05', 'updated_at' => '2025-09-13 21:38:05', 'position' => null],
            ['id' => 32, 'post_id' => 22, 'file_path' => 'post_media/rjS2P87ZyIweQr67VrqY1aDulycWCZstvvxRSUIv.png', 'file_type' => 'image', 'created_at' => '2025-09-13 21:38:05', 'updated_at' => '2025-09-13 21:38:05', 'position' => null],
            ['id' => 33, 'post_id' => 22, 'file_path' => 'post_media/RYJOnloupGqGV8ARwsdhrkI6CYASF6kAsNuwrllw.png', 'file_type' => 'image', 'created_at' => '2025-09-13 21:38:05', 'updated_at' => '2025-09-13 21:38:05', 'position' => null],
            ['id' => 34, 'post_id' => 33, 'file_path' => 'post_media/yLpLT5NBWdfCO6hH3r3X6D1pdz9w55I2KLESeXKv.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:39:45', 'updated_at' => '2025-09-13 21:39:55', 'position' => 1],
            ['id' => 35, 'post_id' => 33, 'file_path' => 'post_media/1TowwMj3T9Bp3s8nDJ9vBP91PHI5pXbQgvAwSpy4.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:39:45', 'updated_at' => '2025-09-13 21:39:55', 'position' => 2],
            ['id' => 36, 'post_id' => 33, 'file_path' => 'post_media/hj74FylZ2jjb0KGppgP4c0JrtHA4rZwZSLjfNClz.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:39:45', 'updated_at' => '2025-09-13 21:39:55', 'position' => 0],
            ['id' => 37, 'post_id' => 34, 'file_path' => 'post_media/f0dImhxWVyQBi5zcz1fK8FLfFnkxkXSDj6HRcn87.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:41:06', 'updated_at' => '2025-09-13 21:41:17', 'position' => 0],
            ['id' => 38, 'post_id' => 34, 'file_path' => 'post_media/nrkBbeXHjrkl5FzJYExAZmA13mcGVUtC4MdtEIpH.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:41:06', 'updated_at' => '2025-09-13 21:41:17', 'position' => 2],
            ['id' => 39, 'post_id' => 34, 'file_path' => 'post_media/EpnD84WoS7pth5NOvUZa81WM0Kz7CNvrIBns4zRL.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:41:06', 'updated_at' => '2025-09-13 21:41:17', 'position' => 1],
            ['id' => 40, 'post_id' => 34, 'file_path' => 'post_media/R6alKul4lmG2Zf5fhf2tvSBtxRffHwaJ9WMbQwv6.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:41:06', 'updated_at' => '2025-09-13 21:41:17', 'position' => 3],
            ['id' => 41, 'post_id' => 40, 'file_path' => 'post_media/VZ7iO8hiSVKKthcjnKynAl6xo8JacsrbZHhUrOhG.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 21:45:25', 'updated_at' => '2025-09-13 21:45:25', 'position' => null],
            ['id' => 42, 'post_id' => 37, 'file_path' => 'post_media/AnD9Z0V9Flkps7OV8UjO9WG7iT8HodBiIlHWHk0L.mp4', 'file_type' => 'video', 'created_at' => '2025-09-13 22:08:22', 'updated_at' => '2025-09-13 22:08:22', 'position' => null],
            ['id' => 45, 'post_id' => 26, 'file_path' => 'post_media/kFuOAkArq8WdPrw5m78HCWsPs6uJXKTQsLaDQrgp.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:12:18', 'updated_at' => '2025-09-13 22:12:18', 'position' => null],
            ['id' => 47, 'post_id' => 43, 'file_path' => 'post_media/t3oiwjj8ASFqNjqk2IyEw0BpUsCF7h7dyZqYac9j.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:20:58', 'updated_at' => '2025-09-13 22:40:16', 'position' => 0],
            ['id' => 48, 'post_id' => 43, 'file_path' => 'post_media/6esrzBORW20nBWGkCUb2swRXyPdRXIty1ODuFsdf.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:20:58', 'updated_at' => '2025-09-13 22:40:16', 'position' => 7],
            ['id' => 49, 'post_id' => 43, 'file_path' => 'post_media/4EU8cdzv9Px2ETIxbF3DyebmBWdVHhXRn7b4EIB1.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:20:58', 'updated_at' => '2025-09-13 22:40:16', 'position' => 3],
            ['id' => 50, 'post_id' => 43, 'file_path' => 'post_media/llg5A3dlzpxXO7h0CIVJtbaaveuMG3i2wixB3f1N.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:33:26', 'updated_at' => '2025-09-13 22:40:16', 'position' => 5],
            ['id' => 52, 'post_id' => 43, 'file_path' => 'post_media/kKbFSzLuBDtnW0WXESbr0R09CArqSjwIGVlOq8kp.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:33:55', 'updated_at' => '2025-09-13 22:40:16', 'position' => 1],
            ['id' => 53, 'post_id' => 43, 'file_path' => 'post_media/AYwh0nPBUX5Qgsh98pIvwrHBNbgzDm8XrM2i0GRc.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:33:55', 'updated_at' => '2025-09-13 22:40:16', 'position' => 6],
            ['id' => 54, 'post_id' => 43, 'file_path' => 'post_media/uhiZRUJkJpYwyAkGHKuopXNniPHXPI01vOhwgEnY.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:33:55', 'updated_at' => '2025-09-13 22:40:16', 'position' => 2],
            ['id' => 56, 'post_id' => 43, 'file_path' => 'post_media/cV8FFyM12MpLEyzeJUL4fjV6tYyxRiRpfiHL4AsP.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:37:03', 'updated_at' => '2025-09-13 22:40:16', 'position' => 4],
            ['id' => 57, 'post_id' => 43, 'file_path' => 'post_media/ONsrL7bfJrGjBtlwiybY2MqokTHCDVhdhOxRsNAM.jpg', 'file_type' => 'image', 'created_at' => '2025-09-13 22:40:01', 'updated_at' => '2025-09-13 22:40:16', 'position' => 8],
        ];

        // Insert post media
        DB::table('post_media')->insert($postMedia);

        $this->command->info('Blog posts and media seeded successfully!');
    }
}
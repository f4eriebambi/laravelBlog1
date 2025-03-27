# Fashion, Fragrance, and All Things Pretty ⊹ ࣪ ˖

## 𐦍 Project by  
Favour James Ayeye ★ 𓂃 ࣪˖ ִֶָ𐀔

## offduty ⋆｡☆ faerie Overview  
A digital dreamscape of fashion musings and the softest trails of perfume made in the form of a Laravel log.

✦ Showcasing fragrance pairing, application and style narratives  
✦ Interactive 'Virtual Perfume Mixer' experience  
✦ Visually rich moodboards and style guides  

## ۶ৎ𐂂 Project Tagline  
"Fashion, Fragrance and All Things Pretty ~~ !!"

## 𓂃 About the Blog  
This is my digital dreamscape - part moodboard, part perfume journal, wholly inspired by:  
🌸 Tumblr's dreamy aesthetics  
🌸 My meticulously curated Pinterest feed  
🌸 Media sourced from across both platforms and Twitter

♡・・・・・・♡・・・・・・♡・・・・・・♡

## 🌸 Repository
https://github.com/f4eriebambi/laravelBlog1

## 🚀 Key Features

### 1. Virtual Fragrance Mixer 🐇
! Authentication Note: Create blends anonymously, but must login to save to your Wardrobe
+ Core Experience:
- Craft custom perfume blends ♡  
- Combine 3 notes from the scent categories:  
  ✦ Floral  ✦ Citrus  ✦ Fruity  
  ✦ Gourmand  ✦ Woody  ✦ Spicy  
- Real-time color-changing perfume bottle
- SweetAlert modals to login for saving and with perfume recommendations
- Personalized Fragrance Wardrobe for saved blends

### 2. Fragrance Wardrobe 🌸
+ Your Collection:
- Stores up to 6 saved blends
- Color-coded perfume bottles
- One-click removal
- Purchase links for recommended perfumes

### 3. Content Collections ★
- Fashion Diaries 𓂃  
- Scent Stories ࣪˖  
- Monthly Perfume 🌙  
- Visual Moodboards ִֶָ

♡・・・・・・♡・・・・・・♡・・・・・・♡

## ⚙️ Technical Specifications
- Framework: Laravel 8
- Frontend: Tailwind CSS
- Database: MySQL
- Key Packages: 
    ✦ Dynamic bottle fills (CSS clip-path)
    ✦ Color gradient generation
    ✦ Blend recommendation system

## ✅ Prerequisites
- PHP 7.3+ ࣪  (miniumum)
- Composer ˖  
- Node.js 12.13.0+ 𓂃  (miniumum)
- MySQL 5.7+ ִֶָ  (via XAMPP recommended)

## 📥 Installation ⋆｡☆
1. Download Zip:
Click "Code" → "Download ZIP" on GitHub
Unzip to: C:\xampp\htdocs\laravelBlog1

・・・・・・・・・OR・・・・・・・・・

1. Clone repository:
git clone https://github.com/f4eriebambi/laravelBlog1.git
cd laravelBlog1

2. Install dependencies:
composer install
npm install

3. Configure environment:
cp .env.example .env
php artisan key:generate

4. Database setup:
mysql -u root -p -e "CREATE DATABASE laravelblog"

5. Update .env:
DB_DATABASE=laravelblog
DB_USERNAME=root
DB_PASSWORD=your_password

6. Finalize:
php artisan migrate --seed
php artisan serve
npm run dev

♡・・・・・・♡・・・・・・♡・・・・・・♡

🌸 First-Time User Guide
1. Visit http://localhost:8000/perfume-mixer
2. Try blending:
    ✦ Select 3 notes → Click "Mix"
    ✦ See your custom creation
4. Register to save blends
5. View saved scents in "Fragrance Wardrobe"

## 🌸 Testing Flow
1. Visit /perfume-mixer as guest  
2. Create test blend → saving to 'Fragrance Wardrobe' triggers:  
   if (!auth) SweetAlert('Login to save blends!')
3. Login/register → Blend saves to Wardrobe
4. Verify in database: user_blends table

📞 Troubleshooting
- Port 8000 busy? Use:
    ✦ php artisan serve --port=8080
- Node.js errors? 
    ✦ Reinstall Node v12
- White screen? Run:
    ✦ php artisan cache:clear
    ✦ php artisan view:clear
    ✦ php artisan route:clear
    ✦ php artisan config:clear

## 𐦍 Project Roots  
✦ Visual DNA: Tumblr's soft grunge  
✦ Content Muse: Pinterest + Tumblr + Twitter
✦ Developed with: Laravel 8 + Tailwind CSS  
✦ Special Thanks: SweetAlert2 for beautiful modals

♡・・・・・・♡・・・・・・♡・・・・・・♡

### offduty ⋆｡☆ faerie Final Note  
⋆｡☆ Thank you for taking your time to read! I hope you enjoy the application. Every blend tells a story—what will yours say?" ✨
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
- PHP 7.3+ ࣪  (minimum)
- Composer ˖  
- Node.js 12.13.0+ 𓂃  (minimum)
- MySQL 5.7+ ִֶָ  (via XAMPP recommended)

## 📥 Installation ⋆｡☆

### Option 1: Download ZIP
1. Click "Code" → "Download ZIP" on GitHub
2. Unzip to your web server directory (e.g. for XAMPP):
```bash
C:\xampp\htdocs\laravelBlog1
```

### Option 2: Clone Repository
```
git clone https://github.com/f4eriebambi/laravelBlog1.git
cd laravelBlog1
```

### Install Dependencies
Run these commands in your project directory:
```
composer install
npm install
```

### Environment Setup
1. Copy the example environment file and create your `.env` configuration:
```
cp .env.example .env
```

2. Generate your application encryption key:
```
php artisan key:generate
```

### Database Configuration
1. Create a MySQL database:
```
mysql -u root -p -e "CREATE DATABASE laravelblog"
```

2. Update your `.env` file with:
```
DB_DATABASE=laravelblog
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Final Setup
Run these commands to complete installation:
```
php artisan migrate --seed
php artisan storage:link
php artisan serve
npm run dev
npm run watch
```

♡・・・・・・♡・・・・・・♡・・・・・・♡

## 🌸 First-Time User Guide
1. Visit ```http://localhost:8000/perfume-mixer```
2. Try blending:
    ✦ Select 3 notes → Click "Mix"
    ✦ See your custom creation
3. Register to save blends
4. View saved scents in "Fragrance Wardrobe"

## 🌸 Testing Flow
1. Visit `/perfume-mixer` as guest  
2. Create test blend → saving to 'Fragrance Wardrobe' triggers:  
   ```if (!auth) SweetAlert('Login to save blends!')```
3. Login/register → Blend saves to Wardrobe
4. Verify in database: ```user_blends``` table

## 📞 Troubleshooting
- **Port 8000 busy?** Use:
```
php artisan serve --port=8080
```

- **Node.js errors?** 
```
nvm install 12
nvm use 12
```

- **White screen?** Run:
```
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

## 𐦍 Project Roots  
✦ Visual DNA: Tumblr's soft grunge  
✦ Content Muse: Pinterest + Tumblr + Twitter
✦ Developed with: Laravel 8 + Tailwind CSS  
✦ Special Thanks: SweetAlert2 for beautiful modals

♡・・・・・・♡・・・・・・♡・・・・・・♡

### offduty ⋆｡☆ faerie Final Note  
⋆｡☆ Thank you for taking your time to read! I hope you enjoy the application. Every blend tells a story—what will yours say?" ✨
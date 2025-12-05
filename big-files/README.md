# 🎵 Laravel Simple Music Upload System

This is a lightweight Laravel project that allows users to upload music files
and store only the **file path** in the database.  
It supports MP3, WAV, and M4A audio files up to **500MB**.

---

## 📁 Features

- Upload music files using a basic Laravel form  
- Files stored in: `storage/app/public/songs/`
- File path stored in database (not the file itself)
- View all uploaded songs in a list  
- Built-in HTML5 audio player  
- No JavaScript upload library needed  
- Clean, simple, and reliable system  

---

## CHANGE YOUR PHP.IN TO

- upload_max_filesize = 500M
- post_max_size = 500M
- memory_limit = 1024M
- max_execution_time = 300
- max_input_time = 300

---

## 📦 Requirements

- PHP 8+
- Laravel 10 or 11+
- MySQL / MariaDB
- Composer Installed

---

## 🛠 Installation

### 1. Clone the project

```sh
git clone your-project-url
cd your-project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
[web](http://127.0.0.1:8000)

---



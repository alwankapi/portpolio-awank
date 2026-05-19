# Portfolio Template - Dokumentasi Lengkap

## 📋 Daftar Isi

1. [Pengenalan](#pengenalan)
2. [Fitur Utama](#fitur-utama)
3. [Teknologi yang Digunakan](#teknologi-yang-digunakan)
4. [Struktur Project](#struktur-project)
5. [Instalasi](#instalasi)
6. [Konfigurasi](#konfigurasi)
7. [Penggunaan](#penggunaan)
8. [Panel Admin](#panel-admin)
9. [Customization](#customization)
10. [Deployment](#deployment)
11. [Troubleshooting](#troubleshooting)

---

## 🎯 Pengenalan

Portfolio Template adalah aplikasi web modern yang dibangun dengan Laravel 13 dan Tailwind CSS 4, dirancang khusus untuk developer yang ingin memiliki portfolio website profesional dengan panel admin yang mudah digunakan.

Template ini menampilkan:
- Hero section dengan typewriter effect
- Showcase skills, projects, experience, dan certificates
- Contact form yang terintegrasi
- Dark/Light mode
- Responsive design
- Smooth animations dan transitions
- Panel admin untuk mengelola konten

---

## ✨ Fitur Utama

### Frontend (Public)
- **Hero Section**: Animasi typewriter dengan multiple roles
- **About Section**: Profil singkat dengan statistik counter
- **Skills Section**: Kategorisasi skills dengan progress bar
- **Projects Section**: Grid showcase projects dengan tags
- **Experience Section**: Timeline pengalaman kerja
- **Certificates Section**: Display sertifikat profesional
- **Contact Form**: Form kontak dengan validasi
- **Dark/Light Mode**: Toggle tema dengan smooth transition
- **Smooth Scrolling**: Navigasi smooth ke setiap section
- **Responsive Design**: Optimal di semua device

### Backend (Admin Panel)
- **Dashboard**: Overview statistik konten
- **Projects Management**: CRUD projects dengan upload gambar
- **Skills Management**: CRUD skills dengan kategori
- **Experience Management**: CRUD pengalaman kerja
- **Certificates Management**: CRUD sertifikat
- **Messages Inbox**: Lihat dan kelola pesan dari contact form
- **Authentication**: Login/logout dengan session

---

## 🛠 Teknologi yang Digunakan

### Backend
- **Laravel 13.7**: PHP framework
- **PHP 8.3**: Programming language
- **MySQL/SQLite**: Database

### Frontend
- **Tailwind CSS 4.0**: Utility-first CSS framework
- **Alpine.js 3.15**: Lightweight JavaScript framework
- **Vite 8.0**: Build tool dan dev server

### Development Tools
- **Laravel Pint**: Code style fixer
- **Laravel Pail**: Log viewer
- **Concurrently**: Run multiple commands

---

## 📁 Struktur Project

```
portfolio-template/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php          # Public homepage
│   │   │   ├── AuthController.php          # Authentication
│   │   │   └── Admin/                      # Admin controllers
│   │   │       ├── DashboardController.php
│   │   │       ├── ProjectController.php
│   │   │       ├── SkillController.php
│   │   │       ├── ExperienceController.php
│   │   │       ├── CertificateController.php
│   │   │       └── MessageController.php
│   │   └── Requests/                       # Form validation
│   └── Models/                             # Eloquent models
│       ├── Project.php
│       ├── Skill.php
│       ├── Experience.php
│       ├── Certificate.php
│       └── Message.php
├── database/
│   └── migrations/                         # Database schema
├── public/
│   └── storage/                            # Symlink untuk uploaded files
├── resources/
│   ├── css/
│   │   └── app.css                         # Tailwind styles
│   ├── js/
│   │   └── app.js                          # Alpine.js components
│   └── views/
│       ├── home.blade.php                  # Homepage
│       ├── auth/                           # Login page
│       ├── admin/                          # Admin views
│       └── components/                     # Reusable components
├── routes/
│   └── web.php                             # Route definitions
├── storage/
│   └── app/
│       └── public/                         # File uploads
├── .env.example                            # Environment template
├── composer.json                           # PHP dependencies
├── package.json                            # Node dependencies
├── tailwind.config.js                      # Tailwind configuration
└── vite.config.js                          # Vite configuration
```

---

## 🚀 Instalasi

### Prerequisites
- PHP >= 8.3
- Composer
- Node.js >= 18
- MySQL/SQLite
- Git

### Langkah Instalasi

1. **Clone repository**
```bash
git clone <repository-url>
cd portfolio-template
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi database**

Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

Atau gunakan SQLite:
```env
DB_CONNECTION=sqlite
# DB_HOST, DB_PORT, DB_DATABASE, dll bisa di-comment
```

5. **Jalankan migrasi**
```bash
php artisan migrate
```

6. **Buat storage symlink**
```bash
php artisan storage:link
```

7. **Build assets**
```bash
npm run build
```

8. **Jalankan development server**
```bash
composer run dev
```

Atau jalankan secara terpisah:
```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Aplikasi akan berjalan di `http://localhost:8000`

---

## ⚙️ Konfigurasi

### Database Seeder (Opsional)

Buat seeder untuk data dummy:

```bash
php artisan make:seeder DatabaseSeeder
```

Edit `database/seeders/DatabaseSeeder.php`:

```php
public function run(): void
{
    // Create admin user
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
    ]);

    // Create sample skills
    Skill::create([
        'name' => 'Laravel',
        'category' => 'backend',
        'proficiency' => 90,
        'icon' => 'laravel-icon.svg',
    ]);

    // ... tambahkan data lainnya
}
```

Jalankan seeder:
```bash
php artisan db:seed
```

### Environment Variables

Konfigurasi penting di `.env`:

```env
APP_NAME="Portfolio"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Mail Configuration (untuk contact form)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 📖 Penggunaan

### Membuat User Admin

```bash
php artisan tinker
```

```php
User::create([
    'name' => 'Your Name',
    'email' => 'your@email.com',
    'password' => bcrypt('your-password')
]);
```

### Akses Admin Panel

1. Buka `http://localhost:8000/login`
2. Login dengan kredensial yang dibuat
3. Akses admin panel di `http://localhost:8000/admin`

### Mengelola Konten

#### Projects
- Tambah project baru dengan gambar, deskripsi, dan tags
- Set project sebagai featured
- Tambahkan link demo dan repository

#### Skills
- Kategorikan skills (backend, frontend, tools, dll)
- Set proficiency level (0-100)
- Upload icon untuk setiap skill

#### Experience
- Tambahkan pengalaman kerja dengan periode
- Tandai posisi yang masih aktif
- Deskripsi tanggung jawab

#### Certificates
- Upload sertifikat dengan credential ID
- Tambahkan link verifikasi
- Set tanggal issued dan expired

#### Messages
- Lihat pesan dari contact form
- Tandai sebagai read/unread
- Hapus pesan yang tidak diperlukan

---

## 🎨 Customization

### Mengubah Warna Tema

Edit `resources/css/app.css`:

```css
@theme {
    --color-accent-500: #6366f1; /* Ubah warna accent */
    --color-dark-800: #1e1e1e;   /* Ubah warna dark mode */
}
```

### Mengubah Konten Hero

Edit `resources/views/home.blade.php`:

```blade
<h1>
    Hi, I'm <span class="text-gradient">Your Name</span>
    <br>
    <span x-data="typewriter(['Your Role 1', 'Your Role 2'])">
</h1>
```

### Menambah Section Baru

1. Buat component di `resources/views/components/`
2. Include di `home.blade.php`
3. Tambahkan route di navbar

### Custom Alpine.js Components

Edit `resources/js/app.js`:

```javascript
// Tambah component baru
Alpine.data('yourComponent', () => ({
    // Your logic here
}));
```

### Mengubah Font

Edit `resources/css/app.css`:

```css
@import url('https://fonts.googleapis.com/css2?family=Your+Font&display=swap');

body {
    font-family: 'Your Font', sans-serif;
}
```

---

## 🚢 Deployment

### Persiapan Production

1. **Set environment ke production**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

2. **Optimize aplikasi**
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

3. **Set permissions**
```bash
chmod -R 755 storage bootstrap/cache
```

### Deploy ke Shared Hosting

1. Upload semua file kecuali `node_modules` dan `.git`
2. Arahkan document root ke folder `public`
3. Import database
4. Set environment variables di cPanel
5. Jalankan `php artisan storage:link`

### Deploy ke VPS (dengan Nginx)

1. **Install dependencies**
```bash
sudo apt update
sudo apt install php8.3 php8.3-fpm php8.3-mysql nginx composer
```

2. **Clone dan setup**
```bash
cd /var/www
git clone <repo-url> portfolio
cd portfolio
composer install --no-dev
npm install && npm run build
```

3. **Konfigurasi Nginx**
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/portfolio/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

4. **Set permissions**
```bash
sudo chown -R www-data:www-data /var/www/portfolio
sudo chmod -R 755 /var/www/portfolio/storage
```

5. **Setup SSL dengan Let's Encrypt**
```bash
sudo apt install certbot python3-certbot-nginx
sudo certbot --nginx -d yourdomain.com
```

---

## 🔧 Troubleshooting

### Error: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Error: Storage symlink tidak berfungsi
```bash
php artisan storage:link
```

### Error: Permission denied pada storage
```bash
chmod -R 775 storage bootstrap/cache
```

### Vite tidak bisa connect
Pastikan `APP_URL` di `.env` sesuai dengan URL development Anda.

### Dark mode tidak berfungsi
Clear browser cache dan pastikan JavaScript enabled.

### Upload gambar gagal
- Cek permission folder `storage/app/public`
- Pastikan symlink sudah dibuat
- Cek max upload size di `php.ini`

### CSS tidak ter-load setelah build
```bash
npm run build
php artisan view:clear
```

---

## 📝 Best Practices

1. **Selalu backup database** sebelum update
2. **Gunakan version control** (Git) untuk tracking changes
3. **Test di local** sebelum deploy ke production
4. **Optimize images** sebelum upload (gunakan WebP)
5. **Enable caching** di production
6. **Monitor error logs** secara berkala
7. **Update dependencies** secara rutin
8. **Gunakan HTTPS** di production

---

## 🤝 Contributing

Jika ingin berkontribusi:
1. Fork repository
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📄 License

Project ini menggunakan MIT License. Bebas digunakan untuk personal maupun komersial.

---

## 📞 Support

Jika ada pertanyaan atau issue:
- Buat issue di GitHub repository
- Email: your@email.com
- Documentation: [Link to docs]

---

**Happy Coding! 🚀**
# 🎨 Portfolio Template

> Modern, responsive portfolio website template built with Laravel 13 and Tailwind CSS 4

[![Laravel](https://img.shields.io/badge/Laravel-13.7-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.0-38B2AC?style=flat&logo=tailwind-css)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.15-8BC0D0?style=flat&logo=alpine.js)](https://alpinejs.dev)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat&logo=php)](https://php.net)

## ✨ Features

- 🎯 **Modern Design** - Clean, professional interface with smooth animations
- 🌓 **Dark/Light Mode** - Seamless theme switching with system preference detection
- 📱 **Fully Responsive** - Perfect experience on all devices
- ⚡ **Fast & Optimized** - Built with Vite for lightning-fast performance
- 🎨 **Customizable** - Easy to customize colors, fonts, and content
- 🔐 **Admin Panel** - Manage all content through intuitive dashboard
- 📧 **Contact Form** - Integrated contact form with validation
- 🎭 **Smooth Animations** - Engaging scroll animations and transitions

## 📋 What's Included

### Public Pages
- Hero section with typewriter effect
- About section with statistics
- Skills showcase with categories
- Projects portfolio grid
- Experience timeline
- Certificates display
- Contact form

### Admin Panel
- Dashboard with statistics
- Projects management (CRUD)
- Skills management (CRUD)
- Experience management (CRUD)
- Certificates management (CRUD)
- Messages inbox

## 🚀 Quick Start

### Prerequisites

- PHP >= 8.3
- Composer
- Node.js >= 18
- MySQL or SQLite

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/alwankapi/portpolio-awank.git
cd portfolio-awank
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

4. **Configure database**

Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations**
```bash
php artisan migrate
```

6. **Create storage link**
```bash
php artisan storage:link
```

7. **Build assets**
```bash
npm run build
```

8. **Start development server**
```bash
composer run dev
```

Visit `http://localhost:8000` 🎉


### Add Custom Sections

1. Create component in `resources/views/components/`
2. Include in `home.blade.php`
3. Add navigation link in navbar

## 📦 Project Structure

```
portfolio-template/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/               # Eloquent models
│   └── Requests/             # Form validations
├── database/
│   └── migrations/           # Database schema
├── resources/
│   ├── css/                  # Styles
│   ├── js/                   # JavaScript
│   └── views/                # Blade templates
├── routes/
│   └── web.php               # Route definitions
└── public/                   # Public assets
```

## 🚢 Deployment

### Production Optimization

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

### Deploy to Shared Hosting

1. Upload all files except `node_modules` and `.git`
2. Point document root to `public` folder
3. Import database
4. Set environment variables
5. Run `php artisan storage:link`

### Deploy to VPS

See [DOCUMENTATION.md](DOCUMENTATION.md) for detailed VPS deployment guide.

## 📚 Documentation

For detailed documentation, see [DOCUMENTATION.md](DOCUMENTATION.md)

Topics covered:
- Complete installation guide
- Configuration options
- Admin panel usage
- Customization guide
- Deployment strategies
- Troubleshooting

## 🛠 Built With

- [Laravel 13](https://laravel.com) - PHP Framework
- [Tailwind CSS 4](https://tailwindcss.com) - CSS Framework
- [Alpine.js 3](https://alpinejs.dev) - JavaScript Framework
- [Vite 8](https://vitejs.dev) - Build Tool

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 💬 Support

If you have any questions or need help:

- 📧 Email: alwankapi@gmail.com
- 🐛 Issues: [GitHub Issues](https://github.com/alwankapi/portfolio-awank/issues)
- 📖 Docs: [Documentation](DOCUMENTATION.md)

## ⭐ Show Your Support

Give a ⭐️ if this project helped you!

---

**Made with ❤️ by [awank.dev](https://github.com/alwankapi)**

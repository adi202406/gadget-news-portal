<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Gadget News Portal

A modern web application built with Laravel for sharing and discussing the latest gadget news and updates.

## Installation Guide

Follow these steps to set up the project locally:

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL or compatible database
- Git

### Installation Steps

1. Open your terminal and navigate to your desired project directory:
```bash
cd /path/to/your/directory
```

2. Clone the project repository:
```bash
git clone https://github.com/adi202406/gadget-news-portal.git
```

3. Navigate into the project directory:
```bash
cd gadget-news-portal
```

4. Open the project in Visual Studio Code:
```bash
code .
```

5. Install PHP dependencies using Composer:
```bash
composer install
```

6. Create environment file from example:
```bash
cp .env.example .env
```

7. Generate application key:
```bash
php artisan key:generate
```

8. Configure your database settings in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

9. Run database migrations:
```bash
php artisan migrate
```

10. Create storage symbolic link:
```bash
php artisan storage:link
```

11. Start the development server:
```bash
php artisan serve
```

Your application should now be running at `http://localhost:8000`

## Features

This Gadget News Portal includes:

- Latest gadget news and updates
- User authentication system
- News categorization
- Comments and discussions
- Responsive design
- Admin dashboard for content management

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- Simple, fast routing engine
- Powerful dependency injection container
- Multiple back-ends for session and cache storage
- Expressive, intuitive database ORM
- Database agnostic schema migrations
- Robust background job processing
- Real-time event broadcasting

## Learning Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [Laracasts](https://laracasts.com)

## Security Vulnerabilities

If you discover a security vulnerability within this application, please send an e-mail to project maintainers. All security vulnerabilities will be promptly addressed.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

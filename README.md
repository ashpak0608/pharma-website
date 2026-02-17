# Corran Pharma - Pharmaceutical Company Website

A professional pharmaceutical company website built with Laravel, featuring product management, admin panel, and inquiry system.

## Features

- 🏢 Company Information Pages (Home, About, Contact)
- 💊 Product Management System
- 📜 Certifications Gallery
- 📝 Contact Inquiry Form
- 🔐 Secure Admin Panel
- 📱 Fully Responsive Design

## Technology Stack

- **Framework:** Laravel
- **Database:** MySQL (phpMyAdmin)
- **Frontend:** Bootstrap 5, JavaScript
- **Server:** Linux Based (Deployment ready)

## Requirements

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Web Server (Apache/Nginx)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/pharma-website.git
   cd pharma-website


   Install dependencies

bash
composer install
Environment setup

bash
cp .env.example .env
php artisan key:generate
Database configuration

Create a MySQL database named pharma_db

Update .env file with database credentials

Run database migrations

bash
php artisan migrate
Create upload directories

bash
mkdir -p public/uploads/{categories,products,certificates}
chmod -R 755 public/uploads
Start the server

bash
php artisan serve
Access the website

Frontend: http://localhost:8000

Admin Panel: http://localhost:8000/admin/login

Default Admin: admin@pharma.com / admin123

Project Structure
text
pharma-website/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   └── Admin/
│   │   │       ├── AuthController.php
│   │   │       ├── CategoryController.php
│   │   │       ├── ProductController.php
│   │   │       └── ...
│   │   └── Middleware/
│   └── Models/
│       ├── Category.php
│       ├── Product.php
│       ├── Certificate.php
│       └── Inquiry.php
├── resources/
│   └── views/
│       ├── layouts/
│       ├── admin/
│       │   ├── layouts/
│       │   ├── categories/
│       │   ├── products/
│       │   └── ...
│       └── [frontend views]
├── routes/
│   └── web.php
├── public/
│   └── uploads/
│       ├── categories/
│       ├── products/
│       └── certificates/
└── [other Laravel files]
Features in Detail
Admin Panel
Secure login system

Dashboard with statistics

Category management (CRUD)

Product management (CRUD)

Certificate gallery management

Contact inquiry viewer

Website settings manager

Frontend Features
Responsive design

Product catalog by category

Product detail pages

Certification gallery

Contact form with validation

Company information pages

Database Schema
categories: id, name, slug, description, image, status

products: id, category_id, name, slug, composition, description, packaging, image, status

certificates: id, title, image, description

inquiries: id, name, email, phone, message, status

users: id, name, email, password, is_admin

settings: id, key_name, key_value

Deployment
Server Requirements
PHP 7.4 or higher

MySQL 5.7 or higher

Apache/Nginx web server

SSL certificate

Deployment Steps
Upload files to server

Configure .env file

Set proper permissions

Configure web server

Enable SSL

Test the website

Security Features
CSRF Protection

Password encryption

Secure admin authentication

Input validation

XSS protection

Support
For support, email info@supportindiatech.com or call +91 8898851830.

License
This project is proprietary software owned by Corran Pharma Pvt. Ltd.

Credits
Developed by SUPPORT INDIA TECH

Developer: Ashpak Shaikh

Website: [Coming Soon]

Email: info@supportindiatech.com

Project Timeline
Start Date: February 16, 2026

Developer: Ashpak Shaikh

Client: Corran Pharma Pvt. Ltd.

Changelog
Version 1.0.0 (February 17, 2026)
Initial release

Basic website structure

Admin panel implementation

Product management system

Contact form functionality

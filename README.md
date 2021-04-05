# Event App

Admin panel to see the scheduled events & manage add event for the users.

## Installation

First clone the respository in your system using following command

```bash
git clone https://github.com/shrutika16/boppo.git
```
Run composer install command to install dependency packages
```bash
composer install
```

Create your database in you machine and make a copy .env.example file and create a new .env file. And enter you database credentials.

Finnally run migrate artisan command to create database tables.
```bash
php artisan migrate
php artisan key:generate
```

Now add the seeder for dependency of the seat categories
```bash
php artisan db:seed --class=SeatCategoriesSeeder
php artisan db:seed --class=AdminUserSeeder
```
If not worked directly the seeder class dump all dependency then run seeder command
```bash
composer dump-autoload
```

Install packages throgh npm command and use npm watch to compile asset files.
```bash
npm install
npm run watch
```

Admin following credentials to login in admin panel:

```bash
URL : /admin/login
Email : demo@boppo.com
Password: 12345678
```

# Event App

Admin panel to see the scheduled events & manage add event for the users.

## Installation

First clone the respository in your system using following command

```bash
git clone https://github.com/shrutika16/boppo-task.git
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
```
if not worked directly the seeder class dump all dependency then run seeder command
```bash
 composer dumpautoload
```


Please make sure you have updated email service credentials inside .env file as forgot password feature sends an email with reset password link.

Please update tests as appropriate.

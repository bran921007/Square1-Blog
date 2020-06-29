<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## How to install

Clone the project

```
https://github.com/bran921007/Square1-Blog.git
```

Install Dependencies

```
Composer install
```

Copy the .env.example into .env

```
cp .env.example .env
```

Create the database 'square1-blog' (w/o quotes)


Run migrations

```
php artisan migrate
```

Run seeders in order to get the Admin user

```
php artisan db:seed
```

Admin credentials

```
email:    admin@admin.com
password: 12345678
```

Run the project

```
php artisan serve
```

## Configuration

The Auto Import will need two additional steps: 

1. Open the Queue Job server
```
php artisan queue:work
```

2. Run a cronjob hourly
```
php artisan schedule:run
```


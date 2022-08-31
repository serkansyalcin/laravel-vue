<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

This is a product catalogue having CRUD functionality
## Backend

* Language: PHP
* Framework: Laravel
* More: NodeJS (where required)

## Frontend

* CSS Framework: Bootstrap
* Framework: VueJS (used specifically)
* Backend Templates: Laravel's Blade Template Engine

## Development

* Requirements
  * PHP (recommended. 7.1.3, min: 7.1.3, can use: 7.1.x)
  * MySQL (min. 5.7.14)
  * Webserver software (Apache / NGinx etc)
  * GIT
* More requirements
  * Composer (for managing php dependecies)
* Installing dependencies
  * Run `composer install` for php dependencies.
  * Run `npm install` for nodejs dependencies.
* Environment variables (CONFIGURATION)
  * Copy file .env.example as .env
  * Update / add all variables in .env file. Like `APP_URL`, hostnameetc. Add / update mysql details also.
  * Run `php artisan key:generate` to generate your private secure `APP_KEY`. (used by laravel)
* Compiling assets
  * Run `npm run dev` to compile css and js assets
* Setting up database
  * To setup database tables, run the command
    `php artisan migrate:refresh` (This will flush all data and re-create all the structure)
* Things to remember
  * After making changes to .env (if any) or other config files, make sure to delete cached files and regenerate autoloader:
    * `php artisan cache:clear`
    * `composer dump-autoload` (needed for regenerating autoload file)
 * Storage folder public access
  * Link storage folder to public folder using `php artisan storage:link`


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



<hr>
<hr>

## How to Deploy This Repository
1. Install requirements: Laravel 8, PHP 8, MongoDB 4.2 
2. Clone this repository to your local | <span style="color: #14859B">$git clone hhttps://github.com/SallMarta/testbackend </span>
3. Copy & paste <span style="color: #EB913F">.env.example</span> then rename to <span style="color: #EB913F">.env</span>
4. Run in terminal and wait until finish <span style="color: #14859B">$composer install</span> or <span style="color:#14859B">$composer update</span>
5. Run in terminal and wait until finish <span style="color: #14859B">$php artian key:generate</span>
6. Run in terminal and wait until finish <span style="color: #14859B">$php artian migrate</span>
7. Run in terminal and wait until finish <span style="color: #14859B">$php artian serve</span>

<hr>
<hr>



php artisan make:migration create_penjualan_kendaraan_collection
php artisan make:migration create_motor_collection
php artisan make:migration create_mobil_collection
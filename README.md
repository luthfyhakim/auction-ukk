<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## INSTALLATION APP
`This project using laravel version 7`

### 1. Install PHP, Composer, and Yarn
- Download PHP https://www.php.net/downloads.php
- Download composer https://getcomposer.org/
- Download yarn https://classic.yarnpkg.com/en/
- Check if success install PHP and composer

```sh
php --version
```
```sh
composer --version
```
```sh
yarn --version
```

### 2. Clone Repository Project App
- Clone with `ssh`
    ```sh
    git@github.com:luthfyhakim/auction-ukk.git
    ```
- Clone with `https`
    ```sh
    https://github.com/luthfyhakim/auction-ukk.git
    ```

switch to the repo folder
```sh
cd auction-ukk
```

### 3. Install Dependencies
```sh
composer update
```
```sh
yarn install
```

### 4. Configure .env
```sh
cp .env.example .env
```
```sh
php artisan key:generate
```

### 5. Migrations Table
```sh
php artisan migrate --seed
```

### 6. Seeding laravolt
>Package Laravel yang berisi data Provinsi, Kabupaten / Kota, dan Kecamatan / Desa di seluruh Indonesia. https://github.com/laravolt/indonesia
```sh
php artisan laravolt:indonesia:seed
```

### 7. Running App
defaut host port running dev http://localhost:8000
```sh
php artisan serve
```

`Auction Ukk by luthfyhakim`
> Untuk memenuhi project UKK 2023 dengan kode soal `lelang` SMK Negeri 2 Trenggalek

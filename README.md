<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## After clone do this works
1. `composer install`

2. `composer run post-root-package-install`

3. `composer run post-create-project-cmd`

4. create database in mysql or postgresql

5. set .env DB_... params

6. `php artisan migrate --seed`

## If you use docker
1. Create `.env` file from `.env.example` file
2. Run ``docker compose up --build``
3. Enter `php` container and run following commands:
    - `composer install`
    - `composer run post-create-project-cmd`
    - `php artisan migrate --seed`
# Example Users

| Email                | Password  |
|----------------------|-----------|
| ivan@example.com     | pmp2025   |
| aleksey@example.com  | pmp2025   |
| andrey@example.com   | pmp2025   |
| sergey@example.com   | pmp2025   |

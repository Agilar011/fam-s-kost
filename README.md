<p align="center">
  <img src="./public/assets/img/logo-kos.svg" alt="The Kost" width="300">
</p>



## About The Kost

The Kost is a web application that is used to manage boarding houses. This application is made using the Laravel framework. This application is made to fulfill the final project of the web programming course.

## Installation

1. Clone the repository 
```sh
git clone https://github.com/alimurrofid/TheKost.git
```

2. Install Composer
```sh
composer install
```

3. Copy .env.example to .env
```sh
copy .env.example .env
```

4. Generate Key
```sh
php artisan key:generate
```

5. Create the symbolic link
```sh
php artisan storage:link
```

6. Migration database
```sh
php artisan migrate
```

7. Seeding database
```sh
php artisan db:seed
```

8. Run project
```sh
php artisan ser
```

9. Run php tunnel
```sh
php -S localhost:7000
```

10. Run ngrok
```sh
ngrok http localhost:7000
```

11. Run mailpit
```sh
mailpit
```
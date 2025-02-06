# User API menggunakan Laravel 11

## Deskripsi

API ini dibangun menggunakan framework Laravel dan menyediakan *endpoint* untuk CRUD data Users.

## Instalasi

1.  **Clone Repository:**

    ```bash
    git clone https://github.com/fadlananshari/users-api.git
    ```

2.  **Masuk ke Direktori Proyek:**

    ```bash
    cd users-api
    ```

3.  **Instal Dependencies:**

    ```bash
    composer install
    ```

4.  **Konfigurasi Environment:**

    *   Salin file `.env.example` menjadi `.env`.
    *   Buka file `.env` dan sesuaikan konfigurasi database, dll.
    *   Berikut isi file .env

PP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:9nN2nzrhmC1sYoDJQd0tBACf1WgkKksjYdJ7AQERym8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=users_api
DB_USERNAME=root
DB_PASSWORD=

L5_SWAGGER_GENERATE_ALWAYS=true
L5_FORMAT_TO_USE_FOR_DOCS=json

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"


5.  Import users_api.sql ke dalam database mysql local

## Menjalankan API

**Jalankan Server Pengembangan:**

    ```bash
    php artisan serve
    ```

    API Anda akan tersedia di `http://127.0.0.1:8000`.

## Dokumentasi API

Dokumentasi API tersedia di `http://127.0.0.1:8000/docs`

## Endpoint

Berikut adalah beberapa *endpoint* yang tersedia:

*   `GET /api/users`: Mengambil daftar pengguna.
*   `GET /api/users/{id}`: Mengambil pengguna berdasarkan ID.
*   `POST /api/users`: Membuat pengguna baru.
*   `PUT /api/users/{id}`: Memperbarui data pengguna.
*   `DELETE /api/users/{id}`: Menghapus pengguna.

## Testing Menggunakan Jest

1. **Masuk ke dalam direktori test-api**
    ```bash
    cd test-api
    ```

2. **Instalasi npm**
   ```bash
   npm install
   ```

3. **Jalankaan perintah testing**
   ```bash
   npm test
   ```

## Teknologi yang Digunakan

*   Laravel
*   PHP
*   Node.js

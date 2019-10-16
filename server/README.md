## Installation

1. Enter directory

```bash
cd server
```

2. Install composer dependencies

```bash
composer install
```

3. Generate key

```bash
php artisan key:generate
```

4. Configure .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=secret
```

5. Run migration

```bash
php artisan migrate
```

6. Create a passport client

```bash
php artisan passport:install
```

## Dependencies

-   [laravel/passport](https://github.com/laravel/passport)
-   [laravel/telescope](https://github.com/laravel/telescope) - for development
-   [laravolt/avatar](https://github.com/laravolt/avatar)

## Routes

**Authentication**

-   POST | api/v1/auth/login
-   POST | api/v1/auth/signup
-   GET | api/v1/auth/signup/activate/{token}
-   GET | api/v1/auth/user
-   GET | api/v1/auth/logout

**Password reset**

-   POST | api/v1/password/token/create
-   GET | api/v1/password/token/find/{token}
-   POST | api/v1/password/token/reset

**Seeding**

```bash
php artisan db:seed
```

```
user: root@root.com
password: gottmituns
```

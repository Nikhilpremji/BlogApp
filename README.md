## Requirements

-   PHP >= 8.1
-   Composer
-   MySQL or any database supported by Laravel
-   Node.js & npm (for frontend assets using Vite)

## Installation

### 1. Clone the repositor

```bash
git clone https://github.com/Nikhilpremji/BlogApp.git
cd laravel-blog
```

### 2. Install PHP dependencies

```
composer install

```

### 3. Install Node dependencies and build assets

```
npm install

```

`npm run dev` # or `npm run build` for production

### 4. Environment Configuration

Copy .env.example to .env:

```
cp .env.example .env

```

#### Set up your database and other settings in .env. Example:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:3eRK2vHumoRbCV+UlhDH7vZz/GYnaSwHlQHtnPJxR9o=
APP_DEBUG=true
APP_URL=http://localhost:8000

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
DB_DATABASE=blog_app
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

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

```

#### Generate the application key:

```
php artisan key:generate

```

### 5. Run Migrations & Seeders

Create the database laravel_blog (or your preferred name) and run:

```
php artisan migrate
```

`php artisan db:seed` # optional if seeders are included

### 6. Start the Development Server

```
php artisan serve
```

Open the application in your browser:

```
http://127.0.0.1:8000
```

## Application Routes

```
| Route        | Description                                       |
| ------------ | ------------------------------------------------- |
| `/login`     | User login page                                   |
| `/register`  | User registration page                            |
| `/dashboard` | Dashboard showing **all blog posts**              |
| `/posts`     | Shows only the **current logged-in user's posts** |
```

## API Endpoint

GET /api/posts

Returns all posts with author information in JSON format:

```json
[
    {
        "id": 1,
        "title": "Sample Post",
        "content": "Post content here...",
        "author": {
            "id": 1,
            "name": "John Doe"
        }
    }
]
```

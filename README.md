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

npm install
npm run dev # or npm run build for production

### 4. Environment Configuration

Copy .env.example to .env:

```
cp .env.example .env

```

#### Set up your database and other settings in .env. Example:

APP_NAME=LaravelBlog
APP_ENV=local
APP_KEY=base64:GENERATED_KEY
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=root
DB_PASSWORD=

#### Generate the application key:

```
php artisan key:generate

```

### 5. Run Migrations & Seeders

Create the database laravel_blog (or your preferred name) and run:

```
php artisan migrate
```

```
php artisan db:seed # optional if seeders are included
```

### 6. Start the Development Server

```
php artisan serve
```

Open the application in your browser:

```
http://127.0.0.1:8000
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

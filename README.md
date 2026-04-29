# WCT Laravel 13

A modern Laravel 13 application with user authentication, product management, and responsive UI.

## Requirements

- PHP 8.3 or higher
- Composer
- Node.js & npm
- SQLite or MySQL
- Git

## Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd wct-laravel13
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

### 5. Build Assets
```bash
npm run build
```

## Running the Application

### Development Server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Development with Hot Module Reload (HMR)
```bash
npm run dev
```

In another terminal:
```bash
php artisan serve
```

## Project Structure

```
app/
├── Http/Controllers/          # Application controllers
├── Models/
│   ├── Product.php           # Product model
│   └── User.php              # User model
└── Providers/
    └── AppServiceProvider.php # Service provider

database/
├── factories/                 # Model factories for testing
├── migrations/               # Database migrations
└── seeders/                 # Database seeders

resources/
├── css/                      # Stylesheets
├── js/                       # JavaScript files
└── views/                    # Blade templates
    ├── layouts/             # Layout templates
    ├── products/            # Product views
    └── *.blade.php          # Page views

routes/
├── web.php                   # Web routes
└── console.php              # Artisan commands

tests/
├── Feature/                 # Feature tests
└── Unit/                    # Unit tests
```

## Key Features

- **User Authentication** — User registration and login
- **Product Management** — CRUD operations for products
- **Responsive Design** — Mobile-friendly interface with Tailwind CSS
- **Database Migrations** — Version-controlled database schema
- **Testing** — PHPUnit test suite included

## Database

### Models
- **User** — Application users with authentication
- **Product** — Products with metadata

### Migrations
- `create_users_table` — Users table
- `create_cache_table` — Cache table
- `create_jobs_table` — Job queue table
- `create_products_table` — Products table

## Testing

Run the test suite:
```bash
php artisan test
```

Run specific tests:
```bash
php artisan test tests/Feature/ExampleTest.php
```

## Available Routes

Access `http://localhost:8000` to view available pages:
- `/` — Home page
- `/about` — About page
- `/contact` — Contact page
- `/testimonials` — Testimonials page
- `/products` — Products listing

## Configuration Files

- `config/app.php` — Application configuration
- `config/database.php` — Database configuration
- `config/auth.php` — Authentication configuration
- `config/mail.php` — Mail configuration
- `.env` — Environment variables (create from `.env.example`)

## Deployment

1. Set up environment variables in `.env`
2. Run migrations: `php artisan migrate --force`
3. Compile assets: `npm run build`
4. Set proper permissions on `storage/` and `bootstrap/cache/`
5. Configure web server (Apache/Nginx)

## Troubleshooting

**Port 8000 already in use:**
```bash
php artisan serve --port=8001
```

**Permission denied on storage:**
```bash
chmod -R 775 storage bootstrap/cache
```

**Composer dependency issues:**
```bash
composer update
php artisan cache:clear
```

## Contributing

1. Create a feature branch: `git checkout -b feature/your-feature`
2. Commit changes: `git commit -m 'Add feature'`
3. Push to branch: `git push origin feature/your-feature`
4. Submit a pull request

## License

This project is open-source software licensed under the MIT license.

## Support

For issues or questions, please create an issue in the repository or contact the development team.

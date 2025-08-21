# Bookly - Laravel + Vue.js Setup Instructions

## Quick Setup

Follow these steps to get your Laravel + Vue.js application running:

### 1. Install Dependencies

```bash
# Install Laravel dependencies
composer install

# Install Node.js dependencies
npm install
```

### 2. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Configure Database

Edit your `.env` file with your MySQL database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookly_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Database Migration & Seeding

```bash
# Run migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

### 5. Start Development Servers

**Option A: Both servers together (Recommended)**

```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite dev server
npm run dev
```

**Option B: Use Laravel server only**

```bash
# Build frontend assets
npm run build

# Start Laravel server
php artisan serve
```

## Access Your Application

- **Frontend**: http://localhost:8000 (Laravel serves Vue.js SPA)
- **API**: http://localhost:8000/api (Laravel API endpoints)

## API Endpoints

### Authentication

- `POST /api/auth/register` - User registration
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout
- `GET /api/auth/profile` - Get user profile
- `PUT /api/auth/profile` - Update user profile

### Test Users

```json
{
  "admin": {
    "email": "admin@bookly.sa",
    "password": "password123"
  },
  "provider": {
    "email": "ahmed.saadi@provider.com",
    "password": "password123"
  },
  "customer": {
    "email": "sarah.ghamdi@customer.com",
    "password": "password123"
  }
}
```

## Project Structure

```
booklytest/
├── app/                    # Laravel application
│   ├── Http/Controllers/   # API controllers
│   ├── Models/            # Database models
│   └── Providers/         # Service providers
├── database/              # Database files
│   ├── migrations/        # Database migrations
│   ├── seeders/          # Database seeders
│   └── schema.sql        # Raw SQL schema
├── routes/               # Routes
│   ├── api.php          # API routes
│   └── web.php          # Web routes (SPA)
├── src/                 # Vue.js frontend
│   ├── components/      # Vue components
│   ├── assets/         # Styles and assets
│   └── main.ts         # Vue app entry
├── resources/           # Laravel resources
│   └── views/          # Blade templates
└── public/             # Public assets
```

## Development Commands

```bash
# Laravel commands
php artisan migrate:fresh --seed    # Reset database
php artisan route:list              # List all routes
php artisan tinker                  # Laravel console

# Frontend commands
npm run dev                         # Development server
npm run build                       # Build for production
npm run type-check                  # TypeScript check
npm run lint                        # Lint code

# Combined commands
npm run serve                       # Start Laravel server
npm run fresh                       # Fresh database migration
```

## Troubleshooting

### Database Issues

```bash
# Create database manually in MySQL
mysql -u root -p
CREATE DATABASE bookly_db;
```

### Permission Issues

```bash
# Fix storage permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

### Missing Dependencies

```bash
# Re-install all dependencies
rm -rf vendor node_modules
composer install
npm install
```

## Production Deployment

1. **Build frontend assets:**

```bash
npm run build
```

2. **Optimize Laravel:**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. **Set production environment:**

```env
APP_ENV=production
APP_DEBUG=false
```

## Features Included

✅ **User Registration System**

- Complete user registration with validation
- Email verification
- Profile management
- Password change functionality

✅ **Authentication API**

- Laravel Sanctum token authentication
- Rate limiting for security
- Multi-language support (Arabic/English)

✅ **Database Schema**

- Users, businesses, services, bookings
- Payments, notifications, reviews
- Complete relational structure

✅ **Frontend**

- Vue.js 3 with TypeScript
- Tailwind CSS styling
- Responsive design
- RTL support for Arabic

## Next Steps

After setup, you can:

1. Test the registration API endpoints
2. Create additional business logic
3. Implement booking functionality
4. Add payment integration
5. Deploy to production

For detailed API documentation, see `database/REGISTRATION_API.md`

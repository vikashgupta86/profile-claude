#!/bin/bash
# Quick setup script for Vikash Portfolio

echo "🚀 Setting up Vikash Kumar Portfolio..."

# Check PHP
if ! command -v php &> /dev/null; then
    echo "❌ PHP not found. Please install PHP 8.2+"
    exit 1
fi

# Check Composer
if ! command -v composer &> /dev/null; then
    echo "❌ Composer not found. Install from https://getcomposer.org"
    exit 1
fi

echo "📦 Installing dependencies..."
composer install --no-interaction --prefer-dist

echo "⚙️  Setting up environment..."
if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan key:generate

echo ""
echo "🗄️  Please configure your database in .env file:"
echo "   DB_DATABASE=vikash_portfolio"
echo "   DB_USERNAME=your_username"
echo "   DB_PASSWORD=your_password"
echo ""
read -p "Press Enter after configuring .env..."

echo "🗄️  Running migrations..."
php artisan migrate --seed

echo "🔗 Creating storage symlink..."
php artisan storage:link

echo ""
echo "✅ Setup complete!"
echo ""
echo "🌐 Start the server:"
echo "   php artisan serve"
echo ""
echo "📋 Access:"
echo "   Portfolio: http://localhost:8000"
echo "   Admin:     http://localhost:8000/admin"
echo "   Email:     vikashkumarbth381@gmail.com"
echo "   Password:  Admin@123"

#!/bin/bash

echo "================================================"
echo "DigiSolusi - Platform Pelatihan Online"
echo "Installation Script"
echo "================================================"
echo ""

# Check if .env exists
if [ ! -f .env ]; then
    echo "📝 Copying .env.example to .env..."
    cp .env.example .env
    echo "✅ .env file created"
else
    echo "✅ .env file already exists"
fi

echo ""
echo "📦 Installing Composer dependencies..."
composer install

echo ""
echo "🔑 Generating application key..."
php artisan key:generate

echo ""
echo "📊 Running database migrations..."
php artisan migrate

echo ""
echo "🌱 Seeding database with sample data..."
php artisan db:seed

echo ""
echo "🔗 Creating storage link..."
php artisan storage:link

echo ""
echo "================================================"
echo "✅ Installation completed successfully!"
echo "================================================"
echo ""
echo "Default Users:"
echo "Admin - admin@digisolusi.com / password"
echo "User  - user@test.com / password"
echo ""
echo "To start the development server, run:"
echo "php artisan serve"
echo ""
echo "Then open http://localhost:8000 in your browser"
echo "================================================"

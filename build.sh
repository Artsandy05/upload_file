#!/bin/bash

# Install PHP dependencies using Composer
composer install --no-interaction --no-dev --prefer-dist

# Copy the .env.example file and rename it to .env
cp .env.example .env

# Generate a new application key
php artisan key:generate
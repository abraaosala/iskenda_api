#!/bin/bash
set -e

DIR="/home/u634834160/domains/iskenda.ao/public_html/api/iskenda"

cd "$DIR"

git pull origin main

export COMPOSER_PROCESS_TIMEOUT=0

composer install --no-dev --optimize-autoloader --no-interaction

php artisan migrate --force

# php artisan config:cache
# php artisan route:cache
php artisan view:cache
php artisan optimize

php artisan queue:restart 2>/dev/null || true

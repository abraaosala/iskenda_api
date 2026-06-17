#!/bin/bash
set -e

DIR="/home/u634834160/domains/iskenda.ao/public_html/api/iskenda"

cd "$DIR"

git pull origin main

export COMPOSER_PROCESS_TIMEOUT=0

composer install --no-dev --optimize-autoloader --no-interaction

[ -L public/storage ] || ln -s "$DIR/storage/app/public" "$DIR/public/storage"

php artisan migrate --force

php artisan route:cache
php artisan view:cache

php artisan queue:restart 2>/dev/null || true

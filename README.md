# Passport SPA

Hacky Laravel Passport SPA Boilerplate for OAuth apps

## Setup

```bash
cp .env.example .env

composer install

npm install
npm run prod

vendor/bin/sail up

php artisan migrate:fresh
php artisan key:generate
php artisan passport:install

```

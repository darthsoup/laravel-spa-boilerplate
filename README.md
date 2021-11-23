# Passport SPA

Hacky Laravel Passport SPA Boilerplate for OAuth apps

## Setup

```bash
cp .env.example .env

composer install

npm install
npm run prod

php artisan key:generate
php artisan passport:install

vendor/bin/sail up
```

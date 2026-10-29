FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p database \
    && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database

ENV APP_KEY=base64:DOujsdxOmGmxaeKF5W3KmQoHoYs/W26g92Ssz9gHl0s=
ENV APP_DEBUG=true
ENV DB_CONNECTION=sqlite
ENV SESSION_DRIVER=cookie

EXPOSE 8000

CMD php artisan migrate --force && php artisan config:clear && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

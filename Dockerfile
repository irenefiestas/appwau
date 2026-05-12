FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN npm install
RUN npm run build

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080
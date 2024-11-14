FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update

RUN apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git

RUN apt-get install -y sqlite3
RUN docker-php-ext-install gd zip pdo

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./code .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 9000

CMD ["php-fpm"]
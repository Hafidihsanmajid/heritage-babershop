# 1. Gunakan PHP 8.3 dengan Apache
FROM php:8.3-apache

# 2. Install dependensi sistem dan ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Aktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# 4. Arahkan DocumentRoot Apache ke folder /public Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Pasang Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Salin source code proyek
WORKDIR /var/www/html
COPY . .

# 7. Install dependensi Laravel (PHP)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 8. Beri hak akses (permission) ke folder storage dan cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Buka port Apache standar
EXPOSE 80

CMD ["apache2-foreground"]
FROM php:8.2-fpm

# تثبيت التبعيات الأساسية
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    nginx \
    supervisor \
    libzip-dev \
    libpq-dev \
    libmcrypt-dev \
    libsqlite3-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تعيين مجلد العمل
WORKDIR /var/www

# نسخ ملفات المشروع إلى الحاوية
COPY . /var/www

# تثبيت اعتمادات Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
RUN composer dump-autoload -o

# تعيين صلاحيات الملفات
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# فتح بورت 10000
EXPOSE 10000

# تشغيل المايجريشن ثم السيرفر على بورت 10000
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000

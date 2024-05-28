# Используем официальный образ PHP с FPM
FROM php:8.0-fpm

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем содержимое текущей директории в контейнер
COPY . /var/www

# Настраиваем права доступа
RUN chown -R www-data:www-data /var/www

# Устанавливаем зависимости проекта
RUN composer install

# Открываем порт 9000 и запускаем php-fpm
EXPOSE 9000
CMD ["php-fpm"]

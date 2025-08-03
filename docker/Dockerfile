# Используем официальный образ PHP 8.4 с FPM
FROM php:8.4-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    bc \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libxml2-utils \
    zip \
    unzip \
    nginx \
    supervisor \
    && docker-php-ext-install mbstring exif pcntl bcmath gd

# Устанавливаем драйверы покрытия кода
RUN pecl install xdebug pcov \
    && docker-php-ext-enable xdebug pcov

# Настраиваем Xdebug для покрытия кода
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /opt/app

# Копируем конфигурацию Nginx
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Копируем конфигурацию Supervisor
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Копируем composer.json и устанавливаем зависимости
COPY app/composer.json ./
RUN composer install --no-dev --optimize-autoloader

# Копируем исходный код приложения
COPY app/ ./

# COPY check-coverage.sh /opt/check-coverage.sh

# Создаем папку для кэша и устанавливаем права
RUN mkdir -p cache && chmod 777 cache

# Устанавливаем права на папки
RUN chown -R www-data:www-data /opt/app \
    && chmod -R 755 /opt/app

# Открываем порт 80
EXPOSE 80

# Запускаем Supervisor для управления процессами
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
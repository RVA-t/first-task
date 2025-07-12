FROM php:8.2-cli

# Устанавливаем расширение redis
RUN pecl install redis && docker-php-ext-enable redis

WORKDIR /usr/src/app

CMD ["php", "script.php"]

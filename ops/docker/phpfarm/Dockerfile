FROM splitbrain/phpfarm:latest

WORKDIR /app/monitoring
VOLUME ["/app/monitoring"]

RUN curl -sS https://getcomposer.org/installer | php-7.1 && mv /app/monitoring/composer.phar /usr/local/bin/composer

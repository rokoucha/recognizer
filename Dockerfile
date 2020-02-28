FROM php:7.4-cli

COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y libzip-dev mariadb-client \
    && docker-php-ext-install pdo_mysql zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

COPY . /usr/src/recognizer

WORKDIR /usr/src/recognizer

RUN composer install

RUN php artisan storage:link

CMD [ "php", "artisan", "serve", "--host=0.0.0.0"]

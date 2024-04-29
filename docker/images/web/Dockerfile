FROM webdevops/php-apache:7.4-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions \
      xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

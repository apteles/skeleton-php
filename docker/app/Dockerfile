FROM ubuntu:18.04

LABEL maintainer="André Teles"

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
  && apt-get install -y gnupg tzdata software-properties-common \
  && echo "UTC" > /etc/timezone \
  && dpkg-reconfigure -f noninteractive tzdata

RUN add-apt-repository ppa:ondrej/php

RUN apt-get update \
  && apt-get install -y curl zip unzip git supervisor sqlite3 \
  nginx php8.2-fpm php8.2-cli \
  php8.2-pgsql php8.2-sqlite3 php8.2-gd \
  php8.2-curl php8.2-memcached \
  php8.2-imap php8.2-mysql php8.2-mbstring \
  php8.2-xml php8.2-zip php8.2-bcmath php8.2-soap \
  php8.2-intl php8.2-readline php8.2-xdebug \
  php-msgpack php-igbinary \
  && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
  && mkdir /run/php \
  && apt-get -y autoremove \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
  && echo "daemon off;" >> /etc/nginx/nginx.conf
RUN ln -sf /dev/stdout /var/log/nginx/access.log \
  && ln -sf /dev/stderr /var/log/nginx/error.log \
  && chown 1000.1000 /usr/bin/composer

ADD default /etc/nginx/sites-available/default
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf
ADD php-fpm.conf /etc/php/8.2/fpm/php-fpm.conf
ADD start-container.sh /usr/bin/start-container
COPY xdebug.ini /etc/php/8.2/mods-available/xdebug.ini
COPY start-container.sh /usr/local/bin/start-container.sh
RUN chmod +x /usr/local/bin/start-container.sh

CMD ["start-container.sh"]

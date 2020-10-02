FROM php:7.4-apache

LABEL maintainer "Hightech (hightech@backboxindonesia.or.id)"

COPY chall /var/www/html/xss-labs/chall
COPY css /var/www/html/css
COPY img /var/www/html/img
COPY src /var/www/html/src
COPY index.html /var/www/html/index.html

RUN chown www-data:www-data -R /var/www/html

EXPOSE 80

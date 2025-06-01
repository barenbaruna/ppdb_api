FROM php:latest

WORKDIR /ppdb_api

RUN docker-php-ext-install mysqli

RUN apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl

COPY . /ppdb_api

EXPOSE 8080

CMD [ "php", "spark", "serve" ]
FROM ubuntu:20.04

ENV TZ=Europe/Sarajevo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt update -y

RUN apt install -y \
 git \
 apache2 \
 zip \
 vim \
 curl \
 unzip \
 php7.4 \
 php7.4-cli \
 php7.4-common \
 php7.4-xml \
 php7.4-bcmath \
 php7.4-json \
 php7.4-mbstring \
 openssl \
 php7.4-zip \
 php7.4-curl \
 php7.4-mysql 

RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer --install-dir=/bin
ENV PATH /root/.composer/vendor/bin:$PATH

RUN composer global require laravel/installer

CMD tail -f /dev/null

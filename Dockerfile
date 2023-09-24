FROM php:7.3.7-apache

RUN apt-get update && apt-get install  -y \
    cron \
    supervisor \
    libmcrypt-dev \
    libzip-dev \
    vim \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libjpeg62 \
    libaio1 \
    libmagickwand-dev --no-install-recommends \
    curl

COPY imagick-3.7.0.tgz .

COPY mcrypt-1.0.4.tgz .

RUN pecl install imagick-3.7.0.tgz mcrypt-1.0.4.tgz

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-enable imagick mcrypt

RUN docker-php-ext-install pdo_mysql zip

RUN docker-php-ext-configure gd \
    --with-freetype-dir=/usr/lib/ \
    --with-png-dir=/usr/lib/ \
    --with-jpeg-dir=/usr/lib/ \
    --with-gd

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

#upload
RUN echo "file_uploads = On\n" \
    "memory_limit = 500M\n" \
    "upload_max_filesize = 500M\n" \
    "post_max_size = 500M\n" \
    "max_execution_time = 600\n" \
    > /usr/local/etc/php/conf.d/uploads.ini


RUN NUMPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
    && docker-php-ext-install -j${NUMPROC} gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer



# COPY  . /var/www/html/

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy code to /var/www/rsu
COPY --chown=www:www-data . /var/www/html/

FROM php:8.2-apache

# Habilita módulos de Apache necesarios
RUN a2enmod rewrite headers proxy_http

# Instala dependencias necesarias, incluyendo libpq-dev para PostgreSQL
RUN apt-get update && apt-get install -y \
    wget gnupg git unzip zip \
    libzip-dev libxslt-dev libpng-dev libjpeg-dev \
    libgmp-dev libfreetype6-dev libonig-dev \
    libpq-dev  # ← NECESARIO para pdo_pgsql

# Configura e instala extensiones PHP necesarias, solo pdo_pgsql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install \
    gd bcmath gmp zip xsl mbstring exif \
    pdo_pgsql  # ← Solo PostgreSQL

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copia tu código al contenedor y establece el directorio de trabajo
COPY . /var/www/Backend
WORKDIR /var/www/Backend

# Instala dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader

# Ajusta permisos (opcional pero recomendable)
RUN chown -R www-data:www-data /var/www/Backend/storage /var/www/Backend/bootstrap/cache

RUN php artisan migrate --force

# Configura Apache para Laravel
COPY laravel.conf /etc/apache2/sites-available/laravel.conf
RUN a2dissite 000-default.conf && a2ensite laravel.conf

# Genera la clave de la app (usa env en tiempo de ejecución si prefieres)
RUN php artisan key:generate
# Cache de configuración y rutas
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

    
EXPOSE 80
CMD ["apache2-foreground"]

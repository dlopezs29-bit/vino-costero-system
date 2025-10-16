FROM php:8.2-apache

# Instalar extensiones necesarias para CodeIgniter 4
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql zip

# Habilitar mod_rewrite para URLs limpias
RUN a2enmod rewrite

# Permitir uso de .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copiar todo el proyecto
COPY . /var/www/html/

# Cambiar DocumentRoot a /public (CodeIgniter 4)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Dar propiedad y permisos a Apache
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/writable

EXPOSE 80
CMD ["apache2-foreground"]

FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar solo el contenido de /public al directorio web de Apache
COPY ./public /var/www/html/

# Copiar el resto del proyecto fuera del root público
COPY . /var/www/html/../app/

# Habilitar mod_rewrite
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80
CMD ["apache2-foreground"]

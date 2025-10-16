FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite y permitir .htaccess
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copiar todo el proyecto
COPY . /var/www/html/

# Cambiar DocumentRoot a /public (CodeIgniter 4)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# 🔹 Dar propiedad del proyecto al usuario de Apache
RUN chown -R www-data:www-data /var/www/html

# 🔹 Dar permisos de escritura a writable
RUN chmod -R 775 /var/www/html/writable

EXPOSE 80
CMD ["apache2-foreground"]

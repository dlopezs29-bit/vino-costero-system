FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Permitir uso de .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copiar todo el proyecto
COPY . /var/www/html/

# Cambiar el DocumentRoot a /public (CodeIgniter 4)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# 🔹 NUEVO: Dar permisos de escritura a writable
RUN chmod -R 777 /var/www/html/writable

# 🔹 Opcional: asegurar permisos generales
RUN chmod -R 755 /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]

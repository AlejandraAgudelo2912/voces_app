# Imagen base de PHP con servidor embebido
FROM php:8.2-apache

# Copiar todos los archivos al servidor
COPY . /var/www/html/

# Cambiar permisos
RUN chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
FROM php:8.2-fpm

# Instala dependências básicas
RUN apt-get update && apt-get install -y \
    git unzip curl zip gnupg2 libpng-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Angular CLI
RUN npm install -g @angular/cli

#Instala Git
RUN apt-get update && apt-get install -y git

# Cria diretório de trabalho
WORKDIR /var/www/html

# Ajusta permissões (opcional)
RUN chown -R www-data:www-data /var/www/html

CMD ["sleep", "infinity"]

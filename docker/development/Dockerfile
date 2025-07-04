FROM php:8.3-fpm

# Instala dependências básicas
RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libxml2-dev zip nodejs libzip-dev \
    && docker-php-ext-install pdo_mysql zip 


# Verifica se npm foi instalado; se não, instala manualmente
RUN if ! command -v npm >/dev/null 2>&1; then apt-get install -y npm; fi

ENV NVM_DIR=/root/.nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash
# Instala o Node.js usando NVM
ENV NODE_VERSION=22.14.0
RUN . "$NVM_DIR/nvm.sh" && nvm install "${NODE_VERSION}"  && nvm use "${NODE_VERSION}" && nvm alias default "${NODE_VERSION}" && \
	echo "export NVM_DIR=\"$NVM_DIR\"" >> ~/.bashrc && \
	echo "[ -s \"$NVM_DIR/nvm.sh\" ] && \. \"$NVM_DIR/nvm.sh\"" >> ~/.bashrc
 
RUN echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"' >> ~/.bashrc


# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html


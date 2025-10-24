# Use PHP 8.2 CLI (não FPM) para Railway
FROM php:8.2-cli

# Instalar dependências do sistema em uma só camada
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        zip \
        exif \
        pcntl \
        gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar diretório de trabalho
WORKDIR /app

# Copiar composer files primeiro (para cache layer)
COPY composer.json composer.lock ./

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar código da aplicação
COPY . .

# Executar scripts do composer
RUN composer run-script post-autoload-dump

# Copiar script de teste DB
COPY test-db.sh /test-db.sh
RUN chmod +x /test-db.sh

# Configurar permissões
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage \
    && chmod -R 755 /app/bootstrap/cache

# Criar script de inicialização com espera pelo banco (retry)
RUN echo '#!/bin/bash' > /start.sh && \
    echo 'set -e' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Converter variáveis MYSQL_* para DB_* que o Laravel espera' >> /start.sh && \
    echo 'export DB_HOST="$MYSQL_HOST"' >> /start.sh && \
    echo 'export DB_PORT="$MYSQL_PORT"' >> /start.sh && \
    echo 'export DB_DATABASE="$MYSQL_DATABASE"' >> /start.sh && \
    echo 'export DB_USERNAME="$MYSQL_USER"' >> /start.sh && \
    echo 'export DB_PASSWORD="$MYSQL_PASSWORD"' >> /start.sh && \
    echo 'export DB_CONNECTION="mysql"' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Debug: Mostrar variáveis importantes' >> /start.sh && \
    echo 'echo "PORT variable: ${PORT:-NOT_SET}"' >> /start.sh && \
    echo 'echo "MYSQL_HOST: ${MYSQL_HOST:-NOT_SET}"' >> /start.sh && \
    echo 'echo "APP_KEY: ${APP_KEY:-NOT_SET}"' >> /start.sh && \
    echo 'echo "APP_DEBUG: ${APP_DEBUG:-NOT_SET}"' >> /start.sh && \
    echo '' >> /start.sh && \
    echo '# Espera o banco ficar disponível (usa PDO via php-cli)' >> /start.sh && \
    echo 'echo "Waiting for database to be available..."' >> /start.sh && \
    echo '/test-db.sh' >> /start.sh && \
    echo 'MAX_RETRIES=${DB_WAIT_MAX_RETRIES:-30}' >> /start.sh && \
    echo 'COUNT=0' >> /start.sh && \
    echo 'until php -r "try { new PDO('\''mysql:host='\''.getenv('\''DB_HOST'\'').'\'';port='\''.getenv('\''DB_PORT'\'').'\'';dbname='\''.getenv('\''DB_DATABASE'\''), getenv('\''DB_USERNAME'\''), getenv('\''DB_PASSWORD'\'')); } catch (Exception \$e) { exit(1); }" ; do' >> /start.sh && \
    echo '  COUNT=$((COUNT+1))' >> /start.sh && \
    echo '  echo "DB not ready yet... ($COUNT/$MAX_RETRIES)"' >> /start.sh && \
    echo '  if [ "$COUNT" -ge "$MAX_RETRIES" ]; then' >> /start.sh && \
    echo '    echo "Reached max retries ($MAX_RETRIES). Exiting."' >> /start.sh && \
    echo '    exit 1' >> /start.sh && \
    echo '  fi' >> /start.sh && \
    echo '  sleep 2' >> /start.sh && \
    echo 'done' >> /start.sh && \
    echo '' >> /start.sh && \
    echo 'echo "Database is available. Running migrations..."' >> /start.sh && \
    echo 'php artisan migrate --force' >> /start.sh && \
    echo 'php artisan storage:link' >> /start.sh && \
    echo 'php artisan config:cache' >> /start.sh && \
    echo '' >> /start.sh && \

    echo '# Iniciar servidor Laravel' >> /start.sh && \
    echo 'echo "Starting Laravel server on port ${PORT:-8080}..."' >> /start.sh && \
    echo 'exec php artisan serve --host=0.0.0.0 --port=${PORT:-8080}' >> /start.sh && \
    chmod +x /start.sh

# Expor porta
EXPOSE 8080

# Usar script de inicialização
CMD ["/start.sh"]
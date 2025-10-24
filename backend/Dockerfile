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

# Configurar permissões
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage \
    && chmod -R 755 /app/bootstrap/cache

# Criar script de inicialização com espera pelo banco (retry)
RUN cat > /start.sh <<'SH'\n#!/bin/bash\nset -e\n\n# Espera o banco ficar disponível (usa PDO via php-cli)\necho "Waiting for database to be available..."\nMAX_RETRIES=${DB_WAIT_MAX_RETRIES:-30}\nCOUNT=0\nuntil php -r "try { new PDO('mysql:host='.getenv('DB_HOST').';port='.getenv('DB_PORT').';dbname='.getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')); } catch (Exception $e) { exit(1); }" ; do\n  COUNT=$((COUNT+1))\n  echo "DB not ready yet... ($COUNT/$MAX_RETRIES)"\n  if [ "$COUNT" -ge "$MAX_RETRIES" ]; then\n    echo "Reached max retries ($MAX_RETRIES). Exiting."\n    exit 1\n  fi\n  sleep 2\ndone\n\necho "Database is available. Running migrations..."\nphp artisan config:cache\nphp artisan migrate --force\n\n# Iniciar servidor Laravel\nexec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}\nSH\n    && chmod +x /start.sh

# Expor porta
EXPOSE 8000

# Usar script de inicialização
CMD ["/start.sh"]
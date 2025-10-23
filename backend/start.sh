#!/bin/bash
# Script de inicialização para Railway
echo "Executando migrações..."
php artisan migrate --force
echo "Iniciando servidor..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
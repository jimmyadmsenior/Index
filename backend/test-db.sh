#!/bin/bash
echo "=== TESTING DATABASE CONNECTION ==="
echo "DB_HOST: ${MYSQL_HOST}"
echo "DB_PORT: ${MYSQL_PORT}"
echo "DB_DATABASE: ${MYSQL_DATABASE}"
echo "DB_USERNAME: ${MYSQL_USER}"
echo "DB_PASSWORD: [HIDDEN]"
echo ""
echo "Testing PHP PDO connection..."
php -r "
try {
    \$pdo = new PDO('mysql:host='.getenv('MYSQL_HOST').';port='.getenv('MYSQL_PORT').';dbname='.getenv('MYSQL_DATABASE'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
    echo 'SUCCESS: Connected to MySQL!' . PHP_EOL;
} catch (Exception \$e) {
    echo 'ERROR: ' . \$e->getMessage() . PHP_EOL;
}
"
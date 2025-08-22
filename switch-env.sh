#!/bin/bash

if [ "$1" = "local" ]; then
    cp .env.local .env
    echo "✅ Switched to LOCAL environment"
    PORT=8000
elif [ "$1" = "dev" ]; then
    cp .env.development .env
    echo "✅ Switched to DEVELOPMENT environment"
    PORT=8001
elif [ "$1" = "prod" ]; then
    cp .env.production .env
    echo "✅ Switched to PRODUCTION environment"
    PORT=8002
else
    echo "Usage: ./switch-env.sh [local|dev|prod]"
    exit 1
fi

# Clear config cache
php artisan config:clear

# Clear cache safely
if php artisan migrate:status >/dev/null 2>&1; then
    php artisan cache:clear >/dev/null 2>&1 || echo "Cache clear skipped"
else
    echo "Database not ready - skipping cache clear"
fi

# Show current environment info
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "🔧 Environment: $1"
echo "📝 APP_NAME: $(grep APP_NAME .env | cut -d '=' -f2 | tr -d '"')"
echo "🌐 APP_URL: $(grep APP_URL .env | cut -d '=' -f2)"
echo "🗄️  DATABASE: $(grep DB_DATABASE .env | cut -d '=' -f2)"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "🚀 To start server: php artisan serve --port=$PORT"
echo "🔗 Access at: http://localhost:$PORT"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
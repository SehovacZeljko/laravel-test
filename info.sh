#!/bin/bash

# Check if .env exists
if [ ! -f ".env" ]; then
    echo "❌ No .env file found in the current directory"
    exit 1
fi

# Detect environment from APP_ENV
ENV=$(grep '^APP_ENV=' .env | cut -d '=' -f2 | tr -d '"')
APP_NAME=$(grep '^APP_NAME=' .env | cut -d '=' -f2 | tr -d '"')
APP_URL=$(grep '^APP_URL=' .env | cut -d '=' -f2 | tr -d '"')
DB_NAME=$(grep '^DB_DATABASE=' .env | cut -d '=' -f2 | tr -d '"')

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "🔧 Current Environment: ${ENV:-unknown}"
echo "📝 APP_NAME: ${APP_NAME:-unknown}"
echo "🌐 APP_URL: ${APP_URL:-unknown}"
echo "🗄️  DATABASE: ${DB_NAME:-unknown}"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

# Optional: check PHP, Composer, Node versions
echo "⚙️  PHP Version: $(php -v | head -n 1)"
echo "⚙️  Composer Version: $(composer --version 2>/dev/null || echo 'Not found')"
echo "⚙️  Node Version: $(node -v 2>/dev/null || echo 'Not found')"
echo "⚙️  NPM Version: $(npm -v 2>/dev/null || echo 'Not found')"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

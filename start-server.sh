#!/bin/bash

# Get the current environment's port
if grep -q "APP_URL=http://localhost:8000" .env; then
    PORT=8000
    ENV="LOCAL"
elif grep -q "APP_URL=http://localhost:8001" .env; then
    PORT=8001
    ENV="DEVELOPMENT"
elif grep -q "APP_URL=http://localhost:8002" .env; then
    PORT=8002
    ENV="PRODUCTION"
else
    PORT=8000
    ENV="UNKNOWN"
fi

echo "🚀 Starting $ENV server on port $PORT"
echo "🔗 Access your app at: http://localhost:$PORT"
echo "Press Ctrl+C to stop the server"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

php artisan serve --port=$PORT
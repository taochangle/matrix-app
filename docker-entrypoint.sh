#!/bin/sh
set -e

if [ ! -f vendor/autoload.php ]; then
    echo ">> Installing dependencies..."
    composer config --global audit.ignore '["PKSA-y2cr-5h3j-g3ys"]' 2>/dev/null
    composer config --global github-protocols https 2>/dev/null
    composer install --no-interaction --prefer-dist
fi

if [ -f vendor/bin/phinx ]; then
    echo ">> Running database migrations..."
    ./matrix migrate || echo "Migration skipped"
fi

exec "$@"

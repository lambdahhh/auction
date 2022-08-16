init: down pull build up api-init
restart: down up

up: docker compose up -d --remove-orphans
down: docker compose down
pull: docker compose pull
build: docker compose build

api-init: api-composer-install

api-composer-install: docker composer run --rm api-php-cli composer install

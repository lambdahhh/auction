up:
	docker compose up -d --remove-orphans
init:
	down pull build up api-init
restart:
	down up
down:
	docker compose down
pull:
	docker compose pull
build:
	docker compose build
api-init:
	api-composer-install
api-composer-install:
	docker composer run --rm api-php-cli composer install
ps:
	docker compose ps

init: down pull build up
restart: down up
api-init: api-composer-install

up:
	docker-compose up -d --remove-orphans
down:
	docker-compose down
pull:
	docker-compose pull
build:
	docker-compose build
api-composer-install:
	docker-compose run --rm api-php-cli composer install
ps:
	docker-compose ps
sh:
	docker-compose exec api-php-fpm sh
nx:
	docker-compose exec frontend sh

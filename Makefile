init: down pull build up
restart: down up
api-init: api-composer-install
lint: api-lint
test: api-test

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
api-lint:
	docker-compose run --rm api-php-cli composer lint
psalm:
	docker-compose run --rm api-php-cli composer psalm
api-test:
	docker-compose run --rm api-php-cli composer test

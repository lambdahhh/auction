init: down pull build up
restart: down up
api-init: api-composer-install
lint: api-lint
test: api-test
test-unit: api-test-unit
test-functional: api-test-functional
test-coverage: api-test-unit-coverage

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
api-test-unit:
	docker-compose run --rm api-php-cli composer test -- --testsuite=unit
api-test-functional:
	docker-compose run --rm api-php-cli composer test -- --testsuite=functional
api-test-unit-coverage:
	docker-compose run --rm api-php-cli composer test-unit-coverage
api-clear:
	docker run --rm -v ${PWD}/api:/app -w /app alpine 'rm -rf var/*'

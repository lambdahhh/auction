init: down pull build up
restart: down up

up:
  docker compose up -d --remove-orphans
down:
  docker compose down
pull:
  docker compose pull
build:
  docker compose build

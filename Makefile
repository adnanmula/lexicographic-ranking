UID=$(shell id -u)
GID=$(shell id -g)
DOCKER_PHP_SERVICE=php

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build && \
	docker compose pull

install:
	docker compose run --rm -u ${UID}:${GID} ${DOCKER_PHP_SERVICE} composer install

update:
	docker compose run --rm -u ${UID}:${GID} ${DOCKER_PHP_SERVICE} composer update

bash:
	docker compose run --rm -u ${UID}:${GID} ${DOCKER_PHP_SERVICE} sh

logs:
	docker compose logs -f ${DOCKER_PHP_SERVICE}

.PHONY: tests
tests: ## execute project unit tests
	docker compose -f ./docker-compose.yml exec --user=$(id -u) ${DOCKER_PHP_SERVICE} sh -c "php ./vendor/bin/phpunit"

stan: ## pass phpstan
	docker compose -f ./docker-compose.yml exec --user=$(id -u) ${DOCKER_PHP_SERVICE} sh -c "php -d memory_limit=256M vendor/bin/phpstan analyse -c phpstan.neon"

cs: ## run phpcs checker
	docker compose -f ./docker-compose.yml exec --user=$(id -u) ${DOCKER_PHP_SERVICE} sh -c "phpcs --standard=phpcs.xml.dist"

grump: ## run grumphp
	docker compose -f ./docker-compose.yml exec --user=$(id -u) ${DOCKER_PHP_SERVICE} sh -c "./vendor/bin/grumphp run"

mutation: ## run mutation tests
	docker compose -f ./docker-compose.yml exec --user=$(id -u) ${DOCKER_PHP_SERVICE} sh -c "./vendor/bin/infection --threads=4"
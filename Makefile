.ONESHELL:
.SILENT:

COMPOSE_FILE_CONFIG=./docker/docker-compose.yml
COMPOSE_FILE_ENV=./docker/.env

define COMPOSE
	docker-compose \
		--env-file $(COMPOSE_FILE_ENV) \
		--file $(COMPOSE_FILE_CONFIG) \
		--project-name cmi-test
endef

build:
	$(COMPOSE) build

down:
	$(COMPOSE) down --remove-orphans --volumes

up:
	$(COMPOSE) up --detach --build

restart:
	$(COMPOSE) restart

#----

php:
	$(COMPOSE) exec --user 1000 php sh

orm-fixtures-load:
	$(COMPOSE) exec --user 1000 php bin/console doctrine:fixtures:load --no-interaction

npm-install:
	$(COMPOSE) exec --user 1000 node npm install

node:
	$(COMPOSE) exec --user 1000 node sh

node-watch:
	$(COMPOSE) exec --user 1000 node npm run watch

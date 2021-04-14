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

install:
	$(MAKE) up
	$(MAKE) composer-install
	$(MAKE) npm-install
	$(MAKE) orm-fixtures-load
	$(MAKE) node-build

#----

php:
	$(COMPOSE) exec --user 1000 php sh

composer-install:
	$(COMPOSE) exec --user 1000 php composer install

orm-fixtures-load:
	$(COMPOSE) exec --user 1000 php bin/console doctrine:fixtures:load --no-interaction

npm-install:
	$(COMPOSE) exec --user 1000 node npm install

node:
	$(COMPOSE) exec --user 1000 node sh

node-build:
	$(COMPOSE) exec --user 1000 node npm run dev

node-watch:
	$(COMPOSE) exec --user 1000 node npm run watch

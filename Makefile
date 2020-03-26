up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear project-clear docker-pull docker-build docker-up project-init
test: project-tests
behat: project-behat-tests

docker-up:
	USER_ID=`id -u` GROUP_ID=`id -g` docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	USER_ID=`id -u` GROUP_ID=`id -g` docker-compose build

project-init: project-composer-install project-wait-db project-ready

project-clear:
	docker run --rm -v ${PWD}/app:/var/www/app --workdir=/var/www/app alpine rm -f .ready

project-composer-install:
	docker-compose exec -T phpfpm composer install

project-wait-db:
	until docker-compose exec -T postgres pg_isready --timeout=0 --dbname=db ; do sleep 1 ; done

project-migrations:
	docker-compose exec -T phpfpm php bin/console doctrine:migrations:migrate --no-interaction

project-fixtures:
	docker-compose exec -T phpfpm php bin/console doctrine:fixtures:load --no-interaction

project-ready:
	docker run --rm -v ${PWD}/app:/var/www/app --workdir=/var/www/app alpine touch .ready

project-tests:
	docker exec -it plat-leads-phpfpm php bin/phpunit

project-behat-tests:
	docker exec -it plat-leads-phpfpm vendor/bin/behat

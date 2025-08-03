up:
	docker compose up -d

deploy:
	docker compose build
	docker compose up -d --force-recreate
	docker compose exec --user application blog-app composer install

down:
	docker compose down

build:
	docker compose build --no-cache

rebuild:
	docker compose down
	docker compose build --no-cache
	docker compose up -d

logs:
	docker compose logs -f blog-app

bash:
	docker compose exec blog-app bash

restart:
	docker compose restart

ps:
	docker compose ps

clean:
	docker system prune -f
	docker volume prune -f

composer-install:
	docker compose exec --user application blog-app composer install

composer-update:
	docker compose exec --user application blog-app composer update

run-linter:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpstan analyse src --memory-limit=2G"

run-tests:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpunit tests"

check-xdebug:
	docker compose exec blog-app bash -c "php -m | grep xdebug || echo 'Xdebug not found'"

check-pcov:
	docker compose exec blog-app bash -c "php -m | grep pcov || echo 'PCOV not found'"

run-tests-coverage:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpunit --coverage-text --coverage-filter=src tests"

run-tests-coverage-pcov:
	docker compose exec blog-app bash -c "cd /opt/app && XDEBUG_MODE=off vendor/bin/phpunit --coverage-text --coverage-filter=src tests"

get-coverage-percentage:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpunit --coverage-clover=coverage.xml --coverage-filter=src tests && /opt/check-coverage.sh coverage.xml"
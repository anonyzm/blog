up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

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
	docker compose exec --user www-data blog-app composer install

composer-update:
	docker compose exec --user www-data blog-app composer update

run-linter:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpstan analyse src --memory-limit=2G"

run-tests:
	docker compose exec blog-app bash -c "cd /opt/app && vendor/bin/phpunit tests"
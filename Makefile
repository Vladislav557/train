create:
	./create-network.sh
	composer create-project symfony/skeleton:"6.3.*" symfony
	cp ./docker/composer.phar ./symfony

build:
	docker compose -f ./docker-compose.yml up --build -d
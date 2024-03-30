# Train project

## Running
1. make build
2. docker exec -it php_fpm bash
3. bin/console doctrine:schema:update -f
4. bin/console app:init-modifiers

## Running tests
1. make test_db_create
2. make test

## Documentation (api doc)
172.10.0.1:50030/travel/api1/doc
test:
	php bin/phpunit

test_report:
	XDEBUG_MODE=coverage ./composer.phar exec --verbose phpunit tests -- --coverage-html /var/www/symfony/report

test_db_drop:
	php bin/console --env=test doctrine:database:drop --force

test_db_create:
	php bin/console --env=test doctrine:database:drop --force
	php bin/console --env=test doctrine:database:create
	php bin/console --env=test doctrine:schema:create
	php bin/console --env=test app:init-modifiers


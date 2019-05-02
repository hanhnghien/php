Test Execution

`Composer`

    composer install
    phpunit --bootstrap vendor/autoload.php --colors tests

`Laradock`

    docker-compose exec --user=laradock workspace bash
    composer install
    phpunit --bootstrap vendor/autoload.php --colors tests
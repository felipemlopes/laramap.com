# CONTRIBUTING

1. Fork and clone the repository

+ Load dependencies

    ```
    composer install
    composer update
    ```

+ Create a local sqlite database

    ```
    touch storage/database.sqlite
    ```

+ Rename `.env.contributing` to `.env`

    ```
    mv .env .env.backup
    cp .env.contributing .env
    ```

+ Generate APP_KEY, this will update `.env`

    ```
    php artisan key:generate
    ```

+ Set `ROLLBAR_TOKEN` in `.env`, you may need to create a Rollbar (http://rollbar.com) account to get one.

+ Publish the vendor assets

    ```
    php artisan vendor:publish
    ```

+ Migrate the database

    ```
    php artisan migrate
    ```

+ Run the app

    ```
    php artisan serve
    ```

    You may now visit http://localhost:8000 to see if everything works correctly

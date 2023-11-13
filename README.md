# lerning-larabel-tutorial

# Environment

## docker

see: https://www.kagoya.jp/howto/cloud/container/docker_laravel/

Build and run containers.

```bash
$ docker compose up -d
```

## laravel app

see: https://laravel.com/docs/10.x#initial-configuration

### Configure Settings

In app container, create laravel app.

```bash
$ composer create-project laravel/laravel example-app
```

Configure laravel app to connect DB server.
* `exapmle-app/.env`

Specify values from DB container settings in `compose.yml`.

```plain
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=dbuser
DB_PASSWORD=dbpass
```

### Migrate DB

In app container, migrate db.

```bash
$ cd example-app
$ php artisan migrate
```

### Run Server

Run server as local.

```bash
$ cd example-app
$ php artisan serve --host 0.0.0.0
```

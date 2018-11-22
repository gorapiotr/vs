# Shelter app

### Routing app list
````
+--------+----------+----------------------+------+----------------------------------------------+------------+
| Domain | Method   | URI                  | Name | Action                                       | Middleware |
+--------+----------+----------------------+------+----------------------------------------------+------------+
|        | GET|HEAD | api/cats             |      | App\Http\Controllers\CatController@index     | api        |
|        | GET|HEAD | api/cats/{id}        |      | App\Http\Controllers\CatController@show      | api        |
|        | GET|HEAD | api/shelters         |      | App\Http\Controllers\ShelterController@index | api        |
|        | GET|HEAD | api/shelters/{uskey} |      | App\Http\Controllers\ShelterController@show  | api        |
+--------+----------+----------------------+------+----------------------------------------------+------------+
````

### Database UML diagram

![logo](https://firebasestorage.googleapis.com/v0/b/cmsimage-9ec21.appspot.com/o/Zrzut%20ekranu%202018-11-22%20o%2019.59.47.png?alt=media&token=62c845e5-a333-498c-8873-cac57485d21e)

### Database config
````
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=test
````

### Docker for app

[Link for docker .zip](https://github.com/gorapiotr/vs/tree/master/docker/docker.zip)
````
version: "3"
services:
    web:
        image: nginx:latest
        container_name: vs_nginx
        ports:
            - "80:80"
        volumes:
            - ./src:/code
            - ./nginx/site.conf:/etc/nginx/conf.d/default.conf
    php:
        build: ./php
        container_name: vs_php
        ports:
            - "9000:9000"
        working_dir: /code
        volumes:
            - ./src:/code
            - ./php/custom.ini:/usr/local/etc/php/conf.d/zzzzz-php.ini
    redis_db:
        image: redis:latest
        container_name: vs_redis_db
        ports:
            - "6379:6379"
        expose:
            - 6379
        volumes:
            - ./data/redis:/data
    database:
        image: mysql:5.7.22
        container_name: vs_mysql_db
        expose:
            - 3306
        ports:
            - "3306:3306"
        environment:
            - MYSQL_ROOT_PASSWORD=test
            - MYSQL_DATABASE=test
        volumes:
            - ./data/db:/var/lib/mysql
networks:
    app:
        driver: "bridge"
````

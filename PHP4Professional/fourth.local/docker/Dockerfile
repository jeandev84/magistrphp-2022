# https://hub.docker.com/_/php
# /usr/src/app путь к образе контейнер на машине
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR  /usr/src/myapp
CMD [ "php", "./index.php" ]
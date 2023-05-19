1. Configuration
```bash 
Create a Dockerfile in your PHP project
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./your-script.php" ]


Then, run the commands to build and run the Docker image:

$ docker build -t my-php-app .
$ docker run -it --rm --name my-running-app my-php-app
Run a single PHP script
For many simple, single file projects, you may find it inconvenient to write a complete Dockerfile. 
In such cases, you can run a PHP script by using the PHP Docker image directly:

$ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:7.4-cli php your-script.php
```


2. Docker Commands
```
 docker -h
Flag shorthand -h has been deprecated, please use --help

Usage:  docker [OPTIONS] COMMAND

A self-sufficient runtime for containers

Common Commands:
  run         Create and run a new container from an image
  exec        Execute a command in a running container
  ps          List containers
  build       Build an image from a Dockerfile
  pull        Download an image from a registry
  push        Upload an image to a registry
  images      List images
  login       Log in to a registry
  logout      Log out from a registry
  search      Search Docker Hub for images
  version     Show the Docker version information
  info        Display system-wide information

Management Commands:
  builder     Manage builds
  buildx*     Docker Buildx (Docker Inc., v0.10.4)
  compose*    Docker Compose (Docker Inc., v2.3.3)
  container   Manage containers
  context     Manage contexts
  image       Manage images
  manifest    Manage Docker image manifests and manifest lists
  network     Manage networks
  plugin      Manage plugins
  scan*       Docker Scan (Docker Inc., v0.23.0)
  system      Manage Docker
  trust       Manage trust on Docker images
  volume      Manage volumes

Swarm Commands:
  swarm       Manage Swarm

Commands:
  attach      Attach local standard input, output, and error streams to a running container
  commit      Create a new image from a container's changes
  cp          Copy files/folders between a container and the local filesystem
  create      Create a new container
  diff        Inspect changes to files or directories on a container's filesystem
  events      Get real time events from the server
  export      Export a container's filesystem as a tar archive
  history     Show the history of an image
  import      Import the contents from a tarball to create a filesystem image
  inspect     Return low-level information on Docker objects
  kill        Kill one or more running containers
  load        Load an image from a tar archive or STDIN
  logs        Fetch the logs of a container
  pause       Pause all processes within one or more containers
  port        List port mappings or a specific mapping for the container
  rename      Rename a container
  restart     Restart one or more containers
  rm          Remove one or more containers
  rmi         Remove one or more images
  save        Save one or more images to a tar archive (streamed to STDOUT by default)
  start       Start one or more stopped containers
  stats       Display a live stream of container(s) resource usage statistics
  stop        Stop one or more running containers
  tag         Create a tag TARGET_IMAGE that refers to SOURCE_IMAGE
  top         Display the running processes of a container
  unpause     Unpause all processes within one or more containers
  update      Update configuration of one or more containers
  wait        Block until one or more containers stop, then print their exit codes

Global Options:
      --config string      Location of client config files (default "/home/yao/.docker")
  -c, --context string     Name of the context to use to connect to the daemon (overrides DOCKER_HOST env var and default context set with "docker context use")
  -D, --debug              Enable debug mode
  -H, --host list          Daemon socket(s) to connect to
  -l, --log-level string   Set the logging level ("debug", "info", "warn", "error", "fatal") (default "info")
      --tls                Use TLS; implied by --tlsverify
      --tlscacert string   Trust certs signed only by this CA (default "/home/yao/.docker/ca.pem")
      --tlscert string     Path to TLS certificate file (default "/home/yao/.docker/cert.pem")
      --tlskey string      Path to TLS key file (default "/home/yao/.docker/key.pem")
      --tlsverify          Use TLS and verify the remote
  -v, --version            Print version information and quit

Run 'docker COMMAND --help' for more information on a command.

For more help on how to use Docker, head to https://docs.docker.com/go/guides/
```



3. Docker Stop Container BY ID
```
$ docker ps
CONTAINER ID   IMAGE                         COMMAND                  CREATED          STATUS          PORTS                                                                                                                                                                                                                                                                                          NAMES
4a5c6dc28c42   docker/getting-started        "/docker-entrypoint.…"   27 minutes ago   Up 27 minutes   0.0.0.0:80->80/tcp, :::80->80/tcp                                                                                                                                                                                                                                                              competent_volhard
1787a2604fb0   memcached:latest              "docker-entrypoint.s…"   7 weeks ago      Up 10 hours     0.0.0.0:13211->11211/tcp, :::13211->11211/tcp                                                                                                                                                                                                                                                  otusproject-memcached-1
234898a43d22   grafana/grafana               "/run.sh"                7 weeks ago      Up 10 hours     0.0.0.0:3000->3000/tcp, :::3000->3000/tcp                                                                                                                                                                                                                                                      grafana
b3aa987bae40   graphiteapp/graphite-statsd   "/entrypoint"            7 weeks ago      Up 10 hours     0.0.0.0:2003-2004->2003-2004/tcp, :::2003-2004->2003-2004/tcp, 2013-2014/tcp, 8080/tcp, 0.0.0.0:2023-2024->2023-2024/tcp, :::2023-2024->2023-2024/tcp, 0.0.0.0:8126->8126/tcp, :::8126->8126/tcp, 8125/tcp, 0.0.0.0:8125->8125/udp, :::8125->8125/udp, 0.0.0.0:8080->80/tcp, :::8080->80/tcp   graphite
1ad080344466   postgres:12                   "docker-entrypoint.s…"   7 weeks ago      Up 10 hours     0.0.0.0:15432->5432/tcp, :::15432->5432/tcp        

$ docker stop 4a5c6dc28c42
```


4. BUILD APPLICATION (IMAGES)
```bash 
$ docker build -t my-php-app .

[+] Building 5.8s (7/7) FINISHED                                                                                                                                                                                        
 => [internal] load build definition from Dockerfile                                                                                                                                                               0.1s
 => => transferring dockerfile: 230B                                                                                                                                                                               0.0s
 => [internal] load .dockerignore                                                                                                                                                                                  0.1s
 => => transferring context: 2B                                                                                                                                                                                    0.0s
 => [internal] load metadata for docker.io/library/php:7.4-cli                                                                                                                                                     5.5s
 => [internal] load build context                                                                                                                                                                                  0.0s
 => => transferring context: 10.12kB                                                                                                                                                                               0.0s
 => [1/3] FROM docker.io/library/php:7.4-cli@sha256:620a6b9f4d4feef2210026172570465e9d0c1de79766418d3affd09190a7fda5                                                                                               0.1s
 => [2/3] COPY . /usr/src/app                                                                                                                                                                                      0.1s
 => exporting to image                                                                                                                                                                                             0.0s
 => => exporting layers                                                                                                                                                                                            0.0s
 => => writing image sha256:61c5d4cfcca6fce2410d873826df612eef9903fc0dee91d3f77dca5c469d5002                                                                                                                       0.0s
 => => naming to docker.io/library/my-php-app   
 
 
$ docker run -it --rm --name my-running-app my-php-app


```


5. PHP APACHE DOCKER
- https://hub.docker.com/_/httpd
- https://hub.docker.com/r/mattrayner/lamp
- https://github.com/webdevops/Dockerfile
- [] webdevops/php:ubuntu-*
- [] webdevops/php-apache:ubuntu-*
```bash 
$ docker pull romeoz/docker-apache-php
$ docker run --name app -d -p 8080:80 romeoz/docker-apache-php
$ docker exec -it app bash
```



5. Запуска MYSQL (Установка mysql версия 8.0.2)
- https://hub.docker.com/_/mysql
```bash
$ docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=secret -d mysql:8.0.2
$ docker exec -it app bash
$ docker run -it --rm mysql mysql -hlocalhost -uroot -psecret
$ docker exec -it some-mysql bash -l
$ mysql> \s [See status mysql]
$ mysql> show databases;
```





6. Запуска несколько контейнер одновременно
- create file "docker-compose.yaml"
```bash 
$ docker compose up -d
```
### PSR

- http://php-fig.org/psr
- https://packagist.org/packages/monolog/monolog


1. Установка CodeSniffer
- https://github.com/squizlabs/PHP_CodeSniffer
```bash
$ composer require "squizlabs/php_codesniffer=*"
```


2. Запуск проверки кода через php_codesniffer
```bash
$ sudo apt install php-codesniffer [Install in linux]
$ cd /vendor/bin
/vendor/bin> php phpcs /src/SomeModule

Fix errors
/vendor/bin> php phpcbf src/SomeModule
```


3. Установка Coding Standards Fixer ( php-cs-fixer )
- https://github.com/FriendsOfPHP/PHP-CS-Fixer
```bash
composer require friendsofphp/php-cs-fixer
php php-cs-fixer.phar fix /path/to/dir --rules=line_ending,full_opening_tags

php-cs-fixer fix src/SomeModule
````


6. GuzzleHTTP 
```bash 
https://docs.guzzlephp.org/en/stable/quickstart.html#uploading-data
```

5. Install SLIM Framework
```bash 
https://www.slimframework.com/docs/v4/start/installation.html
composer require slim/slim:"4.*"
```
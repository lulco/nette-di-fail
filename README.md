# Nette DI fail

Nette DI 3.1.4 and 3.1.5 caused errors in our applications.

Steps to reproduce:

```shell
git clone git@github.com:lulco/nette-di-fail.git
cd nette-di-fail
composer install
rm -rf temp/*
php test.php
```

You will see error
```
PHP Fatal error:  Uncaught Nette\DI\InvalidConfigurationException: The item 'test › lang' expects to be string, object Nette\DI\DynamicParameter given. in /var/www/libs/lulco/nette-di-fail/vendor/nette/di/src/DI/Compiler.php:293
```

Run:
```shell
composer up nette/di --prefer-lowest
```

To install nette/di in version 3.1.3

Then run:
```shell
rm -rf temp/*
php test.php
```

You should see output like:
```
/var/www/libs/lulco/nette-di-fail/src/NetteDiFail/TestExtension.php:24:
class stdClass#79 (1) {
  public $lang =>
  string(2) "sk"
}
```

Problematic part seems to be parameter test.resolvers, even if they are not used in extension:
```neon
parameters:
    test:
        language: sk
        resolvers:
            - NetteDiFail\LangResolver()

```

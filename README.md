# Mano Wars

[![Build Status](https://travis-ci.org/rogeriopradoj/ManoWars.png?branch=master)](https://travis-ci.org/rogeriopradoj/ManoWars) [![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/rogeriopradoj/ManoWars/badges/quality-score.png?s=f1b7894e3ada78b8ea81da9f790ea7e3b89f8779)](https://scrutinizer-ci.com/g/rogeriopradoj/ManoWars/) [![Code Coverage](https://scrutinizer-ci.com/g/rogeriopradoj/ManoWars/badges/coverage.png?s=ee15ca0f9e783a480f056ff32247a044477b00d6)](https://scrutinizer-ci.com/g/rogeriopradoj/ManoWars/)

- *Author*: Rafael Dohms - rdohms @ phpsp .org . br
- *Author*: Augusto Pascutti - augusto @ phpsp . org . br
- *Author*: Rogerio Prado de Jesus - rogeriopradoj @ gmail . com

Pequeno projeto para aplicar o uso de ferramentas de qualidade em PHP.

Existem testes para as classes existentes assim como um build.xml para utilização do PHING para construção de pacote.

O projeto pode ser facilmente estendido e utilizado para testes próprios.

Em setembro de 2013 a estrutura do projeto foi refeita para usar o Composer para gestão das dependências.

Divirtam-se!

## Palestras relacionadas

- [http://slideshare.net/rdohms/e-no-stimo-dia-ele-escreveu-testes-seminario-php](http://slideshare.net/rdohms/e-no-stimo-dia-ele-escreveu-testes-seminario-php)
- [http://slideshare.net/augustopascutti/ic-5078492](http://slideshare.net/augustopascutti/ic-5078492)
- [http://www.slideshare.net/rogeriopradoj/composer-para-gesto-de-dependncias-encontro-php-season](http://www.slideshare.net/rogeriopradoj/composer-para-gesto-de-dependncias-encontro-php-season)

## Requisitos

- [PHP 5.3+](http://php.net/)
- [Composer](http://getcomposer.org/) (que irá gerenciar as dependências e cuidar do autoload. Veja o [composer.json](https://github.com/rogeriopradoj/ManoWars/blob/master/composer.json) para a lista completa)
- [Xdebug](http://xdebug.org/) (é usado para geração de relatórios no build)
- [Git](http://git-scm.com/) (é usado para geração de relatórios no build)

## Instalação

Estrutura de diretórios:

* build.xml - utilizado pelo PHING
* composer.json - config do Composer, para gerenciamento das dependências
* composer.lock - trava das dependências do Composer
* init.php - arquivo de inicialização da app
* libs - aplicação
* phpunit.xml.dist - config do PHPUnit, para testes unitários
* public - deve ser o document root do apache
* README.md - este arquivo
* tests - testes unitários

Na raiz do projeto, use o Composer para instalar todas as dependências e geração do autoload.

```bash
$ composer install
```

Configure seu servidor web para usar o diretório *public*.

Se estiver usando PHP 5.4+, pode usar o servidor embutido:

```bash
$ php -S -t public localhost:9876
```

Pronto, a aplicação já deve ser acessível (no exemplo acima pelo endereço [http://localhost:9876](http://localhost:9876)).

## Execuções das demais ferramentas

Todos os comandos abaixo são executados na raiz do projeto, onde tem o arquivo "build.xml":

### PHING

```bash
$ vendor/bin/phing
```

### PHPUnit

```bash
$ vendor/bin/phpunit
```

### PHP_Depend

```bash
$ vendor/bin/pdepend libs
```

### PHPCPD

```bash
$ vendor/bin/phpcpd libs
```

### PHP Code Sniffer

```bash
$ vendor/bin/phpcs --standard=Zend --report-summary init.php libs
```

### PHP Mess Detector

```bash
$ vendor/bin/phpmd libs text cleancode,codesize,controversial,design,naming,unusedcode
```

### PHP Documentator

```bash
$ vendor/bin/phpdoc.php --progressbar --sourcecode
```

### PHP Loc

```bash
$ vendor/bin/phploc --progress libs tests init.php
```

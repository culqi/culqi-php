# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

La biblioteca Culqi para PHP un acceso adecuado a la API de Culqi desde aplicaciones escritas en PHP. Esta biblioteca solo es compatible con la versión 2 del API de Culqi.

## Requerimientos

PHP 5.3 a versiones mas recientes.

## Composer

Puedes instalar [Composer](http://getcomposer.org/README.es.md). Ejecutando el siguiente comando:

```sh
composer require culqi/culqi-php
```

Para usar la biblioteca, usa [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading) de Composer:

```php
require_once('vendor/autoload.php');
```

## Instalación Manual

Si no deseas usar Composer, puedes descargar el [último lanzamiento](https://github.com/culqi/culqi-php/releases). Luego, para usar la biblioteca, incluye el archivo `culqi.php`.

```php
require_once('/ruta/a/culqi-php/lib/culqi.php');
```

## Documentación

| API             | Documentation                                                 |
| --------------- | ------------------------------------------------------------- |
| `cards`         | [Documentación de Tarjetas](cards/README.es.md)               |
| `charges`       | [Documentación de Cargos](charges/README.es.md)               |
| `customers`     | [Documentación de Clientes](customers/README.es.md)           |
| `events`        | [Documentación de Eventos](events/README.es.md)               |
| `orders`        | [Documentación de Ordenes](orders/README.es.md)               |
| `plans`         | [Documentación de Planes](plans/README.es.md)                 |
| `refunds`       | [Documentación de Devoluciones](refunds/README.es.md)         |
| `subscriptions` | [Documentación de Subscripciones](subscriptions/README.es.md) |
| `tokens`        | [Documentación de Tokens](tokens/README.es.md)                |

# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

[Español](README.md) |
[English](../../README.md)

La biblioteca Culqi para PHP un acceso adecuado a la API de Culqi desde aplicaciones escritas en PHP. Esta biblioteca solo es compatible con la versión 2 del API de Culqi.

## Requerimientos

PHP 5.3 a versiones mas recientes.

## Composer

Puedes instalar [Composer](http://getcomposer.org/lang/es/README.md). Ejecutando el siguiente comando:

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

| API             | Documentation                                                                         |
| --------------- | ------------------------------------------------------------------------------------- |
| `cards`         | 📃 [Documentación de Tarjetas](../../resources/cards/lang/es/README.md)               |
| `charges`       | 📃 [Documentación de Cargos](../../resources/charges/lang/es/README.md)               |
| `customers`     | 📃 [Documentación de Clientes](../../resources/customers/lang/es/README.md)           |
| `events`        | 📃 [Documentación de Eventos](../../resources/events/lang/es/README.md)               |
| `orders`        | 📃 [Documentación de Ordenes](../../resources/orders/lang/es/README.md)               |
| `plans`         | 📃 [Documentación de Planes](../../resources/plans/lang/es/README.md)                 |
| `refunds`       | 📃 [Documentación de Devoluciones](../../resources/refunds/lang/es/README.md)         |
| `subscriptions` | 📃 [Documentación de Subscripciones](../../resources/subscriptions/lang/es/README.md) |
| `tokens`        | 📃 [Documentación de Tokens](../../resources/tokens/lang/es/README.md)                |

# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

#### Languages

[Español](/docs/README.es.md) |
[English](/docs/README.md)

The Culqi PHP library provides convenient access to the Culqi API from
applications written in the PHP language. This library is only compatible with the version 2 of the Culqi API.

## Requirements

PHP 5.3 and later.

## Composer

You can install via [Composer](http://getcomposer.org/). Run the following command:

```sh
composer require culqi/culqi-php
```

To use the library, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/culqi/culqi-php/releases). Then, to use the library, include the `culqi.php` file.

```php
require_once('/path/to/culqi-php/lib/culqi.php');
```

## Documentation

| API             | Documentation                                          |
| --------------- | ------------------------------------------------------ |
| `cards`         | [Cards Documentation](cards/README.md)                 |
| `charges`       | [Charges Documentation](charges/README.md)             |
| `customers`     | [Customers Documentation](customers/README.md)         |
| `events`        | [Events Documentation](events/README.md)               |
| `orders`        | [Orders Documentation](orders/README.md)               |
| `plans`         | [Plans Documentation](plans/README.md)                 |
| `refunds`       | [Refunds Documentation](refunds/README.md)             |
| `subscriptions` | [Subscriptions Documentation](subscriptions/README.md) |
| `tokens`        | [Tokens Documentation](tokens/README.md)               |
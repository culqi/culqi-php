# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

Biblioteca PHP oficial de CULQI, pagos simples en tu sitio web.


**Nota**: Esta biblioteca trabaja con la [v2.0](https://culqi.github.io/api-docs/) (BETA) de Culqi API.


## Requisitos

* PHP 5.3 o superiores.
* Credenciales de comercio Culqi (1).

(1) Debes registrarte [aquí](https://integ-panel.culqi.com/#/registro). Luego, crear un comercio y estando en el panel, acceder a Desarrollo > [***API Keys***](https://integ-panel.culqi.com/#/panel/comercio/desarrollo/llaves).

![alt tag](http://i.imgur.com/NhE6mS9.png)

## Instalación

### Vía Composer
```json
{
  "require": {
    "culqi/culqi-php": "1.3.*"
  }
}
```

Y cargar todo usando el autoloader de Composer.

```php
require 'vendor/autoload.php';
```

### Manualmente

Clonarse el repositorio o bajarse el código fuente

```bash
$ git clone git@github.com:culqi/culqi-php.git
```

Ahora, incluir en la cabecera a `culqi-php` y también la dependencia [`Requests`](https://github.com/rmccue/requests). Debes hacer el llamado correctamente a la carpeta y/o archivo dependiendo de tu estructura.

```php
<?php
// Cargamos Requests y Culqi PHP
require 'vendor/rmccue/requests/library/Requests.php';
Requests::register_autoloader();
require 'vendor/culqi/culqi-php/lib/culqi.php';
```

## Modo de uso

En todos ejemplos, inicialmente hay que configurar la credencial `$SECRET_API_KEY ` y el entorno en el que nos encontramos (Integración o [Producción](https://developers.culqi.com/produccion/).).

```php
// Configurar tu API Key y autenticación
$SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));
```

### Crear un token (Usarlo SOLO en DESARROLLO)

Antes de crear un Cargo, Plan o un Suscriptor es necesario crear un `token` de tarjeta. Dentro de esta librería se encuentra una funcionalidad para generar 'tokens', pero solo
debe ser usada para **desarrollo**. Lo recomendable es generar los 'tokens' con **CULQI.JS** cuando pases a producción, **debido a que es muy importante que los datos de tarjeta sean enviados desde el dispositivo de tus clientes directamente a los servidores de Culqi**, para no poner en riesgo información sensible.


### Crear un cargo (Cargos)
Crear un cargo significa cobrar una venta a una tarjeta. Para esto previamente
deberías obtener el  `token` que refiera a la tarjeta de tu cliente.


```php

// Creamos Cargo a una tarjeta
  $cargo = $culqi->Cargos->create(
      array(
          "address" => "Avenida Lima 1232",
          "address_city" => "LIMA",
          "amount" => 1000,
          "country_code" => "PE",
          "currency_code" => "PEN",
          "cvv" => "123",
          "email" => "wmuro@me.com",
          "first_name" => "William",
          "installments" => 0,
          "last_name" => "Muro",
          "metadata" => "",
          "order_id" => time(),
          "phone_number" => 3333339,
          "product_description" => "Venta de prueba",
          "token_id" => "tkn_test_YrZIHNzDCDV9Cvz2"
      )
  );

//Respuesta
print_r($cargo);

```

### Crear un suscriptor a un plan (Suscripciones)
```php
// Creando Suscriptor a un plan
  $suscriptor = $culqi->Suscripciones->create(
    array(
        "address" => "Avenida Lima 123213",
        "address_city" => "LIMA",
        "country_code" => "PE",
        "email" => "wmuro@me.com",
        "last_name" => "Muro",
        "first_name" => "William",
        "phone_number" => 1234567789,
        "plan_alias" => "plan-test-CULQI101",
        "token_id" => "tkn_test_YrZIHNzDCDV9Cvz2"
    )
  );

//Respuesta
print_r($suscriptor);
```
## Probar ejemplos
```bash
$ git clone https://github.com/culqi/culqi-php.git
$ composer install
$ cd culqi-php/examples
$ php -S localhost:8000
```

## Documentación
¿Necesitas más información para integrar `culqi-php`? La documentación completa se encuentra en [https://developers.culqi.com](https://developers.culqi.com)


## Tests

```bash
$ composer install
$ phpunit tests/*
```
## Licencia

Licencia MIT. Revisar el LICENSE.md.

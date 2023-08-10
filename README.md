# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

Nuestra Biblioteca PHP oficial de CULQI, es compatible con la [v2.0](https://culqi.com/api/) del Culqi API, con el cual tendrás la posibilidad de realizar cobros con tarjetas de débito y crédito, Yape, PagoEfectivo, billeteras móviles y Cuotéalo con solo unos simples pasos de configuración.


## Requisitos 

* PHP 5.6 o superiores.
* Afiliate [aquí](https://afiliate.culqi.com/).
* Si vas a realizar pruebas obtén tus llaves desde [aquí](https://integ-panel.culqi.com/#/registro), si vas a realizar transacciones reales obtén tus llaves desde [aquí](https://panel.culqi.com/#/registro) (1).

> Recuerda que para obtener tus llaves debes ingresar a tu CulqiPanel > Desarrollo > ***API Keys***.

![alt tag](http://i.imgur.com/NhE6mS9.png)

> Recuerda que las credenciales son enviadas al correo que registraste en el proceso de afiliación.

## Instalación

### 1. Vía Composer
```json
{
  "require": {
    "culqi/culqi-php": "1.5.2"
  }
}
```

Y cargar todo usando el autoloader de Composer.

```php
require 'vendor/autoload.php';
```

### 2. Manualmente

Clonar el repositorio o descargar el código fuente

```bash
git clone git@github.com:culqi/culqi-php.git
```

Ahora, incluir en la cabecera a `culqi-php` y también la dependencia [`Requests`](https://github.com/rmccue/requests). Debes hacer el llamado correctamente a la carpeta y/o archivo dependiendo de tu estructura.

```php
<?php
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'/libraries/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/libraries/culqi-php/lib/culqi.php';
```

Luego ejecuta composer install

```bash
composer install
```

## Configuración

Como primer paso hay que configurar la credencial `$API_KEY `

```php
// Configurar tu API Key y autenticación
$SECRET_KEY = "sk_test_jasd6939ujn62g26";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
```

> Recuerda que las llaves de integración se identifican como "test" y las de producción como "live".

## Encriptar payload

Para encriptar el payload necesitas crear un id RSA y llave RSA, para esto debes ingresa a tu panel y hacer click en la sección “Desarrollo / RSA Keys” de la barra de navegación a la mano izquierda.

Luego declara en variables el id RSA y llave RSA en tu backend, y envialo en las funciones de la librería.

Ejemplo

```php
$encryption_params = array(
  "rsa_public_key" => "la llave pública RSA",
  "rsa_id" => "el id de tu llave"
);

$token = $culqi->Tokens->create(
    $req_body,
    $encryption_params
  );
```

## Crear un token

Antes de crear un Cargo, Plan o un Suscripción es necesario crear un `token` de tarjeta. 
Dentro de esta librería se encuentra una funcionalidad para generar 'tokens', pero solo debe ser usada para el ambiente de **Integración**.

Lo recomendable es generar los 'tokens' con **Checkout v4** o **CULQI.JS v4**, **debido a que es muy importante que los datos de tarjeta sean enviados desde el dispositivo de tus clientes directamente a los servidores de Culqi**, para no poner en riesgo los datos sensibles de la tarjeta de crédito/débito.

> Recuerda que cuando interactúas directamente con el API necesitas cumplir la normativa de PCI DSS 3.2. Por ello, te pedimos que llenes el formulario SAQ-D y lo envíes al buzón de riesgos Culqi.

## Crear un cargo

Crear un cargo significa cobrar una venta a una tarjeta. Para esto previamente
deberías obtener el  `token` que refiera a la tarjeta de tu cliente.

```php
// Creamos Cargo a una tarjeta
$charge = $culqi->Charges->create(
    array(
      "amount" => 1000,
      "capture" => true,
      "currency_code" => "PEN",
      "description" => "Venta de prueba",
      "email" => "test@culqi.com",
      "installments" => 0,
      "antifraud_details" => array(
          "address" => "Av. Lima 123",
          "address_city" => "LIMA",
          "country_code" => "PE",
          "first_name" => "Test_Nombre",
          "last_name" => "Test_apellido",
          "phone_number" => "9889678986",
      ),
      "source_id" => "{token_id o card_id}"
    )
);

//Respuesta
print_r($charge);
```
## Crear un Plan

```php
$plan = $culqi->Plans->create(
  array(
    "alias" => "plan-culqi".uniqid(),
    "amount" => 10000,
    "currency_code" => "PEN",
    "interval" => "dias",
    "interval_count" => 1,
    "limit" => 12,
    "name" => "Plan de Prueba ".uniqid(),
    "trial_days" => 15
  )
);

//Respuesta
print_r($plan);
```

## Crear un Customer

```php
$customer = $culqi->Customers->create(
  array(
    "address" => "av lima 123",
    "address_city" => "lima",
    "country_code" => "PE",
    "email" => "www@".uniqid()."me.com",
    "first_name" => "Will",
    "last_name" => "Muro",
    "metadata" => array("test"=>"test"),
    "phone_number" => 899898999
  )
);
print_r($customer);
```

## Crear un Card

```php
$card = $culqi->Cards->create(
  array(
    "customer_id" => "{customer_id}",
    "token_id" => "{token_id}"
  )
);
print_r($card);
```

## Crear un Suscripción a un plan

```php
// Creando Suscriptor a un plan
$subscription = $culqi->Subscriptions->create(
  array(
    "card_id" => "{card_id}",
    "plan_id" => "{plan_id}"
  )
);

//Respuesta
print_r($subscription);
```

## Crear una Orden 

[Ver ejemplo completo](/examples/08-create-order.php)

```php
// Creando orden (con 1 dia de duracion)
$order = $culqi->Orders->create(
      array(
        "amount" => 1000,
        "currency_code" => "PEN",
        "description" => 'Venta de prueba',        
        "order_number" => 'pedido-9999',  
        "client_details" => array( 
            "first_name"=> "Brayan", 
            "last_name" => "Cruces",
            "email" => "micorreo@gmail.com", 
            "phone_number" => "51945145222"
         ),
        "expiration_date" => time() + 24*60*60   // Orden con un dia de validez
      )
);
print_r($order);
```

## Pruebas

Antes de activar tu tienda en producción, te recomendamos realizar pruebas de integración. Así garantizarás un correcto despliegue.

Si vas a empezar a vender desde tu tienda virtual, deberás seleccionar el ambiente de producción e ingresar tus llaves.

> Recuerda que si quieres probar tu integración, puedes utilizar nuestras [tarjetas de prueba.](https://docs.culqi.com/es/documentacion/pagos-online/tarjetas-de-prueba/)

Descarga los ejemplos desde:

```bash
git clone https://github.com/culqi/culqi-php.git
composer install
cd culqi-php/examples
php -S 0.0.0.0:8000
```

## Documentación
¿Necesitas más información para integrar `culqi-php`? La documentación completa se encuentra en [https://culqi.com/docs/](https://culqi.com/docs/)


## Tests

```bash
composer install
phpunit --verbose --tap tests/*
```
## Licencia

Licencia MIT. Revisar el LICENSE.md.

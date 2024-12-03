# Culqi-HP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

Nuestra Biblioteca PHP oficial, es compatible con la V2.0 del Culqi API, con el cual tendrás la posibilidad de realizar cobros con tarjetas de débito y crédito, Yape, PagoEfectivo, billeteras móviles y Cuotéalo con solo unos simples pasos de configuración.

Nuestra biblioteca te da la posibilidad de capturar el status_code de la solicitud HTTP que se realiza al API de Culqi, así como el response que contiene el cuerpo de la respuesta obtenida.


## Requisitos 

* PHP 5.6+.
* Afiliate [aquí](https://afiliate.culqi.com/).
* Si vas a realizar pruebas obtén tus llaves desde [aquí](https://integ-panel.culqi.com/#/registro), si vas a realizar transacciones reales obtén tus llaves desde [aquí](https://panel.culqi.com/#/registro) (1).

> Recuerda que para obtener tus llaves debes ingresar a tu CulqiPanel > Desarrollo > ***API Keys***.

![alt tag](http://i.imgur.com/NhE6mS9.png)

> Recuerda que las credenciales son enviadas al correo que registraste en el proceso de afiliación.

* Para encriptar el payload debes generar un id y llave RSA ingresando a CulqiPanel > Desarrollo > RSA Keys.

## Instalación

### 1. Vía Composer
```json
{
  "require": {
    "culqi/culqi-php": "2.0.4"
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
$PUBLIC_KEY = "{PUBLIC KEY}";
$SECRET_KEY = "{SECRET KEY}";
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
 $req_body = array(
    "card_number" => "4111111111111111",
    "cvv" => "123",
    "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
    "expiration_month" => "7",
    "expiration_year" => $futureDate,
    "fingerprint" => uniqid(),
    "metadata" => array("dni" => "71702935")
);
$token = $culqi->Tokens->create(
    $req_body,
    $encryption_params
  );
```

## Servicios

### Crear un token

Antes de crear un Cargo o Card es necesario crear un `token` de tarjeta. 
Lo recomendable es generar los 'tokens' con [Culqi Checkout v4](https://docs.culqi.com/es/documentacion/checkout/v4/culqi-checkout/) o [Culqi JS v4](https://docs.culqi.com/es/documentacion/culqi-js/v4/culqi-js/) **debido a que es muy importante que los datos de tarjeta sean enviados desde el dispositivo de tus clientes directamente a los servidores de Culqi**, para no poner en riesgo los datos sensibles de la tarjeta de crédito/débito.

> Recuerda que cuando interactúas directamente con el [API Token](https://apidocs.culqi.com/#tag/Tokens/operation/crear-token) necesitas cumplir la normativa de PCI DSS 3.2. Por ello, te pedimos que llenes el [formulario SAQ-D](https://listings.pcisecuritystandards.org/documents/SAQ_D_v3_Merchant.pdf) y lo envíes al buzón de riesgos Culqi.

```php
$req_body = array(
  "card_number" => "4111111111111111",
  "cvv" => "123",
  "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
  "expiration_month" => "7",
  "expiration_year" => $futureDate,
  "fingerprint" => uniqid(),
  "metadata" => array("dni" => "71702935")
);
  
// Creando token a una tarjeta sin encriptar
$token = $culqi->Tokens->create(
  $req_body
);

//Respuesta
print_r($charge);
```

### Crear un cargo

Crear un cargo significa cobrar una venta a una tarjeta. Para esto previamente deberías generar el  `token` y enviarlo en parámetro **source_id**.

Los cargos pueden ser creados vía [API de cargo](https://apidocs.culqi.com/#tag/Cargos/operation/crear-cargo).

```php
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

### Crear Cargo con Configuración Adicional

**¿Cómo funciona la configuración adicional?**

Puedes agregar campos configurables en la sección **custom_headers** para personalizar las solicitudes de cobro. Es importante tener en cuenta que no se permiten campos con valores **false**, **null**, o cadenas vacías (**''**).

**Explicación:**
- **params**: Contiene la información necesaria para crear el cargo, como el monto, la moneda, y el correo del cliente.
- **custom_headers**: Define los encabezados personalizados para la solicitud. Recuerda que solo se permiten valores válidos.
- **Filtrado de encabezados**: Antes de realizar la solicitud, se eliminan los encabezados con valores no permitidos (**false, null, o vacíos**) para garantizar que la solicitud sea aceptada por la API.

**¿Quieres realizar cobros a una lista de comercios en un tiempo y monto determinado?**

Para realizar un cobro recurrente, puedes utilizar el siguiente código (**Configuración Adicional -> custom_headers**):

```php
$req_body =  array(
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
);

$custom_headers = array(
  "X-Charge-Channel" => 'recurrent'
);

$charge = $culqi->Charges->create($req_body, [], $custom_headers);
//Respuesta
print_r($charge);
```
**Solo habilitado para metodos POST**
### Crear una devolución

Solicita la devolución de las compras de tus clientes (parcial o total) de forma gratuita a través del API y CulqiPanel. 

Las devoluciones pueden ser creados vía [API de devolución](https://apidocs.culqi.com/#tag/Devoluciones/operation/crear-devolucion).

```php
$req_body = array(
  "amount" => 500,
  "charge_id" => "{charge_id}",
  "reason" => "bought an incorrect product"
);

// Creando una devolución sin encriptar
$refund = $culqi->Refunds->create(
  $req_body
);

//Respuesta
print_r($refund);
```

### Crear un Cliente

El **cliente** es un servicio que te permite guardar la información de tus clientes. Es un paso necesario para generar una [tarjeta](/es/documentacion/pagos-online/recurrencia/one-click/tarjetas).

Los clientes pueden ser creados vía [API de cliente](https://apidocs.culqi.com/#tag/Clientes/operation/crear-cliente).

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

### Crear un Card

La **tarjeta** es un servicio que te permite guardar la información de las tarjetas de crédito o débito de tus clientes para luego realizarles cargos one click o recurrentes (cargos posteriores sin que tus clientes vuelvan a ingresar los datos de su tarjeta).

Las tarjetas pueden ser creadas vía [API de tarjeta](https://apidocs.culqi.com/#tag/Tarjetas/operation/crear-tarjeta).

```php
$card = $culqi->Cards->create(
  array(
    "customer_id" => "{customer_id}",
    "token_id" => "{token_id}"
  )
);
print_r($card);
```

### Crear un Plan

El plan es un servicio que te permite definir con qué frecuencia deseas realizar cobros a tus clientes.

Un plan define el comportamiento de las suscripciones. Los planes pueden ser creados vía el [API de Plan](https://apidocs.culqi.com/#/planes#create) o desde el **CulqiPanel**.

```php
$plan = $culqi->Plans->create(
  array(
    "interval_unit_time" => 1,
    "interval_count" => 1,
    "amount" => 300,
    "name" => "Plan mensual" . uniqid(),
    "description" => "Plan-mock" . uniqid(),
    "short_name" => "pln-" . uniqid(),
    "currency" => "PEN",
    "metadata" => json_decode('{}'),
    "initial_cycles" => array(
      "count" => 0,
      "amount" => 0,
      "has_initial_charge" => false,
      "interval_unit_time" => 1
    ),
  )
);

//Respuesta
print_r($plan);
```

### Crear un Suscripción a un plan

La suscripción es un servicio que asocia la tarjeta de un cliente con un plan establecido por el comercio.

Las suscripciones pueden ser creadas vía [API de suscripción](https://apidocs.culqi.com/#tag/Suscripciones/operation/crear-suscripcion).

```php
// Creando Suscriptor a un plan
$subscription = $culqi->Subscriptions->create(
  array(
    "card_id" => "crd_live_tjHaW6x5Dj2oKhrS",
    "plan_id" => "pln_live_0HzG8Edqy0aUIusL",
    "tyc" => true,
    "metadata" => array("envtest" => "SDK-JAVA"),
  )
);

//Respuesta
print_r($subscription);
```

### Crear una Orden 

Es un servicio que te permite generar una orden de pago para una compra potencial.
La orden contiene la información necesaria para la venta y es usado por el sistema de **PagoEfectivo** para realizar los pagos diferidos.

Las órdenes pueden ser creadas vía [API de orden](https://apidocs.culqi.com/#tag/Ordenes/operation/crear-orden).

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

### Ejemplo Prueba Token

```php
$PUBLIC_KEY = "{PUBLIC KEY}";
$culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
$futureDate = date('Y', strtotime('+1 year'));
$encryption_params = array(
  "rsa_public_key" => "",
  "rsa_id" => ""
);

$req_body = array(
  "card_number" => "4111111111111111",
  "cvv" => "123",
  "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
  "expiration_month" => "7",
  "expiration_year" => $futureDate,
  "fingerprint" => uniqid(),
  "metadata" => array("dni" => "71702935")
);
  
// Creando token a una tarjeta sin encriptar
$token = $culqi->Tokens->create(
  $req_body
);

```

### Ejemplo Prueba Cargo

```php
$SECRET_KEY = "{SECRET KEY}";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

//Datos para encriptar
$encryption_params = array(
  "rsa_public_key" => "",
  "rsa_id" => ""
);

//3ds object, la primera vez que se consume el servicio no se debe enviar los parámetros 3ds
$tds_xid = $_POST["xid"];
$tds = array("authentication_3DS" => array(
  "eci" => $_POST["eci"],
  "xid" => $tds_xid,
  "cavv" => $_POST["cavv"],
  "protocolVersion" => $_POST["protocolVersion"],
  "directoryServerTransactionId" => $_POST["directoryServerTransactionId"]
));

$req_body = array(
  "amount" => 10000,
  "capture" => true,
  "currency_code" => "PEN",
  "description" => "Venta de prueba",
  "installments" => 0,
  "email" => "test@culqi.com",
  "metadata" => array("test"=>"test"),
  "source_id" => "" // previamente generado usando create token
);


$with_tds = ($req_body) + (isset($tds_xid) ? $tds : array());

// Creando Cargo sin encriptar a una tarjeta
$charge = $culqi->Charges->create($with_tds);
// Respuesta
echo "<b>Cargo sin encriptar payload:</b> "."<br>".json_encode($charge)."<br>";

// Creando Cargo con encriptación a una tarjeta
$charge = $culqi->Charges->create($with_tds, $encryption_params);
```

## Tests

```bash
composer install
phpunit --verbose --tap tests/*
```

## Ejecución de Ejemplos

Para ejecutar los ejemplos disponibles en nuestro SDK, sigue estos pasos:

1. Abre tu terminal y navega a la carpeta "examples" del proyecto.

2. Ejecuta el comando correspondiente para la operación que deseas probar:

```bash
   # Ejecutar el ejemplo de creación de planes
   php examples/plan/02-create-plan.php

   # Ejecutar el ejemplo de creación de suscripciones
   php examples/subscription/01-create-subscription.php
```
Asegúrate de tener todos los requisitos previos y configuraciones necesarias antes de ejecutar los ejemplos. 
Ten en cuenta que el nombre del archivo a ejecutar puede variar según la operación que estés probando.

## Documentación

- [Referencia de Documentación](https://docs.culqi.com/)
- [Referencia de API](https://apidocs.culqi.com/)
- [Demo Checkout V4 + Culqi 3DS](https://github.com/culqi/culqi-php-demo-checkoutv4-culqi3ds)
- [Wiki](https://github.com/culqi/culqi-php/wiki)

## Changelog

Todos los cambios en las versiones de esta biblioteca están listados en
[CHANGELOG.md](CHANGELOG.md).

## Autor
Team Culqi

## Licencia
Licencia MIT. Revisar el LICENSE.md.

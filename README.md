
# Culqi PHP

[![Latest Stable Version](https://poser.pugx.org/culqi/culqi-php/v/stable)](https://packagist.org/packages/culqi/culqi-php)
[![Total Downloads](https://poser.pugx.org/culqi/culqi-php/downloads)](https://packagist.org/packages/culqi/culqi-php)
[![License](https://poser.pugx.org/culqi/culqi-php/license)](https://packagist.org/packages/culqi/culqi-php)

Libería PHP oficial de CULQI, pagos simples en tu sitio web, que hace uso del [Culqi API](http://culqi.api-docs.io/).

**Nota**: Esta librería trabaja con la [v1.2](https://culqi.api-docs.io/v1.2) de Culqi API.


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
    "culqi/culqi-php": "dev-develop"
  }
}
```

Y cargar todo usando el autoloader de Composer

```php
require 'vendor/autoload.php';
```

### Manualmente

Clonarse el repositorio o bajarse el código fuente

```bash
$ git clone git@github.com:culqi/culqi-php.git
```

Ahora, incluir en la cabecera a `culqi-php` y también la dependencia `Request`

```php
<?php
// Cargamos Culqi PHP y librería Request
require_once '/path/to/culqi-php/lib/culqi.php';
require_once '/path/to/rmccue/requests/Requests.php';
Requests::register_autoloader();
```

## Modo de uso

En todos ejemplos, inicialmente hay que configurar la credencial `$SECRET_API_KEY `.

```php
// Configurar credencial (API Key)
$SECRET_API_KEY = "Ad12344hyhfgX";

// Autenticación
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
        "moneda"=> "PEN",
        "monto"=> "19900",    
        "descripcion"=> "Venta de prueba",
        "numero_pedido"=> "11213340",
        "cod_pais"=> "PE",
        "direccion"=> "Avenida Lima 1232",
        "ciudad"=> "Lima",
        "telefono"=> "12313123",
        "nombres"=> "Jon",
        "apellidos"=> "Doe",
        "correo_electronico"=> "jon@gmail.com",
        "token"=> "wNjBRhnEKFtBEEiRiNdTCVj7ogiNJ1Q8",
        "id_usuario_comercio"=> "jon@gmail.com"
    )
);
print_r($cargo);

```

### Crear un suscriptor a un plan (Suscripciones)
```php
// Creando Suscriptor a un plan
$suscriptor = $culqi->Suscripciones->create(
    array(
        "codigo_comercio" => $COD_COMERCIO,
        "codigo_pais"=> "PE",
        "direccion"=> "Avenida Lima 123213",
        "ciudad"=> "Lima",
        "telefono"=> "1234567789",
        "nombre"=> "Brayan",
        "correo_electronico"=> "brayan2259@gmail.com",
        "apellido"=> "Cruces",
        "usuario"=> "jose@gmail.com",
        "plan_id"=> "PP02",
        "token"=> "wNjBRhnEKFtBEEiRiNdTCVj7ogiNJ1Q8"
    )
);
print_r($suscriptor);
```

## Documentación
¿Necesitas más información para integrar `culqi-php`? La documentación completa se encuentra en [http://beta.culqi.com/documentacion/](http://beta.culqi.com/documentacion/)



## Testeo

## Licencia

MIT.

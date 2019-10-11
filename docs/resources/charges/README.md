[🔙](../../README.md)

# Charges

[Español](lang/es/README.md) |
[English](README.md)

Para realizar un cargo a una tarjeta de débito o crédito debes crear un objeto cargo. Adicionalmente puedes consultar, devolver un cargo en particular o listar tu historial de cargos en base a los filtros que desees. Todos los cargos están identificados por un ID.

#### Endpoints

| HTTP Method | Endpoints                              | Documentation                                            |
| ----------- | -------------------------------------- | -------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/charges`     | [View Details](https://www.culqi.com/api/#cargos#create) |
| `GET`       | `https://api.culqi.com/v2/charges/:id` | [View Details](https://www.culqi.com/api/#cargos#detail) |
| `GET`       | `https://api.culqi.com/v2/charges`     | [View Details](https://www.culqi.com/api/#cargos#list)   |
| `PATCH`     | `https://api.culqi.com/v2/charges/:id` | [View Details](https://www.culqi.com/api/#cargos#update) |
| `DELETE`    | `https://api.culqi.com/v2/charges/:id` | [View Details](https://www.culqi.com/api/#cargos#delete) |

#### The Charge Object

```json
{
  "duplicated": false,
  "object": "charge",
  "id": "chr_live_kEazTaQBDtzNdwFr",
  "amount": 10000,
  "amount_refunded": 0,
  "current_amount": 10000,
  "installments": 0,
  "installments_amount": null,
  "currency": "PEN",
  "email": null,
  "description": null,
  "source": {
    "object": "token",
    "id": "tkn_live_701ug3CDNJOAt5Q6",
    "type": "card",
    "creation_date": 1487021247000,
    "card_number": "411111******1111",
    "last_four": "1111",
    "active": true,
    "iin": {
      "object": "iin",
      "bin": "411111",
      "card_brand": "Visa",
      "card_type": "credit",
      "card_category": "Clásica",
      "issuer": {
        "name": "JPMORGAN CHASE BANK, N.A.",
        "country": "United States",
        "country_code": "PE",
        "website": null,
        "phone_number": null
      },
      "installments_allowed": [2, 4, 6, 8, 10, 12]
    },
    "client": {
      "ip": "190.235.231.153",
      "ip_country": "Perú",
      "ip_country_code": "PE",
      "browser": null,
      "device_fingerprint": null,
      "device_type": null
    }
  },
  "fraud_score": null,
  "antifraud_details": {
    "country_code": null,
    "first_name": null,
    "last_name": null,
    "address_city": null,
    "address": null,
    "email": "richard@piedpiper.com",
    "phone": null,
    "object": "client"
  },
  "date": 1487021262000,
  "reference_code": "kwd3glvhbs",
  "fee": null,
  "fee_details": [
    {
      "type": "comision_porcentual",
      "amount": 375,
      "taxes": 68,
      "total_amount": 443,
      "currency_code": "PEN",
      "object": "fee"
    }
  ],
  "net_amount": 9557,
  "response_code": "venta_exitosa",
  "merchant_message": "La operación de venta ha sido autorizada exitosamente",
  "user_message": "Su compra ha sido exitosa.",
  "device_ip": "190.235.231.153",
  "device_country": null,
  "country_ip": null,
  "product": "token",
  "state": "Exitosa",
  "metadata": null
}
```

## Authentication

La API de Culq API usa `API keys` para autenticar las peticiones. Puedes ver y gestionar tus `API keys` en [el panel de Culqi](https://integ-panel.culqi.com/#/desarrollo/llaves).

Las claves en modo desarrollo tienen el siguiente prefijo `***_test_` (ejemplo: `cus_test_abcABC@3C123456789`) y las claves en modo producción/en vivo tienen la siguente estructura `***_live_` (ejemplo: `tkn_live_abdABC@3C123456789`).

## Errors

Por medio de nuestra API, podrás ser notificado con toda la información en caso presentes un error al momento de hacer una petición a cualquier operación del API. La API de Culqi utiliza el estándar de Códigos de Estado HTTP (HTTP Status Codes) en todas sus respuestas para indicar si las solicitudes se pudieron procesar con éxito o fallaron. Leer más sobre los posibles [Errores](https://www.culqi.com/api/#/errores).

## Handling Errors

Más adelante.

## Create a Charge

Para realizar un cobro a una tarjeta de débito o crédito es necesario crear un cargo usando un Token o una Tarjeta. Si utilizas tu llave secreta de integración no se realizarán cargos reales, a diferencia del entorno de producción donde enviamos tu petición a los bancos y marcas procesadoras.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charge = $culqi->Charges->create([
      'amount' => 1000,
      'capture' => true,
      'currency_code' => "PEN",
      'description' => "Trial Sale",
      'installments' => 0,
      'email' => "test@culqi.com",
      'metadata' => [
        'test' => "test"
      ],
      'source_id' => "tkn_live_0CjjdWhFpEAZlxlz"
    ]);

    echo json_encode($charge);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Charge

Consultar el detalle de un cargo utilizando el ID devuelto en la petición de creación, esto te permitirá obtener como respuesta todos los parámetros del objeto cargo.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charge = $culqi->Charges->get("chr_live_7VUwCneoG1XtLeS7");

    echo json_encode($charge);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Charges

Listar cargos te permitirá obtener una serie de cargos existentes, de acuerdo a los filtros que uses. Los cargos serán ordenados de acuerdo a su fecha de creación, siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charges = $culqi->Charges->all();

    echo json_encode($charges);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Charge

Actualizar un cargo te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crear un cargo. Cualquier parámetro o valor no provisto será omitido en la el valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charge = $culqi->Charges->update("chr_live_kEazTaQBDtzNdwFr", [
      'metadata' => [
        'dni' => "71702323"
      ]
    ]);

    echo json_encode($charge);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Capture a Charge

Esta operación permite capturar una transacción que se encuentra en estado "Autorizada", es decir que aún no ha sido capturada. Esta operación es la segunda mitad del flujo de pagos en dos pasos (autorización y captura) que sucede cuando creas un cargo con el parámetro de captura falso. Una vez que captures un cargo, empezará el proceso de transferencia de esa transacción a tu cuenta bancaria. En el caso que no captures un cargo en un periodo de 4 días, el cargo vencerá y los fondos serán devueltos inmediatamente a la tarjeta de tu cliente y el estado del cargo cambiará a "Devuelta".

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charge = $culqi->Charges->capture("chr_live_kEazTaQBDtzNdwFr");

    echo json_encode($charge);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

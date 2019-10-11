[🔙](../../README.md)

# Cards

[Español](resources/cards/lang/es) |
[English](resources/cards/)

The card object can be used to create charges later to a card. Remenber what a Token expires after 5 minutes of being created, you can convert it into a Card to can apply charges later. One client can have multiple Cards associated.

#### Endpoints

| HTTP Method | Endpoints                            | Documentation                                              |
| ----------- | ------------------------------------ | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/cards`     | [View Details](https://www.culqi.com/api/#tarjetas#create) |
| `GET`       | `https://api.culqi.com/v2/cards/:id` | [View Details](https://www.culqi.com/api/#tarjetas#detail) |
| `GET`       | `https://api.culqi.com/v2/cards`     | [View Details](https://www.culqi.com/api/#tarjetas#list)   |
| `PATCH`     | `https://api.culqi.com/v2/cards/:id` | [View Details](https://www.culqi.com/api/#tarjetas#update) |
| `DELETE`    | `https://api.culqi.com/v2/cards/:id` | [View Details](https://www.culqi.com/api/#tarjetas#delete) |

#### The Card Object

```json
{
  "object": "card",
  "id": "crd_live_TWsfemI22ypplGK6",
  "date": 1487044833972,
  "customer_id": "cus_live_TWsfemI22ypplGK6",
  "source": {
    "object": "token",
    "id": "tkn_live_vEcZSCOVz5PGDPdQ",
    "type": "card",
    "creation_date": 1487044809000,
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
  "metadata": {}
}
```

## Authentication

La API de Culq API usa `API keys` para autenticar las peticiones. Puedes ver y gestionar tus `API keys` en [el panel de Culqi](https://integ-panel.culqi.com/#/desarrollo/llaves).

Las claves en modo desarrollo tienen el siguiente prefijo `***_test_` (ejemplo: `cus_test_abcABC@3C123456789`) y las claves en modo producción/en vivo tienen la siguente estructura `***_live_` (ejemplo: `tkn_live_abdABC@3C123456789`).

## Errors

Por medio de nuestra API, podrás ser notificado con toda la información en caso presentes un error al momento de hacer una petición a cualquier operación del API. La API de Culqi utiliza el estándar de Códigos de Estado HTTP (HTTP Status Codes) en todas sus respuestas para indicar si las solicitudes se pudieron procesar con éxito o fallaron. Leer más sobre los posibles [Errores](https://www.culqi.com/api/#/errores).

## Handling Errors

Más adelante.

## Create a Card

A la hora de crear una Tarjeta tendrás que relacionar un token con un Cliente que has creado anteriormente para que este pueda ser utilizado para pagos posteriores y suscripciones.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->create([
        'customer_id' => "cus_live_Lz6Yfsm7QqCPIECW",
        'token_id' => "tkn_live_vEcZSCOVz5PGDPdQ"
    ]);

    echo json_encode($card);
} catch(\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Card

Consultar el detalle de una tarjeta utilizando el ID devuelto en la petición para crear una Tarjeta, te permitirá obtener como respuesta todos los parámetros de esta. Si la petición es inválida te devolveremos un error.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->get("crd_live_RzjTyGUwZioJLpZt");

    echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Cards

Listar Tarjetas te permitirá obtener una serie de Tarjetas existentes. De acuerdo a los filtros que uses, las tarjetas serán ordenados de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $cards = $culqi->Cards->all();

    echo json_encode($cards);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Card

Actualizar una Tarjeta te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata. Actualmente, también permite actualizar el ID del token asociado.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->update("crd_live_RzjTyGUwZioJLpZt", [
        'tokend_id' => "tkn_live_vEcZSCOVz5PGDPdQ",
        'metadata' => [
            "dni" => "71701978"
        ]
    ]);

    echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Delete a Card

Eliminar una Tarjeta te permitirá limpiar la cantidad de tarjetas asociadas a un Customer por varios motivos: la tarjeta superó la cantidad de denegaciones esperadas o el cliente es fraudulento y no quieres realizar más cobros a ese cliente, prevenir que tus clientes no paguen una suscripción de la que se han retirado, entre otras cosas. La petición devuelva el objeto Card eliminado.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->delete("crd_live_RzjTyGUwZioJLpZt");

    echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

[:back:](/docs/README.es.md)

# Tarjetas

[Español](/docs/cards/README.es.md) |
[English](/docs/cards/README.md)

El objeto Tarjeta se usa para crear cargos posteriores a una tarjeta. Recuerda que un Token por si solo vence a los 5 minutos de creado, pero si lo conviertes en una Tarjeta podrás realizar cargos posteriores. Podrás relacionar múltiples tarjeta al mismo Cliente.

#### Endpoints

| Método HTTP | Endpoints                            | Documentación                                              |
| ----------- | ------------------------------------ | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/cards`     | [Ver Detalles](https://www.culqi.com/api/#tarjetas#create) |
| `GET`       | `https://api.culqi.com/v2/cards/:id` | [Ver Detalles](https://www.culqi.com/api/#tarjetas#detail) |
| `GET`       | `https://api.culqi.com/v2/cards`     | [Ver Detalles](https://www.culqi.com/api/#tarjetas#list)   |
| `PATH`      | `https://api.culqi.com/v2/cards/:id` | [Ver Detalles](https://www.culqi.com/api/#tarjetas#update) |
| `DELETE`    | `https://api.culqi.com/v2/cards/:id` | [Ver Detalles](https://www.culqi.com/api/#tarjetas#delete) |

#### El Objeto Tarjeta

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

## Crear una Tarjeta

A la hora de crear una Tarjeta tendrás que relacionar un token con un Cliente que has creado anteriormente para que este pueda ser utilizado para pagos posteriores y suscripciones.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->create([
        "customer_id" => "cus_live_Lz6Yfsm7QqCPIECW",
        "token_id" => "tkn_live_vEcZSCOVz5PGDPdQ"
    ]);

    echo json_encode($card);
} catch(\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Consultar una Tarjeta

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

## Listar todas las Tarjetas

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

## Actualizar una Tarjeta

Actualizar una Tarjeta te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata. Actualmente, también permite actualizar el ID del token asociado.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->update("crd_live_RzjTyGUwZioJLpZt", [
        "tokend_id" => "tkn_live_vEcZSCOVz5PGDPdQ",
        "metadata" => [
            "dni" => "71701978"
        ]
    ]);

    echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Eliminar una Tarjeta

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

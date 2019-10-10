[:back:](/docs/README.es.md)

# Tarjetas

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

## Crear una tarjeta

```php
try {
    $culqi = new \Culqi\Culqi(array('api_key' => "__SECRET_KEY__"));

    $card = $culqi->Cards->create([
        "customer_id" => "cus_live_Lz6Yfsm7QqCPIECW",
        "token_id" => "tkn_live_vEcZSCOVz5PGDPdQ"
    ]);

    echo json_encode($card);
} catch(\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Consultar una tarjeta

```php
try {
    $culqi = new \Culqi\Culqi(array('api_key' => "__SECRET_KEY__"));

    $card = $culqi->Cards->get("crd_live_RzjTyGUwZioJLpZt");

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Listar todas las tarjetas

```php
try {
    $culqi = new \Culqi\Culqi(array('api_key' => "__SECRET_KEY__"));

    $card = $culqi->Cards->all();

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Actualizar una tarjeta

```php
try {
    $culqi = new \Culqi\Culqi(array('api_key' => "__SECRET_KEY__"));

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

## Eliminar una tarjeta

```php
try {
    $culqi = new \Culqi\Culqi(array('api_key' => "__SECRET_KEY__"));

    $card = $culqi->Cards->delete("crd_live_RzjTyGUwZioJLpZt");

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

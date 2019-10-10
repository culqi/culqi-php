[:back:](/docs/README.md)

# Cards

The card object can be used to create charges later to a card. Remenber what a Token expires after 5 minutes of being created, you can convert it into a Card to can apply charges later. One client can have multiple Cards associated.

#### Endpoints

| HTTP Method | Endpoints                            | Documentation                                              |
| ----------- | ------------------------------------ | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/cards`     | [View Details](https://www.culqi.com/api/#tarjetas#create) |
| `GET`       | `https://api.culqi.com/v2/cards/:id` | [View Details](https://www.culqi.com/api/#tarjetas#detail) |
| `GET`       | `https://api.culqi.com/v2/cards`     | [View Details](https://www.culqi.com/api/#tarjetas#list)   |
| `PATH`      | `https://api.culqi.com/v2/cards/:id` | [View Details](https://www.culqi.com/api/#tarjetas#update) |
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

## Create a Card

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

## Retrieve a Card

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

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->all();

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Card

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

## Delete a Card

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->delete("crd_live_RzjTyGUwZioJLpZt");

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

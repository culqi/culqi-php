[:back:](/docs/README.md)

# Charges

To create a charge to a debit card or credit card, you must be create a charge object. You can retrieve a specific charge or list your charge history based on some filters. All charges are identified by an ID.

#### Endpoints

| HTTP Method | Endpoints                              | Documentation                                            |
| ----------- | -------------------------------------- | -------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/charges`     | [View Details](https://www.culqi.com/api/#cargos#create) |
| `GET`       | `https://api.culqi.com/v2/charges/:id` | [View Details](https://www.culqi.com/api/#cargos#detail) |
| `GET`       | `https://api.culqi.com/v2/charges`     | [View Details](https://www.culqi.com/api/#cargos#list)   |
| `PATH`      | `https://api.culqi.com/v2/charges/:id` | [View Details](https://www.culqi.com/api/#cargos#update) |
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

## Create a Charge

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

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $charge = $culqi->Charges->capture("chr_live_kEazTaQBDtzNdwFr");

    echo json_encode($charge);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

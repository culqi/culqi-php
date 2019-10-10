[:back:](/docs/README.md)

# Subscriptions

[Español](/docs/subscriptions/README.es.md) |
[English](/docs/subscriptions/README.md)

El crear suscripciones te permite realizar cargos recurrentes a la tarjeta de un cliente. Una suscripción relaciona al objeto Customer y al objeto Plan que has creado previamente.

#### Endpoints

| HTTP Method | Endpoints                                    | Documentation                                                    |
| ----------- | -------------------------------------------- | ---------------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/subscriptions`     | [View Details](https://www.culqi.com/api/#subscripciones#create) |
| `GET`       | `https://api.culqi.com/v2/subscriptions/:id` | [View Details](https://www.culqi.com/api/#subscripciones#detail) |
| `GET`       | `https://api.culqi.com/v2/subscriptions`     | [View Details](https://www.culqi.com/api/#subscripciones#list)   |
| `PATCH`     | `https://api.culqi.com/v2/subscriptions/:id` | [View Details](https://www.culqi.com/api/#subscripciones#update) |
| `DELETE`    | `https://api.culqi.com/v2/subscriptions/:id` | [View Details](https://www.culqi.com/api/#subscripciones#delete) |

#### The Subscription Object

```json
{
  "object": "subscription",
  "id": "sub_live_3jswePaiCzqgrGeb",
  "creation_date": 1556573460000,
  "status": "Activa",
  "current_period": 1,
  "total_period": 2,
  "current_period_start": 1556600400000,
  "current_period_end": 1556686800000,
  "cancel_at_period_end": true,
  "cancel_at": null,
  "ended_at": 1556686800000,
  "next_billing_date": 1556600400000,
  "trial_start": 1556573460000,
  "trial_end": 1556573460000,
  "charges": [
    {
      "duplicated": null,
      "object": "charge",
      "id": "chr_live_ZIFPHDMxfK4o3SWG",
      "creation_date": 1556573460854,
      "amount": 300,
      "amount_refunded": 0,
      "current_amount": 300,
      "installments": 0,
      "installments_amount": null,
      "currency_code": "PEN",
      "email": "richard@piedpiper.com",
      "description": "Plan Basico",
      "source": {
        "object": "token",
        "id": "tkn_live_0uBKVi3TYWvJktrZ",
        "type": "card",
        "creation_date": 1542057744000,
        "email": "richard@piedpiper.com",
        "card_number": "411111******1111",
        "last_four": "1111",
        "active": true,
        "iin": {
          "object": "iin",
          "bin": "411111",
          "card_brand": "Visa",
          "card_type": "debito",
          "card_category": "Empresarial",
          "issuer": {
            "name": "BCP",
            "country": "PERU",
            "country_code": "PE",
            "website": null,
            "phone_number": null
          },
          "installments_allowed": []
        },
        "client": {
          "ip": "190.42.137.165",
          "ip_country": "Perú",
          "ip_country_code": "PE",
          "browser": null,
          "device_fingerprint": null,
          "device_type": "Escritorio"
        },
        "metadata": {}
      },
      "outcome": {
        "type": "venta_exitosa",
        "code": "AUT0000",
        "merchant_message": "La operación de venta ha sido autorizada exitosamente",
        "user_message": "Su compra ha sido exitosa."
      },
      "fraud_score": null,
      "antifraud_details": {
        "first_name": "Liz",
        "last_name": "Reuelas",
        "address": "av. lima 543",
        "address_city": "Lima",
        "country_code": "PE",
        "phone": "986345071",
        "object": "client"
      },
      "dispute": false,
      "capture": null,
      "reference_code": "713362012",
      "authorization_code": "387241",
      "metadata": {},
      "total_fee": 14,
      "fee_details": {
        "fixed_fee": {},
        "variable_fee": {
          "currency_code": "PEN",
          "commision": 0.0399,
          "total": 12
        }
      },
      "total_fee_taxes": 2,
      "transfer_amount": 286,
      "paid": false,
      "statement_descriptor": "CULQI*",
      "transfer_id": null,
      "capture_date": null
    }
  ],
  "plan": {
    "object": "plan",
    "id": "pln_live_p2h9whfQH9h4K1uF",
    "creation_date": 1542057736000,
    "name": "Plan Basico",
    "amount": 300,
    "currency_code": "PEN",
    "interval_count": 1,
    "interval": "Días",
    "limit": 2,
    "trial_days": 0,
    "total_subscriptions": 3,
    "metadata": {}
  },
  "card": {
    "object": "card",
    "id": "crd_live_4F1vID7awAMt4mRB",
    "active": true,
    "creation_date": 1542057587000,
    "customer_id": "cus_live_8yoYQOr0p6peIZ1d",
    "source": {
      "object": "token",
      "id": "tkn_live_0uBKVi3TYWvJktrZ",
      "type": "card",
      "creation_date": 1542057744000,
      "email": "richard@piedpiper.com",
      "card_number": "411111******1111",
      "last_four": "1111",
      "active": true,
      "iin": {
        "object": "iin",
        "bin": "411111",
        "card_brand": "Visa",
        "card_type": "debito",
        "card_category": "Empresarial",
        "issuer": {
          "name": "BCP",
          "country": "PERU",
          "country_code": "PE",
          "website": null,
          "phone_number": null
        },
        "installments_allowed": []
      },
      "client": {
        "ip": "190.42.137.165",
        "ip_country": "Perú",
        "ip_country_code": "PE",
        "browser": null,
        "device_fingerprint": null,
        "device_type": "Escritorio"
      },
      "metadata": {}
    },
    "metadata": {}
  },
  "metadata": {}
}
```

## Create a Subscription

Esta operación relaciona la tarjeta de un cliente con un plan de cobranza recurrente creado anteriormente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $subscription = $culqi->Subscriptions->create([
        'card_id': "crd_live_b3MMECR8cJ5tZqf2",
        'plan_id': "pln_live_jwOAYnxX49o2ydWv"
    ]);

    echo json_encode($subscription);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Subscription

Devuelve los detalles de una Suscripción en particular. Para la petición solo debes enviar el ID de la Suscripción que Culqi te devolvió a la hora de crearlo.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $subscription = $culqi->Subscriptions->get("sub_live_0CjjdWhFpEAZlxlz");

    echo json_encode($subscription);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Subscriptions

Listar suscripciones te permitirá obtener una serie de suscripciones existentes. De acuerdo a los filtros que uses, las diferentes suscripciones serán ordenadas de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $subscriptions = $culqi->Subscriptions->all();

    echo json_encode($subscriptions);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Subscription

Actualizar una suscripción te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $subscription = $culqi->Subscriptions->update("sub_live_0CjjdWhFpEAZlxlz", [
        'metadata' => [
            'client_id' => "259",
            'dni' => "000551337"
        ]
    ]);

    echo json_encode($subscription);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Delete a Subscription

Esta operación permite cancelar la suscripción a una tarjeta para que el cliente no vuelva a ser cobrado nuevamente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $subscription = $culqi->Subscriptions->delete("sub_live_0CjjdWhFpEAZlxlz");

    echo json_encode($subscription);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

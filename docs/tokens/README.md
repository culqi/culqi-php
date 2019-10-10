[:back:](/docs/README.md)

# Tokens

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit quisquam labore consectetur laborum provident aperiam error non natus voluptatum minima quod, adipisci maiores pariatur alias rem, dolorum quasi placeat voluptatem.

#### Endpoints

| HTTP Method | Endpoints                             | Documentation                                            |
| ----------- | ------------------------------------- | -------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/tokens`     | [View Details](https://www.culqi.com/api/#tokens#create) |
| `GET`       | `https://api.culqi.com/v2/tokens/:id` | [View Details](https://www.culqi.com/api/#tokens#detail) |
| `GET`       | `https://api.culqi.com/v2/tokens`     | [View Details](https://www.culqi.com/api/#tokens#list)   |
| `PATH`      | `https://api.culqi.com/v2/tokens/:id` | [View Details](https://www.culqi.com/api/#tokens#update) |

#### The Token Object

```json
{
  "object": "token",
  "id": "tkn_live_0CjjdWhFpEAZlxlz",
  "type": "card",
  "email": "richard@piedpiper.com",
  "creation_date": 1476132639,
  "card_number": "442328******1214",
  "last_four": "1214",
  "active": true,
  "iin": {
    "object": "iin",
    "bin": "442328",
    "card_brand": "Visa",
    "card_type": "credito",
    "card_category": "platinum",
    "issuer": {
      "name": "Silicon Valley Bank",
      "country": "United States",
      "country_code": "US",
      "website": "https://www.svb.com",
      "phone_number": "+1.800.774.7390"
    },
    "installments_allowed": [2, 4, 8, 12, 24, 36]
  },
  "client": {
    "ip": "72.229.28.185",
    "ip_country": "United States",
    "ip_country_code": "US",
    "browser": "Google Chrome 56.0.2924.87",
    "device_fingerprint": "6rITdVTYkWfOrss8",
    "device_type": "escritorio"
  },
  "metadata": {
    "dni": "5831543"
  }
}
```

## Create a Token

Crear tokens te permitirá obtener información de la tarjeta y utilizarla para crear un cargo o crear una tarjeta.

> - Si desarrollas una pagina web deberías crear token utilizando [Culqi Checkout](https://www.culqi.com/docs/#/pagos/checkout) o [CulqiJS](https://www.culqi.com/docs/#/pagos/js)
> - Si desarrollas una aplicación móvil deberías crear token utilizando nuestros SDKs para móviles ([iOS](https://www.culqi.com/docs/#/pagos/ios) o [Android](https://www.culqi.com/docs/#/pagos/android))
> - Si deseas crear el token de manera directa con el API de Culqi debes llenar el siguiente [autocuestionario](https://www.pcisecuritystandards.org/documents/PCI-DSS-v3_2-SAQ-D_Merchant-rev1_1.pdf?agreement=true&time=1508189914058).

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $token = $culqi->Tokens->create([
        'card_number' => "4111111111111111",
        'cvv' => "123",
        'email' => "test+@me.com",
        'expiration_month' => 9,
        'expiration_year' => 2020,
        'fingerprint' => uniqid()
    ]);

    echo json_encode($token);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Token

Consultar el detalle de un token utilizando su respectivo ID te permitirá obtener como respuesta el objeto token solicitado. Si la petición es inválida te devolveremos un error.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $token = $culqi->Tokens->get("tkn_live_LVNpj300apa78Pjq");

    echo json_encode($token);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Tokens

Listar tokens te permitirá obtener una serie de tokens existentes. De acuerdo a los filtros que uses los tokens serán ordenados de acuerdo a la fecha de creación, siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $tokens = $culqi->Tokens->all();

    echo json_encode($tokens);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Token

Actualizar un token te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $token = $culqi->Tokens->update("tkn_live_0CjjdWhFpEAZlxlz", [
        'client_id' => "259",
        'dni' => "000551337"
    ]);

    echo json_encode($token);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

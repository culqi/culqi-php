[🔙](../../../../lang/es/README.md)

# Tokens

[Español](README.md) |
[English](../../README.md)

Tokenización es el proceso que utiliza Culqi para capturar de manera segura datos sensibles de tarjetas de crédito y débito directamente desde el navegador del cliente. Un token representa la información de la tarjeta y es devuelto a tus servidores para que puedas utilizarlo a través de Culqi Checkout, Culqi.JS o nuestras bibliotecas para móviles (iOS y Android). Este método nos asegura que ningún dato de tarjeta toque tus servidores y permite que la integración cumple con la normativa PCI DSS.

Si no deseas hacer uso de los métodos de tokenización disponibles, también podrías crear tokens utilizando la API y tu llave pública. Pero en este caso recuerda que tu empresa será la responsable de cualquier procedimiento requerido por la normativa PCI DSS, como por ejemplo el siguiente autocuestionario. A diferencia de Culqi Checkout, Culqi.JS y los SDKs para móviles, la información de tu cliente no sería enviada directamente a Culqi así que no podríamos determinar si manejas o guardas esta información con seguridad.

#### Endpoints

| Método HTTP | Endpoints                             | Documentación                                            |
| ----------- | ------------------------------------- | -------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/tokens`     | [Ver Detalles](https://www.culqi.com/api/#tokens#create) |
| `GET`       | `https://api.culqi.com/v2/tokens/:id` | [Ver Detalles](https://www.culqi.com/api/#tokens#detail) |
| `GET`       | `https://api.culqi.com/v2/tokens`     | [Ver Detalles](https://www.culqi.com/api/#tokens#list)   |
| `PATCH`     | `https://api.culqi.com/v2/tokens/:id` | [Ver Detalles](https://www.culqi.com/api/#tokens#update) |

#### El Objeto Token

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

## Autenticación

La API de Culq API usa `API keys` para autenticar las peticiones. Puedes ver y gestionar tus `API keys` en [el panel de Culqi](https://integ-panel.culqi.com/#/desarrollo/llaves).

Las claves en modo desarrollo tienen el siguiente prefijo `***_test_` (ejemplo: `cus_test_abcABC@3C123456789`) y las claves en modo producción/en vivo tienen la siguente estructura `***_live_` (ejemplo: `tkn_live_abdABC@3C123456789`).

## Errores

Por medio de nuestra API, podrás ser notificado con toda la información en caso presentes un error al momento de hacer una petición a cualquier operación del API. La API de Culqi utiliza el estándar de Códigos de Estado HTTP (HTTP Status Codes) en todas sus respuestas para indicar si las solicitudes se pudieron procesar con éxito o fallaron. Leer más sobre los posibles [Errores](https://www.culqi.com/api/#/errores).

## Manejo de errores

Más adelante.

## Crear un Token

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

## Consultar un Token

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

## Listar todos los Tokens

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

## Actualizar un Token

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

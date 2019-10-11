[🔙](../../README.md)

# Refunds

[Español](lang/es/README.md) |
[English](README.md)

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit quisquam labore consectetur laborum provident aperiam error non natus voluptatum minima quod, adipisci maiores pariatur alias rem, dolorum quasi placeat voluptatem.

#### Endpoints

| HTTP Method | Endpoints                              | Documentation                                                  |
| ----------- | -------------------------------------- | -------------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/refunds`     | [View Details](https://www.culqi.com/api/#devoluciones#create) |
| `GET`       | `https://api.culqi.com/v2/refunds/:id` | [View Details](https://www.culqi.com/api/#devoluciones#detail) |
| `GET`       | `https://api.culqi.com/v2/refunds`     | [View Details](https://www.culqi.com/api/#devoluciones#list)   |
| `PATCH`     | `https://api.culqi.com/v2/refunds/:id` | [View Details](https://www.culqi.com/api/#devoluciones#update) |

#### The Refund Object

```json
{
  "object": "refund",
  "id": "ref_live_TTfLAgaA8nz8PWbO",
  "charge_id": "chr_live_kEazTaQBDtzNdwFr",
  "creation_date": 1556552960000,
  "amount": 2000,
  "reason": "Devolución solicitada por el comercio",
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

## Create a Refund

Para crear una devolución es necesario que envíes el ID del cargo que deseas devolver. Esta operación retorna los fondos a la tarjeta de crédito o débito de tu cliente y adicionalmente las comisión variable cargada por Culqi.

Opcionalmente podrías devolver solo una parte del cargo, operación conocida como devolución parcial. Puedes hacerlo las veces que quieras hasta que el monto total del cargo haya sido devuelto por completo.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $refund = $culqi->Refunds->create([
        'amount' => 500,
        'charge_id' => "chr_live_7lYOtONQ9LxcgJUW",
        'reason' => "producto incorrecto"
    ]);

    echo json_encode($refund);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Refund

Devuelve los detalles de una devolución en particular. Para la petición solo debes enviar el ID de la devolución que Culqi te devolvió a la hora de crear una Devolución.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $refund = $culqi->Refunds->get("ref_live_LVNpj300apa78Pjq");

    echo json_encode($refund);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Refunds

Listar devoluciones te permitirá obtener una serie de devoluciones existentes. De acuerdo a los filtros que uses, las devoluciones serán ordenados de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $refunds = $culqi->Refunds->all();

    echo json_encode($refund);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Refund

Actualizar una devolución te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crear una devolución. Cualquier parámetro o valor no provisto será omitido en la el valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $refund = $culqi->Refunds->update("ref_live_0CjjdWhFpEAZlxlz", [
        'metadata' => [
            'dni' => "71702323"
        ]
    ]);

    echo json_encode($refund);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

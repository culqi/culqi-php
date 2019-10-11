[🔙](../../README.md)

# Plans

[Español](lang/es/README.md) |
[English](README.md)

Un plan de suscripción contiene información acerca del tipo de cargo, frecuencia y monto que quieres cargarle a un Card de manera recurrente. Por ejemplo, podrías configurar un plan básico de S/ 50 mensuales y un plan Premium de S/ 75 mensuales.

#### Endpoints

| HTTP Method | Endpoints                            | Documentation                                            |
| ----------- | ------------------------------------ | -------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/plans`     | [View Details](https://www.culqi.com/api/#planes#create) |
| `GET`       | `https://api.culqi.com/v2/plans/:id` | [View Details](https://www.culqi.com/api/#planes#detail) |
| `GET`       | `https://api.culqi.com/v2/plans`     | [View Details](https://www.culqi.com/api/#planes#list)   |
| `PATCH`     | `https://api.culqi.com/v2/plans/:id` | [View Details](https://www.culqi.com/api/#planes#update) |
| `DELETE`    | `https://api.culqi.com/v2/plans/:id` | [View Details](https://www.culqi.com/api/#planes#delete) |

#### The Plan Object

```json
{
  "object": "plan",
  "id": "pln_live_uvBzalwuY3UsxJ9l",
  "creation_date": 1556569427000,
  "name": "Hooli Subscription",
  "amount": 2000,
  "currency_code": "PEN",
  "interval_count": 1,
  "interval": "Meses",
  "limit": 0,
  "trial_days": 0,
  "total_subscriptions": 0,
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

## Create a Plan

Esta operación te permitirá configurar los detalles del plan para que puedas realizar cargos recurrentes. Adicionalmente podrás hacer esta operación vía el Panel de Culqi.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $plan = $culqi->Plans->create([
        'amount' => 10000,
        'currency_code' => "PEN",
        'interval' => "months",
        'interval_count' => 1,
        'limit' => 12,
        'name' => "Plan de Prueba " . uniqid(),
        'trial_days' => 15
    ]);

    echo json_encode($plan);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a Plan

Devuelve los detalles de un Plan en particular. Para la petición solo debes enviar el ID del Plan que Culqi te devolvió a la hora de crearlo.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $plan = $culqi->Plans->get("pln_live_QDO81GT6Zaseewkp");

    echo json_encode($plan);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Plans

Listar planes te permitirá obtener una serie de planes existentes. De acuerdo a los filtros que uses los planes serán ordenados de acuerdo a la fecha de creación, siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $plans = $culqi->Plans->all();

    echo json_encode($plans);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a Plan

Actualizar un plan te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $plan = $culqi->Plans->update("pln_live_0CjjdWhFpEAZlxlz", [
        'metadata' => [
            'description' => "This is a simple plan."
        ]
    ]);

    echo json_encode($plan);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Delete a Plan

Elimina de manera permanente un Plan. Esta operación cancela todas las suscripciones relacionadas con el Plan.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $plan = $culqi->Plans->delete("pln_live_0CjjdWhFpEAZlxlz");

    echo json_encode($plan);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

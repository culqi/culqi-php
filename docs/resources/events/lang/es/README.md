[🔙](../../../../lang/es/README.md)

# Eventos

[Español](README.md) |
[English](../../README.md)

Los eventos son formas de hacerte saber cuando algo sucede en tu cuenta de Culqi. Cuando un evento ocurre, Culqi crea un objeto Evento. Por ejemplo, cuando un cargo es exitoso, Culqi crea el evento charge.succeeded. Adicionalmente, si realizas muchas peticiones al API podría llegar a causar multiples eventos. Por ejemplo, si creas una suscripción para un cliente, recibirás el evento customer.subscription.created y el evento charge.succeeded.

Al igual que los otros recursos del API, puedes consultar un evento particular o listar una serie de eventos directamente desde el API. Adicionalmente, hemos construido un sistema automatizado que enviará eventos directamente a tu servidor: webhooks. Te reconedamos que revises nuestra guía de webhooks para que sepas como configurarlos.

#### Endpoints

| Método HTTP | Endpoints                             | Documentación                                             |
| ----------- | ------------------------------------- | --------------------------------------------------------- |
| `GET`       | `https://api.culqi.com/v2/events/:id` | [Ver Detalles](https://www.culqi.com/api/#eventos#detail) |
| `GET`       | `https://api.culqi.com/v2/events`     | [Ver Detalles](https://www.culqi.com/api/#eventos#list)   |

#### El Objeto Evento

```json
{
  "object": "event",
  "id": "evt_live_Lz6Yfsm7QqCPIECW",
  "type": "charge.creation.succeeded",
  "response_code": "200",
  "creation_date": "1487068512",
  "data": {...}
}
```

## Autenticación

La API de Culq API usa `API keys` para autenticar las peticiones. Puedes ver y gestionar tus `API keys` en [el panel de Culqi](https://integ-panel.culqi.com/#/desarrollo/llaves).

Las claves en modo desarrollo tienen el siguiente prefijo `***_test_` (ejemplo: `cus_test_abcABC@3C123456789`) y las claves en modo producción/en vivo tienen la siguente estructura `***_live_` (ejemplo: `tkn_live_abdABC@3C123456789`).

## Errores

Por medio de nuestra API, podrás ser notificado con toda la información en caso presentes un error al momento de hacer una petición a cualquier operación del API. La API de Culqi utiliza el estándar de Códigos de Estado HTTP (HTTP Status Codes) en todas sus respuestas para indicar si las solicitudes se pudieron procesar con éxito o fallaron. Leer más sobre los posibles [Errores](https://www.culqi.com/api/#/errores).

## Manejo de errores

Más adelante.

## Consultar un Evento

Devuelve los detalles de un Evento en particular. Para la petición solo debes enviar el ID del Evento que Culqi te devolvió en el Webhook. Todos los eventos comparten una estructura común y la única propiedad que es diferente es el parámetro data.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $event = $culqi->Events->get("evt_live_0CjjdWhFpEAZlxlz");

    echo json_encode($event);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Listar todos los Eventos

Listar eventos te permitirá obtener una serie de eventos existentes. De acuerdo a los filtros que uses, los diferentes eventos serán ordenados de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $events = $culqi->Events->all();

    echo json_encode($events);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

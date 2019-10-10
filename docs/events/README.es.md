[:back:](/docs/README.md)

# Eventos

[Español](/docs/events/README.es.md) |
[English](/docs/events/README.md)

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

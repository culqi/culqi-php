[:back:](/docs/README.md)

# Orders

El objeto Orden contiene información de una posible venta. Es usado para el método de pago en efectivo. Una vez es pagada la orden por tu cliente via banco o agente, cambia de estado en el momento de la acción. Con este recurso podrás brindar a tus clientes la opción de pagar sus compras en efectivo.

#### Endpoints

| HTTP Method | Endpoints                             | Documentation                                             |
| ----------- | ------------------------------------- | --------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/orders`     | [Ver Detalles](https://www.culqi.com/api/#ordenes#create) |
| `GET`       | `https://api.culqi.com/v2/orders/:id` | [Ver Detalles](https://www.culqi.com/api/#ordenes#detail) |
| `GET`       | `https://api.culqi.com/v2/orders`     | [Ver Detalles](https://www.culqi.com/api/#ordenes#list)   |
| `PATH`      | `https://api.culqi.com/v2/orders/:id` | [Ver Detalles](https://www.culqi.com/api/#ordenes#update) |
| `DELETE`    | `https://api.culqi.com/v2/orders/:id` | [Ver Detalles](https://www.culqi.com/api/#ordenes#delete) |

#### The Order Object

```json
{
  "object": "order",
  "id": "ord_live_xjmEW4dIyJM9G4cc",
  "amount": 6000,
  "payment_code": "13642064",
  "currency_code": "PEN",
  "description": "Venta de polo",
  "order_number": "#id-9999",
  "state": "pending",
  "total_fee": null,
  "net_amount": null,
  "fee_details": null,
  "creation_date": 1538540487000,
  "expiration_date": 1538540700000,
  "updated_at": null,
  "paid_at": null,
  "available_on": null,
  "metadata": null
}
```

## Create an Order

La creación de una orden permite que se genere un objeto orden con los detalles de la posible venta. Esta orden nace con un estado pendiente de pago. Además, al momento de la creación tu cliente recibe un correo con las instrucciones de como pagar la orden.

> Si una orden es creada con el parametro confirm en false, esta tendrá que ser confirmada inmediatamente con el método Confirmar orden. De lo contrario, la orden no podrá ser pagada por tu cliente. Se recomienda crearla sin incluir el parámetro 'confirm'' para que siga el flujo natural.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $order = $culqi->Orders->create([
        'amount' => 1000,
        'currency_code' => "PEN",
        'description' => 'Trial Sale',
        'order_number' => 'order-123456789',
        'client_details' => [
            'first_name'=> "John",
            'last_name' => "Doe",
            'email' => "test@gmail.com",
            'phone_number' => "51945145222"
        ],
        'expiration_date' => time() + 24*60*60,
        'metadata' => [
            'dni' => "71702935"
        ]
    ]);

    echo json_encode($order);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Confirm an Order

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $order = $culqi->Orders->confirm("ord_live_0CjjdWhFpEAZlxlz");

    echo json_encode($order);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve an Order

Consulta el detalle de una orden utilizando su ID. Como respuesta exitosa obtendrás un objeto Orden. Si la petición es inválida te devolveremos un error.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $order = $culqi->Orders->get("ord_live_QDO81GT6Zaseewkp");

    echo json_encode($order);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all Orders

Listas órdenes permtie obtener el listado de órdenes de tu comercio. De acuerdo a los filtros que uses, las ordenes serán ordenados de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $orders = $culqi->Orders->all();

    echo json_encode($orders);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update an Order

Con actualizar una orden se puede extender la validez de una orden, es decir, el tiempo de expiración. Además, te permitirá agregar o reemplazar información a los valores de la metadata que enviaste a la hora de crearla. Cualquier parámetro o valor no provisto será omitido en los valores de la metadata.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $order = $culqi->Orders->update("ord_live_0CjjdWhFpEAZlxlz", [
        'expiration_date' => time() + 24*60*60,
        'metadata' => [
            'dni' => "71701978"
        ]
    ]);

    echo json_encode($order);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Delete an Order

Eliminar una Orden te permitirá desactivar y dejar sin efecto una orden. Solo se puede aplicar para ordenes que se encuentren en estado 'pendiente' o 'creada'.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $order = $culqi->Orders->delete("ord_live_0CjjdWhFpEAZlxlz");

    echo json_encode($order);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

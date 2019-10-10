[:back:](/docs/README.md)

# Clientes

[Español](/docs/customers/README.es.md) |
[English](/docs/customers/README.md)

El recurso cliente te permite guardar la información de tus clientes para realizarles cargos recurrentes o posteriores. La API de Culqi permite crear, eliminar y actualizar los datos de tus clientes. Adicionalmente podrás consultar los datos de un cliente en particular o listar a todos tus clientes en base a los filtros que desees.

#### Endpoints

| Método HTTP | Endpoints                                | Documentación                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/customers`     | [Ver Detalles](https://www.culqi.com/api/#clientes#create) |
| `GET`       | `https://api.culqi.com/v2/customers/:id` | [Ver Detalles](https://www.culqi.com/api/#clientes#detail) |
| `GET`       | `https://api.culqi.com/v2/customers`     | [Ver Detalles](https://www.culqi.com/api/#clientes#list)   |
| `PATCH`     | `https://api.culqi.com/v2/customers/:id` | [Ver Detalles](https://www.culqi.com/api/#clientes#update) |
| `DELETE`    | `https://api.culqi.com/v2/customers/:id` | [Ver Detalles](https://www.culqi.com/api/#clientes#delete) |

#### El Objeto Cliente

```json
{
  "object": "customer",
  "id": "cus_live_Lz6Yfsm7QqCPIECW",
  "creation_date": 1487041774773,
  "email": "richard@piedpiper.com",
  "antifraud_details": {
    "country_code": "US",
    "first_name": "Richard",
    "last_name": "Richard",
    "address_city": "Palo Alto",
    "address": "San Francisco Bay Area",
    "phone": "6505434800",
    "object": "client"
  },
  "metadata": {}
}
```

## Crear un Cliente

Crea un cliente enviando los datos de tu cliente y más datos relacionados al mismo a través de los valores de metadata.

Devuelve los detalles de un cliente en particular. En la petición solo debes enviar el ID del cliente que Culqi te devolvió a la hora de crear uno.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customer = $culqi->Customers->create([
        'address' => "av lima 123",
        'address_city' => "lima",
        'country_code' => "PE",
        'email' => "test@culqi.com",
        'first_name' => "Will",
        'last_name' => "Muro",
        'metadata' => [
            'test'=> "test"
        ],
        'phone_numbe' => 899898999
    ]);

    echo json_encode($customer);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Consultar un Cliente

Devuelve los detalles de un cliente en particular. En la petición solo debes enviar el ID del cliente que Culqi te devolvió a la hora de crear uno.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customer = $culqi->Customers->get("cus_live_QDO81GT6Zaseewkp");

    echo json_encode($customer);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Listar todos los Clientes

Listar Clientes te permitirá obtener una serie de Customer existentes. De acuerdo a los filtros que uses, los clientes serán ordenados de acuerdo a su fecha de creación; siendo el primero el más reciente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customers = $culqi->Customers->all();

    echo json_encode($customers);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Actualizar un Cliente

Actualizar un cliente te permitirá modificar los valores enviados a la hora de crearlo. Cualquier parámetro que no sea proveído en la petición mantendrá el valor de la creación.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customer = $culqi->Customers->update("cus_live_0CjjdWhFpEAZlxlz", [
        'metadata' => [
            'dni' => "71701978"
        ]
    ]);

    echo json_encode($customer);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Eliminar un Cliente

Elimina de manera permanente a un cliente. Esta operación cancela cualquier cargo posterior o suscripción que esté relacionada con el Cliente.

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customer = $culqi->Customers->delete("cus_live_0CjjdWhFpEAZlxlz");

    echo json_encode($customer);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

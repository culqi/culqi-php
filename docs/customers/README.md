[:back:](/docs/README.md)

# Customers

[Español](/docs/customers/README.es.md) |
[English](/docs/customers/README.md)

El recurso cliente te permite guardar la información de tus clientes para realizarles cargos recurrentes o posteriores. La API de Culqi permite crear, eliminar y actualizar los datos de tus clientes. Adicionalmente podrás consultar los datos de un cliente en particular o listar a todos tus clientes en base a los filtros que desees.

#### Endpoints

| HTTP Method | Endpoints                                | Documentation                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/customers`     | [View Details](https://www.culqi.com/api/#clientes#create) |
| `GET`       | `https://api.culqi.com/v2/customers/:id` | [View Details](https://www.culqi.com/api/#clientes#detail) |
| `GET`       | `https://api.culqi.com/v2/customers`     | [View Details](https://www.culqi.com/api/#clientes#list)   |
| `PATCH`     | `https://api.culqi.com/v2/customers/:id` | [View Details](https://www.culqi.com/api/#clientes#update) |
| `DELETE`    | `https://api.culqi.com/v2/customers/:id` | [View Details](https://www.culqi.com/api/#clientes#delete) |

#### The Customer Object

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

## Authentication

La API de Culq API usa `API keys` para autenticar las peticiones. Puedes ver y gestionar tus `API keys` en [el panel de Culqi](https://integ-panel.culqi.com/#/desarrollo/llaves).

Las claves en modo desarrollo tienen el siguiente prefijo `***_test_` (ejemplo: `cus_test_abcABC@3C123456789`) y las claves en modo producción/en vivo tienen la siguente estructura `***_live_` (ejemplo: `tkn_live_abdABC@3C123456789`).

## Errors

Por medio de nuestra API, podrás ser notificado con toda la información en caso presentes un error al momento de hacer una petición a cualquier operación del API. La API de Culqi utiliza el estándar de Códigos de Estado HTTP (HTTP Status Codes) en todas sus respuestas para indicar si las solicitudes se pudieron procesar con éxito o fallaron. Leer más sobre los posibles [Errores](https://www.culqi.com/api/#/errores).

## Handling Errors

Más adelante.

## Create a Customer

Crea un cliente enviando los datos de tu cliente y más datos relacionados al mismo a través de los valores de metadata.

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

## Retrieve a Customer

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

## List all Customers

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

## Update a Customer

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

## Delete a Customer

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

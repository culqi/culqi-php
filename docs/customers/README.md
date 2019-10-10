[:back:](/docs/README.md)

# Customers

El recurso cliente te permite guardar la información de tus clientes para realizarles cargos recurrentes o posteriores. La API de Culqi permite crear, eliminar y actualizar los datos de tus clientes. Adicionalmente podrás consultar los datos de un cliente en particular o listar a todos tus clientes en base a los filtros que desees.

#### Endpoints

| HTTP Method | Endpoints                                | Documentation                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/customers`     | [View Details](https://www.culqi.com/api/#clientes#create) |
| `GET`       | `https://api.culqi.com/v2/customers/:id` | [View Details](https://www.culqi.com/api/#clientes#detail) |
| `GET`       | `https://api.culqi.com/v2/customers`     | [View Details](https://www.culqi.com/api/#clientes#list)   |
| `PATH`      | `https://api.culqi.com/v2/customers/:id` | [View Details](https://www.culqi.com/api/#clientes#update) |
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

## Create a Customer

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

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $customer = $culqi->Customers->delete("cus_live_0CjjdWhFpEAZlxlz");

    echo json_encode($customer);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

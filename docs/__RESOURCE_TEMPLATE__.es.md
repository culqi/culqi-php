[:back:](/docs/README.md)

# `Recurso`s

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit quisquam labore consectetur laborum provident aperiam error non natus voluptatum minima quod, adipisci maiores pariatur alias rem, dolorum quasi placeat voluptatem.

#### Endpoints

| Método HTTP | Endpoints                                | Documentación                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/:recursos`     | [Ver Detalles](https://www.culqi.com/api/#recursos#create) |
| `GET`       | `https://api.culqi.com/v2/:recursos/:id` | [Ver Detalles](https://www.culqi.com/api/#recursos#detail) |
| `GET`       | `https://api.culqi.com/v2/:recursos`     | [Ver Detalles](https://www.culqi.com/api/#recursos#list)   |
| `PATCH`     | `https://api.culqi.com/v2/:recursos/:id` | [Ver Detalles](https://www.culqi.com/api/#recursos#update) |
| `DELETE`    | `https://api.culqi.com/v2/:recursos/:id` | [Ver Detalles](https://www.culqi.com/api/#recursos#delete) |

#### El Objeto `Recurso`

```json
{}
```

## Crear un `Recurso`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Consultar un `Recurso`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Listar todos los `Recurso`s

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Actualizar un `Recurso`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Eliminar un `Recurso`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

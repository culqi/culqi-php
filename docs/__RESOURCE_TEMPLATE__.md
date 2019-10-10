[:back:](docs/README.md)

# `Resource`s

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit quisquam labore consectetur laborum provident aperiam error non natus voluptatum minima quod, adipisci maiores pariatur alias rem, dolorum quasi placeat voluptatem.

#### Endpoints

| HTTP Method | Endpoints                                | Documentation                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/:resource`     | [View Details](https://www.culqi.com/api/#resource#create) |
| `GET`       | `https://api.culqi.com/v2/:resource/:id` | [View Details](https://www.culqi.com/api/#resource#detail) |
| `GET`       | `https://api.culqi.com/v2/:resource`     | [View Details](https://www.culqi.com/api/#resource#list)   |
| `PATH`      | `https://api.culqi.com/v2/:resource/:id` | [View Details](https://www.culqi.com/api/#resource#update) |
| `DELETE`    | `https://api.culqi.com/v2/:resource/:id` | [View Details](https://www.culqi.com/api/#resource#delete) |

#### The `Resource` Object

```json
{}
```

## Create a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->get("crd_live_RzjTyGUwZioJLpZt");

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    $card = $culqi->Cards->get("crd_live_RzjTyGUwZioJLpZt");

     echo json_encode($card);
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## List all `Resource`s

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Update a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Delete a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

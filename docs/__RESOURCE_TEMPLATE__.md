[:back:](/docs/README.md)

# `Resource`s

Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit quisquam labore consectetur laborum provident aperiam error non natus voluptatum minima quod, adipisci maiores pariatur alias rem, dolorum quasi placeat voluptatem.

#### Endpoints

| HTTP Method | Endpoints                                | Documentation                                              |
| ----------- | ---------------------------------------- | ---------------------------------------------------------- |
| `POST`      | `https://api.culqi.com/v2/:resources`     | [View Details](https://www.culqi.com/api/#resources#create) |
| `GET`       | `https://api.culqi.com/v2/:resources/:id` | [View Details](https://www.culqi.com/api/#resources#detail) |
| `GET`       | `https://api.culqi.com/v2/:resources`     | [View Details](https://www.culqi.com/api/#resources#list)   |
| `PATH`      | `https://api.culqi.com/v2/:resources/:id` | [View Details](https://www.culqi.com/api/#resources#update) |
| `DELETE`    | `https://api.culqi.com/v2/:resources/:id` | [View Details](https://www.culqi.com/api/#resources#delete) |

#### The `Resource` Object

```json
{}
```

## Create a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
} catch (\Exception $e) {
    echo json_encode($e->getMessage());
}
```

## Retrieve a `Resource`

```php
try {
    $culqi = new \Culqi\Culqi(['api_key' => "__SECRET_KEY__"]);

    // Your code
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

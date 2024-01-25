**README - SDK de Culqi**

Este repositorio contiene el SDK de Culqi para PHP. 
Sigue los siguientes pasos para levantar el proyecto:

### Instalar PHP
Asegúrate de tener PHP instalado, es recomendado instalar la version 7.2 o "7.4". Puedes seguir estos pasos:

```bash
    # Agregar el repositorio de PHP
    sudo add-apt-repository ppa:ondrej/php
    # Actualizar la lista de paquetes
    sudo apt update
    # Actualizar e instalar PHP
    sudo apt upgrade
    sudo apt-get install php7.4 php7.4-dev php7.4-cli
    sudo apt-get install php7.4-xml
```

### Instalar Composer
Composer es una herramienta para gestionar las dependencias en PHP.

```bash
# Descargar e instalar Composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer --version=1.10.22
```

### Instalar Dependencias
Una vez que Composer esté instalado, utiliza el siguiente comando para instalar las dependencias del proyecto.

```bash
# Ir al directorio del proyecto y ejecutar
composer install
```

### Ejecutar Tests
Asegúrate de que las pruebas del SDK pasen sin problemas.

```bash
# Ejecutar pruebas
vendor/bin/phpunit
```

### Ejecutar Ejemplos para Pruebas
Finalmente, puedes ejecutar un ejemplo proporcionado para probar el SDK. Asegúrate de haber configurado correctamente tus credenciales de Culqi.
 Sigue los siguientes pasos
* Configurar tu API Key y autenticación (SECRET_KEY)
* Actualiza el payload a enviar
```bash
array(
      "interval_unit_time" => 3,
      "interval_count" => 0,
      "amount" => 350,
      "name" => "Plan mensual" . uniqid(),
      "description" => "Plan-mock" . uniqid(),
      "short_name" => "pln-" . uniqid(),
      "currency" => "PEN",
      "metadata" => json_decode('{}'),
      "initial_cycles" => array(
          "count" => 2,
          "amount" => 0,
          "has_initial_charge" => false,
          "interval_unit_time" => 3
      ),
  )
```
* Ejecuta tu ejemplo de creacion
```bash
php examples/plan/02-create-plan.php
```

### Ejemplos para Pruebas

```bash
    # Ejecutar Planes

    # Listar todos los Planes o con filtros
    php examples/plan/01-get-all-plan.php

    # Crear Plan
    php examples/plan/02-create-plan.php

    # Buscar Plan por id
    php examples/plan/03-get-plan-id.php

    # Eliminar Plan
    php examples/plan/03-delete-plan-id.php

    # Actualizar Plan
    php examples/05-update-plan.php

    # Ejecutar Suscripciones

    # Crear Suscripcion
    php examples/subscription/01-create-subscription.php

    # Listar todas las Suscripciones o con filtros
    php examples/subscription/02-get-all-subscription.php

    # Buscar Suscripcion por id
    php examples/subscription/03-get-subscription-id.php

    # Eliminar Suscripcion
    php examples/subscription/04-delete-subscription-id.php

    # Actualizar Suscripcion
    php examples/subscription/01-create-subscription.php
```


### Extension PHP (Opcional)

```bash
# Eliminar PHP
composer
PHP
PHP Profiler
intelliPHP - AI Autocomplete for PHP
```

### Eliminar PHP (Opcional)
Si deseas eliminar PHP, puedes hacerlo con el siguiente comando. Ten en cuenta que esto es opcional y solo es necesario si deseas desinstalar PHP.

```bash
# Eliminar PHP
sudo apt remove php7*
```


```bash
Author: Brando Javier Carquin Mendocilla ... brando.carquin@culqi.com
```
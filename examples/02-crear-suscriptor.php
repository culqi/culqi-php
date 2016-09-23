<?php
/**
 * Ejemplo 2 (02-crear-suscriptor.php)
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
      // Usando Composer
      require '../vendor/autoload.php';

      // Configurar tu API Key y autenticación
      $SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk=";
      $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

      // Entorno: Integración (pruebas)
      $culqi->setEnv("INTEG");

      // Creando Cargo a una tarjeta
      $suscriptor = $culqi->Suscripciones->create(
        array(
          "token"=> "vJk6e1LIoZLdDwEXTE6KMQlaJvqswSwU",
          "codigo_pais"=> "PE",
          "direccion"=> "Avenida Lima 123213",
          "ciudad"=> "Lima",
          "usuario"=> "jose@gmail.com",
          "telefono"=> "1234567789",
          "nombre"=> "Brayan",
          "apellido"=> "Cruces",
          "correo_electronico"=> "brayan.cruces@culqi.com",
          "plan_id"=> "plan-basico"
        )
      );

      // Respuesta
      var_dump($suscriptor);

} catch (Exception $e) {

      echo $e->getMessage();

}

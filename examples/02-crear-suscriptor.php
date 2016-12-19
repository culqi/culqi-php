<?php
/**
 * Ejemplo 2 (02-crear-suscriptor.php)
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
      // Usando Composer
      require '../vendor/autoload.php';

      // Configurar tu API Key y autenticación
      $SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk";
      $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

      // Creando Cargo a una tarjeta
      $suscriptor = $culqi->Suscripciones->create(
        array(
            "address" => "Avenida Lima 123213",
            "city" => "LIMA",
            "country" => "PERU",
            "email" => "jose@gmail.com",
            "last_name" => "Cruces",
            "name" => "Brayan",
            "phone" => 1234567789,
            "plan_alias" => "plan-basico",
            "token" => "{AQUI TOKEN OBTENIDO DE CULQI.JS}"
        )
      );

      // Respuesta
      var_dump($suscriptor);

} catch (Exception $e) {

      echo $e->getMessage();

}

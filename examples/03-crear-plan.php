<?php
/**
 * Ejemplo 3 (03-crear-plan.php)
 * Como crear un plan usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Planes->create(
      array(
          "alias" => "string",
          "amount" => 1000,
          "currency" => "PEN",
          "ft_interval" => "dias",
          "ft_interval_count" => 2,
          "interval" => "dias",
          "interval_count" => 2,
          "limit" => 0,
          "name" => "Plan de prueba"
      )
  );

  // Respuesta
  print_r($plan);
} catch (Exception $e) {
  echo $e->getMessage();
}

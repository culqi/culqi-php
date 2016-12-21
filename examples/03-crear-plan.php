<?php
/**
 * Ejemplo 3 (03-crear-plan.php)
 * Como crear un plan usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "Mde0GIf0MsixrvyhRDDzj9IM7UXtv9ndnYHf2UZwEyE=";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Planes->create(
      array(
          "alias" => "plan-test35",
          "amount" => 1000,
          "currency_code" => "PEN",
          "interval" => "day",
          "interval_count" => 2,
          "limit" => 0,
          "name" => "Plan de Prueba 35",
          "trial_days" => 50
      )
  );
  // Respuesta
  print_r($plan);
} catch (Exception $e) {
  echo $e->getMessage();
}

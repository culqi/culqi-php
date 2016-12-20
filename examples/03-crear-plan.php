<?php
/**
 * Ejemplo 3 (03-crear-plan.php)
 * Como crear un plan usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "gjkf2ehJxmuXnjwanj3AIbCSrncDMEvk29sHR/n8ZwM=";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Planes->create(
      array(
          "alias" => "plan-test25",
          "amount" => 1000,
          "currency" => "PEN",
          "ft_interval" => "day",
          "ft_interval_count" => 2,
          "interval" => "day",
          "interval_count" => 2,
          "limit" => 0,
          "name" => "Plan de Prueba 25"
      )
  );

  // Respuesta
  print_r($plan);
} catch (Exception $e) {
  echo $e->getMessage();
}

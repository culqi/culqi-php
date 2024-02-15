<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/plan/02-create-plan.php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "sk_*************";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Plans->create(
    array(
      "interval_unit_time" => 1,
      "interval_count" => 1,
      "amount" => 300,
      "name" => "Plan mensual" . uniqid(),
      "description" => "Plan-mock" . uniqid(),
      "short_name" => "pln-" . uniqid(),
      "currency" => "PEN",
      #"metadata" => array("DNI" => "", "123456789012345678901234567890" => 43),
      "metadata" => json_decode('{}'),
      "initial_cycles" => array(
        "count" => 0,
        "amount" => 0,
        "has_initial_charge" => false,
        "interval_unit_time" => 1
      ),
    )
  );
  // Respuesta
  echo json_encode($plan);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

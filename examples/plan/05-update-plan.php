<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/05-update-plan.php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "sk_*************";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $plan = $culqi->Plans->update("pln_**********",
    array(
      "name" => "Plan mensual" . uniqid(),
      "description" => "Plan-mock" . uniqid(),
      "short_name" => "pln-" . uniqid(),
      "status" => 1,
      "image" => "https://img.freepik.com/foto-gratis/resumen-bombilla-creativa-sobre-fondo-azul-brillante-ia-generativa_188544-8090.jpg",
      #"metadata" => array("DNI" => "", "123456789012345678901234567890" => 43),
      #"metadata" => json_decode('{}'),
    )
  );
  // Respuesta
  echo json_encode($plan);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

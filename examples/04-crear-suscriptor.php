|<?php
/**
 * Ejemplo 4 (04-crear-suscriptor.php)
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
  // Usando Composer
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_UTCQSGcXW8bCyU59";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $subscription = $culqi->Subscriptions->create(
    array(
        "card_id"=> "{card_id}",
        "plan_id" => "{plan_id}"
    )
  );

  // Respuesta
  print_r($subscription);

} catch (Exception $e) {
  echo $e->getMessage();
}

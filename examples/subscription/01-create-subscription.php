|
<?php
/**
 * Ejemplo 8
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

## EJecutar ejmplo : php examples/subscription/01-create-subscription.php
try {
  // Usando Composer
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "sk_*************";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  // Creando Cargo a una tarjeta
  $subscription = $culqi->Subscriptions->create(
    array(
      "card_id" => "crd_*********************",
      "plan_id" => "pln_*********************",
      "tyc" => true,
      #"metadata" => array("DNI" => "", "123456789012345678901234567890" => 43),
      "metadata" => json_decode('{}'),
    )
  );

  // Respuesta
  echo json_encode($subscription);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

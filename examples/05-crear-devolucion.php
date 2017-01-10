<?php
/**
 * Ejemplo 5 (05-crear-devolucion.php)
 * Como crear una devolution usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_UTCQSGcXW8bCyU59";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $refund = $culqi->Refunds->create(
      array(
        "amount" => 500,
        "charge_id" => "chr_test_X9DoC7tiHucR2CQr",
        "reason" => "bought an incorrect product"
      )
  );
  // Respuesta
  print_r($refund);
} catch (Exception $e) {
  echo $e->getMessage();
}

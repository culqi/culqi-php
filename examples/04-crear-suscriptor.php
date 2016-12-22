<?php
/**
 * Ejemplo 2 (02-crear-suscriptor.php)
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
  // Usando Composer
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_UTCQSGcXW8bCyU59";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $suscriptor = $culqi->Suscripciones->create(
    array(
        "address" => "Avenida Lima 123213",
        "address_city" => "LIMA",
        "country_code" => "PE",
        "email" => "wmuro@me.com",
        "last_name" => "Muro",
        "first_name" => "William",
        "phone_number" => 1234567789,
        "plan_alias" => "plan-test-CULQI101",
        "token_id" => "tkn_test_YrZIHNzDCDV9Cvz2"
    )
  );

  // Respuesta
  print_r($suscriptor);

} catch (Exception $e) {
  echo $e->getMessage();
}

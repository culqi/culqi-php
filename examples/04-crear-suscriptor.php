<?php
/**
 * Ejemplo 2 (02-crear-suscriptor.php)
 * Como añadir un suscriptor a un plan específico usando Culqi PHP.
 */

try {
  // Usando Composer
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "gjkf2ehJxmuXnjwanj3AIbCSrncDMEvk29sHR/n8ZwM=";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $suscriptor = $culqi->Suscripciones->create(
    array(
        "address" => "Avenida Lima 123213",
        "city" => "LIMA",
        "country" => "PE",
        "email" => "wmuro@me.com",
        "last_name" => "Muro",
        "name" => "William",
        "phone" => 1234567789,
        "plan_alias" => "plan-test25",
        "token" => "aousSaEKzV7yvsUEun43RKRVLkfhwjiq"
    )
  );

  // Respuesta
  print_r($suscriptor);

} catch (Exception $e) {
  echo $e->getMessage();
}

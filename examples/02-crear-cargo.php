<?php
/**
 * Ejemplo 2 (02-crear-cargo.php)
 * Como crear un cargo a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "sk_test_UTCQSGcXW8bCyU59";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create(
      array(
        "amount" => 1000,
        "antifraud_details" => array(
          "address" => "Avenida Lima 1232",
          "address_city" => "LIMA",
          "country_code" => "PE",
          "email" => "wmuro@me.com",
          "first_name" => "William",
          "last_name" => "Muro",
          "phone_number" => 3333339
        ),
        "capture": true,
        "currency_code" => "PEN",
        "description" => "Venta de prueba",
        "installments" => 0,
        "metadata" => "",
        "source_id" => "tkn_test_YrZIHNzDCDV9Cvz2"
      )
  );
  // Respuesta
  print_r($charge);

} catch (Exception $e) {
  echo $e->getMessage();
}

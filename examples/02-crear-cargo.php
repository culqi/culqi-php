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
  $cargo = $culqi->Cargos->create(
      array(
          "address" => "Avenida Lima 1232",
          "address_city" => "LIMA",
          "amount" => 1000,
          "country_code" => "PE",
          "currency_code" => "PEN",
          "email" => "wmuro@me.com",
          "first_name" => "William",
          "installments" => 0,
          "last_name" => "Muro",
          "metadata" => "",
          "order_id" => time(),
          "phone_number" => 3333339,
          "product_description" => "Venta de prueba",
          "token_id" => "tkn_test_YrZIHNzDCDV9Cvz2"
      )
  );
  // Respuesta
  print_r($cargo);

} catch (Exception $e) {
  echo $e->getMessage();
}

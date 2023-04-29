<?php
/**
 * Ejemplo 6
 * Como crear un customer usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
  $encryption_params = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );

  $req_body = array(
    "address" => "av lima 123",
    "address_city" => "lima",
    "country_code" => "PE",
    "email" => "www@".uniqid()."me.com",
    "first_name" => "Test name",
    "last_name" => "Test lastname",
    "metadata" => array("test"=>"test"),
    "phone_number" => 899898999
  );

  // Creando Customer
  $customer = $culqi->Customers->create(
    $req_body
  );
  // Respuesta
  echo "<b>Customer sin encriptar payload:</b> "."<br>".json_encode($customer);

  $customer = $culqi->Customers->create(
    $req_body,
    $encryption_params
  );
  // Respuesta
  echo "<b>Customer con payload encriptado:</b> "."<br>".json_encode($customer);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

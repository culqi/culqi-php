<?php

require '../vendor/autoload.php';

date_default_timezone_set('America/Lima');

try {
  $PUBLIC_KEY = "{PUBLIC KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  $futureDate = date('Y', strtotime('+1 year'));
  $encryption_params = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );

  $req_body = array(
    "card_number" => "4111111111111111",
    "cvv" => "123",
    "email" => "culqi".uniqid()."@culqi.com", //email must not repeated
    "expiration_month" => "7",
    "expiration_year" => $futureDate,
    "fingerprint" => uniqid(),
    "metadata" => array("dni" => "71702935")
  );
    
  // Creando token a una tarjeta sin encriptar
  $token = $culqi->Tokens->create(
    $req_body
  );

  // Respuesta
  echo "<b>Token sin encriptar payload:</b> "."<br>".json_encode($token->id)."<br>";


  // Creando token a una tarjeta con encriptación
  $token = $culqi->Tokens->create(
    $req_body,
    $encryption_params
  );
  // Respuesta
  echo "<b>Token con payload encriptado:</b> "."<br>".json_encode($token->id);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
<?php

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

  $charge_id = "";
  $req_body =  array(
    "metadata" => array(
      "documentNumber" => "43127352",
      "documentType" => 1,
      )
  );
  // update charge
  $charge = $culqi->Charges->update(
    $charge_id,
    $req_body
  );
  // Respuesta
  echo "<b>Update charge sin encriptar payload:</b> "."<br>".json_encode($charge)."<br>";

  // update charge
  $charge = $culqi->Charges->update(
    $charge_id,
    $req_body,
    $encryption_params
  );
  // Respuesta
  echo "<b>Update charge con payload encriptado:</b> "."<br>".json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

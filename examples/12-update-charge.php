<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $PUBLIC_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  $encryption_params = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );

  $req_body =  array(
    "metadata" => array(
      "documentNumber" => "43127352",
      "documentType" => 1,
      )
  );
  // update orden
  $charge = $culqi->Charges->update(
    $req_body
  );
  // Respuesta
  echo "<b>Update charge sin encriptar payload:</b> "."<br>".json_encode($charge);

  // update orden
  $charge = $culqi->Charges->update(
    $req_body,
    $encryption_params
  );
  // Respuesta
  echo "<b>Update charge con payload encriptado:</b> "."<br>".json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

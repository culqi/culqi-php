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

  $token_id = "";
  $req_body =  array(
    "metadata" => array("dni" => "43127352")
  );
  // update token
  $token = $culqi->Tokens->update(
    $token_id,
    $req_body
  );
  // Respuesta
  echo "<b>Update Token sin encriptar payload:</b> "."<br>".json_encode($token)."<br>";

  // update token
  $token = $culqi->Tokens->update(
    $token_id,
    $req_body,
    $encryption_params
  );
  // Respuesta
  echo "<b>Update Token con payload encriptado:</b> "."<br>".json_encode($token);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

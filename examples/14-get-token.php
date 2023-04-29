<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  $token_id = "";

  // get token
  $token = $culqi->Tokens->get(
    $token_id
  );
  // Respuesta
  echo "<b>Get Token:</b> "."<br>".json_encode($token)."<br>";

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

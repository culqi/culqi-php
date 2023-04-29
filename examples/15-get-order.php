<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  $order_id = "";

  // get token
  $token = $culqi->Orders->get(
    $order_id
  );
  // Respuesta
  echo "<b>Get Order:</b> "."<br>".json_encode($token)."<br>";

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

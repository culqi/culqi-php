<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $PUBLIC_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  $encryption_data = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );

  $req_body =  array(
    "metadata" => array("dni" => "43127352")
  );
  // update orden
  $order = $culqi->Orders->update(
    $req_body
  );
  // Respuesta
  echo "<b>Update Order sin encriptar payload:</b> "."<br>".json_encode($order);

  // update orden
  $order = $culqi->Orders->update(
    $req_body,
    $encryption_data
  );
  // Respuesta
  echo "<b>Update Order con payload encriptado:</b> "."<br>".json_encode($order);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

<?php
/**
 * Ejemplo 9
 * Como crear un token yape Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Codigo de Comercio
  $PUBLIC_KEY = "{PUBLIC KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  
  // Creando Token Yape
  $token = $culqi->Tokens->createYape(
      array(
        "otp" => "946627",
        "number_phone" => "951123456",
        "amount" => "500",
        "metadata" => array("dni" => "5831543")
      )
  );
  // Respuesta
  echo json_encode("Token: ".$token->id);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

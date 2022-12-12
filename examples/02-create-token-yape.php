<?php
/**
 * Ejemplo 2
 * Como crear un token Yape con Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Codigo de Comercio
  $PUBLIC_KEY = "{PUBLIC KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));
  
  // Creando Cargo a una tarjeta
  $token = $culqi->Tokens->createYape(
      array(
        "number_phone" => "900000001",
        "otp" => "425251",
        "amount" => 700,
        "metadata" => array("dni" => "71702935")
      )
  );
  // Respuesta
  echo json_encode("Token: ".$token->id);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

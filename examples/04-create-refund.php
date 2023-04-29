<?php
/**
 * Ejemplo 4
 * Como crear una devolution usando Culqi PHP.
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
    "amount" => 500,
    "charge_id" => "{charge_id}",
    "reason" => "bought an incorrect product"
  );

  // Creando una devolución sin encriptar
  $refund = $culqi->Refunds->create(
    $req_body
  );
  // Respuesta
  echo "<b>Refund sin encriptar payload:</b> "."<br>".json_encode($refund)."<br>";

  // Creando una devolución con encriptación
  $refund = $culqi->Refunds->create(
    $req_body,
    $encryption_params
);
// Respuesta
echo "<b>Refund con payload encriptado:</b> "."<br>".json_encode($refund);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

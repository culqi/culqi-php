<?php
/**
 * Ejemplo 3
 * Como crear un charge a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  //Datos para encriptar
  $encryption_params = array(
    "rsa_public_key" => "",
    "rsa_id" => ""
  );

  //3ds object, la primera vez que se consume el servicio no se debe enviar los parámetros 3ds
  $tds_xid = $_POST["xid"];
  $tds = array("authentication_3DS" => array(
    "eci" => $_POST["eci"],
    "xid" => $tds_xid,
    "cavv" => $_POST["cavv"],
    "protocolVersion" => $_POST["protocolVersion"],
    "directoryServerTransactionId" => $_POST["directoryServerTransactionId"]
  ));

  $req_body = array(
    "amount" => 10000,
    "capture" => true,
    "currency_code" => "PEN",
    "description" => "Venta de prueba",
    "installments" => 0,
    "email" => "test@culqi.com",
    "metadata" => array("test"=>"test"),
    "source_id" => "" // previamente generado usando create token
  );


  $with_tds = ($req_body) + (isset($tds_xid) ? $tds : array());

  // Creando Cargo sin encriptar a una tarjeta
  $charge = $culqi->Charges->create($with_tds);
  // Respuesta
  echo "<b>Cargo sin encriptar payload:</b> "."<br>".json_encode($charge)."<br>";

  // Creando Cargo con encriptación a una tarjeta
  $charge = $culqi->Charges->create($with_tds, $encryption_params);
  // Respuesta
  echo "<b>Cargo con payload encriptado:</b> "."<br>".json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}

<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Codigo de Comercio
  $COD_COMERCIO = "pk_test_vzMuTHoueOMlgUPj";
  $culqi = new Culqi\Culqi(array('api_key' => $COD_COMERCIO));

  // Creando Cargo a una tarjeta
  $token = $culqi->Tokens->create(
      array(
        "card_number" => "4111111111111111",
        "cvv" => "123",
        "email" => "wmuro@me.com",
        "expiration_month" => 9,
        "expiration_year" => 2020,
        "fingerprint" => "q352454534"
      )
  );
  // Respuesta
  print_r("Token:  ".$token->id);

} catch (Exception $e) {
  echo $e->getMessage();
}

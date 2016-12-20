<?php

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Codigo de Comercio
  $COD_COMERCIO = "live_SZVtOA5x9n8c";
  $culqi = new Culqi\Culqi(array('api_key' => $COD_COMERCIO));

  // Creando Cargo a una tarjeta
  $token = $culqi->Tokens->create(
      array(
        "card_number" => 4111111111111111,
        "currency" => "PEN",
        "cvv" => "123",
        "expiration_month" => 10,
        "expiration_year" => 2020,
        "fingerprint" => "q352454534",
        "last_name" => "Muro",
        "email" => "wmuro@me.com",
        "name" => "William"
      )
  );
  // Respuesta
  print_r("Toke:  ".$token->value);

} catch (Exception $e) {
  echo $e->getMessage();
}

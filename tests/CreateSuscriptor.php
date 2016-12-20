<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;
use Culqi\Client;
use PHPUnit\Framework\TestCase;

class CrearSuscriptor extends TestCase {

  protected function setUp() {
    $this->PUBLIC_API_KEY = "COD_COMERCIO";
    $this->API_KEY = "API_KEY";

    $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
    $this->conexion = new Client();
  }

  public function testsCrearSuscriptor() {
    $suscriptor = $this->$culqi->Suscripciones->create(
      array(
          "address" => "Avenida Lima 123213",
          "city" => "LIMA",
          "country" => "PERU",
          "email" => "jose@gmail.com",
          "last_name" => "Cruces",
          "name" => "Brayan",
          "phone" => 1234567789,
          "plan_alias" => "plan-basico",
          "token" => "{AQUI TOKEN OBTENIDO DE CULQI.JS}"
      )
    );
    $this->assertNotNull($suscriptor);
  }

}

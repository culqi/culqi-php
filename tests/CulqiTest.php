<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;
use Culqi\Client;
use PHPUnit\Framework\TestCase;

/**
 *  Clase CrearCargos (Test)
 */
class CulqiTest extends TestCase {

  protected function setUp() {
    $this->PUBLIC_API_KEY = "live_SZVtOA5x9n8c";
    $this->API_KEY = "gjkf2ehJxmuXnjwanj3AIbCSrncDMEvk29sHR/n8ZwM=";

    $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
    $this->conexion = new Client();
  }

  /**
   * Creación de un token con los datos de una tarjeta de prueba
   */
  protected function createToken() {
      $testToken = array(
        "card_number" => 4111111111111111,
        "currency" => "PEN",
        "cvv" => "123",
        "expiration_month" => 10,
        "expiration_year" => 2020,
        "fingerprint" => "q352454534",
        "last_name" => "Muro",
        "email" => "wmuro@me.com",
        "name" => "William"
      );
      $response = $this->conexion->request(
      "POST",
      "/tokens/",
      $this->PUBLIC_API_KEY, $testToken
    );
    // Recibimos el Token (id)
    return $response->value;
  }

   /**
    * Verificar creación de Token
   */
  public function testVerifyToken() {
   $token = $this->createToken();
   $this->assertNotNull($token);
  }

}

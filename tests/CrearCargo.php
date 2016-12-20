<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;
use Culqi\Client;
use PHPUnit\Framework\TestCase;

/**
 *  Clase CrearCargos (Test)
 */
class CrearCargos extends TestCase {

  protected function setUp() {
    $this->PUBLIC_API_KEY = "COD_COMERCIO";
    $this->API_KEY = "API_KEY";

    $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
    $this->conexion = new Client();
  }

  /**
   * Creación de un token con los datos de una tarjeta de prueba
   */
  protected function createToken() {
      $testToken = array(
        "card_number" => "4111111111111111",
        "currency" => "PEN",
        "cvv" => "123",
        "expiration_month" => "09",
        "expiration_year" => "2020",
        "fingerprint" => "test",
        "last_name" => "Cruces",
        "mail" => "myemail@email.com",
        "name" => "Brayan"
      );
      $response = $this->conexion->request(
      "POST",
      "/tokens/",
      $this->PUBLIC_API_KEY, $testToken
    );
    // Recibimos el Token (id)
    return $response->id;
  }

   /**
    * Verificar creación de Token
   */
  public function testVerifyToken() {
   $token = $this->createToken();
   $this->assertNotNull($token);
  }

   /**
    * Cargos
    */
  public function testCrearCargo() {
   // Token
   $token = $this->createToken();
   // Cargo
   $cargo = $culqi->Cargos->create(
       array(
           "address" => "Avenida Lima 1232",
           "amount" => 1000,
           "city" => "LIMA",
           "country" => "PERU",
           "currency" => "PEN",
           "cvv" => "123",
           "description" => "Venta de prueba",
           "installments" => 0,
           "last_name" => "Cruces",
           "mail" => "micorreo@gmail.com",
           "metadata" => "",
           "name" => "Brayan",
           "order_number" => "10",
           "phone" => 3333339,
           "token" => $token
       )
   );
  }

  public function testGetCargo() {
   $token = $this->createToken();
   $charge = $this->culqi->Charges->create(array(
       "amount" => 1000,
       "email" => "test-php@example.org",
       "token" => $token
   ));
   $response = $this->culqi->Cargos->get($charge->uid);
   $this->assertEquals($response->uid, $charge->uid);
  }

}

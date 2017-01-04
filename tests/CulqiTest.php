<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;
use Culqi\Client;

/**
 *  Clase CrearCargos (Test)
 */
class CulqiTest extends PHPUnit_Framework_TestCase {

  protected function setUp() {
    $this->PUBLIC_API_KEY = "pk_test_vzMuTHoueOMlgUPj";
    $this->API_KEY = "sk_test_UTCQSGcXW8bCyU59";

    $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
    $this->conexion = new Client();
  }

  /**
   * Creación de un token con los datos de una tarjeta de prueba
   */
  protected function createToken() {
    $newToken = array(
      "card_number" => "4111111111111111",
      "currency_code" => "PEN",
      "cvv" => "123",
      "expiration_month" => 9,
      "expiration_year" => 2020,
      "fingerprint" => "q352454534",
      "last_name" => "Muro",
      "email" => "wmuro@me.com",
      "first_name" => "William"
    );
    $response = $this->conexion->request(
    "POST",
    "/tokens/",
    $this->PUBLIC_API_KEY, $newToken
    );
    // return Token (id)
    return $response->id;
  }

   /**
    * Verificar creación de Token
   */
  public function testVerifyToken() {
   $this->assertNotNull($this->createToken());
  }

  public function createCharge() {
    $charge = array(
      "address" => "Avenida Lima 1232",
      "address_city" => "LIMA",
      "amount" => 1000,
      "country_code" => "PE",
      "currency_code" => "PEN",
      "email" => "wmuro@me.com",
      "first_name" => "William",
      "installments" => 0,
      "last_name" => "Muro",
      "metadata" => "",
      "order_id" => uniqid(),
      "phone_number" => 3333339,
      "product_description" => "Venta de prueba",
      "token_id" => $this->createToken()
    );
    $response = $this->conexion->request(
    "POST",
    "/charges/",
    $this->API_KEY, $charge
    );
    return $response->id;
  }

  public function testCreateCharge() {
    // valid is not null Charge (id)
    $this->assertNotNull($this->createCharge());
  }

  public function testCreatePlan() {
    $newPlan = array(
        "alias" => "plan-culqi".uniqid(),
        "amount" => 1000,
        "currency_code" => "PEN",
        "interval" => "month",
        "interval_count" => 1,
        "limit" => 12,
        "name" => "Plan de Prueba ".uniqid(),
        "trial_days" => 15
    );
    $response = $this->conexion->request(
    "POST",
    "/plans/",
    $this->API_KEY, $newPlan
    );
    // valid is not null Plan (alias)
    $this->assertNotNull($response->alias);
  }

  public function testCreateSubscription() {
    $suscriptor = array(
        "address" => "Avenida Lima 123213",
        "address_city" => "LIMA",
        "country_code" => "PE",
        "email" => "wmuro@me.com",
        "last_name" => "Muro",
        "first_name" => "William",
        "phone_number" => 1234567789,
        "plan_alias" => "plan-test-CULQI101",
        "token_id" => $this->createToken()
    );
    $response = $this->conexion->request(
    "POST",
    "/subscriptions/",
    $this->API_KEY, $suscriptor
    );
    // valid is not null Subscription (id)
    $this->assertNotNull($response->id);
  }

  public function testCreateRefund() {
    $refund = array(
      "amount" => 500,
      "charge_id" => $this->createCharge(),
      "reason" => "bought an incorrect product"
    );
    $response = $this->conexion->request(
    "POST",
    "/refunds/",
    $this->API_KEY, $refund
    );
    // valid is not null Subscription (id)
    $this->assertNotNull($response->id);
  }

}

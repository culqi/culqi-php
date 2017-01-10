<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;
use Culqi\Client;

/**
 *  Clase CrearCargos (Test)
 */
class CulqiTest extends PHPUnit_Framework_TestCase {

  protected $API_KEY;
  protected $PUBLIC_API_KEY;

  protected function setUp() {
    $this->PUBLIC_API_KEY = "pk_test_vzMuTHoueOMlgUPj";
    $this->API_KEY = "sk_test_UTCQSGcXW8bCyU59";
    $this->culqi_token = new Culqi(array("api_key" => $this->PUBLIC_API_KEY ));
    $this->culqi = new Culqi(array("api_key" => $this->API_KEY ));
  }
  /**
   * Creación de un token con los datos de una tarjeta de prueba
   */
  protected function createToken() {
    $token = $this->culqi_token->Tokens->create(
        array(
          "card_number" => "4111111111111111",
          "currency_code" => "PEN",
          "cvv" => "123",
          "expiration_month" => 9,
          "expiration_year" => 2020,
          "fingerprint" => "q352454534",
          "last_name" => "Muro",
          "email" => "wmuro@me.com",
          "first_name" => "William"
        )
    );
    return $token;
  }

   /**
    * Verificar creación de Token
   */
  public function testVerifyToken() {
   $this->assertEquals('token', $this->createToken()->object);
  }

  public function createCharge() {
    $charge = $this->culqi->Charges->create(
        array(
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
          "token_id" => $this->createToken()->id
        )
    );
    return $charge;
  }

  public function testCreateCharge() {
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('charge', $this->createCharge()->object);
  }

  public function testCreatePlan() {
    $plan = $this->culqi->Plans->create(
      array(
        "alias" => "plan-culqi".uniqid(),
        "amount" => 1000,
        "currency_code" => "PEN",
        "interval" => "month",
        "interval_count" => 1,
        "limit" => 12,
        "name" => "Plan de Prueba ".uniqid(),
        "trial_days" => 15
      )
    );
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('plan', $plan->object);
  }

  public function testCreateSubscription() {
    $subscription = $this->culqi->Subscriptions->create(
      array(
        "address" => "Avenida Lima 123213",
        "address_city" => "LIMA",
        "country_code" => "PE",
        "email" => "wmuro@me.com",
        "last_name" => "Muro",
        "first_name" => "William",
        "phone_number" => 1234567789,
        "plan_alias" => "plan-test-CULQI101", //exist plan
        "token_id" => $this->createToken()->id
      )
    );
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('subscription',$subscription->object);
  }

  public function testCreateRefund() {
    $refund = $this->culqi->Refunds->create(
      array(
      "amount" => 500,
      "charge_id" => $this->createCharge()->id,
      "reason" => "bought an incorrect product"
      )
    );
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('refund',$refund->object);
  }

}

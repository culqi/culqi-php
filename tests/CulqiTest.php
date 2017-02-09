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
    $this->PUBLIC_API_KEY = getenv("PUBLIC_API_KEY");
    $this->API_KEY = getenv("API_KEY");
    $this->culqi_token = new Culqi(array("api_key" => $this->PUBLIC_API_KEY ));
    $this->culqi = new Culqi(array("api_key" => $this->API_KEY ));
  }

  public function testValidIins() {
    $iin = $this->culqi_token->Iins->get("411111");
    $this->assertEquals('iin', $iin->object);
  }

  /**
   * Creación de un token con los datos de una tarjeta de prueba
   */
  protected function createToken() {
    $token = $this->culqi_token->Tokens->create(
        array(
          "card_number" => "4111111111111111",
          "cvv" => "123",
          "email" => "wmuro".uniqid()."@me.com",
          "expiration_month" => 9,
          "expiration_year" => 2020,
          "fingerprint" => "q352454534"
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

  public function testFindToken() {
    $token = $this->culqi->Tokens->get($this->createToken()->id);
    $this->assertEquals('token', $token->object);
  }

  public function createCharge() {
    $charge = $this->culqi->Charges->create(
      array(
        "amount" => 1000,
        "capture" => true,
        "currency_code" => "PEN",
        "description" => "Venta de prueba",
        "email" => "test@culqi.com",
        "installments" => 0,
        "source_id" => $this->createToken()->id
      )
    );
    return $charge;
  }

  public function testCreateCharge() {
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('charge', $this->createCharge()->object);
  }

  /*
  public function testFindCharge() {
    echo $this->createCharge()->id;
    $charge = $this->culqi->Charges->get("chr_test_uF3t2j3w3VEUCK7e");
    $this->assertEquals('charge', $charge->object);
  }

  public function testListCharge() {
    $charge = $this->culqi->Charges->getList(array("min_amount" => 1000, "max_amount" => 1000000));
    $this->assertNotNull($charge);
  }*/

  public function createPlan() {
    $plan = $this->culqi->Plans->create(
      array(
        "alias" => "plan-culqi".uniqid(),
        "amount" => 1000,
        "currency_code" => "PEN",
        "interval" => "months",
        "interval_count" => 1,
        "limit" => 12,
        "name" => "Plan de Prueba ".uniqid(),
        "trial_days" => 15
      )
    );
    return $plan;
  }

  public function testCreatePlan() {
    // Verificacion del campo object no tenga el valor 'error'
    $this->assertEquals('plan', $this->createPlan()->object);
  }

  /*
  public function testCreateSubscription() {
    $subscription = $this->culqi->Subscriptions->create(
      array(
          "card_id"=> "{card_id}",
          "plan_id" => $this->createPlan()->id
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
  */

}

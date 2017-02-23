<?php

require_once('TestAutoLoad.php');

use Culqi\Culqi;

class DeleteTest extends PHPUnit_Framework_TestCase
{

    protected $API_KEY;

    protected function setUp() {
        $this->API_KEY = getenv("API_KEY");
        $this->culqi = new Culqi(array("api_key" => $this->API_KEY ));
    }

    public function createPlan() {
        $plan = $this->culqi->Plans->create(
            array(
                "amount" => 10000,
                "currency_code" => "PEN",
                "interval" => "dias",
                "interval_count" => 1,
                "limit" => 12,
                "name" => "plan-culqi".uniqid(),
                "trial_days" => 15
            )
        );
        return $plan;
    }

    public function testCreatePlan() {
        $this->assertEquals('plan', $this->createPlan()->object);
    }

    public function testDeletePlan() {
        $planDeleted = $this->culqi->Plans->delete($this->createPlan()->id);
        echo $planDeleted->deleted;
        $this->assertTrue($planDeleted->deleted);
    }

}
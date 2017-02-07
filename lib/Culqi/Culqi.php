<?php
namespace Culqi;

class Culqi
{

    public $api_key;

    /**
    * La versión de API usada
    */
    const API_VERSION = "v2.0";

    /**
     * La URL Base por defecto
     */
    const BASE_URL = "https://api.culqi.com/v2";

    // Constructor
    public function __construct($options)
    {
        $this->api_key = $options["api_key"];
        if (!$this->api_key) {
          throw new InvalidApiKey();
        }

        $this->Tokens = new Tokens($this);
        $this->Charges = new Charges($this);
        $this->Subscriptions = new Subscriptions($this);
        $this->Refunds = new Refunds($this);
        $this->Plans = new Plans($this);
        $this->Transfer = new Transfers($this);
        $this->Iins = new Iins($this);
        $this->Cards = new Cards($this);
        $this->Events = new Events($this);
        $this->Customers = new Customers($this);

    }

}

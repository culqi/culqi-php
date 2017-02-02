<?php
namespace Culqi;

class Transfers extends Resource {

    const URL_TRANSFERS = "/transfers/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_TRANSFERS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($alias = NULL) {
        return $this->request("GET", self::URL_TRANSFERS . $alias . "/", $api_key = $this->culqi->api_key);
    }

}

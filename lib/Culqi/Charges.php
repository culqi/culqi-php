<?php
namespace Culqi;

class Charges extends Resource {

    const URL_CHARGES = "/charges/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options);
    }

    public function create($options = NULL) {
        return $this->request("POST", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options);
    }

    public function get($alias = NULL) {
        return $this->request("GET", self::URL_CHARGES . $alias . "/", $api_key = $this->culqi->api_key);
    }

    public function getCapture($alias = NULL) {
        return $this->request("POST", self::URL_CHARGES . $alias . "/capture/", $api_key = $this->culqi->api_key);
    }

}

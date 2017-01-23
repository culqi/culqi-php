<?php
namespace Culqi;

class Charges extends Resource {

    const URL_CHARGES = "/charges/";

    public function create($options = NULL) {
        return $this->request("POST", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options);
    }

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id = NULL) {
        return $this->request("GET", self::URL_CHARGES . $id . "/", $api_key = $this->culqi->api_key);
    }

}

<?php
namespace Culqi;

class Refunds extends Resource {

    const URL_REFUNDS = "/refunds/";

    public function create($options = NULL) {
        return $this->request("POST", self::URL_REFUNDS, $api_key = $this->culqi->api_key, $options);
    }

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_REFUNDS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id = NULL) {
        return $this->request("GET", self::URL_REFUNDS . $id . "/", $api_key = $this->culqi->api_key);
    }

}

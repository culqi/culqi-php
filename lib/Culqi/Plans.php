<?php
namespace Culqi;

class Plans extends Resource {

    const URL_PLANS = "/plans/";

    public function create($options = NULL) {
        return $this->request("POST", self::URL_PLANS, $api_key = $this->culqi->api_key, $options);
    }

    public function getList($options) {
        return $this->request("GET", self::URL_PLANS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id) {
        return $this->request("GET", self::URL_PLANS . $id . "/", $api_key = $this->culqi->api_key);
    }

}

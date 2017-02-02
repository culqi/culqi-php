<?php
namespace Culqi;

class Plans extends Resource {

    const URL_PLANS = "/plans/";

    public function getList($options) {
        return $this->request("GET", self::URL_PLANS, $api_key = $this->culqi->api_key, $options);
    }

    public function create($options = NULL) {
        return $this->request("POST", self::URL_PLANS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($alias) {
        return $this->request("GET", self::URL_PLANS . $alias . "/", $api_key = $this->culqi->api_key);
    }

}

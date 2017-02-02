<?php
namespace Culqi;

class Subscriptions extends Resource {

    const URL_SUBSCRIPTIONS = "/subscriptions/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options);
    }

    public function create($options = NULL) {
        return $this->request("POST", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options);
    }

    public function delete($id = NULL) {
       return $this->request("DELETE", self::URL_SUBSCRIPTIONS . $id . "/", $api_key = $this->culqi->api_key);
    }

    public function get($alias = NULL) {
        return $this->request("GET", self::URL_SUBSCRIPTIONS . $alias . "/", $api_key = $this->culqi->api_key, $options);
    }

}

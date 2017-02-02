<?php
namespace Culqi;

class Customers extends Resource {

    const URL_CUSTOMERS = "/customers/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options);
    }

    public function create($options = NULL) {
        return $this->request("POST", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options);
    }

    public function delete($id = NULL) {
       return $this->request("DELETE", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key);
    }

    public function get($alias = NULL) {
        return $this->request("GET", self::URL_CUSTOMERS . $alias . "/", $api_key = $this->culqi->api_key, $options);
    }

}

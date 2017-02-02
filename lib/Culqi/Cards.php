<?php
namespace Culqi;

class Cards extends Resource {

  const URL_CARDS = "/cards/";

  public function getList($options = NULL) {
      return $this->request("GET", self::URL_CARDS, $api_key = $this->culqi->api_key, $options);
  }

  public function create($options = NULL) {
      return $this->request("POST", self::URL_CARDS, $api_key = $this->culqi->api_key, $options);
  }

  public function delete($alias = NULL) {
     return $this->request("DELETE", self::URL_CARDS . $alias . "/", $api_key = $this->culqi->api_key);
  }

  public function get($alias = NULL) {
      return $this->request("GET", self::URL_CARDS . $alias . "/", $api_key = $this->culqi->api_key);
  }

}

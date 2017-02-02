<?php
namespace Culqi;

class Events extends Resource {

  const URL_EVENTS = "/events/";

  public function getList($options = NULL) {
      return $this->request("GET", self::URL_EVENTS, $api_key = $this->culqi->api_key, $options);
  }

  public function get($alias = NULL) {
      return $this->request("GET", self::URL_EVENTS . $alias . "/", $api_key = $this->culqi->api_key);
  }

}

<?php
namespace Culqi;


class Subscriptions extends Resource {

    const URL_SUBSCRIPTIONS = "/subscriptions/";

    public function create($options = NULL) {
        return $this->request("POST", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options);
    }

}

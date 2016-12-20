<?php
namespace Culqi;

class Planes extends Resource {

    const URL_PLANES = "/plans/";

    public function create($options = NULL)
    {
        return $this->request("POST", self::URL_PLANES, $api_key = $this->culqi->api_key, $options);
    }

    public function getList($options)
    {
        return $this->request("GET", self::URL_PLANES, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id)
    {
        return $this->request("GET", self::URL_PLANES . $id . "/", $api_key = $this->culqi->api_key);
    }

    public function delete($id)
    {
       return $this->request("DELETE", self::URL_PLANES . $id . "/", $api_key = $this->culqi->api_key);
    }

}

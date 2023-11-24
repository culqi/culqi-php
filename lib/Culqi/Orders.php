<?php

namespace Culqi;

/**
 * Class Orders
 *
 * @package Culqi
 */
class Orders extends Resource {

    const URL_ORDERS = "/orders/";

    /**
     * @param array|null $options
     *
     * @return Get all Orders
     */
    public function all($options) {
        return $this->request("GET", self::URL_ORDERS, $api_key = $this->culqi->api_key, $options);
    }

    /**
     * @param array|null $options
     *
     * @return create Order 
     */
    public function create($options = NULL, $encryption_params = []) {
        $culqi_validation = new CulqiValidation();
        $culqi_validation->order_validation($options);
        return $this->request("POST", self::URL_ORDERS, $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    } 


    /**
     * @param array|null $options
     *
     * @return confirm Order 
     */
    public function confirm($id = NULL) {
        return $this->request("POST", self::URL_ORDERS . $id . "/confirm/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param array|null $options
     *
     * @return confirm Order 
     */
    public function confirm_order_type($options = NULL, $encryption_params=[]) {
        $this->culqi_validation->confirm_order_type_validation($options);
        return $this->request("POST", self::URL_ORDERS . "confirm/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

    /**
     * @param string|null $id
     *
     * @return get a Order
     */
    public function get($id) {
        $this->culqi_validation->validateStringStart($id, "ord");
        return $this->request("GET", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     *
     * @return delete a Order
     */
    public function delete($id) {
        return $this->request("DELETE", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Order
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        return $this->request("PATCH", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

}

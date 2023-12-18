<?php

namespace Culqi;

use Culqi\Utils\Validation\CustomerValidation as CustomerValidation;

/**
 * Class Customers
 *
 * @package Culqi
 */
class Customers extends Resource {

    const URL_CUSTOMERS = "/customers/";

    /**
     * @param array|null $options
     *
     * @return all Customers.
     */
    public function all($options = []) {
        CustomerValidation::list($options);
        return $this->request("GET", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options);
    }

    /**
     * @param array|null $options
     *
     * @return create Customer response.
     */
    public function create($options = NULL, $encryption_params=[]) {
        CustomerValidation::create($options);
        return $this->request("POST", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

    /**
     * @param string|null $id
     *
     * @return delete a Customer response.
     */
    public function delete($id = NULL) {
        $this->helpers::validateStringStart($id, "cus");
       return $this->request("DELETE", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     *
     * @return get a Customer.
     */
    public function get($id = NULL) {
        $this->helpers::validateStringStart($id, "cus");
        return $this->request("GET", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Charge response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        $this->helpers::validateStringStart($id, "cus");
        return $this->request("PATCH", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

}

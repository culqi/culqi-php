<?php

namespace Culqi;

use Culqi\Utils\Validation\SubscriptionValidation as SubscriptionValidation;

/**
 * Class Subscriptions
 *
 * @package Culqi
 */
class Subscriptions extends Resource
{

    const URL_SUBSCRIPTIONS = "/recurrent/subscriptions";

    /**
     * @param array|null $options
     *
     * @return all Subscriptions.
     */
    public function all($options = [])
    {
        try {
            SubscriptionValidation::list($options);
            return $this->request("GET", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Subscription response.
     */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL)
    {
        try {
            SubscriptionValidation::create($options);
            define('URL_SUBSCRIPTIONS_CREATE', "/create");
            return $this->request("POST", self::URL_SUBSCRIPTIONS . URL_SUBSCRIPTIONS_CREATE, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return delete a Subscription response.
     */
    public function delete($id = NULL)
    {
        try {
            SubscriptionValidation::validId($id);
            $this->helpers::validateStringStart($id, "sxn");
            return $this->request("DELETE", self::URL_SUBSCRIPTIONS . "/" . $id, $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Subscription.
     */
    public function get($id = NULL)
    {
        try {
            SubscriptionValidation::validId($id);
            $this->helpers::validateStringStart($id, "sxn");
            return $this->request("GET", self::URL_SUBSCRIPTIONS . "/" . $id, $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Subscription response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params = [])
    {
        try {
            SubscriptionValidation::validId($id);
            $this->helpers::validateStringStart($id, "sxn");
            SubscriptionValidation::update($options);
            return $this->request("PATCH", self::URL_SUBSCRIPTIONS . "/" . $id, $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}

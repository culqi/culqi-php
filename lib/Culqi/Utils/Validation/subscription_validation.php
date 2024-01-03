<?php
namespace Culqi\Utils\Validation;
use Culqi\Utils\Validation\Helpers as Helpers;
require 'country_codes.php';

class SubscriptionValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        // Validate customer format
        Helpers::validateStringStart($data['card_id'], "crd");
        
        // Validate token format
        Helpers::validateStringStart($data['plan_id'], "pln");
    }

    public static function list($data)
    {
        if (isset($data['plan_id'])) {
            Helpers::validateStringStart($data['plan_id'], "pln");
        }

        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
    }
}
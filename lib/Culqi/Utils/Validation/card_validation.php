<?php
namespace Culqi\Utils\Validation;
use Culqi\Utils\Validation\Helpers as Helpers;
require_once 'country_codes.php';

class CardValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = []) {
        // Validate customer format
        Helpers::validateStringStart($data['customer_id'], "cus");
        
        // Validate token format
        Helpers::validateStringStart($data['token_id'], "tkn");
    }

    public static function list($data)
    {
        if (isset($data['card_brand'])) {
            $allowedValues = ['duplicado', 'fraudulento', 'solicitud_comprador'];
            Helpers::validateValue($data['card_brand'], $allowedValues);
        }
        if (isset($data['card_type'])) {
            $allowedValues = ['credito', 'debito', 'internacional'];
            Helpers::validateValue($data['card_type'], $allowedValues);
        }
        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
        if (isset($data['country_code'])) {
            Helpers::validateValue($data['country_code'], get_country_codes());
        }
    }
}
<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;

class OrderValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = []) {
        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        //validate currency
        Helpers::validateCurrencyCode($data['currency_code']);

        //validate firstname, lastname and phone
        if (empty($data['client_details']['first_name'])) {
            throw new CustomException('first name is empty.');
        }
        
        if (empty($data['client_details']['last_name'])) {
            throw new CustomException('last name is empty.');
        }
        
        if (empty($data['client_details']['phone_number'])) {
            throw new CustomException('phone_number is empty.');
        }

        //validate email
        if (!Helpers::isValidEmail($data['client_details']['email'])) {
            throw new CustomException('Invalid email.');
        }

        //validate expiration date

        if(!Helpers::isFutureDate($data['expiration_date'])) {
            throw new CustomException('expiration_date must be a future date.');
        }

    }

    public static function confirm_order_type($data = []) {
        // Validate order id format
        Helpers::validateStringStart($data['order_id'], "ord");
    }

    public static function list($data = []) {
        // Validate email
        if (isset($data['email'])) {
            if (!Helpers::isValidEmail($data['email'])) {
                throw new CustomException('Invalid email.');
            }
        }

        // Validate amount
        Helpers::validateIntegerField($data, 'amount', 'Invalid amount.');
        Helpers::validateIntegerField($data, 'min_amount', 'Invalid min amount.');
        Helpers::validateIntegerField($data, 'max_amount', 'Invalid max amount.');

        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
    }
}
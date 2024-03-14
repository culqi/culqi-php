<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;
require_once 'country_codes.php';

class ChargeValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        // Validate email
        if (!Helpers::isValidEmail($data['email'])) {
            throw new CustomException('Invalid email.');
        }

        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        Helpers::validateCurrencyCode($data['currency_code']);

        if (substr($data['source_id'], 0, 3) === "tkn") {
            Helpers::validateStringStart($data['source_id'], "tkn");
        } elseif (substr($data['source_id'], 0, 3) === "ype") {
            Helpers::validateStringStart($data['source_id'], "ype");
        } elseif (substr($data['source_id'], 0, 3) === "crd") {
            Helpers::validateStringStart($data['source_id'], "crd");
        } else {
            throw new CustomException('Incorrect format. The format must start with tkn, ype or crd.');
        }
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
        Helpers::validateIntegerField($data, 'installments', 'Invalid installments.');
        Helpers::validateIntegerField($data, 'max_amount', 'Invalid max amount.');
        Helpers::validateIntegerField($data, 'min_installments', 'Invalid min installments.');
        Helpers::validateIntegerField($data, 'max_installments', 'Invalid max installments.');

        // Validate currency code
        if (isset($data['currency_code'])) {
            Helpers::validateCurrencyCode($data['currency_code']);
        }
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
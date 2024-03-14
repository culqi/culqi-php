<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;
require_once 'country_codes.php';

class RefundValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        // Validate charge format
        Helpers::validateStringStart($data['charge_id'], "chr");

        //validate reason
        $allowedValues = ['duplicado', 'fraudulento', 'solicitud_comprador'];
        Helpers::validateValue($data['reason'], $allowedValues);

        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }
    }

    public static function list($data) {
        if (isset($data['reason'])) {
            $allowedValues = ['duplicado', 'fraudulento', 'solicitud_comprador'];
            Helpers::validateValue($data['reason'], $allowedValues);
        }

        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
    }
}
<?php
namespace Culqi\Utils\Validation;


use Culqi\Error\CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;

require_once __DIR__ . '/../Constant/Request/Subscription.php';
require_once __DIR__ . '/../Constant/Response/Subscription.php';

require_once 'country_codes.php';

class SubscriptionValidation
{
    public function __construct($options = [])
    {
    }

    public static function validId($id)
    {
        $expectedParameters = [
            'id'
        ];
        
        $data = [
            'id'=> $id,
        ];
        Helpers::additionalValidation($data, $expectedParameters);
        if (empty($id) || strlen($id) != 25) {
            throw new CustomException("El campo 'id' es inválido. La longitud debe ser de 25 caracteres.");
        }
    }

    public static function create($data = [])
    {
        $expectedParameters = [
            'card_id',
            'plan_id',
            'tyc'
        ];
        Helpers::additionalValidation($data, $expectedParameters);
        $card_id = $data['card_id'];
        $plan_id = $data['plan_id'];
        $tyc = $data['tyc'];
        $metadata = isset($data['metadata']) ? $data['metadata'] : null;

        // Validate card_id format
        if (
            Helpers::validateParametersString($card_id) ||
            strlen($card_id) != GENERATED_ID_SUBSCRIPTION
        ) {
            throw new CustomException(INVALID_CARD_RANGE);
        }
        Helpers::validateStringStart($card_id, "crd");

        // Validate plan_id format
        if (
            Helpers::validateParametersString($plan_id) ||
            strlen($plan_id) != GENERATED_ID_SUBSCRIPTION
        ) {
            throw new CustomException(INVALID_PLAN_ID_RANGE);
        }
        Helpers::validateStringStart($plan_id, "pln");

        if (!isset($tyc) || !is_bool($tyc) || empty($tyc)) {
            throw new CustomException(SUBSCRIPTION_INVALID_TYC);
        }

        //Validate parameter: metadata
        if ($metadata) {
            Helpers::validateMetadataSchema($metadata);
        }
    }

    public static function list($data)
    {
        $status = isset($data['status']) ? $data['status'] : null;
        $plan_id = isset($data['plan_id']) ? $data['plan_id'] : null;
        $creation_date_from = isset($data['creation_date_from']) ? $data['creation_date_from'] : null;
        $creation_date_to = isset($data['creation_date_to']) ? $data['creation_date_to'] : null;
        $limit = isset($data['limit']) ? $data['limit'] : null;
        $before = isset($data['before']) ? $data['before'] : null;
        $after = isset($data['after']) ? $data['after'] : null;

        if (
            $status &&
            !in_array($status, SUBSCRIPTION_STATUS)
        ) {
            throw new CustomException(INVALID_STATUS_SUBSCRIPTION);
        }


        if ($plan_id) {
            Helpers::validateStringStart($plan_id, "pln");
            if (strlen($plan_id) != GENERATED_ID_SUBSCRIPTION) {
                throw new CustomException(INVALID_PLAN_ID_RANGE);
            }
        }

        if (
            $limit &&
            Helpers::validateRangeParameters($limit, MIN_LIMIT_FILTER, MAX_LIMIT_FILTER)
        ) {
            throw new CustomException(LIMIT_FILTER_SUBSCRIPTION);
        }

        if (
            $before &&
            strlen($before) != GENERATED_ID
        ) {
            throw new CustomException(INVALID_BEFORE_FILTER_SUBSCRIPTION);
        }

        if (
            $after &&
            strlen($after) != GENERATED_ID
        ) {
            throw new CustomException(INVALID_AFTER_FILTER_SUBSCRIPTION);
        }

        if (
            $creation_date_from && !(strlen($creation_date_from) == 10 ||
                strlen($creation_date_from) == 13)
        ) {
            throw new CustomException(INVALID_CREATION_DATE_FROM_RANGE_SUBSCRIPTION);
        }

        if (
            $creation_date_to && !(strlen($creation_date_to) == 10 ||
                strlen($creation_date_to) == 13)
        ) {
            throw new CustomException(INVALID_CREATION_DATE_TO_RANGE_SUBSCRIPTION);
        }

        if (
            isset($creation_date_from) &&
            isset($creation_date_to)
        ) {
            Helpers::validateDateFilter($creation_date_from, $creation_date_to);
        }

    }

    public static function update($data = [])
    {
        //Validar payload
        $expectedParameters = [
            'card_id'
        ];
        Helpers::additionalValidation($data, $expectedParameters);

        $card_id = isset($data['card_id']) ? $data['card_id'] : null;
        $metadata = isset($data['metadata']) ? $data['metadata'] : null;

        if (
            Helpers::validateParametersString($card_id) ||
            strlen($card_id) != GENERATED_ID_SUBSCRIPTION
        ) {
            throw new CustomException(INVALID_CARD_RANGE);
        }
        
         //Validate parameter: metadata
         if ($metadata) {
            Helpers::validateMetadataSchema($metadata);
        }
    }
}
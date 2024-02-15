<?php

require_once __DIR__ . '/../Request/Subscription.php';

const INVALID_CARD_RANGE = "El campo 'card_id' es inválido. La longitud debe ser de " . GENERATED_ID . ".";
const SUBSCRIPTION_INVALID_TYC = "El campo 'tyc' es inválido o está vacío. El valor debe ser un booleano.";
const INVALID_PLAN_ID_RANGE = "El campo 'plan_id' es inválido. La longitud debe ser de " . GENERATED_ID . ".";

$enumSubscriptionStutsAsString = implode(', ', SUBSCRIPTION_STATUS);
define('INVALID_STATUS_SUBSCRIPTION_STRING', "El campo 'status' es inválido. Estos son los únicos valores permitidos: [{$enumSubscriptionStutsAsString}].");
const INVALID_STATUS_SUBSCRIPTION = INVALID_STATUS_SUBSCRIPTION_STRING;
const LIMIT_FILTER_SUBSCRIPTION = "El filtro 'limit' admite valores en el rango " . MIN_LIMIT_FILTER . " a " . MAX_LIMIT_FILTER . ".";
const INVALID_AFTER_FILTER_SUBSCRIPTION = "El campo 'after' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_BEFORE_FILTER_SUBSCRIPTION = "El campo 'before' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_CREATION_DATE_FROM_RANGE_SUBSCRIPTION = "El campo 'creation_date_from' debe tener una longitud de " . RANGE_DATE_MIN . " o " . RANGE_DATE_MAX . " caracteres.";
const INVALID_CREATION_DATE_TO_RANGE_SUBSCRIPTION = "El campo 'creation_date_to' debe tener una longitud de " . RANGE_DATE_MIN . " o " . RANGE_DATE_MAX . " caracteres.";
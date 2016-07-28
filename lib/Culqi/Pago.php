<?php

class Pago {

    const URL_VALIDACION_AUTORIZACION = "/api/v1/web/crear/";
    const URL_ANULACION = "/api/v1/devolver/";
    const URL_CONSULTA = "/api/v1/consultar/";

    const PARAM_COD_COMERCIO = "codigo_comercio";
    const PARAM_EXTRA = "extra";
    const PARAM_SDK_INFO = "sdk";

    const PARAM_NUM_PEDIDO = "numero_pedido";
    const PARAM_MONTO = "monto";
    const PARAM_MONEDA = "moneda";
    const PARAM_DESCRIPCION = "descripcion";

    const PARAM_COD_PAIS = "cod_pais";
    const PARAM_CIUDAD = "ciudad";
    const PARAM_DIRECCION = "direccion";
    const PARAM_NUM_TEL = "num_tel";

    const PARAM_INFO_VENTA = "informacion_venta";
    const PARAM_TICKET = "ticket";

    const PARAM_VIGENCIA = "vigencia";

    const PARAM_CORREO_ELECTRONICO = "correo_electronico";
    const PARAM_NOMBRES = "nombres";
    const PARAM_APELLIDOS = "apellidos";
    const PARAM_ID_USUARIO_COMERCIO = "id_usuario_comercio";

    private static function getSdkInfo() {
        return array(
            "v" => CULQI_SDK_VERSION,
            "lng_n" => "php",
            "lng_v" => phpversion(),
            "os_n" => PHP_OS,
            "os_v" => php_uname()
        );
    }

    public static function crearDatospago($params, $extra = null) {
        Pago::validateParams($params);

        $cipherData = Pago::getCipherData($params, $extra);
        $validationParams = array(
            Pago::PARAM_COD_COMERCIO => Culqi::$codigoComercio,
            Pago::PARAM_INFO_VENTA => $cipherData
        );

        $response = Pago::validateAuth($validationParams);
        if (!empty($response) && array_key_exists(Pago::PARAM_TICKET, $response)) {
            $infoVenta = array(
                Pago::PARAM_COD_COMERCIO => $response[Pago::PARAM_COD_COMERCIO],
                Pago::PARAM_TICKET => $response[Pago::PARAM_TICKET]
            );
            $response[Pago::PARAM_INFO_VENTA] = Culqi::cifrar(json_encode($infoVenta));
        }

        return $response;
    }

    public static function consultar($token) {
        $cipherData = Pago::getCipherData(array(
            Pago::PARAM_TICKET => $token
        ));
        $params = array(
            Pago::PARAM_COD_COMERCIO => Culqi::$codigoComercio,
            Pago::PARAM_INFO_VENTA => $cipherData
        );
        return Pago::postJson(Culqi::$servidorBase . Pago::URL_CONSULTA, $params);
    }

    public static function anular($token) {
        $cipherData = Pago::getCipherData(array(
            Pago::PARAM_TICKET => $token
        ));
        $params = array(
            Pago::PARAM_COD_COMERCIO => Culqi::$codigoComercio,
            Pago::PARAM_INFO_VENTA => $cipherData
        );
        return Pago::postJson(Culqi::$servidorBase . Pago::URL_ANULACION, $params);
    }

    private static function getCipherData($params, $extra = null) {
        $endParams = array_merge(array(
            Pago::PARAM_COD_COMERCIO => Culqi::$codigoComercio,
        ), $params);
        if (!empty($extra)) {
            $endParams[Pago::PARAM_EXTRA] = $extra;
        }
        $endParams[Pago::PARAM_SDK_INFO] = Pago::getSdkInfo();
        $jsonData = json_encode($endParams);
        return Culqi::cifrar($jsonData);
    }

    private static function validateAuth($params) {
        return Pago::postJson(Culqi::$servidorBase . Pago::URL_VALIDACION_AUTORIZACION, $params);
    }

    private static function validateParams($params){
        if (!isset($params[Pago::PARAM_MONEDA]) or empty($params[Pago::PARAM_MONEDA])) {
            throw new InvalidParamsException("[Error] Debe existir una moneda");
        } else if (strlen(trim($params[Pago::PARAM_MONEDA])) != 3) {
            throw new InvalidParamsException("[Error] La moneda debe contener exactamente 3 caracteres.");
        }
        if (!isset($params[Pago::PARAM_MONTO]) or empty($params[Pago::PARAM_MONTO])) {
            throw new InvalidParamsException("[Error] Debe existir un monto");
        } else if (is_numeric($params[Pago::PARAM_MONTO])) {
            if (!ctype_digit($params[Pago::PARAM_MONTO])) {
                throw new InvalidParamsException("[Error] El monto debe ser un número entero, no flotante.");
            }
        } else {
            throw new InvalidParamsException("[Error] El monto debe ser un número entero.");
        }
    }

    private static function postJson($url, $params) {
        $opt = array(
            'http' => array(
                'header' => "Content-Type: application/json\r\n"
                            . "User-Agent: php-context\r\n",
                'method' => 'POST',
                'content' => json_encode($params),
                'ignore_errors' => true
            )
        );

        $context = stream_context_create($opt);
        $response = file_get_contents($url, false, $context);

        $decryptedResponse = Culqi::decifrar($response);

        return json_decode($decryptedResponse, true);
    }
}

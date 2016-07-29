<?php


/**
 * Class Culqi
 *
 * Controla algunos metodos principales.
 *
 * @version 1.2.0
 * @package Culqi
 * @copyright Copyright (c) 2015-2016 Culqi
 * @license MIT
 * @license https://opensource.org/licenses/MIT MIT License
 * @link http://beta.culqi.com/desarrolladores/ Culqi Developers
 */
class Culqi {


    public static $llaveSecreta = CQ_SECRET_KEY;
    public static $codigoComercio = CQ_COD_COMERCIO;
    public static $servidorBase;
    public static $apiVersion = '1.0.0';
    public static $sdkVersion = '1.2.0';


    /**
     * Obtiene servidor base dependiendo el entorno
     * @return string URL para los requests.
     */
    public static function getApiBase()
    {
        if (CQ_ENTORNO == 'integracion') {
          self::$servidorBase = "https://integ-pago.culqi.com";
        }

        if (CQ_ENTORNO == 'produccion') {
          self::$servidorBase = "https://pago.culqi.com";
        }

        return self::$servidorBase;
    }

    /**
     * Cifra mediante la llave secreta
     * @param  string $txt Cadena a cifrar
     * @return string      Cadena cifrada
     */
    public static function cifrar($txt) {
        $aes = new UrlAESCipher();
        $aes->setBase64Key(Culqi::$llaveSecreta);
        return $aes->urlBase64Encrypt($txt);
    }

    /**
     * Descifra mediante la llave secreta
     * @param  string $txt Cadena cifrada
     * @return string      Cadena descifrada
     */
    public static function descifrar($txt) {
        $aes = new UrlAESCipher();
        $aes->setBase64Key(Culqi::$llaveSecreta);
        return $aes->urlBase64Decrypt($txt);
    }
}

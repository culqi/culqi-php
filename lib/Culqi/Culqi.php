<?php

class Culqi {

    public static $llaveSecreta;
    public static $codigoComercio;

    public static $servidorBase = "https://pago.culqi.com";

    public static function cifrar($txt) {
        $aes = new UrlAESCipher();
        $aes->setBase64Key(Culqi::$llaveSecreta);
        return $aes->urlBase64Encrypt($txt);
    }

    public static function decifrar($txt) {
        $aes = new UrlAESCipher();
        $aes->setBase64Key(Culqi::$llaveSecreta);
        return $aes->urlBase64Decrypt($txt);
    }
}

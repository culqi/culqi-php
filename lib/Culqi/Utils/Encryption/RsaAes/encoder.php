<?php
namespace Culqi\Utils\Encryption\RsaAes;

use phpseclib3\Crypt\PublicKeyLoader as PublicKeyLoader;

class Encryption
{
    public function __construct($options=[])
    {

    }

    private function encrypt($data = [], $rsa_public_key = false)
    {
        try {
            $aes_key = openssl_random_pseudo_bytes(32);
            $aes_iv = openssl_random_pseudo_bytes(16);

            //encrypt json using AES
            $encrypted_message = openssl_encrypt(json_encode($data), 'AES-256-GCM', $aes_key, OPENSSL_RAW_DATA, $aes_iv, $authentication_tag);
            $rsa = PublicKeyLoader::load($rsa_public_key, $password = false);
            $hashingAlgorithm = 'sha256';

            $encrypted_aes_key = $rsa->withHash($hashingAlgorithm)->withMGFHash($hashingAlgorithm)->encrypt($aes_key);
            $encrypted_aes_iv = $rsa->withHash($hashingAlgorithm)->withMGFHash($hashingAlgorithm)->encrypt($aes_iv);

            $encrypted_data = [
                "encrypted_data" => base64_encode($encrypted_message),
                "encrypted_key" => base64_encode($encrypted_aes_key),
                "encrypted_iv" => base64_encode($encrypted_aes_iv),
            ];

            return $encrypted_data;
        } catch (\Throwable $th) {
            //var_dump($th);
        }
    }

    public function validate_encryption($data, $encryption_params, $headers)
    {
        if (array_key_exists("rsa_public_key", $encryption_params) 
        && array_key_exists("rsa_id", $encryption_params)) {
            $data = $this->encrypt($data, $encryption_params["rsa_public_key"]);
            $additional_headers = ['x-culqi-rsa-id' => $encryption_params["rsa_id"]];
            $headers = array_merge($headers, $additional_headers);
        }
        return [$data, $headers];
    }
}
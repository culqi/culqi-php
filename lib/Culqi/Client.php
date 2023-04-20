<?php
namespace Culqi;

use Culqi\Error as Errors;
use WpOrg\Requests\Requests as Requests;
use phpseclib3\Crypt\PublicKeyLoader as PublicKeyLoader;

/**
 * Class Client
 *
 * @package Culqi
 */
class Client {
    public function request($method, $url, $api_key, $data = NULL, $secure_url = false, $encryption_data = [])
    {
        try {
            $url_params = is_array($data) ? '?' . http_build_query($data) : '';
            $headers= array("Authorization" => "Bearer ".$api_key, "Content-Type" => "application/json", "Accept" => "application/json");
            $options = array(
                'timeout' => 120
            ); 
            
            // Check URL
            if($secure_url) $base_url = Culqi::SECURE_BASE_URL;
            else $base_url = Culqi::BASE_URL;

            if($method == "GET") {
                $response = Requests::get(Culqi::BASE_URL. $url . $url_params, $headers, $options);
            } else if($method == "POST") {
                [$data, $headers] = $this->validate_encryption($data, $encryption_data, $headers);
                $response = Requests::post($base_url . $url, $headers, json_encode($data), $options);
            } else if($method == "PATCH") {
                [$data, $headers] = $this->validate_encryption($data, $encryption_data, $headers);
                $response = Requests::patch(Culqi::BASE_URL . $url, $headers, json_encode($data), $options);
            } else if($method == "DELETE") {
                $response = Requests::delete(Culqi::BASE_URL. $url . $url_params, $headers, $options);
            }
        } catch (\Exception $e) {
            throw new Errors\UnableToConnect();
        }
        if ($response->status_code >= 200 && $response->status_code <= 206) {
            return json_decode($response->body);
        }
        if ($response->status_code == 400) {
            throw new Errors\UnhandledError($response->body, $response->status_code);
        }
        if ($response->status_code == 401) {
            throw new Errors\AuthenticationError();
        }
        if ($response->status_code == 404) {
            throw new Errors\NotFound();
        }
        if ($response->status_code == 403) {
            throw new Errors\InvalidApiKey();
        }
        if ($response->status_code == 405) {
            throw new Errors\MethodNotAllowed();
        }
        throw new Errors\UnhandledError($response->body, $response->status_code);
    }

    public function encrypt($data = [], $rsa_public_key = false)
    {
        try {
            $aes_key = openssl_random_pseudo_bytes(32);
            $aes_iv = openssl_random_pseudo_bytes(16);

            //encrypt json using AES
            $encrypted_message = openssl_encrypt(json_encode($data), 'AES-256-CBC', $aes_key, OPENSSL_RAW_DATA, $aes_iv);

            $rsa = PublicKeyLoader::load($rsa_public_key, $password = false);
            $hashingAlgorithm = 'sha1';

            $encrypted_aes_key = $rsa->withHash($hashingAlgorithm)->withMGFHash($hashingAlgorithm)->encrypt($aes_key);
            $encrypted_aes_iv = $rsa->withHash($hashingAlgorithm)->withMGFHash($hashingAlgorithm)->encrypt($aes_iv);

            $encrypted_data = [
                "encrypted_data" => base64_encode($encrypted_message),
                "encrypted_key" => base64_encode($encrypted_aes_key),
                "encrypted_iv" => base64_encode($encrypted_aes_iv),
            ];

            return $encrypted_data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    private function validate_encryption($data, $encryption_data, $headers)
    {
        if (array_key_exists("rsa_public_key", $encryption_data) 
        && array_key_exists("rsa_id", $encryption_data)) {
            $data = $this->encrypt($data, $encryption_data["rsa_public_key"]);
            $additional_headers = ['x-culqi-rsa-id' => $encryption_data["rsa_id"]];
            $headers = array_merge($headers, $additional_headers);
        }
        return [$data, $headers];
    }
}

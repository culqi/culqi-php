<?php
namespace Culqi;

use Culqi\Error as Errors;
use WpOrg\Requests\Requests as Requests;
use Culqi\Utils\Encryption\RsaAes\Encryption as Encryption;
/**
 * Class Client
 *
 * @package Culqi
 */
class Client {
    public function request($method, $url, $api_key, $data = NULL, $secure_url = false, $encryption_params = [], $custom_headers = NULL)
    {
        try {
            $pattern = '/^(pk_test_|sk_test_|pk_live_|sk_live_)/';
            if (!$api_key|| !preg_match($pattern, $api_key)) {
                throw new Errors\CustomException('API Key invalido');
            }
            $encryption = new Encryption();
            $url_params = is_array($data) ? '?' . http_build_query($data) : '';
            $env = (preg_match('/(test)/', $api_key)) ? 'test':'live';
            $headers= array(
                "Authorization" => "Bearer ".$api_key, 
                "Content-Type" => "application/json", 
                "Accept" => "application/json",
                "x-culqi-env" => $env,
                "x-api-version" => Culqi::X_API_VERSION,
                "x-culqi-client" => Culqi::CULQI_CLIENT,
                "x-culqi-client-version" => Culqi::CULQI_CLIENT_VERSION,
            );

            if ($custom_headers) {
                echo "\nCustom_headers:\n";
                print_r($custom_headers);
            
                foreach ($custom_headers as $header_key => $header_value) {
                    if ($header_value) {
                        $headers[$header_key] = $header_value;
                    }
                }
            }

            $options = array(
                'timeout' => 120
            ); 
            
            // Check URL
            if($secure_url) $base_url = Culqi::SECURE_BASE_URL;
            else $base_url = Culqi::BASE_URL;

            if($method == "GET") {
                $response = Requests::get(Culqi::BASE_URL. $url . $url_params, $headers, $options);
            } else if($method == "POST") {
                [$data, $headers] = $encryption->validate_encryption($data, $encryption_params, $headers);
                $response = Requests::post($base_url . $url, $headers, json_encode($data), $options);
            } else if($method == "PATCH") {
                [$data, $headers] = $encryption->validate_encryption($data, $encryption_params, $headers);
                $response = Requests::patch(Culqi::BASE_URL . $url, $headers, json_encode($data), $options);
            } else if($method == "DELETE") {
                $response = Requests::delete(Culqi::BASE_URL. $url . $url_params, $headers, $options);
            }
        } catch (Errors\CustomException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            throw new Errors\UnableToConnect();
        }

        http_response_code($response->status_code);
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
}

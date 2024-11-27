<?php
namespace Culqi\Error;

/**
 * Culqi Exceptions
 */

/**
 * Base Culqi Exception
 */
class CulqiException extends \Exception {
    protected $message = "Base Culqi Exception";
}
/**
 * Input validation error
 */
namespace Culqi\Error;

class InputValidationError extends CulqiException {
    protected $message = "Error de validacion en los campos";
}
/**
 * Authentication error
 */
namespace Culqi\Error;

class AuthenticationError extends CulqiException {
    protected $message = "Error de autenticación";
}
/**
 * Resource not found
 */
namespace Culqi\Error;

class NotFound extends CulqiException {
    protected $message = "Recurso no encontrado";
}
/**
 * Method not allowed
 */
namespace Culqi\Error;

class MethodNotAllowed extends CulqiException {
    protected $message = "Method not allowed";
}
/**
 * Unhandled error
 */
namespace Culqi\Error;

class UnhandledError extends CulqiException {
    protected $message = "Unhandled error";
}
/**
 * Invalid API Key
 */
namespace Culqi\Error;

class InvalidApiKey extends CulqiException {
    protected $message = "API Key invalido";
}
/**
 * Unable to connect to Culqi API
 */
class UnableToConnect extends CulqiException {
    protected $message = "Imposible conectar a Culqi API";
}

class CustomException extends CulqiException {
    private $error_data;

    public function __construct($merchant_message) {
        http_response_code(400);
        $this->error_data = array(
            "object" => "error",
            "type" => "param_error",
            "merchant_message" => $merchant_message,
            "user_message" => $merchant_message
        );

        // PHP's Exception class takes the message as the first argument
        parent::__construct(json_encode($this->error_data));
    }
}

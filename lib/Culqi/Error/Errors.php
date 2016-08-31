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
class InputValidationError extends CulqiException {
    protected $message = "Input validation error. Error en alguno de los campos";
}
/**
 * Authentication error
 */
class AuthenticationError extends CulqiException {
    protected $message = "Authentication error";
}
/**
 * Resource not found
 */
class NotFound extends CulqiException {
    protected $message = "Resource not found";
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
class UnhandledError extends CulqiException {
    protected $message = "Unhandled error";
}
/**
 * Invalid API Key
 */
class InvalidApiKey extends CulqiException {
    protected $message = "Invalid API Key";
}
/**
 * Unable to connect to Culqi API
 */
class UnableToConnect extends CulqiException {
    protected $message = "Unable to connect to Culqi API";
}

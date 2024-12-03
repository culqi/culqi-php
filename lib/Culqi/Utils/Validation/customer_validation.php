<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;
require_once 'country_codes.php';

class CustomerValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        //validate address, firstname and lastname
        if (empty($data['first_name'])) {
            throw new CustomException('first name is empty.');
        }
        
        if (empty($data['last_name'])) {
            throw new CustomException('last name is empty.');
        }
        
        if (empty($data['address'])) {
            throw new CustomException('address is empty.');
        }
        
        if (empty($data['address_city'])) {
            throw new CustomException('address_city is empty.');
        }

        if(!is_string($data['phone_number'])) {
            throw new CustomException('phone number must be a string.');
        }

        //validate coountry code
        Helpers::validateValue($data['country_code'], get_country_codes());

        //validate email
        if (!Helpers::isValidEmail($data['email'])) {
            throw new CustomException('Invalid email.');
        }
        
    }

    public static function list($data)
    {
        if (isset($data['email'])) {
            if (!Helpers::isValidEmail($data['email'])) {
                throw new CustomException('Invalid email.');
            }
        }
        if (isset($data['country_code'])) {
            Helpers::validateValue($data['country_code'], get_country_codes());
        }
    }
}
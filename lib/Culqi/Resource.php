<?php


namespace Culqi;
use Culqi\Utils\Validation\CulqiValidation as CulqiValidation;

/**
 * Class Resource
 *
 * @package Culqi
 */
class Resource extends Client {

    /**
     * Constructor.
     */
    public $culqi;
    public $culqi_validation;
    
    public function __construct($culqi)
    {
        $this->culqi = $culqi;
        $this->culqi_validation = new CulqiValidation();
    }

}

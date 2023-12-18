<?php


namespace Culqi;
use Culqi\Utils\Validation\Helpers as Helpers;

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
    public $helpers;
    
    public function __construct($culqi)
    {
        $this->culqi = $culqi;
        $this->helpers = new Helpers();
    }

}

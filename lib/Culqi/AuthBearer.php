<?php
namespace Culqi;


class AuthBearer implements \Requests_Auth
{
	protected $password;

	public function __construct($password) {
		$this->password = $password;
	}

	public function register(\Requests_Hooks &$hooks) {
		$hooks->register('requests.before_request', array(&$this, 'before_request'));
	}

	public function before_request(&$url, &$headers, &$data, &$type, &$options) {
		if (strpos($url, 'tokens') !== false) {
		    $headers['Authorization'] = 'Code '.$this->password;
		} else {
				$headers['Authorization'] = 'Bearer '.$this->password;
		}
	}
}

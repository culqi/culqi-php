<?php
namespace Culqi;

class Tokens extends Resource {

    /**
     * @param string $id La ID del token a devolver.
     * @param array|string|null $opts
     *
     * @return Token
     */

    const URL_TOKENS = "/tokens/";

    public function create($options = NULL)
    {
        return $this->request("POST", Tokens::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

}

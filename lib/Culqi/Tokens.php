<?php
namespace Culqi;

class Tokens extends Resource {

    const URL_TOKENS = "/tokens/";

    /**
     * @param array|string|null $options
     *
     * @return Token creado
     * ATENCIÓN: Solo para desarollo. Lo ideal es usar el CULQI.JS.
     *
     */
    public function create($options = NULL) {
        return $this->request("POST", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

}

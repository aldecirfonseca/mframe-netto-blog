<?php
    /**
     * setValue
     *
     * @param string $key 
     * @param array $dados 
     * @param mixed $default 
     * @return mixed
     */
    function setValue($key, $dados = [], $default = "")
    {
        if (isset($dados[$key])) {
            return $dados[$key];
        } else {
            return $default;
        }
    }
<?php

class Routes
{
    public static function rota($aPar)
    {
        $aParGet    = (isset($aPar['parametros']) ? $aPar['parametros'] : "Home" );
        $controller = "";
        $metodo     = "index";
        $acao       = "";
        $id         = null;
        $outrosPar  = [];

        if (substr_count($aParGet, "/") > 0) {

            $aParam     = explode("/", $aParGet);
            $controller = $aParam[0];
            $metodo     = $aParam[1];
2


        } else {
            $controller = $aParGet;
        }


        return [
            "controller"        => $controller,
            "metodo"            => $metodo,
            "acao"              => $acao,
            "id"                => $id,
            "outrosParametros"  => $outrosPar,
            "model"             => $controller,
            "get"               => $_GET,
            "post"              => $_POST
        ];
    }
}
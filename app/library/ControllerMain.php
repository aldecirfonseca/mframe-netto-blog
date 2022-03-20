<?php

namespace App\Library;

class ControllerMain
{
    public function __construct($dados)
    { 
        $this->dados = $dados;
    }

    /**
     * loadView - Carrega views
     *
     * @param string $nameView 
     * @param array $dbDados 
     * @return void
     */
    public function loadView($nameView, $dbDados = [])
    {
        $this->dbDados = $dbDados;

        if (file_exists("app/view/" . $nameView . ".php")) {
            require_once "app/view/" . $nameView . ".php";
        } else {
            require_once "app/view/comuns/erros.php";
        }
    }
}
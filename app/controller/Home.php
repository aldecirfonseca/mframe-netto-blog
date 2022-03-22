<?php

use App\Library\ControllerMain;

class Home extends ControllerMain
{
    public function index()
    {
        $this->loadView("home", [
            "titulo" => "teste de envio de dados",
            "ano"    => 2022,
            "turma"  => "5 período"
        ]);
    }
}
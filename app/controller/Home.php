<?php

use App\Library\ControllerMain;

class Home extends ControllerMain
{
    public function index()
    {
        echo "Bem vindo ao controller home, método index";
    }

    public function teste()
    {
        echo "Carregando o controller home no método teste";
    }
}
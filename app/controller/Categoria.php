<?php

use App\Library\ControllerMain;

class Categoria extends ControllerMain
{
    public function index()
    {
        $this->loadView("admin/listaCategoria", $this->model->lista());
    }

    public function form($id = 0)
    {
        $aDados = [];

        // recuperar os dados do $id
        if ($this->dados['acao'] != "new") {
            $aDados = $this->model->getById($id);
        }

        var_dump($aDados); exit;

        $this->loadView("formCategoria", $aDados);
    }

}
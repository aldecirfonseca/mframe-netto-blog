<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;

class Categoria extends ControllerMain
{
    public function index()
    {
        $this->loadView("admin/listaCategoria", $this->model->lista());
    }

    public function form()
    {
        $aDados = [];

        // recuperar os dados do $id
        if ($this->getAcao() != "insert") {
            $aDados = $this->model->getById($this->dados['id']);
        }

        $this->loadView("admin/formCategoria", $aDados);
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        if ($this->model->update($this->getPost())) {
            Session::set("msgSucesso", "Registro atualizado com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar atualizar o registro na base de dados.');
        }

        Redirect::page("categoria");
    }
}
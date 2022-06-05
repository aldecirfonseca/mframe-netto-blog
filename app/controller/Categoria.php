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
        $aDados = [
            "statusRegistro" => 1
        ];

        // recuperar os dados do $id
        if ($this->getAcao() != "insert") {
            $aDados = $this->model->getById($this->dados['id']);
        }

        $this->loadHelper("formulario");
        $this->loadView("admin/formCategoria", $aDados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();
        
        if ($this->model->insert(            [
            "descricao" => $post['descricao'],
            "statusRegistro" => $post['statusRegistro']
        ])) {
            Session::set("msgSucesso", "Registro inserido com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar inserir o registro na base de dados.');
        }

        Redirect::page("categoria");
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->getPost();

        if ($this->model->update(
                $post["id"],
                [
                "descricao" => $post["descricao"],
                "statusRegistro" => $post['statusRegistro']
                ]
        )) {
            Session::set("msgSucesso", "Registro atualizado com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar atualizar o registro na base de dados.');
        }

        Redirect::page("categoria");
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->getPost();

        if ($this->model->delete($post['id'])) {
            Session::set("msgSucesso", "Registro excluído com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar excluir o registro na base de dados.');
        }

        Redirect::page("categoria");
    }
}
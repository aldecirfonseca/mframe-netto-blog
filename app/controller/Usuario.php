<?php

use App\Library\ControllerMain;
use App\Library\Session;
use App\Library\Redirect;

class Usuario extends ControllerMain
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->loadView("admin/listaUsuario", $this->model->lista());
    }

    /**
     * form
     *
     * @return void
     */
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
        $this->loadView("admin/formUsuario", $aDados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();

        if ($this->model->insert([
            "nome" => $post['nome'],
            "email" => $post['email'],
            "statusRegistro" => $post['statusRegistro'],
            "nivel" => $post['nivel'],
            "senha" => password_hash(trim($post['senha']), PASSWORD_DEFAULT)
        ])) {
            Session::set("msgSucesso", "Registro inserido com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar inserir o registro na base de dados.');
        }

        Redirect::page("usuario");
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
            $post['id'], 
            [
                "nome" => $post['nome'],
                "email" => $post['email'],
                "statusRegistro" => $post['statusRegistro'],
                "nivel" => $post['nivel']
            ]
        )) {
            Session::set("msgSucesso", "Registro atualizado com sucesso.");
        } else {
            Session::set('msgError', 'Falha ao tentar atualizar o registro na base de dados.');
        }

        Redirect::page("usuario");
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

        Redirect::page("usuario");
    }
}
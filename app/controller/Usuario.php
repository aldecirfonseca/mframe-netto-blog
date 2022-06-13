<?php

use App\Library\ControllerMain;
use App\Library\Session;
use App\Library\Redirect;

class Usuario extends ControllerMain
{
    /**
     * lista
     *
     * @return void
     */
    public function index()
    {
        $this->loadView("admin/listaUsuario", $this->model->getLista());
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $dbDados = [];

        if ( $this->getAcao() != 'new') {
            // buscar o usuário pelo $id no banco de dados
            $dbDados = $this->model->getById($this->getId());
        }

        $this->loadView('admin/formUsuario', $dbDados);
    }

    /**
     * new - insere um novo usuário
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();

        if ($this->model->insert([
            "statusRegistro"    => $post['statusRegistro'],
            "nivel"             => $post['nivel'],
            "nome"              => $post['nome'],
            "email"             => $post['email'],
            "senha"             => password_hash($post['senha'], PASSWORD_DEFAULT)
        ])) {
            Redirect::page("Usuario", ["msgSucesso" => "Usuário inserido com sucesso !"]);
        } else {
            Redirect::page("Usuario", ["msgErros" => "Falha na inserção dos dados do Usuário !"]);
        }
    }


    /**
     * update
     *
     * @return void
     */    
    public function update()
    {
        $post = $this->getPost();

        if ($this->model->update($post['id'], [
            "nome"              => $post['nome'],
            "statusRegistro"    => $post['statusRegistro'],
            "nivel"             => $post['nivel'],
            "email"             => $post['email']
        ])) {
            Redirect::page("Usuario", ["msgSucesso" => "Usuário alterado com sucesso !"]);
        } else {
            Redirect::page("Usuario", ["msgErros" => "Falha na alteração dos dados do Usuário !"]);
        }      
    }

    /**
     * delete -   Exclui um usuário no banco de dados
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->getPost();

        if ($this->model->delete([ "id" => $post['id']])) {
            Redirect::page("Usuario", ["msgSucesso" => "Usuário excluído com sucesso !"]);
        } else {
            Redirect::page("Usuario", ["msgErros" => "Falha na exclusão do Usuário !"]);
        }   
    }

    /**
     * trocaSenha - Chama a view Trocar a senha
     *
     * @return void
     */
    public function trocaSenha()
    {
        $this->loadView("admin/formTrocaSenha");
    }

    /**
     * atualizaSenha - Atualiza a senha do usuário
     *
     * @return void
     */
    public function atualizaTrocaSenha() 
    {
        $post = $this->getPost();
        $userAtual = $this->model->getById($post["id"]);

        if ($userAtual) {

            if (password_verify(trim($post["senhaAtual"]), $userAtual['senha'])) {

                if (trim($post["novaSenha"]) == trim($post["novaSenha2"])) {

                    $lUpdate = $this->model->update($post['id'], ['senha' => password_hash($post["novaSenha"], PASSWORD_DEFAULT)]);

                    if ($lUpdate) {
                        Redirect::page("Usuario/trocaSenha", [
                            "msgSucesso"    => "Senha alterada com sucesso !"
                        ]);  
                    } else {
                        Redirect::page("Usuario/trocaSenha", [
                            "msgErros"    => "Falha na atualização da nova senha !"
                        ]);    
                    }

                } else {
                    Redirect::page("Usuario/trocaSenha", [
                        "msgErros"    => "Nova senha e conferência da senha estão divergentes !"
                    ]);                  
                }

            } else {
                Redirect::page("Usuario/trocaSenha", [
                    "msgErros"    => "Senha atual informada não confere!"
                ]);               
            }
        } else {
            Redirect::page("Usuario/trocaSenha", [
                "msgErros"    => "Usuário inválido !"
            ]);   
        }
    }
}
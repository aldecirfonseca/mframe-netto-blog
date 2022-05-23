<?php

use App\Library\ModelMain;
use App\Library\Session;

class UsuarioModel extends ModelMain
{
    public $table = "usuario";

    /**
     * getUserEmail
     *
     * @param string $email 
     * @return array
     */
    public function getUserEmail($email)
    {
        $user = $this->db->query(
            $this->table, 
            "first",
            [ "where" => [ 'email' => $email]]
        );

        if ($user == false) {
            return [];
        } else {
            return $user;
        }
    }

    /**
     * criaSuperUser
     *
     * @return void
     */
    public function criaSuperUser()
    {
        $qtd = $this->db->query($this->table, "count");

        if ( $qtd == 0) {
            
            // criando o super usuário

            $rsUsuario = $this->db->insert(
                $this->table,
                [
                    "nome" => "administrador",
                    "email" => "administrador@nettoblog.com.br",
                    "senha" => password_hash("fasm@2022", PASSWORD_DEFAULT),
                    "nivel" => 1
                ]
            );
            
            if ( $rsUsuario > 0 ) {
                Session::set('msgSucesso', "Super usuário criado com sucesso.");
                return 2;
            } else {
                Session::set('msgError', "Falha na inclusão do super usuário, não é possivel prosseguir.");
                return 1;
            }
        } 

        return 0;
    }

    /**
     * insert
     *
     * @param array $dados 
     * @return boolean
     */
    public function insert($dados) 
    {
        $rsc = $this->db->insert(
            $this->table,
            [
                "nome" => $dados['nome'],
                "email" => $dados['email'],
                "statusRegistro" => $dados['statusRegistro'],
                "nivel" => $dados['nivel'],
                "senha" => password_hash(trim($dados['senha']), PASSWORD_DEFAULT)
            ]
        );

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    } 
    
        /**
     * update
     *
     * @param array $dados 
     * @return boolean
     */
    public function update($dados) 
    {
        $rsc = $this->db->update(
                $this->table,
                ["id" => $dados['id']],
                [
                    "nome" => $dados['nome'],
                    "email" => $dados['email'],
                    "statusRegistro" => $dados['statusRegistro'],
                    "nivel" => $dados['nivel']
                ]
            );

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete
     *
     * @param integer $id 
     * @return boolean
     */
    public function delete($id) 
    {
        $rsc = $this->db->delete($this->table, ["id" => $id]);

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }

}
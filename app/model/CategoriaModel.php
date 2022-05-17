<?php

use App\Library\ModelMain;

class CategoriaModel extends ModelMain
{
    public $table = "categoria";

    /**
     * lista
     *'
     * @return array
     */
    public function lista()
    {
        $aDados = $this->db->query(
            $this->table, 
            "all",
            ["orderby" => ["descricao"]]
        );
        
        return $aDados;
    }

    /**
     * insert
     *
     * @param array $dados 
     * @return boolean
     */
    public function insert($dados) 
    {
        /*
        $rsc = $this->db->dbInsert(
                "INSERT INTO categoria
                (descricao, statusRegistro)
                VALUES ( ?, ? )",
                [
                    $dados['descricao'],
                    $dados['statusRegistro']
                ]
            );
        */

        $rsc = $this->db->insert(
            $this->table,
            [
                "descricao" => $dados['descricao'],
                "statusRegistro" => $dados['statusRegistro']
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
        /*
        $rsc = $this->db->dbUpdate(
                "UPDATE categoria
                SET descricao = ?, statusRegistro = ?
                WHERE id = ?",
                [
                    $dados['descricao'],
                    $dados['statusRegistro'],
                    $dados['id']
                ]
            );
        */

        $rsc = $this->db->update(
            $this->table, 
            [
                "id" => $dados['id']
            ], 
            [
                "descricao" => $dados["descricao"],
                "statusRegistro" => $dados['statusRegistro']
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
        /*
        $rsc = $this->db->dbDelete(
                "DELETE FROM categoria WHERE id = ?",
                [$id]
            );
        */

        $rsc = $this->db->delete($this->table, ["id" => $id]);

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }
}
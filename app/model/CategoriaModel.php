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
        $rsc = $this->db->dbSelect("SELECT * FROM {$this->table} ORDER BY descricao");
        $aDados = $this->db->dbBuscaArrayAll($rsc);

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
        $rsc = $this->db->dbInsert(
                "INSERT INTO categoria
                (descricao, statusRegistro)
                VALUES ( ?, ? )",
                [
                    $dados['descricao'],
                    $dados['statusRegistro']
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
        $rsc = $this->db->dbDelete(
                "DELETE FROM categoria WHERE id = ?",
                [$id]
            );

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }
}
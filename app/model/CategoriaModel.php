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
     * update
     *
     * @param array $dados 
     * @return boolean
     */
    public function update($dados) 
    {
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

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }
}
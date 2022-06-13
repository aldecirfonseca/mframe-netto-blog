<?php

use App\Library\ModelMain;
use App\Library\Session;

class NoticiaModel extends ModelMain
{
    public $table = "noticia";

    /**
     * lista as notícias
     *
     * @return array
     */
    public function getAll($id = '')
    {
        $sql = '';

        if (!empty($id)) {
            $sql = "
                SELECT *
                FROM {$this->table}
                WHERE noticia.id = $id
            ";
        } else {
            $sql = "
                SELECT noticia.*, usuario.nome
                FROM {$this->table}
                INNER JOIN usuario ON usuario.id = noticia.usuario_id
            ";
        }

        $rsc = $this->db->dbSelect($sql);

        $aDados = $this->db->dbBuscaDadosAll($rsc);

        return $aDados;
    }

    /**
     * getNoticiaCategoria
     *
     * @param  int $id
     * @return array
     */
    public function getNoticiaCategoria($id)
    {
        $rsc = $this->db->dbSelect(
            "SELECT nc.categoria_id, c.descricao
            FROM noticiacategoria as nc
            INNER JOIN categoria as c ON nc.categoria_id = c.id
            WHERE nc.noticia_id = ?
            ORDER BY c.descricao",
            [
                $id
            ]
        );

        if ($this->db->dbNumeroLinhas($rsc) > 0) {
            return $this->db->dbBuscaArrayAll($rsc);
        } else {
            return [];
        }
    }

    /**
     * insert
     *
     * @param  array $dados
     * @return boolean
     */
    public function insertNoticia($dados, $nomeImagem)
    {
        // insert tabela noticia
        $rsc = $this->db->dbInsert(
            "INSERT INTO noticia
            (titulo, texto, statusRegistro, imagem, usuario_id)
            VALUES (?, ?, ?, ?, ?)",
            [
                $dados['titulo'],
                $dados['texto'],
                $dados['statusRegistro'],
                $nomeImagem,
                Session::get('userCodigo')
            ]
        );

        foreach ($dados['categoria'] as $categoria) {
            // insert tabela noticiacategoria
            $this->db->dbInsert(
                "INSERT INTO noticiacategoria (noticia_id, categoria_id)
                VALUES (?, ?)",
                [
                    $rsc,
                    $categoria
                ]
            );
        }

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * update
     *
     * @param  array $dados
     * @return boolean
     */
    public function update($dados, $nomeImagem)
    {
        $rsc = 1;

        // select que busca os dados antigos, antes do update
        $select = $this->db->dbSelect(
            "SELECT * FROM noticia WHERE id = ?",
            [
                $dados["id"]
            ]
        );

        $select = $this->db->dbBuscaArrayAll($select);
        $select = $select[0];

        $alterado = false;

        // verifica se alterou algum campo
        if (
            $select["titulo"] != $dados["titulo"] ||
            $select["texto"] != $dados["texto"] ||
            $select["statusRegistro"] != $dados["statusRegistro"] ||
            $select["imagem"] != $nomeImagem
        ) {
            $alterado = true;
        }

        // se foi alterado, da update
        if ($alterado) {
            $rsc = $this->db->dbUpdate(
                "UPDATE noticia
                set titulo = ?, texto = ?, statusRegistro = ?, imagem = ?
                WHERE id = ?",
                [
                    $dados["titulo"],
                    $dados["texto"],
                    $dados["statusRegistro"],
                    $nomeImagem,
                    $dados["id"]
                ]
            );
        }

        // deleta todos os registros da tabela noticia categoria da noticia alterada
        $this->db->dbDelete(
            "DELETE FROM noticiacategoria WHERE noticia_id = ?",
            [
                $dados["id"]
            ]
        );

        // insere novamente as categorias selecionadas
        foreach ($dados['categoria'] as $categoria) {
            $rsc3 = $this->db->dbInsert(
                "INSERT INTO noticiacategoria (noticia_id, categoria_id)
                VALUES (?, ?)",
                [
                    $dados["id"],
                    $categoria
                ]
            );
        }

        if ($rsc > 0 || $rsc3 > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * delete
     *
     * @param  integer $id
     * @return boolean
     */
    public function delete($id)
    {
        // delete na tabela noticiacategoria
        $rsc = $this->db->dbDelete(
            "DELETE FROM noticiacategoria WHERE noticia_id = ?",
            [
                $id
            ]
        );

        // delete na tabela noticia
        $rsc2 = $this->db->dbDelete(
            "DELETE FROM noticia WHERE id = ?",
            [
                $id
            ]
        );

        if ($rsc > 0 || $rsc2 > 0) {
            return true;
        } else {
            return false;
        }
    }
}
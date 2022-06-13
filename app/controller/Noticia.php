<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\UploadImages;
use App\Library\Session;

class Noticia extends ControllerMain
{
    public $title = 'Notícia';

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->loadView(
            'admin/listaNoticia',
            $this->model->getAll()
        );
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $this->loadHelper('Formulario');
        
        // load do model Categoria
        $categoria = $this->loadModel('Categoria');

        $this->loadView(
            'admin/formNoticia',
            [
                'categoria' => $categoria->lista(),
                'noticia' => $this->model->getById($this->getId()),
                'noticiaCategoria' => $this->model->getNoticiaCategoria($this->getId())
            ]
        );
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        if (!$this->validate()) {
            $_SESSION['msgError'] = 'Preencha os compos obrigatórios.';
        } else {
            // pega o nome com codigo aleatorio gerado pela lib
            $nomeRetornado = UploadImages::upload($_FILES, 'noticias');

            // se não for boolean, significa que está tudo OK
            if (!is_bool($nomeRetornado)) {

                if ($this->model->insertNoticia($this->getPost(), $nomeRetornado)) {
                    $_SESSION['msgSucesso'] = 'Notícia gravada com sucesso.';

                    return Redirect::page('noticia');
                } else {
                    $_SESSION['msgError'] = 'Falha ao tentar gravar a notícia na base de dados.';
                }
            } else {
                $_SESSION['msgError'] = 'Falha ao fazer upload.';
            }
        }

        return Redirect::page('noticia/form/insert');
    }

    public function update()
    {
        if ($this->validate()) {
            $nomeArquivo = "";

            // se foi anexada alguma imagem
            if (!empty($_FILES['imagem']['name'])) {
                /*envia para o método de upload o $_FILES, a pasta
                para salvar o arquivo e o nome do arquivo antigo*/
                $nomeArquivo = UploadImages::upload($_FILES, 'noticias', $_POST['nomeImagem']);;
            } else {
                $nomeArquivo = $_POST['nomeImagem'];
            }

            if ($this->model->update($_POST, $nomeArquivo)) {
                $_SESSION['msgSucesso'] = 'Notícia atualizada com sucesso.';
            } else {
                $_SESSION['msgError'] = 'Falha ao tentar atualizar a notícia na base de dados.';
            }

            return Redirect::Page("noticia");
        }

        $_SESSION['msgError'] = 'Preencha os compos obrigatórios.';
        return Redirect::Page("noticia/form/update/{$_POST['id']}");
    }

    public function delete()
    {
        if ($this->model->delete($_POST['id'])) {
            UploadImages::delete($_POST['nomeImagem'], 'noticias');

            $_SESSION['msgSucesso'] = 'Notícia excluída com sucesso.';
        } else {
            $_SESSION['msgError'] = 'Falha ao tentar excluir a notícia na base de dados.';
        }

        return Redirect::Page("noticia");
    }

    public function validate()
    {
        if (isset($_POST["categoria"]) && isset($_POST['texto'])) {
            return true;
        }

        return false;
    }
}

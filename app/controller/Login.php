<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;

class Login extends ControllerMain 
{
    public function signIn()
    {
        $UsuarioModel = $this->loadModel("Usuario");
        $post = $this->getPost();

        // super usário
        $superUser = $UsuarioModel->criaSuperUser();

        if ($superUser > 0) {          // 1=Falhou criação do super user; 2=sucesso na criação do super user
            Redirect::page("home/login");
        }

        // Buscar usuário na base de dados

        $aUsuario = $UsuarioModel->getUserEmail($post['email']);

        if (count($aUsuario) > 0 ) {

            // validar a senha            
            if (!password_verify(trim($post["senha"]), $aUsuario['senha']) ) {
                Session::set("msgError", 'Usuário e ou senha inválido.');
                Redirect::page("home/login");
            }
            
            // validar o status do usuário            
            if ($aUsuario['statusRegistro'] == 2 ) {
                Session::set("msgError", "Usuário Inativo, não será possível prosseguir !");
                Redirect::page("home/login");
            }

            //  Criar flag's de usuário logado no sistema
            
            Session::set("userCodigo", $aUsuario['id']);
            Session::set("userLogin", $aUsuario['nome']);
            Session::set("userEmail", $aUsuario['email']);
            Session::set("userNivel", $aUsuario['nivel']);
            Session::set("userSenha", $aUsuario['senha']);
            
            // Direcionar o usuário para página home
            Redirect::page("home/homeAdmin");
            //

        } else {
            Session::set('msgError', 'Usuário e ou senha inválido.');
            Redirect::page("home/login");
        }
    }

    /**
     * signOut
     *
     * @return void
     */
    public function signOut()
    {
        Session::destroy('userCodigo');
        Session::destroy('userLogin');
        Session::destroy('userEmail');
        Session::destroy('userNivel');
        Session::destroy('userSenha');
        
        Redirect::Page("home");
    }
}
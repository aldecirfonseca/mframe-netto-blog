<?php

use App\Library\Formulario;
use App\Library\Session;

echo $this->loadView('comuns/cabecalho');
echo $this->loadView('comuns/menu');

?>

<script type="text/javascript" src="<?= SITEURL; ?>assets/js/usuario.js"></script>

<div class="container" style="margin-top: 200px;">

    <div class="row justify-content-center">

        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 div_login">                    

            <div class="card">

                <div class="card-header bgCustomAzul">Recuperação de Senha</div>
                <div class="card-body">

                    <form method="POST" id="recuperaSenhaform" class="form-horizontal" role="form" 
                        action="<?= SITEURL ?>Usuario/atualizaRecuperaSenha">

                        <input type="hidden" name="id" id="id" value="<?= $dbDados['id'] ?>">
                        
                        <div style="margin-bottom: 25px" class="input-group">
                            <i class="fa fa-user-o" style="font-size: 36px; color: #ff7404;" aria-hidden="true"></i>
                            <label class="ml-4"><b><?= $dbDados['nome'] ?></b></label>                            
                        </div>

                        <div style="margin-bottom: 25px" class="control-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <div class="controls">
                                <input id="NovaSenha" type="password" class="form-control" name="NovaSenha" placeholder="Nova senha" required="required"
                                        onkeyup="checa_segur_senha( 'NovaSenha', 'msgSenhaNova', 'btEnviar' );">
                                <div id="msgSenhaNova" class="msgNivel_senha"></div>
                            </div>
                        </div>

                        <div style="margin-bottom: 25px" class="control-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <div class="controls">
                                <input id="NovaSenha2" type="password" class="form-control" name="NovaSenha2" placeholder="Nova senha" required="required"
                                        onkeyup="checa_segur_senha( 'NovaSenha2', 'msgSenhaNova2', 'btEnviar' );">
                                <div id="msgSenhaNova2" class="msgNivel_senha"></div>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-xs-2 controls">
                                <button class="btn btnCustomAzul" id="btEnviar" disabled>Atualizar</button>
                            </div>

                            <div class="col-xs-10 controls">
                                <?php 

                                    if (!empty(Session::get("msgErros"))) {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <?= Session::getDestroy("msgErros") ?>
                                        </div>     
                                        <?php
                                    }

                                    if (!empty(Session::get("msgSucesso"))) {
                                        ?>                                    
                                        <div class="alert alert-success" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <?= Session::getDestroy("msgSucesso") ?>
                                        </div>      
                                        <?php
                                    }
                                ?>
                            </div>

                        </div>

                    </form>     

                </div>
            </div>

            <br>
            <br>

        </div>  

    </div>
    
</div>  

<?= $this->loadView('comuns/rodape') ?>
<?php
use App\Library\Session;

echo $this->loadView('comuns/cabecalho');
echo $this->loadView('comuns/menu');

?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Recuperação de Senha</h1>
            </div>
        </div>
    </div>
</section>

<section class="section-margin section-login">
    
    <div class="container" style="margin-top: 200px;">
        
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <form class="form-contact contact_form" action="<?= SITEURL . "Login/gerarLinkRecuperaSenha" ?>" method="post" id="contactForm" novalidate="novalidate">
                <div class="row">

                    <div class="col-sm-12 header-login mb-4">
                        <h4 class="intro-title header-login-title p-2 font-weight-bold">Recuperar a Senha</h4>
                    </div>        
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" 
                                    type="text" 
                                    placeholder="Informe seu e-mail"
                                    required>
                        </div>
                    </div>
                </div>

            <?php

            if (Session::get('msgErros')) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= Session::getDestroy('msgErros') ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="form-group mt-3">
                    <button type="submit" class="button button-contactForm login-button p-2 font-weight-bold text-white">Enviar</button>
                </div>
            </div>

        </form>

        </div>

    </div>
</section>

<?= $this->loadView('comuns/rodape') ?>
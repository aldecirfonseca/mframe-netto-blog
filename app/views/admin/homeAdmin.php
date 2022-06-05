<?php

use App\Library\Formulario;

echo $this->loadView("comuns/cabecalho");
echo $this->loadView("comuns/menu");

?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 style="color: #384aeb;">Home da área Administrativa</h1>
            </div>
        </div>
    </div>
</section>

<main class="site-main">
    <section class="blog_area mt-5">
        <div class="container">

            <?= Formulario::exibeMsgError() ?>
            <?= Formulario::exibeMsgSucesso() ?>

            <div class="row ml-3">
                <br />
                <br />
                <br />
                <br />
                <p>
                    Seja bem vindo(a) a área adminsitrativa do Netto blog.
                </p>
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>
    </section>
</main>

<?= $this->loadView("comuns/rodape") ?>
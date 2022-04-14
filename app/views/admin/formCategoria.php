<?php

use App\Library\Formulario;

echo $this->loadView("comuns/cabecalho");
echo $this->loadView("comuns/menu");

echo Formulario::titulo(
                "Categoria", 
                [
                    "controller" => $this->getController(),
                    "btNovo" => false,
                    "acao" => $this->getAcao()
                ]);

?>

<main class="container">

    <section class="mb-5">

        <form method="POST" action="<?= SITEURL . $this->getController() . '/' . $this->getAcao() ?>">

            <div class="row">

                <div class="form-group col-12 col-md-8">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" maxlength="50" value="<?= isset($dbDados['descricao']) ? $dbDados['descricao'] : "" ?>" required autofocus placeholder="Descrição da Categoria">
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="statusRegistro" class="form-label">Status</label>
                    <select name="statusRegistro" id="statusRegistro" class="form-control" required>
                        <option value="" <?= isset($dbDados['statusRegistro']) ? $dbDados['statusRegistro'] == ""  ? "selected" : "" : "" ?>>.....</option>
                        <option value="1" <?= isset($dbDados['statusRegistro']) ? $dbDados['statusRegistro'] == "1" ? "selected" : "" : "" ?>>Ativo</option>
                        <option value="2" <?= isset($dbDados['statusRegistro']) ? $dbDados['statusRegistro'] == "2" ? "selected" : "" : "" ?>>Inativo</option>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?= isset($dbDados['id']) ? $dbDados['id'] : "" ?>">

                <div class="form-group col-12 col-md-4">
                    <button type="submit" value="submit" class="button button-login">Gravar</button>
                    <a href="<?= SITEURL ?>/Categoria" class="ml-3">Voltar</a>
                </div>

            </div>

        </form>

    </section>

</main>

<?= $this->loadView("comuns/rodape") ?>
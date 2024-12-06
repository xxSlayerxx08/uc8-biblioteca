<?php 

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
<section class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <span class="fs-4">Cadastro de um novo Contato</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/contatos-adm" class="btn btn-dark btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/contatos-adm/atualizar/<?= $idContato ?>" method="post">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" required>
            <br>

            <label for="telefone">Telefone: </label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="<?= $telefone ?>" required>
            <br>

            <label for="celular">Celular: </label>
            <input type="text" class="form-control" name="celular" id="celular" value="<?= $celular ?>" required>
            <br>

            <label for="email">E-Mail: </label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" required>
            <br>
            
            <br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="idContato" value="<?= $idContato ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>
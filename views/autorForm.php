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
      <span class="fs-4">Cadastro de um Autor</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/autores-adm" class="btn btn-dark btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/autores-adm/atualizar/<?= $idAutor ?>" method="post">
            <label for="nomeAutor">Nome: </label>
            <input type="text" class="form-control" name="nomeAutor" id="nomeAutor" value="<?= $nomeAutor ?>" required>
            <br>

            <label for="sexo">Sexo: </label>
            <select name="sexo" id="sexo" class="form-select">
              <?= $sexo ?>
            </select>
            <br>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="idAutor" value="<?= $idAutor ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>
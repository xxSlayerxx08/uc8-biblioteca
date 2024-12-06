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
      <span class="fs-4">Cadastro de um novo Livro</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/livros-adm" class="btn btn-dark btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/livros-adm/atualizar/<?= $isbn ?>" method="post">
            <label for="isbn">ISBN: </label>
            <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $isbn ?>" required>
            <br>

            <label for="titulo">Título: </label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $titulo ?>" required>
            <br>

            <label for="editora">Editora: </label>
            <input type="text" class="form-control" name="editora" id="editora" value="<?= $editora ?>" required>
            <br>

            <label for="idioma">Idioma: </label>
            <input type="text" class="form-control" name="idioma" id="idioma" value="<?= $idioma ?>" required>
            <br>

            <label for="numeroPaginas">Numero de Páginas: </label>
            <input type="number" class="form-control" name="numeroPaginas" id="numeroPaginas" require min="0" step="0.50" value="<?= $numeroPaginas ?>" required>
            <br>

            <label for="idAutor">ID do Autor: </label>
            <input type="number" class="form-control" name="idAutor" id="idAutor" require min="0" step="1.00" value="<?= $idAutor ?>" required>
            <br>

            <label for="idClassificacao">ID Classificação: </label>
            <select name="idClassificacao" id="idClassificacao" class="form-select">
                <?= $idClassificacao ?>
            </select>
            <br>
            
            <br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="isbn" value="<?= $isbn ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>
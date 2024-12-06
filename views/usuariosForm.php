<?php

$acao = "";

$opcao_senha = "
<label for=\"senha\" class=\"form-senha\">Senha:</label>
<input type=\"text\" class=\"form-senha form-control\" name=\"senha\" id=\"senha\" required></input> ";
if($acao=="editar") {
   $opcao_senha = "";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;

$nome = "";
$usuario = "";
$usuario = "";
$endereco = "";
$bairro = "";
$cidade = "";
$uf = "";
$cep = "";
$email = "";
$senha = "";
$telefone = "";

?>

<!doctype html>
<html lang="en">
<head>
   <title>Restaurante MVC</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="[[base-url]]/views/templates/css/style.css">
</head>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3">Biblioteca</p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white">Usuário</h4>
                  </div>
                  <div class="card-body p-4">
                     <!-- <?= $erro ?> -->
                     <p><small>Informe os dados para ser alterado</small></p>
                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuarios/atualizar/<?= $idUsuario ?>">
                        <div class="form-floating mb-3">
                           <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>" require>
                           <label for="nome">Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="usuario" id="usuario" class="form-control" value="<?= $usuario ?>" require>
                           <label for="usuario">Usuario:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="endereco" id="endereco" class="form-control" value="<?= $endereco ?>" require>
                           <label for="endereco">Endereço:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="bairro" id="bairro" class="form-control" value="<?= $bairro ?>" require>
                           <label for="bairro">Bairro:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="cidade" id="cidade" class="form-control" value="<?= $cidade ?>" require>
                           <label for="cidade">Cidade:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="uf" id="uf" class="form-control" value="<?= $uf ?>" require>
                           <label for="uf">UF:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="cep" id="cep" class="form-control" value="<?= $cep ?>" require>
                           <label for="cep">CEP:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" require>
                           <label for="email">E-Mail:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" name="senha" id="senha" class="form-control" value="<?= $senha ?>" require>
                           <label for="senha">Senha:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $telefone ?>" require>
                           <label for="telefone">Telefone:</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <input type="hidden" name="acao" value="<?= $acao ?>">
                        <input type="hidden" name="idUsuario" value="<?= $idUsuario ?>">

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

</body>

</html>
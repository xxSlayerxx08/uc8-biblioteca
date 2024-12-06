<?php 

$formUsuario = "";

foreach ($form_usuario as $form) {
    $idUsuario = $form["idUsuario"];
    $nome = $form["nome"];
    $usuario = $form["usuario"];
    $endereco = $form["endereco"];
    $bairro = $form["bairro"];
    $cidade = $form["cidade"];
    $uf = $form["uf"];
    $cep = $form["cep"];
    $email = $form["email"];
    $senha = $form["senha"];
    $telefone = $form["telefone"];

    $formUsuario.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                ID: $idUsuario <br> 
                Nome: $nome <br>
                Usuario: $usuario <br>
                E-Mail: $email <br>
                Telefone: $telefone <br>
                Endereço: $endereco <br>
                Bairro: $bairro <br>
                Cidade: $cidade <br>
                UF: $uf <br>
                CEP: $cep <br>
            </div>
            <div class='card-footer'>
                <a class='text-dark text-decoration-none' href='[[base-url]]/usuarios/editar/$idUsuario'><i class='bi bi-pencil-square'></i>Editar |</a>
                <a class='text-dark text-decoration-none' href='[[base-url]]/usuarios/alterarSenha/$idUsuario'><i class='bi bi-pencil-square'></i>Editar Senha |</a>
                <a class='text-danger text-decoration-none' href='[[base-url]]/usuarios/excluir/$idUsuario'><i class='bi bi-pencil-square'></i>Excluir</a>
            </div>
        </div>
    </div>
   "; 
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuariosList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $formUsuario, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
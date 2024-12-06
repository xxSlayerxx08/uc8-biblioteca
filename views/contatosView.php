<?php 

$listaContatos = "";

foreach($lista_de_contatos as $contatos){
    $idContato = $contatos["idContato"];
    $nome = $contatos["nome"];
    $telefone = $contatos["telefone"];
    $celular = $contatos["celular"];
    $email = $contatos["email"];

    $linkEditar = "<a class='text-dark text-decoration-none' href='[[base-url]]/contatos-adm/editar/$idContato'><i class='bi bi-pencil-square'></i>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/contatos-adm/excluir/$idContato' onclick=\"return confirm('Confirma a exclusão do contato $nome?')\"><i class='bi bi-trash'></i>Excluir</a>";

    $listaContatos.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <input type='hidden' name='idContato' value='<?= $idContato ?>'>
                Nome: <strong>$nome</strong> <br>
                Contatos: $telefone | $celular <br>
                E-Mail: <strong>$email</strong>
            </div>
            <div class='card-footer'>
            $linkEditar
            $linkExcluir
            </div>
        </div>
    </div>
   ";  
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/contatosList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaContatos, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
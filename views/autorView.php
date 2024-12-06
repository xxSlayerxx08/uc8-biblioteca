<?php 

$listaAutor = "";

foreach($lista_de_autor as $autor){
    $idAutor = $autor["idAutor"];
    $nome = $autor["nomeAutor"];
    $sexo = $autor["sexo"];

    $linkEditar = "<a class='text-dark text-decoration-none' href='[[base-url]]/autores-adm/editar/$idAutor'><i class='bi bi-pencil-square'></i>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/autores-adm/excluir/$idAutor' onclick=\"return confirm('Confirma a exclusão do autor $nome?')\"><i class='bi bi-trash'></i>Excluir</a>";

    # Cria os cards HTML com os dados das mesas.
    $listaAutor.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <input type='hidden' name='idAutor' value='<?= $idAutor ?>'>
                Nome: <strong>$nome</strong> <br>
                Gênero: <strong>$sexo</strong> <br>
            </div>
            <div class='card-footer'>
                $linkEditar 
                $linkExcluir
            </div>
        </div>
    </div>
   ";  
}
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/autorList.html");

# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaAutor, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
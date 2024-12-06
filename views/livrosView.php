<?php 

$listaLivros = "";

foreach($lista_de_livros as $livros){
    $isbn = $livros["isbn"];
    $titulo = $livros["titulo"];
    $editora = $livros["editora"];
    $idioma = $livros["idioma"];
    $numeroPaginas = $livros["numeroPaginas"];
    $idAutor = $livros["idAutor"];
    $idClassificacao = $livros["idClassificacao"];

    $linkEditar = "<a class='text-dark text-decoration-none' href='[[base-url]]/livros-adm/editar/$isbn'><i class='bi bi-pencil-square'></i>Editar</a>";
    $linkExcluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/livros-adm/excluir/$isbn' onclick=\"return confirm('Confirma a exclusão do livro $titulo?')\"><i class='bi bi-trash'></i>Excluir</a>";

    # Cria os cards HTML com os dados das mesas.
    $listaLivros.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <small>$isbn</small> <br>
                Título: <strong>$titulo</strong> <br>
                Editora: $editora <br>
                Idioma: $idioma <br>
                Nº Pag.: $numeroPaginas <br> 
                <input type='hidden' name='idClassificacao' value='<?= $idClassificacao ?>'>
                <input type='hidden' name='idAutor' value='<?= $idAutor ?>'>
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
$html = file_get_contents("views/templates/html/livrosList.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaLivros, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;
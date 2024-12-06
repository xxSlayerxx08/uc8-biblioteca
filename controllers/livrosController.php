<?php

require_once "models/livrosModel.php";

class LivrosController
{
    
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc8/biblioteca";

    private $livrosModel;

    public function __construct(){
        $this->livrosModel = new Livros();
        
    }
    
    public function index(){
        # Criar um objeto que recbera a lista de mesas que o model retornará
        $lista_de_livros = $this->livrosModel->getAllLivros();

        # Recebe o valor da propriedade $url e fica disponível para uso na view
        $baseUrl = $this->url;

        # Importa a view que irá renderizar o template usando as variaveis acima:
        # $Lista_de_mesas (array com os dados ) e $baseUrl
        require "views/livrosView.php";
    }
    
    public function excluir($isbn){
        $this->livrosModel->delete($isbn);
        header("location: ".$this->url. "/livros-adm");
    }

    // # Método responsável pelo método criar (cardapio-adm/criar)
    public function criar() {
        $acao="criar";
        $isbn="";
        $titulo="";
        $editora= "";
        $idioma="";
        $numeroPaginas="";
        $idAutor="";
        $idClassificacao = "<option></option>
            <option>1 - Filosofia e Psicologia</option>
            <option>2 - Religião</option>
            <option>3 - Ciências Sociais</option>
            <option>4 - Línguas</option>
            <option>5 - Ciências Naturais</option>
        ";
        
        $baseUrl = $this->url;
        require "views/livrosForm.php";
    }

    public function editar($isbn) {
        $livros = $this->livrosModel->getById($isbn);
        $titulo = $livros["titulo"];
        $editora = $livros["editora"];
        $idioma = $livros["idioma"];
        $numeroPaginas = $livros["numeroPaginas"];
        $idAutor = $livros["idAutor"];
        $idClassificacao = $livros["idClassificacao"];

        $classificacoes = ["1","2","3","4","5"];

        $idClassificacao= "<option></option>";

        foreach($classificacoes as $t) {
            $selecionado = $livros["idClassificacao"] == $t ? "selected" : "";
            $idClassificacao .= "<option $selecionado>$t</option>";
        }

        $baseUrl = $this->url;
        $acao = "editar";
        require "views/livrosForm.php";
    }

    // # Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar() {
        $titulo = $_POST["titulo"];
        $editora = $_POST["editora"];
        $idioma = $_POST["idioma"];
        $numeroPaginas = $_POST["numeroPaginas"];
        $idAutor = $_POST["idAutor"];
        $idClassificacao = $_POST["idClassificacao"];

        $acao = $_POST["acao"];

        # Chama o método inserir ou editar
        if($acao == "editar") {
            $isbn = $_POST["isbn"];
            $this->livrosModel->update($isbn,$titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao);
        }else{
            $this->livrosModel->insert($titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao);
        }

        # Redireciona o usuário para a rota principal de cardápio
        header("location: ".$this->url."/livros-adm");
    }
}
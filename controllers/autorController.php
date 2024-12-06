<?php

require_once "models/autorModel.php";

class AutorController
{
    #Criar a propriedade que recebera o endereço absoluto do site 
    # este endereço sera usado para compor as rotas
    # $url é uma propriedade pois esta sendo criada no escopo de classe
    private $url = "http://localhost/uc8/biblioteca";

    private $autorModel;

    public function __construct(){
        $this->autorModel = new Autor();
        
    }
    
    public function index(){
        $lista_de_autor = $this->autorModel->getAllAutor();

        $baseUrl = $this->url;

        require "views/autorView.php";
    }
    
    public function excluir($idAutor){
        $this->autorModel->delete($idAutor);
        header("location: ".$this->url. "/autores-adm");
    }

    // # Método responsável pelo método criar (cardapio-adm/criar)
    public function criar() {
        $acao="criar";
        $idAutor="";
        $nomeAutor="";
        $sexo= "<option></option>
            <option>Masculino</option>
            <option>Feminino</option>
        ";
        
        $baseUrl = $this->url;
        require "views/autorForm.php";
    }

    public function editar($idAutor) {
        $autor = $this->autorModel->getById($idAutor);
        $nomeAutor = $autor["nomeAutor"];
        $sexo = $autor["sexo"];

        $generos = ["Masculino","Feminino"];

        $sexo = "<option></option>";

        foreach($generos as $g) {
            $selecionado = $autor["sexo"] == $g ? "selected" : "";
            $sexo .= "<option $selecionado>$g</option>";
        }

        $baseUrl = $this->url;
        # Variável usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "editar";
        require "views/autorForm.php";
    }

    // # Método responsável por receber os dados do formulário e enviar para o model

    public function atualizar() {
        $idAutor = $_POST["idAutor"];
        $nomeAutor = $_POST["nomeAutor"];
        $sexo = $_POST["sexo"];

        $acao = $_POST["acao"];

        # Chama o método inserir ou editar
        if($acao == "editar") {
            $idAutor = $_POST["idAutor"];
            $this->autorModel->update($idAutor,$nomeAutor,$sexo);
        }else{
            $this->autorModel->insert($nomeAutor,$sexo);
        }

        # Redireciona o usuário para a rota principal de cardápio
        header("location: ".$this->url."/autores-adm");
    }
}
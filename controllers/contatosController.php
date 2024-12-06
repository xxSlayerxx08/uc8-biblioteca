<?php

require_once "models/contatosModel.php";

class ContatosController
{
    private $url = "http://localhost/uc8/biblioteca";

    private $contatosModel;

    public function __construct(){
        $this->contatosModel = new Contatos();
    }
    
    public function index(){
        $lista_de_contatos = $this->contatosModel->getAllContatos();

        $baseUrl = $this->url;

        require "views/contatosView.php";
    }
    
    public function excluir($idContato){
        $this->contatosModel->delete($idContato);
        header("location: ".$this->url. "/contatos-adm");
    }

    public function criar() {
        $acao="criar";
        $idContato="";
        $nome="";
        $telefone="";
        $celular="";
        $email="";
        
        $baseUrl = $this->url;
        require "views/contatosForm.php";
    }

    public function editar($idContato) {
        $contatos = $this->contatosModel->getById($idContato);
        $nome = $contatos["nome"];
        $telefone = $contatos["telefone"];
        $celular = $contatos["celular"];
        $email = $contatos["email"];


        $baseUrl = $this->url;
        # Variável usada para indicar ao formulário que os campos devem ficar vazio
        $acao = "editar";
        require "views/contatosForm.php";
    }

    # Método responsável por receber os dados do formulário e enviar para o model
    public function atualizar() {
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];
        $email = $_POST["email"];

        $acao = $_POST["acao"];

        # Chama o método inserir ou editar
        if($acao == "editar") {
            $idContato = $_POST["idContato"];
            $this->contatosModel->update($idContato,$nome,$telefone,$celular,$email);
        }else{
            $this->contatosModel->insert($nome,$telefone,$celular,$email);
        }
        header("location: ".$this->url."/contatos-adm");
    }
}
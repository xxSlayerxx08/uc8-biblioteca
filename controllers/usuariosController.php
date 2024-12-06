<?php

require_once "models/usuariosModel.php";

class UsuariosController {
    private $url = "http://localhost/uc8/biblioteca";

    private $usuariosModel;

    public function __construct(){
        $this->usuariosModel = new Usuarios();
    }

    public function index(){
        $form_usuario = $this->usuariosModel->getAllUsuario();
        $baseUrl = $this->url;
        require "views/usuariosView.php";
    }

    public function criar() {
        $acao="criar";
        $idUsuario="";
        $nome="";
        $usuario="";
        $endereco="";
        $bairro="";
        $cidade="";
        $uf="";
        $cep="";
        $email="";
        $senha="";
        $telefone="";
        
        $baseUrl = $this->url;
        require "views/usuariosForm.php";
    }

    public function editar($idUsuario) {
        $form = $this->usuariosModel->getById($idUsuario);

        $nome = $form["nome"];
        $usuario = $form["usuario"];
        $endereco = ["endereco"];
        $bairro = ["bairro"];
        $cidade = ["cidade"];
        $uf = ["uf"];
        $cep = ["cep"];
        $email = ["email"];
        $senha = ["senha"];
        $telefone = ["telefone"];

        $baseUrl = $this->url;

        $acao = "editar";
        require "views/usuariosForm.php";
    }

    public function atualizar() {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $endereco = $_POST["endereco"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];
        $cep = $_POST["cep"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $telefone = $_POST["telefone"];

        $acao = $_POST["acao"];

        if($acao == "editar") {
            $idUsuario = $_POST["idUsuario"];
            $this->usuariosModel->update($idUsuario,$nome,$usuario,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone);
        }else{
            $this->usuariosModel->insert($nome,$usuario,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone);
        }

        header("location: ".$this->url."/usuarios");
    }

    public function alterarSenha($idUsuario) {
        $baseUrl = $this->url;
        require "views/AlterarSenhaForm.php";
    }

    public function atualizarSenha($idUsuario = null) {
        $senha = $_POST["senha"];
        $this->usuariosModel->updateSenha($idUsuario,$senha);
        header("Location: ".$this->url."/usuarios");
    }
}
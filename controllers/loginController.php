<?php

require_once "models/loginModel.php";

class LoginController
{
    private $url = "http://localhost/uc8/biblioteca";

    private $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }
    
    public function index(){
        $baseUrl = $this->url;
        $erro = "";
        require "views/loginForm.php";   # Carregar o formulário de login.
    }

    public function criar() {
        $nome = "";
        $usuario = "";
        $senha = "";
        $this->loginModel->insert($usuario,$nome,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone);
        // echo "Usuário criado com sucesso";
    }

    public function autenticar() {
        # Recupera os valores informados no login
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $manter_logado = isset($_POST["manter_logado"]) ? true : false;

        $this->loginModel->getByUsuarioESenha($usuario,$senha,$manter_logado);

        if (isset($_SESSION["erro"])) {
            unset($_SESSION["erro"]);
            $erro = "<div class='alert alert-danger'>Não foi possível efetuar o login. Tente novamente</div>";
            $baseUrl = $this->url;
            require "views/loginForm.php";
        }else{
            header("location: " . $this->url . "/livros-adm");
        }
    }
}
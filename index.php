<?php 

session_start();

$requisicao = trim(strtolower($_SERVER['REQUEST_URI']));

$requisicao = str_replace("/uc8/biblioteca/", "",$requisicao);

$segmentos = explode("/", $requisicao);

$controlador = isset($segmentos[0]) ? $segmentos[0]: "livros-adm" ;
$metodo = isset($segmentos[1]) && $segmentos[1]!= "" ? $segmentos[1]: "index" ;
$identificador = isset($segmentos[2]) && $segmentos[2]!= ""? $segmentos[2]: null ;

switch($controlador){
    case "livros-adm":
        require "controllers/livrosController.php";
        $controller = new LivrosController();
        break;

    case "autores-adm":
        require "controllers/autorController.php";
        $controller = new AutorController();
        break;

    case "contatos-adm":
        require "controllers/contatosController.php";
        $controller = new ContatosController();
        break;

    case "usuarios":
        require "controllers/usuariosController.php";
        $controller = new UsuariosController();
        break;

    case "login":
        require "controllers/loginController.php";
        $controller = new LoginController();
        break;

    default:
    echo "Página não encontrada";
    break;
}

if ($identificador) {
    $controller->$metodo($identificador);
}else {
    $controller->$metodo();
}

function ValidaSessao() {
    if(!isset($_COOKIE["usuario"])){
        if(!isset($_SESSION["nome_usuario"])) {
            $url = "http://localhost/uc8/biblioteca";
            header("location: " . $url . "/login");
        }
    }
}
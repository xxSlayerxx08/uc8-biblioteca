<?php 

class DataBase {
    private static $conexao = null;

    public static function getConexao(){
        if (self::$conexao == null){
            $host = "localhost";
            $nomeDoBanco = "biblioteca";
            $usuario = "root";
            $senha = "";
            
            try{
                self::$conexao = new PDO(
                    "mysql:host=$host;dbname=$nomeDoBanco",
                    $usuario,
                    $senha
                );
                self::$conexao->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );
            }catch(PDOException $erro) {
                echo "Erro de conexão: " . $erro->getMesssage();
            }
        } 
        return self::$conexao;
    }
}
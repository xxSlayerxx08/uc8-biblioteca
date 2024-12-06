<?php

require_once "DataBase.php";

class Usuarios {

    private $db;
    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllUsuario(){
        $sql = $this->db->query("SELECT * FROM usuario");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idUsuario){
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
        $sql->execute([$idUsuario]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($usuario,$nome,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone) {
        $senhaCriptografada = password_hash($senha,PASSWORD_BCRYPT);
        $sql = $this->db->prepare(
            "INSERT INTO usuario (usuario,nome,endereco,bairro,cidade,uf,cep,email,senha,telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$usuario,$nome,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone]);
    }

    public function update($idUsuario,$usuario,$nome,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone) {
        $sql = $this->db->prepare("UPDATE usuario SET usuario=?,nome=?,endereco=?,bairro=?,cidade=?,uf=?,cep=?,email=?,telefone=? WHERE idUsuario=?");
        return $sql->execute([$usuario,$nome,$endereco,$bairro,$cidade,$uf,$cep,$email,$senha,$telefone,$idUsuario]);
    }

    public function updateSenha($idUsuario,$senha) {
        $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);
        $sql = $this->db->prepare("UPDATE usuario SET senha=? WHERE idUsuario=?");
        $sql->execute([$senhaCriptografada,$idUsuario]);
        return $sql->rowCount();
    } 

    public function delete($idUsuario) {
        $sql = $this->db->prepare("DELETE FROM usuario WHERE idUsuario = ?");
        return $sql->execute([$idUsuario]);
    }
}
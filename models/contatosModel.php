<?php

require "DataBase.php";

class Contatos {
    private $db;
    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllContatos() {
        $sql = $this->db->query("SELECT * FROM contatos");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idContato){
        $sql = $this->db->prepare("SELECT * FROM contatos WHERE idContato = ?");
        $sql->execute([$idContato]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($idContato) {
        $sql = $this->db->prepare("DELETE FROM contatos WHERE idContato = ?");
        return $sql->execute([$idContato]);
    }

    public function insert($nome,$telefone,$celular,$email) {
        $sql = $this->db->prepare(
            "INSERT INTO contatos (nome,telefone,celular,email)
            VALUES (?, ?, ?, ?)"
        );
        return $sql->execute([$nome,$telefone,$celular,$email]);
    }

    public function update($idContato,$nome,$telefone,$celular,$email) {
        $sql = $this->db->prepare("UPDATE contatos SET nome=?,telefone=?,celular=?,email=? WHERE idContato=?");
        return $sql->execute([$nome,$telefone,$celular,$email,$idContato]);
    }
}
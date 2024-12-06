<?php

require "DataBase.php";

class Autor {
    private $db;
    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllAutor() {
        $sql = $this->db->query("SELECT * FROM autor");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($idAutor){
        $sql = $this->db->prepare("SELECT * FROM autor WHERE idAutor = ?");
        $sql->execute([$idAutor]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($idAutor) {
        $sql = $this->db->prepare("DELETE FROM autor WHERE idAutor = ?");
        return $sql->execute([$idAutor]);
    }

    public function insert($nomeAutor,$sexo) {
        $sql = $this->db->prepare(
            "INSERT INTO autor (nomeAutor,sexo)
            VALUES (?, ?)"
        );
        return $sql->execute([$nomeAutor,$sexo]);
    }

    public function update($idAutor,$nomeAutor,$sexo) {
        $sql = $this->db->prepare("UPDATE autor SET nomeAutor=?,sexo=? WHERE idAutor=?");
        return $sql->execute([$nomeAutor,$sexo,$idAutor]);
    }
}
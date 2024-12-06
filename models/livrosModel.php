<?php

require "DataBase.php";

class Livros {
    private $db;
    public function __construct() {
        $this->db = DataBase::getConexao();
    }

    public function getAllLivros() {
        $sql = $this->db->query("SELECT * FROM livros");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($isbn){
        $sql = $this->db->prepare("SELECT * FROM livros WHERE isbn = ?");
        $sql->execute([$isbn]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($isbn) {
        $sql = $this->db->prepare("DELETE FROM livros WHERE isbn = ?");
        return $sql->execute([$isbn]);
    }

    public function insert($titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao) {
        $sql = $this->db->prepare(
            "INSERT INTO livros (titulo,editora,idioma,numeroPaginas,idAutor,idClassificacao)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        return $sql->execute([$titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao]);
    }

    public function update($isbn,$titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao) {
        $sql = $this->db->prepare("UPDATE livros SET titulo=?,editora=?,idioma=?,numeroPaginas=?,idAutor=?,idClassificacao=? WHERE isbn=?");
        return $sql->execute([$titulo,$editora,$idioma,$numeroPaginas,$idAutor,$idClassificacao,$isbn]);
    }
}
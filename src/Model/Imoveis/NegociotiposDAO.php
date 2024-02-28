<?php

class NegociotiposDAO extends DAO 
{
    public function create(Negociotipos $negociotipo)
    {
        $sql = "INSERT INTO negociotipos (nome)
                VALUES ({$negociotipo->getNome()})";
        $this->getConexao()->query($sql);
    }
    
    public function update(Negociotipos $negociotipo){

        $sql = "UPDATE negociotipos
                SET nome = '{$negociotipo->getNome()}'
                WHERE id = '{$negociotipo->getId()}'";
        $this->getConexao()->query($sql);
    }
    public function read(Negociotipos $negociotipo){

        $sql = "SELECT nome
                FROM negociotipos
                WHERE id = '{$negociotipo->getId()}'";
        $this->getConexao()->query($sql);

        return $negociotipo;
    }
    public function delete($id){

        $sql = "DELETE FROM negociotipos
                WHERE id = $id";
        $this->getConexao()->query($sql);
    }
}
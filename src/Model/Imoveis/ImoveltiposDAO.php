<?php

class ImoveltiposDAO extends DAO 
{
    public function create(Imoveltipos $imoveltipo)
    {
        $sql = "INSERT INTO imoveltipos (id, ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$imoveltipo->getId()}', '{$imoveltipo->getAtivo()}', '{$imoveltipo->getNome()}', '{$imoveltipo->getCriado()}', '{$imoveltipo->getModificado()}', '{$imoveltipo->getCriadorId()}', '{$imoveltipo->getModificadorId()}', )";
        $this->getConexao()->query($sql);
    }
    
    public function update(Imoveltipos $imoveltipo){

        $sql = "UPDATE imoveltipos
                SET nome = '{$imoveltipo->getNome()}'
                WHERE id = '{$imoveltipo->getId()}'";
        $this->getConexao()->query($sql);
    }
    public function read(Imoveltipos $imoveltipo){

        $sql = "SELECT nome
                FROM imoveltipos
                WHERE id = '{$imoveltipo->getId()}'";
        $this->getConexao()->query($sql);

        return $imoveltipo;
    }
    public function delete($id){

        $sql = "DELETE FROM imoveltipos
                WHERE id = $id";
        $this->getConexao()->query($sql);
    }
}
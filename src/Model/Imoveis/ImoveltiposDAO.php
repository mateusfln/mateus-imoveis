<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Imoveltipos;

class ImoveltiposDAO extends DAO
{
   /**
     * Cria um objeto Imoveltipo
     * @return Imoveltipos
     */
    public function create(Imoveltipos $imoveltipo) : Imoveltipos
    {
        $sql = "INSERT INTO imoveltipos (ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$imoveltipo->getAtivo()}', '{$imoveltipo->getNome()}', '{$imoveltipo->getCriado()->format('Y-m-d H:i:s')}', 
                '{$imoveltipo->getModificado()->format('Y-m-d H:i:s')}', '{$imoveltipo->getCriadorId()}', '{$imoveltipo->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $imoveltipo->setId($this->getInsertId());
        
        return $imoveltipo;
    }
  
    /**
     * Retorna um objeto Imoveltipo através do Id informado
     * @return Imoveltipos
     */
    public function read(Imoveltipos $imoveltipo) : Imoveltipos
    {
        $sql = "SELECT id, nome, ativo, criado, modificado, criador_id, modificador_id
                FROM imoveltipos
                WHERE id = '{$imoveltipo->getId()}'";
        $qry = $this->getConexao()->query($sql);

        return (new Imoveltipos())->hydrate(mysqli_fetch_assoc($qry));
    }
  
    /**
     * Atualiza um objeto Imoveltipo através do Id informado
     */
    public function update(Imoveltipos $imoveltipo){

        $sql = "UPDATE imoveltipos
                SET nome = '{$imoveltipo->getNome()}',
                    ativo = '{$imoveltipo->getAtivo()}'), 
                    criado = '{$imoveltipo->getCriado()->format('Y-m-d H:i:s')}'), 
                   modificado = '{$imoveltipo->getModificado()->format('Y-m-d H:i:s')}'), 
                   criador_id = '{$imoveltipo->getCriadorId()}'), 
               modificador_id = '{$imoveltipo->getModificadorId()}') 
                WHERE id = '{$imoveltipo->getId()}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Retorna um objeto Imoveltipo através do Id informado
     */
    public function delete(Imoveltipos $imoveltipo)
    {

        $sql = "DELETE FROM imoveltipos
                WHERE id = '{$imoveltipo->getId()}'";
        $this->getConexao()->query($sql);
    }

   /**
     * Consulta o ultimo registro feito na tabela e pega o id
     * 
     * @throws \Exception
     */
    public function getInsertId() : int
    {
        $sql = "SELECT LAST_INSERT_ID() AS id";
        $qry = $this->getConexao()->query($sql);
        $dados = mysqli_fetch_assoc($qry);

        return (int) $dados['id'];
    }
}
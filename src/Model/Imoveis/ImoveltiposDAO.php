<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Imoveltipos;

class ImoveltiposDAO extends DAO
{

    public function buscarListaDeImovelTipos() : array|Imoveltipos
    {
        global $_GET;

        $imoveltipos = [];

        $sql = "SELECT id,nome,ativo,criado,modificado,criador_id,modificador_id FROM imoveltipos";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imoveltipo = new Imoveltipos();
            $imoveltipo->setId($row['id']);
            $imoveltipo->setNome($row['nome']);
            $imoveltipo->setAtivo($row['ativo']);
            $imoveltipo->setCriado(new \DateTimeImmutable());
            $imoveltipo->setModificado(new \DateTimeImmutable());
            $imoveltipo->setCriadorId($row['criador_id']);
            $imoveltipo->setModificadorId($row['modificador_id']);
            $imoveltipos[] = $imoveltipo;
        }

        return $imoveltipos;
    }
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
     * 
     * @param int $id Código do tipo de imóvel
     * @return Imoveltipos
     */
    public function read(int $id) : Imoveltipos
    {
        $sql = "SELECT id, nome, ativo, criado, modificado, criador_id, modificador_id
                FROM imoveltipos
                WHERE id = '{$id}'";
        // print_r($sql);
        // die;
        $qry = $this->getConexao()->query($sql);

        return (new Imoveltipos())->hydrate(mysqli_fetch_assoc($qry));
    }
  
    /**
     * Atualiza um objeto Imoveltipo através do Id informado
     * 
     * @param int $id Código do tipo de imóvel
     */
    public function update(Imoveltipos $imoveltipo, int $id){

        $sql = "UPDATE imoveltipos
                SET nome = '{$imoveltipo->getNome()}',
                    ativo = '{$imoveltipo->getAtivo()}', 
                    criado = '{$imoveltipo->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$imoveltipo->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = '{$imoveltipo->getCriadorId()}', 
               modificador_id = '{$imoveltipo->getModificadorId()}'
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um objeto Imoveltipo através do Id informado
     * 
     * @param int $id Código do tipo de imóvel
     */
    public function delete(Imoveltipos $imoveltipo, int $id)
    {

        $sql = "DELETE FROM imoveltipos
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

   /**
     * Consulta o ultimo registro feito na tabela e pega o id
     * 
     * @throws \Exception
     * @return int
     */
    public function getInsertId() : int
    {
        $sql = "SELECT LAST_INSERT_ID() AS id";
        $qry = $this->getConexao()->query($sql);
        $dados = mysqli_fetch_assoc($qry);

        return (int) $dados['id'];
    }
}
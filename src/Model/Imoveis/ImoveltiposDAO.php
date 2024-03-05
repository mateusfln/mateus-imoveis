<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Imoveltipos;

class ImoveltiposDAO extends DAO
{

    /**
     * Retorna um objeto Imoveltipo através do Id informado
     * 
     * @return array|Imoveltipos[]
     */
    public function buscarListaDeImovelTipos() : array|Imoveltipos
    {
        $imoveltipos = [];

        $sql = "SELECT id,nome,ativo,criado,modificado,criador_id,modificador_id FROM imoveltipos";

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

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
     * Cria um novo registro do tipo Negociotipos na tabela de Negociotipos
     * 
     * @param Imoveltipos $imoveltipo Objeto do tipo de imóvel
     * 
     * @return Imoveltipos $imoveltipos
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
     * @param Imoveltipos $imoveltipo Objeto Imoveltipos
     */
    public function update(Imoveltipos $imoveltipo, int $id) : void
    {

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
     * @return void
     */
    public function delete($id) : void
    {

        $sql = "DELETE FROM imoveltipos
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Consulta o ultimo registro feito na tabela imoveltipos e retorna o id desse registro
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
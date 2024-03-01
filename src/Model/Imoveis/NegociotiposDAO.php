<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\NegocioTipos;

class NegociotiposDAO extends DAO 
{

    public function buscarListaDeImovelTipos() : array|NegocioTipos
    {
        global $_GET;

        $negociotipos = [];

        $sql = "SELECT id,nome,ativo,criado,modificado,criador_id,modificador_id FROM negociotipos";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $negociotipo = new NegocioTipos();
            $negociotipo->setId($row['id']);
            $negociotipo->setNome($row['nome']);
            $negociotipo->setAtivo($row['ativo']);
            $negociotipo->setCriado(new \DateTimeImmutable());
            $negociotipo->setModificado(new \DateTimeImmutable());
            $negociotipo->setCriadorId($row['criador_id']);
            $negociotipo->setModificadorId($row['modificador_id']);
            $negociotipos[] = $negociotipo;
        }

        return $negociotipos;
    }

    /**
     * Deleta um objeto Negociotipos através do Id informado
     * 
     * @param NegocioTipos $negocioTipos Objeto do tipo de imóvel
     */
    public function create(NegocioTipos $negocioTipos) : Negociotipos
    {
        $sql = "INSERT INTO negociotipos (ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$negocioTipos->getAtivo()}', '{$negocioTipos->getNome()}', '{$negocioTipos->getCriado()->format('Y-m-d H:i:s')}', '{$negocioTipos->getModificado()->format('Y-m-d H:i:s')}', '{$negocioTipos->getCriadorId()}', '{$negocioTipos->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $negocioTipos->setId($this->getInsertId());
        
        return $negocioTipos;
    }

    /**
     * Atualiza um objeto Negociotipos através do Id informado
     * 
     *
     * @param NegocioTipos $negociotipo
     */
    public function update(Negociotipos $negociotipo, $id){

        $sql = "UPDATE negociotipos
                SET nome = '{$negociotipo->getNome()}',
                    ativo = '{$negociotipo->getAtivo()}', 
                    criado = '{$negociotipo->getCriado()->format('Y-m-d H:i:s')}', 
                    modificado = '{$negociotipo->getModificado()->format('Y-m-d H:i:s')}', 
                    criador_id = '{$negociotipo->getCriadorId()}', 
                    modificador_id = '{$negociotipo->getModificadorId()}' 
                    WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um objeto Negociotipos através do Id informado
     * 
     * @param int $id Código do tipo de imóvel
     */
    public function read(int $id) : NegocioTipos
    {
        $sql = "SELECT id, ativo, nome, criado, modificado, criador_id, modificador_id
                FROM negociotipos
                WHERE id = '{$id}'";
 
        $qry = $this->getConexao()->query($sql);
        return (new NegocioTipos())->hydrate(mysqli_fetch_assoc($qry));

    }
    
    /**
     * Deleta um objeto Negociotipos através do Id informado
     * 
     * @param int $id Código do tipo de imóvel
     */
    public function delete($id){

        $sql = "DELETE FROM negociotipos
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
<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\NegocioTipos;

class NegociotiposDAO extends DAO 
{

    /**
     * Cria um Registro no banco da tabela negociotipos
     * @return NegocioTipos
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
     * Atualiza um Registro no banco da tabela negociotipos
     */
    public function update(Negociotipos $negociotipo){

        $sql = "UPDATE negociotipos
                SET nome = '{$negociotipo->getNome()}',
                    ativo = '{$negociotipo->getAtivo()}'), 
                    criado = '{$negociotipo->getCriado()->format('Y-m-d H:i:s')}'), 
                    modificado = '{$negociotipo->getModificado()->format('Y-m-d H:i:s')}'), 
                    criador_id = '{$negociotipo->getCriadorId()}'), 
                    modificador_id = '{$negociotipo->getModificadorId()}') 
                WHERE id = '{$negociotipo->getId()}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Mostra um Registro no banco da tabela negociotipos
     * @return NegocioTipos
     */
    public function read(Negociotipos $negociotipo) : Negociotipos
    {
        $sql = "SELECT ativo, nome, criado, modificado, criador_id, modificador_id
                FROM imoveltipos
                WHERE id = '{$negociotipo->getId()}'";
        $qry = $this->getConexao()->query($sql);

        return (new Negociotipos())->hydrate(mysqli_fetch_assoc($qry));
    }
    
    /**
     * Deleta um Registro no banco da tabela negociotipos
     */
    public function delete(Negociotipos $negociotipo){

        $sql = "DELETE FROM negociotipos
                WHERE id = '{$negociotipo->getId()}'";
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
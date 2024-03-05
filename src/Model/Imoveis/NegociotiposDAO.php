<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\NegocioTipos;

class NegociotiposDAO extends DAO 
{

    /**
     * retorna uma lista de registros da tabela NegocioTipos
     *
     * @return array|NegocioTipos
     */
    public function buscarListaDeNegocioTipos() : array|NegocioTipos
    {
        $negociotipos = [];

        $sql = "SELECT id, nome, ativo, criado, modificado, criador_id, modificador_id FROM negociotipos";

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

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
     * Cria um novo registro do tipo Negociotipos na tabela de Negociotipos
     * 
     * @param NegocioTipos $negociotipos Objeto do tipo de imóvel
     * 
     * @return NegocioTipos $negociotipos
     */
    public function create(NegocioTipos $negociotipos) : Negociotipos
    {
        $sql = "INSERT INTO negociotipos (ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$negociotipos->getAtivo()}', '{$negociotipos->getNome()}',
                '{$negociotipos->getCriado()->format('Y-m-d H:i:s')}',
                '{$negociotipos->getModificado()->format('Y-m-d H:i:s')}',
                '{$negociotipos->getCriadorId()}',
                '{$negociotipos->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $negociotipos->setId($this->getInsertId());
        
        return $negociotipos;
    }

    /**
     * Atualiza um objeto Negociotipos através do Id informado
     * 
     * @param NegocioTipos $negociotipo
     * @param int $id Código do tipo de imóvel
     * @return void
     */
    public function update(Negociotipos $negociotipo, int $id) : void{

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
     * @return void
     */
    public function delete($id) : void
    {

        $sql = "DELETE FROM negociotipos
                WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Consulta o ultimo registro feito na tabela negociotipos e retorna o id desse registro
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
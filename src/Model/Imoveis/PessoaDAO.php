<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Pessoas;

class PessoaDAO extends DAO 
{

    /**
     * Cria um objeto Imoveltipo
     * @return Pessoas
     */
    public function create(Pessoas $pessoas)
    {
        $sql = "INSERT INTO pessoas (ativo, cpf, login, senha, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$pessoas->getAtivo()}', '{$pessoas->getCpf()}', '{$pessoas->getLogin()}', '{$pessoas->getSenha()}', '{$pessoas->getNome()}', '{$pessoas->getCriado()->format('Y-m-d H:i:s')}', '{$pessoas->getModificado()->format('Y-m-d H:i:s')}', '{$pessoas->getCriadorId()}', '{$pessoas->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $pessoas->setId($this->getInsertId());
        
        return $pessoas;
    }
    
    /**
     * Atualiza um objeto Imoveltipo
     */
    public function update(Pessoas $pessoas){

        $sql = "UPDATE pessoas
                SET cpf = '{$pessoas->getCpf()}',
                    login = '{$pessoas->getLogin()}',
                    sennha = '{$pessoas->getSenha()}',
                    nome = '{$pessoas->getNome()}')
                    ativo = '{$pessoas->getAtivo()}'), 
                    criado = '{$pessoas->getCriado()->format('Y-m-d H:i:s')}'), 
                   modificado = '{$pessoas->getModificado()->format('Y-m-d H:i:s')}'), 
                   criador_id = '{$pessoas->getCriadorId()}'), 
               modificador_id = '{$pessoas->getModificadorId()}') ";
        $this->getConexao()->query($sql);
    }

    /**
     * Mostra um objeto Imoveltipo
     */
    public function read(Pessoas $pessoas){

        $sql = "SELECT ativo, cpf, login, senha, nome, criado, modificado, criador_id, modificador_id
                FROM pessoas
                WHERE id = '{$pessoas->getId()}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um objeto Imoveltipo
     */
    public function delete(Pessoas $pessoas){

        $sql = "DELETE FROM pessoas
                WHERE id = '{$pessoas->getId()}'";
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
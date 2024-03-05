<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Pessoas;

class PessoaDAO extends DAO 
{

    /**
     * Efetua a busca de dados referentes a tabela de pessoas
     * 
     * @return array|Pessoas[]
     */
    public function buscarListaDePessoas() : array|Pessoas
    {
        global $_GET;

        $pessoas = [];

        $sql = "SELECT id, nome, cpf, login, senha, ativo, criado, modificado, criador_id, modificador_id FROM pessoas";
 
       if (!empty($_GET)) {
            $where = [];

            if( isset($_GET['id']) ) {
                $where[] = "id LIKE '%{$_GET['id']}%'";
            }

            if( isset($_GET['nome']) ) {
                $where[] = "nome LIKE '%{$_GET['nome']}%'";
            }

            if( isset($_GET['cpf']) ) {
                $where[] = "cpf LIKE '%{$_GET['cpf']}%'";
            }
            if( isset($_GET['login']) ) {
                $where[] = "login LIKE '%{$_GET['login']}%'";
            }
            if( isset($_GET['senha']) ) {
                $where[] = "senha LIKE '%{$_GET['senha']}%'";
            }
            if (!empty($where)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }
        }      

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $pessoa = new Pessoas();
            $pessoa->setId($row['id']);
            $pessoa->setNome($row['nome']);
            $pessoa->setCpf($row['cpf']);
            $pessoa->setLogin($row['login']);
            $pessoa->setSenha($row['senha']);
            $pessoa->setAtivo($row['ativo']);
            $pessoa->setCriado(new \DateTimeImmutable());
            $pessoa->setModificado(new \DateTimeImmutable());
            $pessoa->setCriadorId($row['criador_id']);
            $pessoa->setModificadorId($row['modificador_id']);
            $pessoas[] = $pessoa;
        }

        return $pessoas;
    }

     /**
     * Cria um registro na tabela pessoas de acordo com os dados fornecidos
     * 
     * @return Pessoas Objeto pessoas com dados preenchidos
     * @param Pessoas $pessoas Objeto pessoas com dados a serem preenchidos
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
     * Edita um registro na tabela pessoa de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código da pessoa
     * @param Pessoas $pessoas Objeto pessoas
     * @return void
     */
    public function update(Pessoas $pessoas, $id){

        $sql = "UPDATE pessoas
                SET cpf = '{$pessoas->getCpf()}',
                    login = '{$pessoas->getLogin()}',
                    senha = '{$pessoas->getSenha()}',
                    nome = '{$pessoas->getNome()}',
                    ativo = '{$pessoas->getAtivo()}', 
                    criado = '{$pessoas->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$pessoas->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = {$pessoas->getCriadorId()}, 
               modificador_id = {$pessoas->getModificadorId()}
               WHERE id = '{$id}'";

        //print_r($sql); die;
        $this->getConexao()->query($sql);
    }

    /**
     * Retorna um registro na tabela pessoas de acordo com os dados fornecidos
     * 
     * @param int $id   Código da pessoa
     * @return Pessoas
     * @throws \Exception
     */
    public function read($id) : Pessoas
    {

        $sql = "SELECT id, ativo, cpf, login, senha, nome, criado, modificado, criador_id, modificador_id
                FROM pessoas
                WHERE id = '{$id}'";

        $qry = $this->getConexao()->query($sql);
        
        return (new Pessoas())->hydrate(mysqli_fetch_assoc($qry));

    }

    /**
     * Deleta um registro na tabela pessoas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete($id) : void
    {

        $sql = "DELETE FROM pessoas
                WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Consulta o ultimo registro feito na tabela pessoas e retorna o id desse registro
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
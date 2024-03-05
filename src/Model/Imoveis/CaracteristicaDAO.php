<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Caracteristicas;

class CaracteristicaDAO extends DAO
{

     /**
     * Efetua a busca de dados referentes a tabela de Caracteristicas
     * 
     * @return array|Caracteristicas[]
     */
    public function buscarListaDeCaracteristicas() : array|Caracteristicas
    {
        $caracteristicas = [];

        $sql = "SELECT id, nome, ativo, criado, modificado, criador_id, modificador_id FROM caracteristicas";

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $caracteristica = new Caracteristicas();
            $caracteristica->setId($row['id']);
            $caracteristica->setNome($row['nome']);
            $caracteristica->setAtivo($row['ativo']);
            $caracteristica->setCriado(new \DateTimeImmutable());
            $caracteristica->setModificado(new \DateTimeImmutable());
            $caracteristica->setCriadorId($row['criador_id']);
            $caracteristica->setModificadorId($row['modificador_id']);
            $caracteristicas[] = $caracteristica;
        }

        return $caracteristicas;
    }

     /**
     * Cria um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @return Caracteristicas Objeto caracteristicas com dados preenchidos
     * @param Caracteristicas $caracteristicas Objeto caracteristicas com dados a serem preenchidos
     */
    public function create(Caracteristicas $caracteristicas) : Caracteristicas
    {
        $sql = "INSERT INTO caracteristicas (ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$caracteristicas->getAtivo()}', '{$caracteristicas->getNome()}',
                '{$caracteristicas->getCriado()->format('Y-m-d H:i:s')}',
                '{$caracteristicas->getModificado()->format('Y-m-d H:i:s')}',
                '{$caracteristicas->getCriadorId()}',
                '{$caracteristicas->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $caracteristicas->setId($this->getInsertId());
        
        return $caracteristicas;
    }


     /**
     * Edita um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código da característica
     * @param Caracteristicas $caracteristicas Objeto caracteristicas
     * @return void
     */
    public function update(Caracteristicas $caracteristicas, int $id) : void
    {

        $sql = "UPDATE caracteristicas
                SET ativo = '{$caracteristicas->getAtivo()}',
                    nome = '{$caracteristicas->getNome()}',                
                    criado = '{$caracteristicas->getCriado()->format('Y-m-d H:i:s')}',                
                    modificado = '{$caracteristicas->getModificado()->format('Y-m-d H:i:s')}',                
                    criador_id = '{$caracteristicas->getCriadorId()}',                
                    modificador_id = '{$caracteristicas->getModificadorId()}'                                
                    WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

     /**
     * Retorna um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @param int $id   Código da característica
     * @return Caracteristicas
     * @throws \Exception
     */
    public function read(int $id) : Caracteristicas
    {
        $sql = "SELECT id, nome, ativo, criado, modificado, criador_id, modificador_id
                FROM caracteristicas
                WHERE id = '{$id}'";
        $qry = $this->getConexao()->query($sql);

        return (new Caracteristicas())->hydrate(mysqli_fetch_assoc($qry));
    }

     /**
     * Deleta um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id) : void
    {

        $sql = "DELETE FROM caracteristicas
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

     /**
     * Consulta o ultimo registro feito na tabela caracteristicas e retorna o id desse registro
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
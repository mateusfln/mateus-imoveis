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
        global $_GET;

        $caracteristicas = [];

        $sql = "SELECT nome FROM caracteristicas";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $caracteristica = new Caracteristicas();
            $caracteristica->setNome($row['nome']);
            $caracteristicas[] = $caracteristica;
        }

        return $caracteristicas;
    }

     /**
     * Cria um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function create(Caracteristicas $caracteristicas)
    {
        $sql = "INSERT INTO caracteristicas (ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$caracteristicas->getAtivo()}', '{$caracteristicas->getNome()}', '{$caracteristicas->getCriado()->format('Y-m-d H:i:s')}',
                 '{$caracteristicas->getModificado()->format('Y-m-d H:i:s')}', '{$caracteristicas->getCriadorId()}', '{$caracteristicas->getModificadorId()}')";
        $this->getConexao()->query($sql);
        
        $caracteristicas->setId($this->getInsertId());
        
        return $caracteristicas;
    }


     /**
     * edita um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function update(Caracteristicas $caracteristicas){

        $sql = "UPDATE caracteristicas
                SET ativo = '{$caracteristicas->getAtivo()}',
                    nome = '{$caracteristicas->getNome()}',                
                    criado = '{$caracteristicas->getCriado()->format('Y-m-d H:i:s')}',                
                    modificado = '{$caracteristicas->getModificado()->format('Y-m-d H:i:s')}',                
                    criador_id = '{$caracteristicas->getCriadorId()}',                
                    modificador_id = '{$caracteristicas->getModificadorId()}'                                
                WHERE id = '{$caracteristicas->getId()}'";
        $this->getConexao()->query($sql);
    }

     /**
     * Mostra um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function read(Caracteristicas $caracteristicas){

        $sql = "SELECT (ativo, nome, criado, modificado, criador_id, modificador_id)
                FROM caracteristicas
                WHERE id = '{$caracteristicas->getId()}'";
        $this->getConexao()->query($sql);

        return $caracteristicas;
    }

     /**
     * Deleta um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function delete(Caracteristicas $caracteristicas, $id){

        $sql = "DELETE FROM caracteristicas
               WHERE id = '{$caracteristicas->getId()}'";
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
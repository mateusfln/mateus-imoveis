<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\CaracteristicasImoveltipos;

class CaracteristicasImoveltiposDAO extends DAO
{

     /**
     * Efetua a busca de dados referentes a tabela de CaracteristicasImoveltipos
     * 
     * @return array|CaracteristicasImoveltipos[]
     */
    public function buscarListaDeCaracteristicasImovelTipos() : array|CaracteristicasImoveltipos
    {
        global $_GET;

        $caracteristicasImovelTipos = [];

        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo,criado,modificado,criador_id,modificador_id FROM caracteristicas_imoveltipos";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $caracteristica = new CaracteristicasImoveltipos();
            $caracteristica->setId($row['id']);
            $caracteristica->setCaracteristicaId($row['caracteristica_id']);
            $caracteristica->setImovelTipoId($row['imoveltipo_id']);
            $caracteristica->setAtivo($row['ativo']);
            $caracteristica->setCriado(new \DateTimeImmutable());
            $caracteristica->setModificado(new \DateTimeImmutable());
            $caracteristica->setCriadorId($row['criador_id']);
            $caracteristica->setModificadorId($row['modificador_id']);
            $caracteristicasImovelTipos[] = $caracteristica;
        }

        return $caracteristicasImovelTipos;
    }

     /**
     * Cria um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function create(CaracteristicasImoveltipos $caracteristicasImovelTipos)
    {
        $sql = "INSERT INTO caracteristicas_imoveltipos (ativo, caracteristica_id, imoveltipo_id, criado, modificado, criador_id, modificador_id)
                VALUES ('{$caracteristicasImovelTipos->getAtivo()}', '{$caracteristicasImovelTipos->getCaracteristicaId()}', '{$caracteristicasImovelTipos->getImovelTipoId()}', '{$caracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}',
                 '{$caracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}', '{$caracteristicasImovelTipos->getCriadorId()}', '{$caracteristicasImovelTipos->getModificadorId()}')";
        $this->getConexao()->query($sql);
        
        $caracteristicasImovelTipos->setId($this->getInsertId());
        
        return $caracteristicasImovelTipos;
    }


     /**
     * edita um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function update(CaracteristicasImoveltipos $caracteristicasImovelTipos, $id){

        $sql = "UPDATE caracteristicas_imoveltipos
                SET caracteristica_id = {$caracteristicasImovelTipos->getCaracteristicaId()}, 
                    imoveltipo_id = {$caracteristicasImovelTipos->getImovelTipoId()}, 
                    ativo = '{$caracteristicasImovelTipos->getAtivo()}',               
                    criado = '{$caracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}',                
                    modificado = '{$caracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}',                
                    criador_id = '{$caracteristicasImovelTipos->getCriadorId()}',                
                    modificador_id = '{$caracteristicasImovelTipos->getModificadorId()}'                                
                    WHERE id = '{$id}'";

        $this->getConexao()->query($sql);
    }

     /**
     * Mostra um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @param int $id   Código da característica
     * @return CaracteristicasImoveltipos
     * @throws \Exception
     */
    public function read(int $id) : CaracteristicasImoveltipos
    {
        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo, criado, modificado, criador_id, modificador_id
                FROM caracteristicas_imoveltipos
                WHERE id = '{$id}'";
        $qry = $this->getConexao()->query($sql);

        return (new CaracteristicasImoveltipos())->hydrate(mysqli_fetch_assoc($qry));
    }

     /**
     * Deleta um registro na tabela caracteristicas de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function delete($id){

        $sql = "DELETE FROM caracteristicas_imoveltipos
               WHERE id = '{$id}'";
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
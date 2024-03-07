<?php

namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\CaracteristicasImoveltipos;

class CaracteristicasImoveltiposDAO extends DAO
{

     /**
     * Efetua a busca de dados referentes a tabela de caracteristicas_imoveltipos
     * 
     * @return array|CaracteristicasImoveltipos[]
     */
    public function buscarListaDeCaracteristicasImovelTipos() : array|CaracteristicasImoveltipos
    {
        global $_GET;

        $caracteristicasImovelTipos = [];

        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo,criado,modificado,criador_id,modificador_id FROM caracteristicas_imoveltipos";

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

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
     * Cria um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @return CaracteristicasImoveltipos Objeto CaracteristicasImoveltipos com dados preenchidos
     * @param CaracteristicasImoveltipos $caracteristicasImovelTipos Objeto CaracteristicasImoveltipos com dados a serem preenchidos
     */
    public function create(CaracteristicasImoveltipos $caracteristicasImovelTipos) : CaracteristicasImoveltipos
    {
        $sql = "INSERT INTO caracteristicas_imoveltipos (ativo, caracteristica_id, imoveltipo_id, criado, modificado, criador_id, modificador_id)
                VALUES ('{$caracteristicasImovelTipos->getAtivo()}', '{$caracteristicasImovelTipos->getCaracteristicaId()}',
                 '{$caracteristicasImovelTipos->getImovelTipoId()}', '{$caracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}',
                 '{$caracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}', '{$caracteristicasImovelTipos->getCriadorId()}',
                 '{$caracteristicasImovelTipos->getModificadorId()}')";
        //print_r($sql); die;
        
        $this->getConexao()->query($sql);
        
        $caracteristicasImovelTipos->setId($this->getInsertId());
        
        return $caracteristicasImovelTipos;
    }


     /**
     * Edita um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código da caracteristicas_imoveltipos
     * @param CaracteristicasImoveltipos $caracteristicasImovelTipos Objeto CaracteristicasImoveltipos
     * @return void
     */
    public function update(CaracteristicasImoveltipos $caracteristicasImovelTipos, $id) : void
    {

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
     * Retorna um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @param int $id   Código da caracteristicas_imoveltipos
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
    
    public function readTeste(int $id) : CaracteristicasImoveltipos
    {
        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo, criado, modificado, criador_id, modificador_id
                FROM caracteristicas_imoveltipos
                WHERE caracteristica_id = '{$id}'";
        $qry = $this->getConexao()->query($sql);

        return (new CaracteristicasImoveltipos())->hydrate(mysqli_fetch_assoc($qry));
    }

     /**
     * Deleta um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id) : void
    {

        $sql = "DELETE FROM caracteristicas_imoveltipos
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }
     /**
     * Deleta um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function deletePorCaracteristica(int $id) : void
    {

        $sql = "DELETE FROM caracteristicas_imoveltipos
               WHERE caracteristica_id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um registro na tabela caracteristicas_imoveltipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function deletePorImovelTipo(int $id) : void
    {

        $sql = "DELETE FROM caracteristicas_imoveltipos
               WHERE imovelTipo_id = '{$id}'";
        $this->getConexao()->query($sql);
    }

     /**
     * Efetua a busca de dados referentes a tabela de caracteristicas_imoveltipos
     * 
     * @return array|CaracteristicasImoveltipos[]
     */
    public function buscarListaDeCaracteristicasImovelTiposPorCaracteristica($caracteristica_id) : array|CaracteristicasImoveltipos
    {
        global $_GET;

        $caracteristicasImovelTipos = [];

        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo,criado,modificado,criador_id,modificador_id 
                FROM caracteristicas_imoveltipos
                WHERE caracteristica_id = '{$caracteristica_id}'";

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
     * Efetua a busca de dados referentes a tabela de caracteristicas_imoveltipos
     * 
     * @return array|CaracteristicasImoveltipos[]
     */
    public function buscarListaDeCaracteristicasImovelTiposPorImovelTipo($imoveltipo_id) : array|CaracteristicasImoveltipos
    {
        global $_GET;

        $caracteristicasImovelTipos = [];

        $sql = "SELECT id, caracteristica_id, imoveltipo_id, ativo,criado,modificado,criador_id,modificador_id 
                FROM caracteristicas_imoveltipos
                WHERE imoveltipo_id = '{$imoveltipo_id}'";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imoveltipo = new CaracteristicasImoveltipos();
            $imoveltipo->setId($row['id']);
            $imoveltipo->setCaracteristicaId($row['caracteristica_id']);
            $imoveltipo->setImovelTipoId($row['imoveltipo_id']);
            $imoveltipo->setAtivo($row['ativo']);
            $imoveltipo->setCriado(new \DateTimeImmutable());
            $imoveltipo->setModificado(new \DateTimeImmutable());
            $imoveltipo->setCriadorId($row['criador_id']);
            $imoveltipo->setModificadorId($row['modificador_id']);
            $caracteristicasImovelTipos[] = $imoveltipo;
        }

        return $caracteristicasImovelTipos;
    }

     /**
     * Consulta o ultimo registro feito na tabela caracteristicas_imoveltipos e retorna o id desse registro
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
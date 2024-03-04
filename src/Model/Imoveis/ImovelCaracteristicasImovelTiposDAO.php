<?php
namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;


class ImovelCaracteristicasImovelTiposDAO extends DAO 
{

    /**
     * Efetua a busca de dados referentes a tabela de ImovelCaracteristicasImovelTipos
     * 
     * @return array|ImovelCaracteristicasImovelTipos[]
     */
    public function buscarListaDeCaracteristicasImovelTipos() : array|ImovelCaracteristicasImovelTipos
    {
        global $_GET;

        $imovelCaracteristicasImovelTipos = [];

        $sql = "SELECT id, imovel_id, caracteristica_imoveltipo_id, ativo,criado,modificado,criador_id,modificador_id FROM imoveis_caracteristicas_imoveltipos";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $caracteristica = new ImovelCaracteristicasImovelTipos();
            $caracteristica->setId($row['id']);
            $caracteristica->setimovelId($row['imovel_id']);
            $caracteristica->setCaracteristicaImoveltipoId($row['caracteristica_imoveltipo_id']);
            $caracteristica->setAtivo($row['ativo']);
            $caracteristica->setCriado(new \DateTimeImmutable());
            $caracteristica->setModificado(new \DateTimeImmutable());
            $caracteristica->setCriadorId($row['criador_id']);
            $caracteristica->setModificadorId($row['modificador_id']);
            $imovelCaracteristicasImovelTipos[] = $caracteristica;
        }

        return $imovelCaracteristicasImovelTipos;
    }

    /**
     * Cria um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function create(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos)
    {
        $sql = "INSERT INTO imoveis_caracteristicas_imoveltipos (imovel_id, caracteristica_imoveltipo_id, valor, ativo, criado, modificado, criador_id, modificador_id)
                VALUES ('{$imovelCaracteristicasImovelTipos->getimovelId()}', '{$imovelCaracteristicasImovelTipos->getCaracteristicaImoveltipoId()}', '{$imovelCaracteristicasImovelTipos->getValor()}', '{$imovelCaracteristicasImovelTipos->getAtivo()}', '{$imovelCaracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}', '{$imovelCaracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}', '{$imovelCaracteristicasImovelTipos->getCriadorId()}', '{$imovelCaracteristicasImovelTipos->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $imovelCaracteristicasImovelTipos->setId($this->getInsertId());
        
        return $imovelCaracteristicasImovelTipos;
    }
    
    /**
     * Edita um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function update(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos, $id){

        $sql = "UPDATE imoveis_caracteristicas_imoveltipos
                SET imovel_id = '{$imovelCaracteristicasImovelTipos->getimovelId()}',
                    caracteristica_imoveltipo_id = '{$imovelCaracteristicasImovelTipos->getCaracteristicaImoveltipoId()}',
                    valor = '{$imovelCaracteristicasImovelTipos->getValor()}',
                    ativo = '{$imovelCaracteristicasImovelTipos->getAtivo()}',
                    criado = '{$imovelCaracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}',
                    modificado = '{$imovelCaracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}',
                    criador_id = '{$imovelCaracteristicasImovelTipos->getCriadorId()}',
                    modificador_id = '{$imovelCaracteristicasImovelTipos->getModificadorId()}',
                    WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Mostra um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function read(int $id) : ImovelCaracteristicasImovelTipos
    {
        $sql = "SELECT id, caracteristica_imoveltipo_id, imovel_id, ativo, criado, modificado, criador_id, modificador_id
                FROM imoveis_caracteristicas_imoveltipos
                WHERE id = '{$id}'";
        $qry = $this->getConexao()->query($sql);

        return (new ImovelCaracteristicasImovelTipos())->hydrate(mysqli_fetch_assoc($qry));
    }

    /**
     * Deleta um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function delete($id){

        $sql = "DELETE FROM imoveis_caracteristicas_imoveltipos
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
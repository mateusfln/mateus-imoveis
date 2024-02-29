<?php
namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;


class ImovelCaracteristicasImovelTiposDAO extends DAO 
{

    /**
     * Cria um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function create(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos)
    {
        $sql = "INSERT INTO imoveis_caracteristicas_imoveltipos (imovel_id, caracteristica_imoveltipo_id, valor, ativo, nome, criado, modificado, criador_id, modificador_id)
                VALUES ('{$imovelCaracteristicasImovelTipos->getimovelId()}', '{$imovelCaracteristicasImovelTipos->getCaracteristicaImoveltipoId()}', '{$imovelCaracteristicasImovelTipos->getValor()}', '{$imovelCaracteristicasImovelTipos->getAtivo()}', '{$imovelCaracteristicasImovelTipos->getvalor()}', '{$imovelCaracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}', '{$imovelCaracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}', '{$imovelCaracteristicasImovelTipos->getCriadorId()}', '{$imovelCaracteristicasImovelTipos->getModificadorId()}')";
        
        $this->getConexao()->query($sql);
        
        $imovelCaracteristicasImovelTipos->setId($this->getInsertId());
        
        return $imovelCaracteristicasImovelTipos;
    }
    
    /**
     * Edita um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function update(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos){

        $sql = "UPDATE imoveis_caracteristicas_imoveltipos
                SET imovel_id = '{$imovelCaracteristicasImovelTipos->getimovelId()}',
                    caracteristica_imoveltipo = '{$imovelCaracteristicasImovelTipos->getCaracteristicaImoveltipoId()}',
                    valor = '{$imovelCaracteristicasImovelTipos->getValor()}',
                    ativo = '{$imovelCaracteristicasImovelTipos->getAtivo()}',
                    nome = '{$imovelCaracteristicasImovelTipos->getNome()}',
                    criado = '{$imovelCaracteristicasImovelTipos->getCriado()->format('Y-m-d H:i:s')}',
                    modificado = '{$imovelCaracteristicasImovelTipos->getModificado()->format('Y-m-d H:i:s')}',
                    criador_id = '{$imovelCaracteristicasImovelTipos->getCriadorId()}',
                    modificador_id = '{$imovelCaracteristicasImovelTipos->getModificadorId()}',
                WHERE id = '{$imovelCaracteristicasImovelTipos->getId()}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Mostra um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function read(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos){

        $sql = "SELECT (imovel_id, caracteristica_imoveltipo_id, valor, ativo, nome, criado, modificado, criador_id, modificador_id)
                FROM imoveis_caracteristicas_imoveltipos
                WHERE id = '{$imovelCaracteristicasImovelTipos->getId()}'";
        
        $qry = $this->getConexao()->query($sql);

        return (new ImovelCaracteristicasImovelTipos())->hydrate(mysqli_fetch_assoc($qry));
    }

    /**
     * Deleta um registro na tabela ImovelCaracteristicasImovelTipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     */
    public function delete(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos){

        $sql = "DELETE FROM imoveis_caracteristicas_imoveltipos
                WHERE id = '{$imovelCaracteristicasImovelTipos->getId()}'";
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
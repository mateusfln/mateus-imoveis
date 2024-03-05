<?php
namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\ImovelNegociostipos;


class ImovelNegociotiposDAO extends DAO 
{

    /**
     * Efetua a busca de dados referentes a tabela de Caracteristicas
     * 
     * @return array|ImovelNegociostipos[]
     */
    public function buscarListaDeImovelNegocioTipos() : array|ImovelNegociostipos
    {
        $imovelNegociostipos = [];

        $sql = "SELECT id, imovel_id, negociotipo_id, valor, ativo,criado,modificado,criador_id,modificador_id FROM imoveis_negociotipos";

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovelNegociotipo = new ImovelNegociostipos();
            $imovelNegociotipo->setId($row['id']);
            $imovelNegociotipo->setimovelId($row['imovel_id']);
            $imovelNegociotipo->setNegocioTipoId($row['negociotipo_id']);
            $imovelNegociotipo->setValor($row['valor']);
            $imovelNegociotipo->setAtivo($row['ativo']);
            $imovelNegociotipo->setCriado(new \DateTimeImmutable());
            $imovelNegociotipo->setModificado(new \DateTimeImmutable());
            $imovelNegociotipo->setCriadorId($row['criador_id']);
            $imovelNegociotipo->setModificadorId($row['modificador_id']);
            $imovelNegociostipos[] = $imovelNegociotipo;
        }

        return $imovelNegociostipos;
    }

    /**
     * Cria um registro na tabela imoveis_negociotipos de acordo com os dados fornecidos
     * 
     * @return ImovelNegociostipos Objeto ImovelNegociostipos com dados preenchidos
     * @param ImovelNegociostipos $imovelNegociostipos Objeto ImovelNegociostipos com dados a serem preenchidos
     */
    public function create(ImovelNegociostipos $imovelNegociostipos)
    {
        $sql = "INSERT INTO imoveis_negociotipos (imovel_id, negociotipo_id, valor, ativo,criado,modificado,criador_id,modificador_id)
                VALUES ('{$imovelNegociostipos->getimovelId()}', '{$imovelNegociostipos->getNegocioTipoId()}', '{$imovelNegociostipos->getValor()}', '{$imovelNegociostipos->getAtivo()}', '{$imovelNegociostipos->getCriado()->format('Y-m-d H:i:s')}', '{$imovelNegociostipos->getModificado()->format('Y-m-d H:i:s')}', '{$imovelNegociostipos->getCriadorId()}', '{$imovelNegociostipos->getModificadorId()}')";

        $this->getConexao()->query($sql);
        
        $imovelNegociostipos->setId($this->getInsertId());
        
        return $imovelNegociostipos;
    }
    
    /**
     * Edita um registro na tabela imoveis_negociotipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imoveis_negociotipos
     * @param ImovelNegociostipos $imovelNegociostipos Objeto ImovelNegociostipos
     * @return void
     */
    public function update(ImovelNegociostipos $imovelNegociostipos, $id) : void
    {

        $sql = "UPDATE imoveis_negociotipos
                SET imovel_id = '{$imovelNegociostipos->getimovelId()}',
                    negociotipo_id = '{$imovelNegociostipos->getNegocioTipoId()}',
                    valor = '{$imovelNegociostipos->getValor()}',
                    ativo = '{$imovelNegociostipos->getAtivo()}',
                    criado = '{$imovelNegociostipos->getCriado()->format('Y-m-d H:i:s')}',
                    modificado = '{$imovelNegociostipos->getModificado()->format('Y-m-d H:i:s')}',
                    criador_id = '{$imovelNegociostipos->getCriadorId()}',
                    modificador_id = '{$imovelNegociostipos->getModificadorId()}',
                    WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Retorna um registro na tabela imoveis_negociotipos de acordo com os dados fornecidos
     * 
     * @param int $id   Código do imoveis_negociotipos
     * @return ImovelNegociostipos
     * @throws \Exception
     */
    public function read(int $id) : ImovelNegociostipos
    {
        $sql = "SELECT id, imovel_id, negociotipo_id, valor, ativo,criado,modificado,criador_id,modificador_id
                FROM imoveis_negociotipos
                WHERE id = '{$id}'";
        $qry = $this->getConexao()->query($sql);

        return (new ImovelNegociostipos())->hydrate(mysqli_fetch_assoc($qry));
    }

    /**
     * Deleta um registro na tabela imoveis_negociotipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete($id) : void
    {

        $sql = "DELETE FROM imoveis_negociotipos
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }


    /**
     * Consulta o ultimo registro feito na tabela imoveis_negociotipos e retorna o id desse registro
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
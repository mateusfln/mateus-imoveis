<?php
namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Midias;



class MidiasDAO extends DAO
{

    /**
     * Efetua a busca de dados referentes a tabela de Midias
     * 
     * @return array|Midias[]
     */
    public function buscarListaDeMidias() : array|Midias
    {
        global $_GET;

        $midias = [];

        $sql = "SELECT identificacao, nome_disco, capa FROM midias";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $midia = new Midias();
            $midia->setNomeDisco($row['nome_disco']);
            $midia->setIdentificacao($row['identificacao']);
            $midia->setCapa($row['capa']);
            $midias[] = $midia;
        }

        return $midias;
    }

    /**
     * Cria um registro no banco na tabela midias
     * @return Midias
     */
    public function create(Midias $midias) : Midias
    {
        $sql = "INSERT INTO midias (imovel_id, identificacao, nome_disco, capa, ativo, criado, modificado, criador_id, modificador_id)
                VALUES ('{$midias->getImovelId()}', '{$midias->getIdentificacao()}', '{$midias->getNomeDisco()}',
                        '{$midias->getCapa()}', '{$midias->getAtivo()}', '{$midias->getCriado()->format('Y-m-d H:i:s')},
                        '{$midias->getModificado()->format('Y-m-d H:i:s')}, '{$midias->getCriadorId()}, '{$midias->getModificadorId()}')";
         
         $this->getConexao()->query($sql);
        
         $midias->setId($this->getInsertId());
         
         return $midias;
    }

    /**
     * Mostra um registro no banco na tabela midias
     * @return Midias
     */
    public function read(Midias $midias){

        $sql = "SELECT imovel_id, identificacao, nome_disco, capa, ativo, criado, modificado, criador_id, modificador_id
                FROM midias
                WHERE id = '{$midias->getId()}'";
        $this->getConexao()->query($sql);

        return $midias;
    }
    
    /**
     * Atualiza um registro no banco na tabela midias
     * 
     */
    public function update(Midias $midias){

        $sql = "UPDATE midias
                SET imovel_id = '{$midias->getImovelId()}',
                    identificacao = '{$midias->getIdentificacao()}',
                    nome_disco = '{$midias->getNomeDisco()}',
                    capa = '{$midias->getCapa()}',
                    ativo = '{$midias->getAtivo()}'), 
                    criado = '{$midias->getCriado()->format('Y-m-d H:i:s')}'), 
                    modificado = '{$midias->getModificado()->format('Y-m-d H:i:s')}'), 
                    criador_id = '{$midias->getCriadorId()}'), 
                    modificador_id = '{$midias->getModificadorId()}') 
                WHERE id = '{$midias->getId()}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um registro no banco na tabela midias
     *
     */
    public function delete(Midias $midias){

        $sql = "DELETE FROM midias
                WHERE id = '{$midias->getId()}'";
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
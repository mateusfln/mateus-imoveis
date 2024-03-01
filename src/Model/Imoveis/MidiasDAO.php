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

        $sql = "SELECT id, imovel_id, identificacao, nome_disco, capa, ativo, criado, modificado, criador_id, modificador_id FROM midias";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $midia = new Midias();
            $midia->setId($row['id']);
            $midia->setImovelId($row['imovel_id']);
            $midia->setIdentificacao($row['identificacao']);
            $midia->setNomeDisco($row['nome_disco']);
            $midia->setCapa($row['capa']);
            $midia->setAtivo($row['ativo']);
            $midia->setCriado(new \DateTimeImmutable());
            $midia->setModificado(new \DateTimeImmutable());
            $midia->setCriadorId($row['criador_id']);
            $midia->setModificadorId($row['modificador_id']);
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
                VALUES ({$midias->getImovelId()}, '{$midias->getIdentificacao()}', '{$midias->getNomeDisco()}',
                        '{$midias->getCapa()}', {$midias->getAtivo()}, '{$midias->getCriado()->format('Y-m-d H:i:s')}',
                        '{$midias->getModificado()->format('Y-m-d H:i:s')}', {$midias->getCriadorId()}, {$midias->getModificadorId()})";
         
         $this->getConexao()->query($sql);
        
         $midias->setId($this->getInsertId());
         
         return $midias;
    }

    /**
     * Mostra um registro no banco na tabela midias
     * @return Midias
     */
    public function read(int $id) : Midias
    {

        $sql = "SELECT id, imovel_id, identificacao, nome_disco, capa, ativo, criado, modificado, criador_id, modificador_id
                FROM midias
                WHERE id = '{$id}'";

        $qry = $this->getConexao()->query($sql);
        return (new Midias())->hydrate(mysqli_fetch_assoc($qry));

    }
    
    /**
     * Atualiza um registro no banco na tabela midias
     * 
     */
    public function update(Midias $midias, $id){

        $sql = "UPDATE midias
                SET identificacao = '{$midias->getIdentificacao()}',
                    nome_disco = '{$midias->getNomeDisco()}',
                    capa = '{$midias->getCapa()}',
                    ativo = '{$midias->getAtivo()}', 
                    criado = '{$midias->getCriado()->format('Y-m-d H:i:s')}', 
                    modificado = '{$midias->getModificado()->format('Y-m-d H:i:s')}', 
                    criador_id = '{$midias->getCriadorId()}', 
                    modificador_id = '{$midias->getModificadorId()}'
                    WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }

    /**
     * Deleta um registro no banco na tabela midias
     *
     */
    public function delete($id){

        $sql = "DELETE FROM midias
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
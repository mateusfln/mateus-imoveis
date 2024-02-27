<?php
require_once(realpath(dirname(__FILE__) . '/..') . '/DAO.php');
require_once(realpath(dirname(__FILE__) . '/..') . '/Entity/Midias.php');



class MidiasDAO extends DAO
{

     /**
     * Efetua a busca de dados referentes a tabela de Midias
     * 
     * @return array|\Models\Entity\Midias[]
     */
    public function buscarListaDeMidias() : array|\Models\Entity\Midias
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

}
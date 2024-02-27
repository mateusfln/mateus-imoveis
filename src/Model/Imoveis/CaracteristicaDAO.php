<?php
require_once(realpath(dirname(__FILE__) . '/..') . '/DAO.php');
require_once(realpath(dirname(__FILE__) . '/..') . '/Entity/Caracteristicas.php');




class CaracteristicaDAO extends DAO
{

     /**
     * Efetua a busca de dados referentes a tabela de Caracteristicas
     * 
     * @return array|\Models\Entity\Caracteristicas[]
     */
    public function buscarListaDeCaracteristicas() : array|\Models\Entity\Caracteristicas
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

}
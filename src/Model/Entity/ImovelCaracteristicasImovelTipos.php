<?php

use Imobiliaria\Model\Entity\Tabela;

class ImovelCaracteristicasImovelTipos extends Tabela
{
    public $imovelId;
    public $caracteristicaImovelTipoId;
    public $valor;
    
    public function setimovelId($imovel_id)
    {
        $this->imovelId = $imovel_id;
    }
    public function getimovelId()
    {
        return $this->imovelId;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getValor()
    {
        return $this->valor;
    }
}
<?php
use Imobiliaria\Model\Entity\Tabela;

class ImovelNegociosTipos extends Tabela
{
    public $imovelId;
    public $negocioTipoId;
    public $valor;
    
    public function setimovelId($imovel_id)
    {
        $this->imovelId = $imovel_id;
    }
    public function getimovelId()
    {
        return $this->imovelId;
    }
    public function setNegocioTipoId($negocio_tipo_id)
    {
        $this->negocioTipoId = $negocio_tipo_id;
    }
    public function getNegocioTipoId()
    {
        return $this->negocioTipoId;
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
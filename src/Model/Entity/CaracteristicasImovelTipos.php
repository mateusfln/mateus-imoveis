<?php
use Imobiliaria\Model\Entity\Tabela;

class ImovelNegociosTipos extends Tabela
{
    public $caracteristicaId;
    public $imovelTipoId;

    public function setCaracteristicaId($caracteristica_id)
    {
        $this->caracteristicaId = $caracteristica_id;
    }
    public function getCaracteristicaId()
    {
        return $this->caracteristicaId;
    }
    public function setImovelTipoId($imovel_tipo_id)
    {
        $this->imovelTipoId = $imovel_tipo_id;
    }
    public function getImovelTipoId()
    {
        return $this->imovelTipoId;
    }

}
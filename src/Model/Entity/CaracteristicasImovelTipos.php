<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class CaracteristicasImoveltipos extends Tabela
{
    public $caracteristicaId;
    public $imovelTipoId;

    public function setCaracteristicaId($caracteristicaId)
    {
        $this->caracteristicaId = $caracteristicaId;
    }
    public function getCaracteristicaId()
    {
        return $this->caracteristicaId;
    }
    public function setImovelTipoId($imovelTipoId)
    {
        $this->imovelTipoId = $imovelTipoId;
    }
    public function getImovelTipoId()
    {
        return $this->imovelTipoId;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int,
     *  'nome' => string,
     *  'ativo' => bool,
     *  'criado' => 'Y-m-d H:i:s',
     *  'modificado' => 'Y-m-d H:i:s',
     *  'criador_id' => int,
     *  'modificador_id' => int,
     * ]
     */
    public function hydrate(array $dados) : CaracteristicasImoveltipos
    {
        $this->setId($dados['id'] ?? null);
        $this->setCaracteristicaId($dados['caracteristica_id']);
        $this->setImovelTipoId($dados['imoveltipo_id']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }

}
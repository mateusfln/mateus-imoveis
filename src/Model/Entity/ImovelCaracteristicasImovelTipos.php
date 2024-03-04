<?php

namespace Imobiliaria\Model\Entity;


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
    public function setCaracteristicaImoveltipoId($caracteristicaImovelTipoId)
    {
        $this->caracteristicaImovelTipoId = $caracteristicaImovelTipoId;
    }
    public function getCaracteristicaImoveltipoId()
    {
        return $this->caracteristicaImovelTipoId;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getValor()
    {
        return $this->valor;
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
    public function hydrate(array $dados) : ImovelCaracteristicasImovelTipos
    {
        $this->setId($dados['id'] ?? null);
        $this->setimovelId($dados['imovel_id']);
        $this->setCaracteristicaImoveltipoId($dados['caracteristica_imoveltipo_id']);
        $this->setValor($dados['valor']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }
}
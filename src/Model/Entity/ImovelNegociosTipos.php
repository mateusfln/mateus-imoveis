<?php

namespace Imobiliaria\Model\Entity;

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
    public function hydrate(array $dados) : ImovelNegociosTipos
    {
        $this->setId($dados['id'] ?? null);
        $this->setImovelId($dados['imovel_id']);
        $this->setValor($dados['valor']);
        $this->setNegocioTipoId($dados['negociotipo_id']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }
}
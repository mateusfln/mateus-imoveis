<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class ImovelNegociostipos extends Tabela
{
    public int $imovelId;
    public int $negocioTipoId;
    public string $valor;
    

     /**
     * método que define id de um imovel dentro da tabela imovel_negociotipos
     *
     * @param int $imovel_id
     * @return ImovelNegociostipos
     */
    public function setimovelId(int $imovel_id) : ImovelNegociostipos
    {
        $this->imovelId = $imovel_id;

        return $this;
    }

    /**
     * método que retorna o id de um imovel dentro da tabela imovel_negociotipos
     * @return int $imovelId
     */
    public function getimovelId() : int
    {
        return $this->imovelId;
    }

    /**
     * método que define id de um tipo de negócio dentro da tabela imovel_negociotipos
     *
     * @param int $negocio_tipo_id
     * @return ImovelNegociostipos
     */
    public function setNegocioTipoId(int $negocio_tipo_id) : ImovelNegociostipos
    {
        $this->negocioTipoId = $negocio_tipo_id;

        return $this;
    }

    /**
     * método que retorna o id de um tipo de negócio dentro da tabela imovel_negociotipos
     * @return int $negocioTipoId
     */
    public function getNegocioTipoId() : int
    {
        return $this->negocioTipoId;
    }

    /**
     * método que define o valor de um imovel de acordo com o tipo de negocio dele
     *
     * @param string $valor
     * @return ImovelNegociostipos
     */
    public function setValor(string $valor) : ImovelNegociostipos
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * método que retorna o valor de um imovel de acordo com o tipo de negocio dele
     * @return string $valor
     */
    public function getValor() : string
    {
        return $this->valor;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int | null,
     *  'imovelId' => int,
     *  'valor' => string,
     *  'negocioTipoId' => int,
     *  'ativo' => bool,
     *  'criado' => 'Y-m-d H:i:s',
     *  'modificado' => 'Y-m-d H:i:s',
     *  'criador_id' => int,
     *  'modificador_id' => int,
     * ]
     */
    public function hydrate(array $dados) : ImovelNegociostipos
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
<?php

namespace Imobiliaria\Model\Entity;


use Imobiliaria\Model\Entity\Tabela;

class ImovelCaracteristicasImovelTipos extends Tabela
{
    private int $imovelId;
    private int $caracteristicaImovelTipoId;
    private string $valor;
    

    /**
     * método que define id de um imovel dentro da tabela imovel_caracteristicas_negociotipos
     *
     * @param int $imovel_id
     * @return ImovelCaracteristicasImovelTipos
     */
    public function setimovelId(int $imovel_id) : ImovelCaracteristicasImovelTipos
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
     * método que define id de uma caracteristicaImovelTipoId dentro da tabela imovel_caracteristicas_negociotipos
     *
     * @param int $caracteristicaImovelTipoId
     * @return ImovelCaracteristicasImovelTipos
     */
    public function setCaracteristicaImoveltipoId(int $caracteristicaImovelTipoId) :ImovelCaracteristicasImovelTipos
    {
        $this->caracteristicaImovelTipoId = $caracteristicaImovelTipoId;

        return $this;
    }

    /**
     * método que retorna o id de uma caracteristicaImovelTipoId dentro da tabela imovel_caracteristicas_negociotipos
     * @return int $caracteristicaImovelTipoId
     */
    public function getCaracteristicaImoveltipoId() : int
    {
        return $this->caracteristicaImovelTipoId;
    }

    /**
     * método que define o valor de um imovel de acordo com o tipo de negocio dele
     *
     * @param string $valor
     * @return ImovelCaracteristicasImovelTipos
     */
    public function setValor(string $valor) : ImovelCaracteristicasImovelTipos
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
     *  'caracteristicaImoveltipoId' => int,
     *  'valor' => string,
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
<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class CaracteristicasImoveltipos extends Tabela
{
    private int $caracteristicaId;
    private int $imoveltipoId;

    /**
     * método que define o id de uma caracteristica dentro da tabela caracteristica_imoveltipos
     *
     * @param int $caracteristicaId
     * @return CaracteristicasImoveltipos
     */
    public function setCaracteristicaId(int $caracteristicaId) : CaracteristicasImoveltipos
    {
        $this->caracteristicaId = $caracteristicaId;

        return $this;
    }

    /**
     * método que retorna o id de uma caracteristica
     * @return int $caracteristicaId
     */
    public function getCaracteristicaId() : int
    {
        return $this->caracteristicaId;
    }

    /**
     * método que define o id de uma imoveltipo dentro da tabela caracteristica_imoveltipos
     *
     * @param int $imoveltipoId
     * @return CaracteristicasImoveltipos
     */
    public function setImovelTipoId(int $imoveltipoId) : CaracteristicasImoveltipos
    {
        $this->imoveltipoId = $imoveltipoId;

        return $this;
    }

    /**
     * método que retorna o id de um imoveltipo
     * @return int $imoveltipoId
     */
    public function getImovelTipoId()
    {
        return $this->imoveltipoId;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int,
     *  'caracteristicaId' => int,
     *  'imoveltipoId' => int,
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
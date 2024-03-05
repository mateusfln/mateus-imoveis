<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Interfaces\TabelaInterface;

class Tabela implements TabelaInterface
{
    private int $id;
    private bool $ativo;
    private \DateTimeImmutable $criado;
    private \DateTimeImmutable $modificado;
    private int $criadorId;
    private int $modificadorId;

    /**
     * método que define o id de um campo na tabela
     *
     * @param int|null $id
     * @return Tabela
     */
    public function setId(int|null $id) : Tabela
    {
        $this->id = $id;

        return $this;
    }
    
    /**
     * método que retorna o id de um campo na tabela
     * @return int|null $id
     */
    public function getId() : int|null
    {
        return $this->id;
    }

    /**
     * método que define o status de um campo na tabela (Ativo ou não Ativo)
     *
     * @param bool $ativo
     * @return Tabela
     */
    public function setAtivo(bool $ativo) : Tabela
    {
        $this->ativo = $ativo;
        
        return $this;
    }

    /**
     * método que retorna o status de um campo na tabela (Ativo ou não Ativo)
     * @return bool $ativo
     */
    public function getAtivo() : bool
    {
        return (bool) $this->ativo;
    }

    /**
     * método que define a data de criação de um campo na tabela
     *
     * @param \DateTimeImmutable $criado
     * @return Tabela
     */
    public function setCriado(\DateTimeImmutable $criado) : Tabela
    {
        $this->criado = $criado;
        
        return $this;
    }

    /**
     * método que retorna a data de criação de um campo na tabela
     * @return \DateTimeImmutable $criado
     */
    public function getCriado() : \DateTimeImmutable
    {
        return $this->criado;
    }

    /**
     * método que define a data de modificação de um campo na tabela
     *
     * @param \DateTimeImmutable $modificado
     * @return Tabela
     */
    public function setModificado(\DateTimeImmutable $modificado) : Tabela
    {
        $this->modificado = $modificado;
        
        return $this;
    }

    /**
     * método que retorna a data de modificação de um campo na tabela
     * @return \DateTimeImmutable $modificado
     */
    public function getModificado() : \DateTimeImmutable
    {
        return $this->modificado;
    }

    /**
     * método que define o id do criador do registro de um campo na tabela
     *
     * @param int $criadorId
     * @return Tabela
     */
    public function setCriadorId(int $criadorId) : Tabela
    {
        $this->criadorId = $criadorId;
        
        return $this;
    }

    /**
     * método que retorna o id do criador de um registro na tabela
     * @return int $criadorId
     */
    public function getCriadorId() : int
    {
        return $this->criadorId;
    }
    
    /**
     * método que define o id do modificador do registro de um campo na tabela
     *
     * @param int $modificadorId
     * @return Tabela
     */
    public function setModificadorId(int $modificadorId) : Tabela
    {
        $this->modificadorId = $modificadorId;
        
        return $this;
    }
    
    /**
     * método que retorna o id do modificador de um registro na tabela
     * @return int $modificadorId
     */
    public function getModificadorId() : int
    {
       return $this->modificadorId;
    }
}
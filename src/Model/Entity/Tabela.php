<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Interfaces\TabelaInterface;

class Tabela implements TabelaInterface
{
    public int $id;
    public bool $ativo;
    public \DateTimeImmutable $criado;
    public \DateTimeImmutable $modificado;
    public int $criadorId;
    public int $modificadorId;

    public function setId(int|null $id) : Tabela
    {
        $this->id = $id;

        return $this;
    }
    
    public function getId() : int|null
    {
        return $this->id;
    }

    public function setAtivo(bool $ativo) : Tabela
    {
        $this->ativo = $ativo;
        
        return $this;
    }

    public function getAtivo() : bool
    {
        return (bool) $this->ativo;
    }

    public function setCriado(\DateTimeImmutable $criado) : Tabela
    {
        $this->criado = $criado;
        
        return $this;
    }

    public function getCriado() : \DateTimeImmutable
    {
        return $this->criado;
    }

    public function setModificado(\DateTimeImmutable $modificado) : Tabela
    {
        $this->modificado = $modificado;
        
        return $this;
    }

    public function getModificado() : \DateTimeImmutable
    {
        return $this->modificado;
    }

    public function setCriadorId(int $criador_id) : Tabela
    {
        $this->criadorId = $criador_id;
        
        return $this;
    }

    public function getCriadorId() : int
    {
        return $this->criadorId;
    }
    
    public function setModificadorId(int $modificador_id) : Tabela
    {
        $this->modificadorId = $modificador_id;
        
        return $this;
    }
    
    public function getModificadorId() : int
    {
       return $this->modificadorId;
    }
}
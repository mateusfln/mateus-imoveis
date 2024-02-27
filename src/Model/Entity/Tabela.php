<?php

namespace Imobiliaria\Model\Entity;

class Tabela
{
    public $id;
    public $ativo;
    public $criado;
    public $modificado;
    public $criadorId;
    public $modificadorId;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }
    public function getAtivo()
    {
        return $this->ativo;
    }
    public function setCriado($criado)
    {
        $this->criado = $criado;
    }
    public function getCriado()
    {
        return $this->criado;
    }
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }
    public function getModificado()
    {
        return $this->modificado;
    }
    public function setCriadorId($criador_id)
    {
        $this->criadorId = $criador_id;
    }
    public function getCriadorId()
    {
        return $this->criadorId;
    }
    public function setModificadorId($modificador_id)
    {
        $this->modificadorId = $modificador_id;
    }
    public function getModificadorId()
    {
       return $this->modificadorId;
    }
}
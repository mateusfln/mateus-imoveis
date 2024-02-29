<?php

namespace Imobiliaria\Model\Interfaces;

interface TabelaInterface
{
    public function setId(int|null $id) : TabelaInterface;

    public function getId() : int|null;
    
    public function setAtivo(bool $ativo) : TabelaInterface;
    
    public function getAtivo() : bool;
    
    public function setCriado(\DateTimeImmutable $criado) : TabelaInterface;
    
    public function getCriado() : \DateTimeImmutable;
    
    public function setModificado(\DateTimeImmutable $modificado) : TabelaInterface;
    
    public function getModificado() : \DateTimeImmutable;
    
    public function setCriadorId(int $criador_id) : TabelaInterface;
    
    public function getCriadorId() : int;
    
    public function setModificadorId(int $modificador_id) : TabelaInterface;
    
    public function getModificadorId() : int;
}
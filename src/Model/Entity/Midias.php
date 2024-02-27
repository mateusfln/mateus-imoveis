<?php
use Imobiliaria\Model\Entity\Tabela;

class Midias extends Tabela
{
    public $imovelId;
    public $identificacao;
    public $nomeDisco;
    public $capa;

    public function setImovelId($imovel_id)
    {
        $this->imovelId = $imovel_id;
    }
    public function getImovelId()
    {
        return $this->imovelId;
    }
    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
    }
    public function getIdentificacao()
    {
        return $this->identificacao;
    }
    public function setNomeDisco($nome_disco)
    {
        $this->nomeDisco = $nome_disco;
    }
    public function getNomeDisco()
    {
        return $this->nomeDisco;
    }
    public function setCapa($capa)
    {
        $this->capa = $capa;
    }
    public function getCapa()
    {
        return $this->capa;
    }
    
}
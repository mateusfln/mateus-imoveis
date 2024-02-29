<?php

namespace Imobiliaria\Model\Entity;

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
    public function hydrate(array $dados) : Midias
    {
        $this->setId($dados['id'] ?? null);
        $this->setImovelId($dados['imovel_id']);
        $this->setCapa($dados['capa']);
        $this->setNomeDisco($dados['nome_disco']);
        $this->setIdentificacao($dados['identificacao']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }
    
}
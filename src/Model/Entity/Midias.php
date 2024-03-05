<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class Midias extends Tabela
{
    private int $imovelId;
    private string $identificacao;
    private string $nomeDisco;
    private bool $capa;


    /**
     * método que define o id do imovel que contem esta midia
     *
     * @param int $imovel_id
     * @return Midias
     */
    public function setImovelId(int $imovel_id) : Midias
    {
        $this->imovelId = $imovel_id;

        return $this;
    }

    /**
     * método que retorna o id do imovel que contem esta midia
     * @return int $imovelId
     */
    public function getImovelId() : int
    {
        return $this->imovelId;
    }

    /**
     * método que define a identificacao de uma midia
     *
     * @param string $identificacao
     * @return Midias
     */
    public function setIdentificacao(string $identificacao) : Midias
    {
        $this->identificacao = $identificacao;

        return $this;
    }

    /**
     * método que retorna a identificacao de uma midia
     * @return string $identificacao
     */
    public function getIdentificacao() : string
    {
        return $this->identificacao;
    }

    /**
     * método que define o caminho (path) de onde a midia está armazenada
     *
     * @param string $nome_disco
     * @return Midias
     */
    public function setNomeDisco(string $nome_disco) : Midias
    {
        $this->nomeDisco = $nome_disco;

        return $this;
    }

    /**
     * método que retorna o caminho (path) de onde a midia está armazenada
     * @return string $nomeDisco
     */
    public function getNomeDisco() : string
    {
        return $this->nomeDisco;
    }

    /**
     * método que define o status de capa de uma midia (é ou não é uma capa)
     *
     * @param bool $capa
     * @return Midias
     */
    public function setCapa(bool $capa) : Midias
    {
        $this->capa = $capa;

        return $this;
    }

    /**
     * método que retorna o status de capa de uma midia (é ou não é uma capa)
     * @return bool $capa
     */
    public function getCapa() : bool
    {
        return $this->capa;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int | null,
     *  'ImovelId' => int,
     *  'capa' => bool,
     *  'nomeDisco' => string,
     *  'identificacao' => string,
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
<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class NegocioTipos extends Tabela
{
    public $nome;
    
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function getNome()
    {
        return $this->nome;
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
    public function hydrate(array $dados) : NegocioTipos
    {
        $this->setId($dados['id'] ?? null);
        $this->setNome($dados['nome']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }
}
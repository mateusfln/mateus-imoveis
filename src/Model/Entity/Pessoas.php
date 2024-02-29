<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class Pessoas extends Tabela
{

    public $nome;
    public $cpf;
    public $login;
    public $senha;
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
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
    public function hydrate(array $dados) : Pessoas
    {
        $this->setId($dados['id'] ?? null);
        $this->setNome($dados['nome']);
        $this->setCpf($dados['cpf']);
        $this->setLogin($dados['login']);
        $this->setSenha($dados['senha']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }

}
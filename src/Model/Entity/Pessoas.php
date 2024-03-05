<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class Pessoas extends Tabela
{

    private string $nome;
    private string $cpf;
    private string $login;
    private string $senha;
    

    /**
     * método que define o nome de uma Pessoa
     *
     * @param string $nome
     * @return Pessoas
     */
    public function setNome(string $nome) : Pessoas
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * método que retorna o nome de uma Pessoa
     * @return string $nome
     */
    public function getNome() : string
    {
        return $this->nome;
    }

    /**
     * método que define o cpf de uma Pessoa
     *
     * @param string $cpf
     * @return Pessoas
     */
    public function setCpf(string $cpf) : Pessoas
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * método que retorna o cpf de uma Pessoa
     * @return string $cpf
     */
    public function getCpf() : string
    {
        return $this->cpf;
    }

    /**
     * método que define o login de uma Pessoa
     *
     * @param string $login
     * @return Pessoas
     */
    public function setLogin(string $login) : Pessoas
    {
        $this->login = $login;

        return $this;
    }

    /**
     * método que retorna o login de uma Pessoa
     * @return string $login
     */
    public function getLogin() : string
    {
        return $this->login;
    }

    /**
     * método que define a senha de uma Pessoa
     *
     * @param string $senha
     * @return Pessoas
     */
    public function setSenha(string $senha) : Pessoas
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * método que retorna a senha de uma Pessoa
     * @return string $senha
     */
    public function getSenha() : string
    {
        return $this->senha;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int | null,
     *  'nome' => string,
     *  'cpf' => string,
     *  'login' => string,
     *  'senha' => string,
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
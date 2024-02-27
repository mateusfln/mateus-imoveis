<?php
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
    // public function setAtivo($ativo)
    // {
    //     $this->ativo = $ativo;
    // }
    // public function getAtivo()
    // {
    //     return $this->ativo;
    // }
    // public function setCriado($criado)
    // {
    //     $this->criado = $criado;
    // }
    // public function getCriado()
    // {
    //     return $this->criado;
    // }
    // public function setModificado($modificado)
    // {
    //     $this->modificado = $modificado;
    // }
    // public function getModificado()
    // {
    //     return $this->modificado;
    // }
    // public function setCriadorId($criador_id)
    // {
    //     $this->criadorId = $criador_id;
    // }
    // public function getCriadorId()
    // {
    //     return $this->criadorId;
    // }
    // public function setModificadorId($modificador_id)
    // {
    //     $this->modificadorId = $modificador_id;
    // }
    // public function getModificadorId()
    // {
    //    return $this->modificadorId;
    // }
}
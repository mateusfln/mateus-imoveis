<?php
namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;

class Caracteristicas extends Tabela
{
    private string $nome;

    /**
     * método que define o nome de uma Característica
     *
     * @param string $nome
     * @return Caracteristicas
     */
    public function setNome($nome) : Caracteristicas
    {
        $this->nome = $nome;
        return $this;
    }
    /**
     * método que retorna o nome de uma Característica
     * @return string $nome
     */
    public function getNome() : string
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
    public function hydrate(array $dados) : Caracteristicas
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
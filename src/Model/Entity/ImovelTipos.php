<?php
use Imobiliaria\Model\Entity\Tabela;
class ImovelTipos extends Tabela
{
    public $nome;
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
}
<?php

namespace Imobiliaria\Model\Entity;


use Imobiliaria\Model\Entity\Tabela;

class Imovel extends Tabela
{
    public $identificacao;
    public $matricula;
    public $inscricaoImobiliaria;
    public $logradouro;
    public $numeroLogradouro;
    public $complemento;
    public $rua;
    public $bairro;
    public $cidade;
    public $estado;
    public $cep;
    public $ibge;
    public $caracteristicas;
    public $imovelCaracteristicasImovelTipos;
    public $negocioTipos;
    public $imovelTipos;
    public $midias;

    public function setIdentificacao($identificacao)
    {
        $this->identificacao = $identificacao;
    }
    public function getIdentificacao()
    {
        return $this->identificacao;
    }
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setInscricaoImobiliaria($incricao_imobiliaria)
    {
        $this->incricaoImobiliaria = $incricao_imobiliaria;
    }
    public function getInscricaoImobiliaria()
    {
        return $this->inscricaoImobiliaria;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    public function setNumeroLogradouro($numero_logradouro)
    {
        $this->numeroLogradouro = $numero_logradouro;
    }
    public function getNumeroLogradouro()
    {
        return $this->numeroLogradouro;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function setRua($rua)
    {
        $this->rua = $rua;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function setIbge($ibge)
    {
        $this->ibge = $ibge;
    }
    public function getIbge()
    {
        return $this->ibge;
    }
    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }
    public function setImovelCaracteristicasImovelTipos($imovelCaracteristicasImovelTipos)
    {
        $this->imovelCaracteristicasImovelTipos = $imovelCaracteristicasImovelTipos;
    }
    public function getImovelCaracteristicasImovelTipos()
    {
        return $this->imovelCaracteristicasImovelTipos;
    }
    public function setNegocioTipos($negocio_tipos)
    {
        $this->negocioTipos = $negocio_tipos;
    }
    public function getNegocioTipos()
    {
        return $this->negocioTipos;
    }
    public function setImoveltipos($imovelTipos)
    {
        $this->imovelTipos = $imovelTipos;
    }
    public function getImoveltipos()
    {
        return $this->imovelTipos;
    }
    public function setMidias($midias)
    {
        $this->midias = $midias;
    }
    public function getMidias()
    {
        return $this->midias;
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
    public function hydrate(array $dados) : Imovel
    {
        $this->setId($dados['id'] ?? null);
        $this->setIdentificacao($dados['identificacao']);
        $this->setMatricula($dados['matricula']);
        $this->setInscricaoImobiliaria($dados['inscricao_imobiliaria']);
        $this->setLogradouro($dados['logradouro']);
        $this->setNumeroLogradouro($dados['numero_logradouro']);
        $this->setComplemento($dados['complemento']);
        $this->setBairro($dados['bairro']);
        $this->setCidade($dados['cidade']);
        $this->setEstado($dados['estado']);
        $this->setIbge($dados['ibge']);
        $this->setCep($dados['cep']);
        $this->setRua($dados['rua']);
        $this->setAtivo($dados['ativo']);
        $this->setCriado(new \DateTimeImmutable($dados['criado']));
        $this->setModificado(new \DateTimeImmutable($dados['modificado']));
        $this->setCriadorId($dados['criador_id']);
        $this->setModificadorId($dados['modificador_id']);

        return $this;
    }
}
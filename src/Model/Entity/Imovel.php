<?php

namespace Imobiliaria\Model\Entity;


use Imobiliaria\Model\Entity\Tabela;

class Imovel extends Tabela
{
    private string $identificacao;
    private string $matricula;
    private string $inscricaoImobiliaria;
    private string $logradouro;
    private string $numeroLogradouro;
    private string $complemento;
    private string $rua;
    private string $bairro;
    private string $cidade;
    private string $estado;
    private string $cep;
    private string $ibge;
    public Caracteristicas $caracteristicas;
    public ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos;
    public Negociotipos $negocioTipos;
    public Imoveltipos $imovelTipos;
    public Midias $midias;


    /**
     * método que a identificacao de um Imóvel
     *
     * @param string $identificacao
     * @return Imovel
     */
    public function setIdentificacao(string $identificacao) : Imovel
    {
        $this->identificacao = $identificacao;

        return $this;
    }

    /**
     * método que retorna a identificacao de um Imóvel
     * @return string $identificacao
     */
    public function getIdentificacao() : string
    {
        return $this->identificacao;
    }

    /**
     * método que define a matricula de um Imóvel
     *
     * @param string $matricula
     * @return Imovel
     */
    public function setMatricula(string $matricula) : Imovel
    {
        $this->matricula = $matricula;

        return $this;
    }

    /**
     * método que retorna a matricula de um Imóvel
     * @return string $matricula
     */
    public function getMatricula() : string
    {
        return $this->matricula;
    }

    /**
     * método que define a inscrição imobiliaria de um Imóvel
     *
     * @param string $inscricaoImobiliaria
     * @return Imovel
     */
    public function setInscricaoImobiliaria(string $inscricaoImobiliaria) : Imovel
    {
        $this->inscricaoImobiliaria = $inscricaoImobiliaria;

        return $this;
    }

    /**
     * método que retorna a inscrição imobiliaria de um Imóvel
     * @return string $inscricaoImobiliaria
     */
    public function getInscricaoImobiliaria() : string
    {
        return $this->inscricaoImobiliaria;
    }

    /**
     * método que define o logradouro de um Imóvel
     *
     * @param string $logradouro
     * @return Imovel
     */
    public function setLogradouro(string $logradouro) : Imovel
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * método que retorna o logradouro de um Imóvel
     * @return string $logradouro
     */
    public function getLogradouro() : string
    {
        return $this->logradouro;
    }

    /**
     * método que define o numero do logradouro de um Imóvel
     *
     * @param string $numeroLogradouro
     * @return Imovel
     */
    public function setNumeroLogradouro(string $numeroLogradouro) : Imovel
    {
        $this->numeroLogradouro = $numeroLogradouro;

        return $this;
    }

    /**
     * método que retorna o numero do logradouro de um Imóvel
     * @return string $numeroLogradouro
     */
    public function getNumeroLogradouro() : string
    {
        return $this->numeroLogradouro;
    }

    /**
     * método que define o complemento de um Imóvel
     *
     * @param string $complemento
     * @return Imovel
     */
    public function setComplemento(string $complemento) : Imovel
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * método que retorna o complemento de um Imóvel
     * @return string $complemento
     */
    public function getComplemento() : string
    {
        return $this->complemento;
    }

    /**
     * método que define a rua de um Imóvel
     *
     * @param string $rua
     * @return Imovel
     */
    public function setRua(string $rua) : Imovel
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * método que retorna a rua de um Imóvel
     * @return string $rua
     */
    public function getRua() : string
    {
        return $this->rua;
    }

    /**
     * método que define o bairro de um Imóvel
     *
     * @param string $bairro
     * @return Imovel
     */
    public function setBairro(string $bairro) : Imovel
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * método que retorna o bairro de um Imóvel
     * @return string $bairro
     */
    public function getBairro() : string
    {
        return $this->bairro;
    }

    /**
     * método que define a cidade de um Imóvel
     *
     * @param string $cidade
     * @return Imovel
     */
    public function setCidade(string $cidade) : Imovel
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * método que retorna a cidade de um Imóvel
     * @return string $cidade
     */
    public function getCidade() : string
    {
        return $this->cidade;
    }

    /**
     * método que define o Estado de um Imóvel
     *
     * @param string $estado
     * @return Imovel
     */
    public function setEstado(string $estado) : Imovel
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * método que retorna o Estado de um Imóvel
     * @return string $estado
     */
    public function getEstado() : string
    {
        return $this->estado;
    }

    /**
     * método que define os dados referentes ao ibge de um Imóvel
     *
     * @param string $cep
     * @return Imovel
     */
    public function setCep(string $cep) : Imovel
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * método que retorna o cep de um Imóvel
     * @return string $cep
     */
    public function getCep() : string
    {
        return $this->cep;
    }

    /**
     * método que define os dados referentes ao ibge de um Imóvel
     *
     * @param string $ibge
     * @return Imovel
     */
    public function setIbge(string $ibge) : Imovel
    {
        $this->ibge = $ibge;

        return $this;
    }

    /**
     * método que retorna os dados referentes ao ibge de um Imóvel
     * @return string $ibge
     */
    public function getIbge() : string
    {
        return $this->ibge;
    }

    /**
     * método que define o objeto Imoveltipos
     *
     * @param Caracteristicas $caracteristicas
     * @return Imovel
     */
    public function setCaracteristicas(Caracteristicas $caracteristicas) : Imovel
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    /**
     * método que retorna as caracteristicas de um Imóvel
     * @return Caracteristicas $caracteristicas
     */
    public function getCaracteristicas() : Caracteristicas
    {
        return $this->caracteristicas;
    }

    /**
     * método que define o objeto Imoveltipos
     *
     * @param ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos
     * @return Imovel
     */
    public function setImovelCaracteristicasImovelTipos(ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos) : Imovel
    {
        $this->imovelCaracteristicasImovelTipos = $imovelCaracteristicasImovelTipos;

        return $this;
    }

    /**
     * método que retorna o objeto ImovelCaracteristicasImovelTipos com seus dados populados
     * @return ImovelCaracteristicasImovelTipos $imovelCaracteristicasImovelTipos
     */
    public function getImovelCaracteristicasImovelTipos() : ImovelCaracteristicasImovelTipos
    {
        return $this->imovelCaracteristicasImovelTipos;
    }

    /**
     * método que define o objeto Imoveltipos
     *
     * @param Negociotipos $negocio_tipos
     * @return Imovel
     */
    public function setNegocioTipos(Negociotipos $negocio_tipos) : Imovel
    {
        $this->negocioTipos = $negocio_tipos;

        return $this;
    }

    /**
     * método que retorna o objeto Negociotipos com seus dados populados
     * @return Negociotipos $negocioTipos
     */
    public function getNegocioTipos() : Negociotipos 
    {
        return $this->negocioTipos;
    }

    /**
     * método que define o objeto Imoveltipos
     *
     * @param Imoveltipos $imovelTipos
     * @return Imovel
     */
    public function setImoveltipos(Imoveltipos $imovelTipos) : Imovel
    {
        $this->imovelTipos = $imovelTipos;

        return $this;
    }

    /**
     * método que retorna o objeto Imoveltipos com seus dados populados
     * @return Imoveltipos $imovelTipos
     */
    public function getImoveltipos() : Imoveltipos
    {
        return $this->imovelTipos;
    }

    /**
     * método que define o objeto Midias
     *
     * @param Midias $midias
     * @return Imovel
     */
    public function setMidias(Midias $midias) : Imovel
    {
        $this->midias = $midias;

        return $this;
    }

    /**
     * método que retorna o objeto Midias com seus dados populados
     * @return Midias $midias
     */
    public function getMidias() : Midias
    {
        return $this->midias;
    }

    /**
     * Deve conter todos os dados do objeto para poder instanciar e popular
     * 
     * @param array $dados
     * [
     *  'id' => int,
     *  'identificacao' => string,
     *  'matricula' => string,
     *  'inscricaoImobiliaria' => string,
     *  'logradouro' => string,
     *  'numeroLogradouro' => string,
     *  'complemento' => string,
     *  'bairro' => string,
     *  'cidade' => string,
     *  'estado' => string,
     *  'ibge' => string,
     *  'cep' => string,
     *  'rua' => string,
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
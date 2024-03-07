<?php
namespace Imobiliaria\Model\Imoveis;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Entity\Imoveltipos;
use Imobiliaria\Model\Entity\NegocioTipos;
use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Entity\Caracteristicas;
use Imobiliaria\Model\Entity\Midias;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;

class ImovelDAO extends DAO
{
     /**
     * Efetua a busca de dados referentes a tabela de Imoveis
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeNegociosTipo() : array|Imovel
    {

        $negociosTipos = [];

        $sql = "SELECT id, nome FROM negociotipos";
 
        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new NegocioTipos();
            $imovel->setId($row['id']);
            $imovel->setNome($row['nome']);
            $negociosTipos[] = $imovel;
        }

        return $negociosTipos;
    }
     /**
     * Efetua a busca de dados referentes Estados Cadastrados
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeEstados() : array|Imovel
    {
        $estados = [];

        $sql = "SELECT DISTINCT estado FROM imoveis;";
 
        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $estado = new Imovel();
            $estado->setEstado($row['estado']);
            $estados[] = $estado;
        }

        return $estados;
    }
     /**
     * Efetua a busca de dados referentes a tabela de Imoveis
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeImoveisTipo() : array|Imovel
    {
        $imovelTipos = [];

        $sql = "SELECT id, nome FROM imoveltipos";
 
        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new ImovelTipos();
            $imovel->setId($row['id']);
            $imovel->setNome($row['nome']);
            $imovelTipos[] = $imovel;
        }

        return $imovelTipos;
    }
    /**
     * Efetua a busca de dados referentes a tabela de Imoveis
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeImoveis() : array|Imovel
    {

        $imoveis = [];

        $sql = "SELECT id, identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, complemento, rua, bairro, cidade, estado, cep, ibge, metros_quadrados, quartos, banheiros, garagem, ativo, criado, modificado, criador_id, modificador_id FROM imoveis";
 
       if (!empty($_GET)) {
            $where = [];

            if( isset($_GET['identificacao']) ) {
                $where[] = "identificacao LIKE '%{$_GET['identificacao']}%'";
            }

            if( isset($_GET['id']) ) {
                $where[] = "id LIKE '%{$_GET['id']}%'";
            }

            if( isset($_GET['matricula']) ) {
                $where[] = "matricula LIKE '%{$_GET['matricula']}%'";
            }
            if( isset($_GET['inscricao_imobiliaria']) ) {
                $where[] = "inscricao_imobiliaria LIKE '%{$_GET['inscricao_imobiliaria']}%'";
            }
            if( isset($_GET['logradouro']) ) {
                $where[] = "logradouro LIKE '%{$_GET['logradouro']}%'";
            }
            if( isset($_GET['numero_logradouro']) ) {
                $where[] = "numero_logradouro LIKE '%{$_GET['numero_logradouro']}%'";
            }
            if( isset($_GET['complemento']) ) {
                $where[] = "complemento LIKE '%{$_GET['complemento']}%'";
            }
            if( isset($_GET['rua']) ) {
                $where[] = "rua LIKE '%{$_GET['rua']}%'";
            }
            if( isset($_GET['bairro']) ) {
                $where[] = "bairro LIKE '%{$_GET['bairro']}%'";
            }
            if( isset($_GET['cidade']) ) {
                $where[] = "cidade LIKE '%{$_GET['cidade']}%'";
            }
            if( isset($_GET['estado']) ) {
                $where[] = "estado LIKE '%{$_GET['estado']}%'";
            }
            if( isset($_GET['cep']) ) {
                $where[] = "cep LIKE '%{$_GET['cep']}%'";
            }
            if( isset($_GET['ibge']) ) {
                $where[] = "ibge LIKE '%{$_GET['ibge']}%'";
            }
            if( isset($_GET['ativo']) ) {
                $where[] = "ativo LIKE '%{$_GET['ativo']}%'";
            }
            if (!empty($where)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }
        }      

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setCriado(new \DateTimeImmutable());
            $imovel->setModificado(new \DateTimeImmutable());
            $imovel->setCriadorId($row['criador_id']);
            $imovel->setModificadorId($row['modificador_id']);
            $imoveis[] = $imovel;
        }

        return $imoveis;
    }
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis a Venda
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeImoveisVenda() : array|Imovel
    {

        $imoveisENegocioTipo = [];

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, it.nome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
        INNER JOIN midias m ON i.id = m.imovel_id
        WHERE n.nome = 'Venda'";
 
        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $negocioTipos = new NegocioTipos();
            $midias = new Midias();
            $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();


            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setNegocioTipos($negocioTipos);
            $negocioTipos->setNome($row['nnome']);
            $imovel->setImovelCaracteristicasImovelTipos($imovelCaracteristicasImovelTipos);
            $imovelCaracteristicasImovelTipos->setValor($row['valor']);
            $imovel->setMidias($midias);
            $midias->setIdentificacao($row['midia_identificacao']);
            $midias->setNomeDisco($row['midia_nome_disco']);
            $midias->setCapa($row['midia_capa']);
            
            $imoveisENegocioTipo[] = $imovel;
        }

        return $imoveisENegocioTipo;
    }
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis e Tipos de negocio
     * 
     * @return array|Imovel[]
     */
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis a Venda
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeImoveisAluguel() : array|Imovel
    {

        $imoveisENegocioTipo = [];

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, it.nome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
        INNER JOIN midias m ON i.id = m.imovel_id
        WHERE n.nome = 'Aluguel'";
 
        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $negocioTipos = new NegocioTipos();
            $midias = new Midias();
            $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();

            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setNegocioTipos($negocioTipos);
            $negocioTipos->setNome($row['nnome']);
            $imovel->setImovelCaracteristicasImovelTipos($imovelCaracteristicasImovelTipos);
            $imovelCaracteristicasImovelTipos->setValor($row['valor']);
            $imovel->setMidias($midias);
            $midias->setIdentificacao($row['midia_identificacao']);
            $midias->setNomeDisco($row['midia_nome_disco']);
            $midias->setCapa($row['midia_capa']);
            
            $imoveisENegocioTipo[] = $imovel;
        }

        return $imoveisENegocioTipo;
    }
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis e Tipos de negocio
     * 
     * @return array|Imovel[]
     */
    public function buscarListaDeImoveisENegocioTipo() : array|Imovel
    {

        $imoveisENegocioTipo = [];

        $sql = "SELECT i.id, identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
        complemento, rua, bairro, cidade, estado, cep, ibge, metros_quadrados, quartos, banheiros, garagem, i.ativo, n.nome
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id;";
 
       if (!empty($_GET)) {
            $where = [];

            if( isset($_GET['identificacao']) ) {
                $where[] = "identificacao LIKE '%{$_GET['identificacao']}%'";
            }

            if( isset($_GET['id']) ) {
                $where[] = "id LIKE '%{$_GET['id']}%'";
            }

            if( isset($_GET['matricula']) ) {
                $where[] = "matricula LIKE '%{$_GET['matricula']}%'";
            }
            if( isset($_GET['inscricao_imobiliaria']) ) {
                $where[] = "inscricao_imobiliaria LIKE '%{$_GET['inscricao_imobiliaria']}%'";
            }
            if( isset($_GET['logradouro']) ) {
                $where[] = "logradouro LIKE '%{$_GET['logradouro']}%'";
            }
            if( isset($_GET['numero_logradouro']) ) {
                $where[] = "numero_logradouro LIKE '%{$_GET['numero_logradouro']}%'";
            }
            if( isset($_GET['complemento']) ) {
                $where[] = "complemento LIKE '%{$_GET['complemento']}%'";
            }
            if( isset($_GET['rua']) ) {
                $where[] = "rua LIKE '%{$_GET['rua']}%'";
            }
            if( isset($_GET['bairro']) ) {
                $where[] = "bairro LIKE '%{$_GET['bairro']}%'";
            }
            if( isset($_GET['cidade']) ) {
                $where[] = "cidade LIKE '%{$_GET['cidade']}%'";
            }
            if( isset($_GET['estado']) ) {
                $where[] = "estado LIKE '%{$_GET['estado']}%'";
            }
            if( isset($_GET['cep']) ) {
                $where[] = "cep LIKE '%{$_GET['cep']}%'";
            }
            if( isset($_GET['ibge']) ) {
                $where[] = "ibge LIKE '%{$_GET['ibge']}%'";
            }
            if( isset($_GET['ativo']) ) {
                $where[] = "ativo LIKE '%{$_GET['ativo']}%'";
            }
            if( isset($_GET['nome']) ) {
                $where[] = "n.nome LIKE '%{$_GET['nome']}%'";
            }
            if (!empty($where)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }
        }      

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $negocioTipos = new NegocioTipos();

            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setNegocioTipos($negocioTipos);
            $negocioTipos->setNome($row['nome']);
            
            $imoveisENegocioTipo[] = $imovel;
        }

        return $imoveisENegocioTipo;
    }
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis, Tipos de negocio e caracteristicas
     * 
     * @return array|Imovel[]
     */
    public function findAll() : array|Imovel
    {
        $imoveisENegocioTipoECaracteristicas = [];

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
                complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, it.nome, nt.valor,
                m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa
                FROM imoveis i
                INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
                INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
                INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
                INNER JOIN midias m ON i.id = m.imovel_id";

                // print_r($sql); die;
        
       if (!empty($_GET)) {
            $where = [];

            if( isset($_GET['tipo']) ) {
                $where[] = "it.nome LIKE '%{$_GET['tipo']}%'";
            }

            if( isset($_GET['i.id']) ) {
                $where[] = "i.id LIKE '%{$_GET['pesquisa']}%'";
            }

            if( isset($_GET['matricula']) ) {
                $where[] = "matricula LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['inscricao_imobiliaria']) ) {
                $where[] = "inscricao_imobiliaria LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['logradouro']) ) {
                $where[] = "logradouro LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['numero_logradouro']) ) {
                $where[] = "numero_logradouro LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['complemento']) ) {
                $where[] = "complemento LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['rua']) ) {
                $where[] = "rua LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['bairro']) ) {
                $where[] = "bairro LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['cidade']) ) {
                $where[] = "cidade LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['estado']) ) {
                $where[] = "estado LIKE '%{$_GET['estado']}%'";
            }
            if( isset($_GET['cep']) ) {
                $where[] = "cep LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['ibge']) ) {
                $where[] = "ibge LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['ativo']) ) {
                $where[] = "ativo LIKE '%{$_GET['pesquisa']}%'";
            }
            if( isset($_GET['pretensao']) ) {
                $where[] = "n.nome LIKE '%{$_GET['pretensao']}%'";
            }
            if( isset($_GET['valor']) ) {
                $where[] = "valor LIKE '%{$_GET['pesquisa']}%'";
            }
            if (!empty($where)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }
            //print_r($sql); die;
        }      

        if( isset($_GET['sort']) && isset($_GET['direction']) ) {
            $sql .= " ORDER BY {$_GET['sort']} {$_GET['direction']}";
        }

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $negocioTipos = new NegocioTipos();
            $caracteristicas = new Caracteristicas();
            $midias = new Midias();
            $ImovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();

            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setNegocioTipos($negocioTipos);
            $negocioTipos->setNome($row['nnome']);
            $negocioTipos->setValor($row['valor']);
            //$imovel->setImovelCaracteristicasImovelTipos($ImovelCaracteristicasImovelTipos);
            //$ImovelCaracteristicasImovelTipos->setValor($row['valor']);
            //$imovel->setCaracteristicas($caracteristicas);
            //$caracteristicas->setNome($row['cnome']);
            $imovel->setMidias($midias);
            $midias->setIdentificacao($row['midia_identificacao']);
            $midias->setNomeDisco($row['midia_nome_disco']);
            $midias->setCapa($row['midia_capa']);
            
            $imoveisENegocioTipoECaracteristicas[] = $imovel;
        }

        return $imoveisENegocioTipoECaracteristicas;
    }
    /**
     * Efetua a busca de dados referente as tabelas de Imoveis, Tipos de negocio e caracteristicas sem filtragem
     * 
     * @return array|Imovel[]
     */
    public function findAllNoFilters() : array|Imovel
    {
        $imoveisENegocioTipoECaracteristicas = [];

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, it.nome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
        INNER JOIN midias m ON i.id = m.imovel_id";

        $query = $this->getConexao()->query($sql);
        
        while ($row = $query->fetch_assoc()) {
            $imovel = new Imovel();
            $negocioTipos = new NegocioTipos();
            //$caracteristicas = new Caracteristicas();
            $midias = new Midias();
            //$ImovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();

            $imovel->setId($row['id']);
            $imovel->setIdentificacao($row['identificacao']);
            $imovel->setMatricula($row['matricula']);
            $imovel->setInscricaoImobiliaria($row['inscricao_imobiliaria']);
            $imovel->setLogradouro($row['logradouro']);
            $imovel->setNumeroLogradouro($row['numero_logradouro']);
            $imovel->setComplemento($row['complemento']);
            $imovel->setBairro($row['bairro']);
            $imovel->setRua($row['rua']);
            $imovel->setCidade($row['cidade']);
            $imovel->setEstado($row['estado']);
            $imovel->setCep($row['cep']);
            $imovel->setIbge($row['ibge']);
            $imovel->setMetrosQuadrados($row['metros_quadrados']);
            $imovel->setQuartos($row['quartos']);
            $imovel->setBanheiros($row['banheiros']);
            $imovel->setVagasGaragem($row['garagem']);
            $imovel->setAtivo($row['ativo']);
            $imovel->setNegocioTipos($negocioTipos);
            $negocioTipos->setNome($row['nnome']);
            $negocioTipos->setValor($row['valor']);
            //$imovel->setImovelCaracteristicasImovelTipos($ImovelCaracteristicasImovelTipos);
            //$ImovelCaracteristicasImovelTipos->setValor($row['valor']);
            //$imovel->setCaracteristicas($caracteristicas);
            //$caracteristicas->setNome($row['cnome']);
            $imovel->setMidias($midias);
            $midias->setIdentificacao($row['midia_identificacao']);
            $midias->setNomeDisco($row['midia_nome_disco']);
            $midias->setCapa($row['midia_capa']);

            $imoveisENegocioTipoECaracteristicas[] = $imovel;
        }

        return $imoveisENegocioTipoECaracteristicas;
    }

    

    
    /**
     * Efetua a busca do numero de registros de pessoas
     * 
     * @return int
     */

    public function numRegistros() : int
    {
        
        $sql = "SELECT COUNT(nome_completo) as count FROM pessoas";

        $query = $this->getConexao()->query($sql)->fetch_assoc()["count"];

        return $query;
             
    }


     /**
     * Cria um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @return Imovel Objeto Imovel com dados preenchidos
     * @param Imovel $imovel Objeto Imovel com dados a serem preenchidos
     */
       public function create(Imovel $imovel) : Imovel
    {
        
        $sql = "INSERT INTO imoveis (imoveltipo_id,identificacao, matricula, inscricao_imobiliaria, logradouro,
                numero_logradouro, cep, rua, complemento, bairro, cidade, estado, ibge, ativo, criado, modificado, criador_id, modificador_id, metros_quadrados, quartos, banheiros, garagem)
                VALUES ('{$imovel->getImoveltipoId()}','{$imovel->getIdentificacao()}', '{$imovel->getMatricula()}', '{$imovel->getInscricaoImobiliaria()}',
                        '{$imovel->getLogradouro()}', '{$imovel->getNumeroLogradouro()}', '{$imovel->getCep()}',
                        '{$imovel->getRua()}', '{$imovel->getComplemento()}', '{$imovel->getBairro()}',
                        '{$imovel->getCidade()}', '{$imovel->getEstado()}', '{$imovel->getIbge()}', {$imovel->getAtivo()},
                        '{$imovel->getCriado()->format('Y-m-d H:i:s')}', '{$imovel->getModificado()->format('Y-m-d H:i:s')}',
                        {$imovel->getCriadorId()}, {$imovel->getModificadorId()}, '{$imovel->getMetrosQuadrados()}',
                        '{$imovel->getQuartos()}', '{$imovel->getBanheiros()}', '{$imovel->getVagasGaragem()}')";
        print_r($sql); 
        
         $this->getConexao()->query($sql);
        
         $imovel->setId($this->getInsertId());
         
         return $imovel;
    }

    /**
     * Retorna um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @param int $id   Código do imovel
     * @return Imovel
     * @throws \Exception
     */
    public function read(int $id) : Imovel
    {

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, it.nome as itnome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa, i.criador_id, i.modificador_id
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
        INNER JOIN midias m ON i.id = m.imovel_id
        WHERE i.id = '{$id}'";
        
        $qry = $this->getConexao()->query($sql);
        return (new Imovel())->hydrate(mysqli_fetch_assoc($qry));
    }
    
    /**
     * Edita um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Imovel $imovel Objeto Imovel
     * @return void
     */
    public function update(Imovel $imovel, int $id) : void
    {

        $sql = "UPDATE imoveis
                SET identificacao = '{$imovel->getIdentificacao()}',
                    matricula = '{$imovel->getMatricula()}',
        inscricao_imobiliaria = '{$imovel->getInscricaoImobiliaria()}',
                   logradouro = '{$imovel->getLogradouro()}',
            numero_logradouro = '{$imovel->getNumeroLogradouro()}', 
                          cep = '{$imovel->getCep()}',
                          rua = '{$imovel->getRua()}', 
                  complemento = '{$imovel->getComplemento()}', 
                       bairro = '{$imovel->getBairro()}',
                       cidade = '{$imovel->getCidade()}',
                       estado = '{$imovel->getEstado()}', 
                         ibge = '{$imovel->getIbge()}', 
                        ativo = '{$imovel->getAtivo()}', 
                       criado = '{$imovel->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$imovel->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = '{$imovel->getCriadorId()}', 
               modificador_id = '{$imovel->getModificadorId()}',
               metros_quadrados ='{$imovel->getMetrosQuadrados()}',
               quartos = '{$imovel->getQuartos()}',
               banheiros = '{$imovel->getBanheiros()}',
               garagem = '{$imovel->getVagasGaragem()}'
                
               WHERE id = '{$id}'";

            //print_r($sql); die;
        $this->getConexao()->query($sql);
    }
   
    /**
     * Deleta um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id) : void
    {

        $sql = "DELETE FROM imoveis
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }


    /**
     * Consulta o ultimo registro feito na tabela imoveis e retorna o id desse registro
     * 
     * @throws \Exception
     * @return int
     */
    public function getInsertId() : int
    {
        $sql = "SELECT LAST_INSERT_ID() AS id";
        $qry = $this->getConexao()->query($sql);
        $dados = mysqli_fetch_assoc($qry);

        return (int) $dados['id'];
    }
}
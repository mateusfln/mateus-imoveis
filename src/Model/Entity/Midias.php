<?php

namespace Imobiliaria\Model\Entity;

use Imobiliaria\Model\Entity\Tabela;
use Imobiliaria\Model\Imoveis\MidiasDAO;

class Midias extends Tabela
{
    private int $imovelId;
    private string $identificacao;
    private string $nomeDisco;
    private bool $capa;

    /**
     * Método para adicionar um arquivo na galeria do projeto e no banco de dados
     *
     * @param string $error
     * @param string $size
     * @param string $name
     * @param string $tmp_name
     * @param int $idImovel
     * @param string $section
     * @return void
     */
    public function AddArquivo(string $error, string $size, string $name, string $tmp_name, int $idImovel, string $section) : bool
    {

        if($error){
            echo('Falha ao enviar o arquivo');
        }
    
        if($size > 2097152){
            echo('Arquivo maior que o limite máximo de tamanho (2Mb)');
        }
    
        $pasta = "../../../../assets/images/imoveis/";
        $nomeDoArquivo = $name;
        $nomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $pasta.$nomeDoArquivo.".".$extensao;
        $caminho = "/assets/images/imoveis/".$nomeDoArquivo.'.'.$extensao;
        $sucesso = move_uploaded_file($tmp_name, $path);
        
        if($extensao != 'jpg' && $extensao != 'png' ){
            header('Location: https://mateusimoveis.local/src/View/adminCrud/'.$section.'/add.php?erro=tipo de midia não suportado, favor inserir uma midia com a extensão PNG ou JPG.');
            exit;
        }
        if($sucesso){
            $hoje = new \DateTimeImmutable();
    
            $midia = new Midias();
        
            $midia->setImovelId($idImovel);
            $midia->setIdentificacao($nomeDoArquivo);
            $midia->setNomeDisco($caminho);
            $midia->setCapa(false);
            $midia->setAtivo(true);
            $midia->setCriado($hoje);
            $midia->setCriadorId(1);
            $midia->setModificadorId(1);
            $midia->setModificado($hoje);
            $dbMidia = new MidiasDAO();
            $dbMidia->create($midia);
            $dbMidia->getInsertId();
            return true;
        }else{
            return false;
        }

    }


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
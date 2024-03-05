<?php

namespace Imobiliaria\Model;

class DAO
{
    /**
     * Conexão da base de dados
     */
    private \mysqli $conexao;

    public $request;


    /**
     * Construtor da classe
     * 
     * @param \Mysqli $conexao Conexão com o banco de dados MySQL
     * @return void
     * @throws \Exception Se a conexão com o banco de dados falhar.
     */
    public function __construct(\Mysqli $conexao = null)
    {
        $this->conexao = (is_null($conexao)) ? $this->connect() : $conexao;
        $this->request = $_GET;
    }

    /**
     * Efetua a conexão com a base de dados
     * 
     * @return \mysqli
     */
    public function connect() : \mysqli
    {
        require(realpath(dirname(__FILE__) . '/../../') . '/includes/conexao.php');

        $mysqli = new \mysqli($hostname, $user, $password, $db);
        if ($mysqli->connect_error) {
            throw new \Exception('Falha na conexão com a base de dados');
        }

        return $mysqli;
    }

    /**
     * Retorna o objeto de conexão
     * @return \mysqli
     */
    public function getConexao() : \mysqli
    {
        return $this->conexao;
    }

    /**
     * Encerra a conexão com a base de dados
     * @return void
     */
    public function __destruct()
    {
        mysqli_close($this->conexao);
    }

}
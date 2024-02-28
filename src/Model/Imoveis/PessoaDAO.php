<?php

class PessoaDAO extends DAO 
{
    public function create(Imovel $imovel)
    {
        $sql = "INSERT INTO imoveis (descricao, matricula, inscricao_imobiliaria, logradouro,
                            numero_logradouro, cep, rua, complemento, bairro, cidade, estado)
                VALUES ({$imovel->getDescricao()}, {$imovel->getMatricula()}, {$imovel->getInscricaoImobiliaria()},
                        {$imovel->getLogradouro()}, {$imovel->getNumeroLogradouro()}, {$imovel->getCep()},
                        {$imovel->getRua()}, {$imovel->getComplemento()}, {$imovel->getBairro()},
                        {$imovel->getCidade()}, {$imovel->getEstado()}) ";
        $this->getConexao()->query($sql);
    }
    
    public function update(Imovel $imovel, $id){

        $sql = "UPDATE imoveis
                SET descricao = '{$imovel->getDescricao()}',
                    matricula = '{$imovel->getMatricula()}',
        inscricao_imobiliaria = '{$imovel->getInscricaoImobiliaria()}',
                   logradouro = '{$imovel->getLogradouro()}',
            numero_logradouro = '{$imovel->getNumeroLogradouro()}', 
                          cep = '{$imovel->getCep()}',
                          rua = '{$imovel->getRua()}', 
                  complemento = '{$imovel->getComplemento()}', 
                       bairro = '{$imovel->getBairro()}',
                       cidade = '{$imovel->getCidade()}',
                       Estado = '{$imovel->getEstado()}') ";
        $this->getConexao()->query($sql);
    }
    public function read($id){

        $sql = "SELECT descricao, matricula, inscricao_imobiliaria, logradouro,
                numero_logradouro, cep, rua, complemento, bairro, cidade, estado
                FROM imoveis
                WHERE id = $id";
        $this->getConexao()->query($sql);
    }
    public function delete($id){

        $sql = "DELETE FROM imoveis
                WHERE id = $id";
        $this->getConexao()->query($sql);
    }
}
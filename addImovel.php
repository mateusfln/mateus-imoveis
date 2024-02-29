<?php 
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imoveltipos;
use Imobiliaria\Model\Entity\Midias;
use Imobiliaria\Model\Entity\NegocioTipos;
use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
use Imobiliaria\Model\Imoveis\MidiasDAO;
use Imobiliaria\Model\Imoveis\NegociotiposDAO;
use Imobiliaria\Model\Imoveis\ImovelDAO;
use Imobiliaria\Model\Imoveis\ImovelCaracteristicasImovelTiposDAO;

require_once(realpath(dirname(__FILE__) . '/includes') .'/funcoes.php');
$DAO = new DAO();
?>

<?php pr($_POST);pr($_FILES);?>
                <?php 
                if (isset($_FILES['arquivo'])){
                    $arquivo = $_FILES['arquivo'];
                    
                    
                    if($arquivo['error']){
                        echo('Falha ao enviar o arquivo');
                    }

                    if($arquivo['size'] > 2097152){
                        echo('Arquivo maior que o limite máximo de tamanho (2Mb)');
                    }
                    
                    $pasta = "assets/images/imoveis/";
                    $nomeDoArquivo = $arquivo['name'];
                    $nomeDoArquivo = uniqid();
                    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
                    $path = $pasta.$nomeDoArquivo.".".$extensao;
                    
                    if($extensao != 'jpg' && $extensao != 'png' ){
                        echo('Tipo de arquivo não aceito');
                    }else{
                        $sucesso = move_uploaded_file($arquivo['tmp_name'], $path);

                        if(!$sucesso){
                            // $sql = 
                            // "INSERT INTO imoveis (identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, cep,  rua, complemento, bairro, cidade, estado)
                            //  VALUES ('{$_POST['titulo']}, {$_POST['matricula']},
                            //           {$_POST['inscricao_imobiliaria']}, {$_POST['logradouro']},
                            //           {$_POST['numero_logradouro']}, {$_POST['cep']}, {$_POST['rua']},
                            //           {$_POST['complemento']}, {$_POST['baiiro']},
                            //           {$_POST['cidade']}, {$_POST['estado']}')
                            //  INSERT INTO midias (identificacao, nome_disco)
                            //  VALUES ('$nomeDoArquivo','$path')
                            //  INSERT INTO negociotipo (nome) VALUES ({$_POST['negocio_tipo']})
                            //  INSERT INTO imoveltipo (nome) VALUES ({$_POST['imoveltipo']})
                            //  INSERT INTO imoveis_caracteristicas_imoveistipo (valor) VALUES ({$_POST['preco']})";
                            // $query = $DAO->getConexao()->query($sql);    
                            echo "<p>falha ao enviar arquivo na hora de salvar</p>";
                        }
                    }
                }
                ?>

<?php

// public $caracteristicas;
// public $imovelCaracteristicasImovelTipos;
// public $negocioTipos;
// public $midias;

if(!empty($_POST)){
    print_r($_POST);
    $hoje = new \DateTimeImmutable();
    
    $imovel = new Imovel();
    $imoveltipos = new ImovelTipos();
    $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();
    $negociosTipos = new NegocioTipos();
    $midias = new Midias();

    $imovel->setIdentificacao($_POST['identificacao']);
    $imovel->setMatricula($_POST['matricula']);
    $imovel->setInscricaoImobiliaria($_POST['inscricao_imobiliaria']);
    $imovel->setLogradouro($_POST['logradouro']);
    $imovel->setNumeroLogradouro($_POST['numero_logradouro']);
    $imovel->setRua($_POST['rua']);
    $imovel->setComplemento($_POST['complemento']);
    $imovel->setBairro($_POST['bairro']);
    $imovel->setCidade($_POST['cidade']);
    $imovel->setEstado($_POST['estado']);
    $imovel->setCep($_POST['cep']);
    $imovel->setIbge($_POST['ibge']);
    $imovel->setAtivo(true);
    $imovel->setCriado($hoje);
    $imovel->setCriadorId(1);
    $imovel->setModificadorId(1);
    $imovel->setModificado($hoje);
    $dbImovel = new ImovelDAO();
    $dbImovel->create($imovel);
    

    $midias->setImovelId($imovel->getId());
    $midias->setNomeDisco($path);
    $midias->setIdentificacao($nomeDoArquivo);
    $midias->setCapa(1);
    $midias->setAtivo(true);
    $midias->setCriado($hoje);
    $midias->setCriadorId(1);
    $midias->setModificadorId(1);
    $midias->setModificado($hoje);

    $imovelCaracteristicasImovelTipos->setValor($_POST['preco']);
    $imovelCaracteristicasImovelTipos->setImovelId($imovel->getId());
    $imovelCaracteristicasImovelTipos->setAtivo(true);
    $imovelCaracteristicasImovelTipos->setCriado($hoje);
    $imovelCaracteristicasImovelTipos->setCriadorId(1);
    $imovelCaracteristicasImovelTipos->setModificadorId(1);
    $imovelCaracteristicasImovelTipos->setModificado($hoje);
    
    $negociosTipos->setNome($_POST['negociotipos']);
    $imoveltipos->setNome($_POST['imoveltipos']);
    

    
    $dbImovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTiposDAO();
    $dbImovelCaracteristicasImovelTipos->create($imovelCaracteristicasImovelTipos);
    $dbMidias = new MidiasDAO();
    $dbMidias->create($midias);
    
}

?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>

<body>
    
<div id="main-wrapper">
   
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Adicionar Imóveis</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Add Properties</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Add Properties section start-->
    <?php
    $listaImoveisTipos = new ImovelDAO();
    $listaImoveisTipos = $listaImoveisTipos->buscarListaDeImoveisTipo();
    $listaImoveis = new ImovelDAO();
    $listaImoveis = $listaImoveis->buscarListaDeImoveis(); 
    ?>
    <div class="add-properties-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="add-property-wrap col">
                    <ul class="add-property-tab-list nav mb-50">
                        <li class="working"><a href="#basic_info" data-bs-toggle="tab">1. Formulário de Cadastro</a></li>
                        <li><a href="#gallery_video" data-bs-toggle="tab">2. Fotos</a></li>
                    </ul>

                    <div class="add-property-form tab-content">

                        <div class="tab-pane show active" id="basic_info">
                            <div class="tab-body">

                                <form enctype="multipart/form-data" method="POST">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Titulo Do Anúncio</label>
                                            <input type="text" name="identificacao">
                                        </div>
                                        
                                        <div class="col-3 mb-30">
                                            <label>Matricula</label>
                                            <input type="text" name="matricula">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Inscrição imobiliaria</label>
                                            <input type="text" name="inscricao_imobiliaria">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Logradouro</label>
                                            <input type="text" name="logradouro">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Numero Logradouro</label>
                                            <input type="text" name="numero_logradouro">
                                        </div>
                                        <div class="col-4 mb-30">
                                            <label>Cep</label>
                                            <input type="text" name="cep">
                                        </div>
                                        <div class="col-4 mb-30">
                                            <label>IBGE</label>
                                            <input type="text" name="ibge">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Rua</label>
                                            <input type="text" name="rua">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Complemento</label>
                                            <input type="text" name="complemento">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bairro</label>
                                            <input type="text" name="bairro">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Cidade</label>
                                            <input type="text" name="cidade">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Estado</label>
                                            <select class="nice-select" name="estado">
                                                <?php foreach ($listaImoveis as $imovel):?>
                                                <option value="<?=$imovel->estado?>"><?=$imovel->estado?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Status</label>
                                            <select class="nice-select" name="negociotipos">
                                                <option value="Aluguel">Para Alugar</option>
                                                <option value="Venda">Para Vender</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Tipo</label>
                                            <select class="nice-select" name="imoveltipos">
                                                <?php foreach($listaImoveisTipos as $tipo):?>
                                                <option value="<?=$tipo->nome?>"><?=$tipo->nome?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label for="property_price">Preço<span>(BRL)</span></label>
                                            <input type="text" id="property_price" name="preco">
                                        </div>

                                        <div class="tab-pane" id="gallery_video">
                                        <div class="tab-body">
                                    
                                
                                        <div class="row">
                                        <div class="col-12 mb-30">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Imagens do Imóvel</label>
                                            <input class="form-control" type="file" id="formFile" name="arquivo">
                                            </div>
                                            
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <input type="submit" data-bs-toggle="tab" class="btn" value="Enviar">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Properties section end-->
</div>
 <!--Feature property section end-->
 <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/footer.php');?>

</div>
<!-- Placed js at the end of the document so the pages load faster -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/scripts.php');?>
</body>


<!-- Mirrored from htmldemo.net/khonike/khonike/add-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:18 GMT -->
</html>
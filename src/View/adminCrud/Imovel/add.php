<?php
require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Entity\ImovelNegociostipos;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;
use Imobiliaria\Model\Imoveis\ImovelCaracteristicasImovelTiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
use Imobiliaria\Model\Imoveis\ImovelDAO;
use Imobiliaria\Model\Imoveis\ImovelNegociotiposDAO;
use Imobiliaria\Model\Imoveis\NegociotiposDAO;

$imoveis = new ImovelDAO;

$imoveis = $imoveis->buscarListaDeImoveis();


$imoveltipos = new ImoveltiposDAO();
$imoveltipos = $imoveltipos->buscarListaDeImovelTipos();

$negociotipos = new NegociotiposDAO();
$negociotipos = $negociotipos->buscarListaDeNegocioTipos();

$caracteristicas = new CaracteristicaDAO();
$caracteristicas = $caracteristicas->buscarListaDeCaracteristicas();

$campos = array(
    'Identificacao',
    'Matricula',
    'inscricaoImobiliaria',
    'logradouro',
    'NumeroLogradouro',
    'Rua',
    'Complemento',
    'Bairro',
    'Cidade',
    'Estado',
    'Cep',
    'Ibge');

if(!empty($_POST) && !empty($_POST['negociotipo']) && !empty($_POST['valor']) ){

    $hoje = new \DateTimeImmutable();
    
    $imovel = new Imovel();

    $imovel->setIdentificacao($_POST['Identificacao']);
    $imovel->setMatricula($_POST['Matricula']);
    $imovel->setInscricaoImobiliaria($_POST['inscricaoImobiliaria']);
    $imovel->setLogradouro($_POST['logradouro']);
    $imovel->setNumeroLogradouro($_POST['NumeroLogradouro']);
    $imovel->setRua($_POST['Rua']);
    $imovel->setComplemento($_POST['Complemento']);
    $imovel->setBairro($_POST['Bairro']);
    $imovel->setCidade($_POST['Cidade']);
    $imovel->setEstado($_POST['Estado']);
    $imovel->setCep($_POST['Cep']);
    $imovel->setIbge($_POST['Ibge']);
    $imovel->setAtivo(true);
    $imovel->setCriado($hoje);
    $imovel->setCriadorId(1);
    $imovel->setModificadorId(1);
    $imovel->setModificado($hoje);
    $dbImovel = new ImovelDAO();
    $dbImovel->create($imovel);
    $idImovel = $dbImovel->getInsertId();
    
    $imovelNegociotipos = new ImovelNegociostipos();

    $imovelNegociotipos->setimovelId($idImovel);
    $imovelNegociotipos->setNegocioTipoId($_POST['negociotipo']);
    $imovelNegociotipos->setValor(0);
    $imovelNegociotipos->setAtivo(true);
    $imovelNegociotipos->setCriado($hoje);
    $imovelNegociotipos->setCriadorId(1);
    $imovelNegociotipos->setModificadorId(1);
    $imovelNegociotipos->setModificado($hoje);

    $dbImovelNegociotipos = new ImovelNegociotiposDAO();
    $dbImovelNegociotipos->create($imovelNegociotipos);

    foreach ($_POST['caracteristicas[]'] as $caracteristica){}

    $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();

    $imovelCaracteristicasImovelTipos->setimovelId($idImovel);
    $imovelCaracteristicasImovelTipos->setCaracteristicaImoveltipoId($_POST['caracteristicas[]']);
    $imovelCaracteristicasImovelTipos->setValor($_POST['valor']);
    $imovelCaracteristicasImovelTipos->setAtivo(true);
    $imovelCaracteristicasImovelTipos->setCriado($hoje);
    $imovelCaracteristicasImovelTipos->setCriadorId(1);
    $imovelCaracteristicasImovelTipos->setModificadorId(1);
    $imovelCaracteristicasImovelTipos->setModificado($hoje);

    $dbImovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTiposDAO();
    $dbImovelCaracteristicasImovelTipos->create($imovelCaracteristicasImovelTipos);
   
    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php');
}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/head.php');?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/headerSection.php');?>
<?php require_once(realpath(dirname(__FILE__) . '/../../../../includes/admin') .'/sidebarMenu.php');?>


    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="row mb-4">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                    <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                            <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                            <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                <p class="text-muted mb-0 mr-1 hover-cursor">Imóveis</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Create</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="card">
                                        <div class="col-12 d-flex">
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Cadastro de Imóveis</h4>
                                                            <?php foreach ($campos as $campo):?>
                                                                <?php if ($campo == 'Estado'):?>
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="col-form-label"><?=$campo?></label>
                                                                        <select class="form-control" name="<?=$campo?>">
                                                                            <?php foreach ($imoveis as $imovel):?>
                                                                                <option><?= $imovel->getEstado() ?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                <?php else:?>
                                                                    <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label"><?=$campo?></label>
                                                                    <input class="form-control" required type="text"name="<?=$campo?>">
                                                                </div>
                                                                <?php endif;?>
                                                            <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Tipo do Imóvel:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='imoveltipo'>
                                                                <?php foreach($imoveltipos as $imoveltipo):?>
                                                                <option value="<?=$imoveltipo->getId()?>" id="<?=$imoveltipo->getNome()?>" /><?=$imoveltipo->getNome()?></option>
                                                                <label for="<?=$imoveltipo->getNome()?>" class="col-form-label"><?=$imoveltipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Tipo de Negócio:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='negociotipo'>
                                                                <?php foreach($negociotipos as $negociotipo):?>
                                                                <option value="<?=$negociotipo->getId()?>" id="<?=$negociotipo->getNome()?>" /><?=$negociotipo->getNome()?></option>
                                                                <label for="<?=$negociotipo->getNome()?>" class="col-form-label"><?=$negociotipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Caracteristicas inclusas:</h4>
                                                            <div class="form-group">
                                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                                <input type="checkbox" name="caracteristicas[]" id="<?=$caracteristica->getNome()?>" value="<?=$caracteristica->getId()?>">
                                                                <label for="<?=$caracteristica->getNome()?>" class="col-form-label"><?=$caracteristica->getNome()?></label>
                                                                <br>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Valor</label>
                                                                <input class="form-control" required type="number" name="valor">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

    <!--=================================*
                  Footer Section
    *===================================-->
    <footer>
        <div class="footer-area">
            <p>&copy; Copyright <?= date("Y"); ?>. All right reserved. Template by Mateusfln.</p>
        </div>
    </footer>
    <!--=================================*
                End Footer Section
    *===================================-->

</div>
<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/scripts.php');?>
</body>
</html>


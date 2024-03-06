<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imoveltipos;
use Imobiliaria\Model\Entity\CaracteristicasImoveltipos;
use Imobiliaria\Model\Imoveis\CaracteristicasImoveltiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;

$caracteristicas = new CaracteristicaDAO();
$caracteristicas = $caracteristicas->buscarListaDeCaracteristicas();

if(!empty($_POST)){
    print_r($_POST);
    $hoje = new \DateTimeImmutable();
    
    $imoveltipo = new Imoveltipos();

    $imoveltipo->setNome($_POST['nome']);
    $imoveltipo->setAtivo(true);
    $imoveltipo->setCriado($hoje);
    $imoveltipo->setCriadorId(1);
    $imoveltipo->setModificadorId(1);
    $imoveltipo->setModificado($hoje);
    $dbImoveltipo = new ImoveltiposDAO();
    $dbImoveltipo->create($imoveltipo);
    $idImoveltipo = $dbImoveltipo->getInsertId();

    foreach ($_POST['caracteristicas'] as $caracteristica) {

        $caracteristicasImoveltipos = new CaracteristicasImoveltipos();

        $caracteristicasImoveltipos->setCaracteristicaId($caracteristica);
        $caracteristicasImoveltipos->setImovelTipoId($idImoveltipo);
        $caracteristicasImoveltipos->setAtivo(true);
        $caracteristicasImoveltipos->setCriado($hoje);
        $caracteristicasImoveltipos->setCriadorId(1);
        $caracteristicasImoveltipos->setModificadorId(1);
        $caracteristicasImoveltipos->setModificado($hoje);

        $dbCaracteristicaImoveltipo = new CaracteristicasImoveltiposDAO();
        $dbCaracteristicaImoveltipo->create($caracteristicasImoveltipos);
    }
    header('Location: https://mateusimoveis.local/src/View/adminCrud/TiposDeImovel/read.php');
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Tipos de Imóvel</p>
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
                                        <h4 class="card_title">Cadastro de Tipos de Imóvel</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nome</label>
                                            <input class="form-control" required type="text"name="nome">
                                        </div>
                                </div>
                            </div>
                            <div class="col-6 card">
                                <div class="card-body">
                                        <h4 class="card_title">Caracteristicas deste imovel:</h4>
                                        <div class="form-group">
                                            <?php foreach($caracteristicas as $caracteristica):?>
                                            <?php $nomePost = str_replace(' ', '_', $caracteristica->getNome()); ?>
                                            <input type="checkbox" name="caracteristicas[]" id="<?=$nomePost?>" value="<?=$caracteristica->getId()?>">
                                            <label for="<?=$nomePost?>" class="col-form-label"><?=$caracteristica->getNome()?></label>
                                            <br>
                                            <?php endforeach;?>
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


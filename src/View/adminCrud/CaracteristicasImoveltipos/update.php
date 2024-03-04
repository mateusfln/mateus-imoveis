<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\CaracteristicasImoveltiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;

if (empty(trim($_GET['id'])) || !is_numeric($_GET['id'])) {
    header('Location: https://mateusimoveis.local/src/View/adminCrud/CaracteristicasImoveltipos/read.php?error=Código da característica não informado');
    exit;
}

$imoveltipos = new ImoveltiposDAO();
$imoveltipos = $imoveltipos->buscarListaDeImovelTipos();
$caracteristicas = new CaracteristicaDAO();
$caracteristicas = $caracteristicas->buscarListaDeCaracteristicas();

$caracteristicaDao = new CaracteristicasImoveltiposDAO();
$caracteristica = $caracteristicaDao->read($_GET['id']);


if(!empty($_POST['caracteristica_id']) && !empty($_POST['imoveltipo_id'])){
    $hoje = new \DateTimeImmutable();
    $caracteristica->setCaracteristicaId($_POST['caracteristica_id']);
    $caracteristica->setImovelTipoId($_POST['imoveltipo_id']);
    $caracteristica->setAtivo(false);
    if(!empty($_POST['ativo'])){
        $caracteristica->setAtivo($_POST['ativo']);
    }
    $caracteristica->setModificadorId(1);
    $caracteristica->setModificado($hoje);
    
    $caracteristicaDao->update($caracteristica, $_GET['id']);
    header('Location: https://mateusimoveis.local/src/View/adminCrud/CaracteristicasImoveltipos/read.php');
    exit;

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Caracteristicas Imoveltipo</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Update</p>
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
                                        <h4 class="card_title">Cadastro de Caracteristicas Imoveltipo</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">ID da Caracteristica</label>
                                            <select class="form-control" name='caracteristica_id'>
                                                <?php foreach ($caracteristicas as $caracteristica):?>
                                                    <option value="<?=$caracteristica->id?>"/><?=$caracteristica->nome?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">ID do tipo de imovel</label>
                                            <select class="form-control" name='imoveltipo_id'>
                                                <?php foreach ($imoveltipos as $imoveltipo):?>
                                                    <option value="<?=$imoveltipo->id?>"/><?=$imoveltipo->nome?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ativo</label>
                                            <input class="ml-2" type="checkbox" name="ativo" <?= $caracteristica->getAtivo() ? ' checked="checked"' : ''?>>
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Editar</button>
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

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>


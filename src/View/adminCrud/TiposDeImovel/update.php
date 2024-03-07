<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\CaracteristicasImoveltiposDAO;
use Imobiliaria\Model\Entity\CaracteristicasImoveltipos;

if (empty(trim($_GET['id'])) || !is_numeric($_GET['id'])) {
    header('Location: http://localhost:8000/src/View/adminCrud/TiposDeImovel/read.php?error=Código da característica não informado');
    exit;
}

$caracteristicasDAO = new CaracteristicaDAO();
$caracteristicas = $caracteristicasDAO->buscarListaDeCaracteristicas();

$caracteristicasImoveltiposDao = new CaracteristicasImoveltiposDAO();
$caracteristicasImoveltipos = $caracteristicasImoveltiposDao->buscarListaDeCaracteristicasImovelTiposPorImovelTipo($_GET['id']);

$arrImoveltipos = [];

foreach ($caracteristicasImoveltipos as $imoveltipos) {
    $arrImoveltipos[] = $imoveltipos->getCaracteristicaId();
}

$imoveltipoDao = new ImoveltiposDAO();
$imoveltipo = $imoveltipoDao->read($_GET['id']);


if (!empty($_POST['nome'])) {
    $hoje = new \DateTimeImmutable();
    $imoveltipo->setNome($_POST['nome']);
    $imoveltipo->setAtivo(false);
    if (!empty($_POST['ativo'])) {
        $imoveltipo->setAtivo($_POST['ativo']);
    }
    $imoveltipo->setModificadorId(1);
    $imoveltipo->setModificado($hoje);

    $imoveltipoDao->update($imoveltipo, $_GET['id']);

    $caracteristicasImoveltiposDao->deletePorImovelTipo($_GET['id']);

    foreach ($_POST['caracteristicas'] as $caracteristica) {

        $caracteristicasImoveltipos = new CaracteristicasImoveltipos();

        $caracteristicasImoveltipos->setCaracteristicaId($caracteristica);
        $caracteristicasImoveltipos->setImovelTipoId($_GET['id']);
        $caracteristicasImoveltipos->setAtivo(true);
        $caracteristicasImoveltipos->setCriado($hoje);
        $caracteristicasImoveltipos->setCriadorId(1);
        $caracteristicasImoveltipos->setModificadorId(1);
        $caracteristicasImoveltipos->setModificado($hoje);

        $dbCaracteristicaImoveltipo = new CaracteristicasImoveltiposDAO();
        $dbCaracteristicaImoveltipo->create($caracteristicasImoveltipos);
    }

    header('Location: https://mateusimoveis.local/src/View/adminCrud/TiposDeImovel/read.php');
    exit;

}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<?php require_once(realpath(dirname(__FILE__) . '/../../includes') . '/head.php'); ?>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!--=========================*
         Page Container
*===========================-->
    <div id="page-container">

        <?php require_once(realpath(dirname(__FILE__) . '/../../includes') . '/headerSection.php'); ?>
        <?php require_once(realpath(dirname(__FILE__) . '/../../../../includes/admin') . '/sidebarMenu.php'); ?>


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
                                    <p class="text-muted mb-0 mr-1 hover-cursor">Update</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Progress Table start -->
                    <div class="col-12 mt-4">
                        <form action="" method="post">
                            <div class="card">
                                <div class="col-12 d-flex">
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Editar <?= $imoveltipo->getNome() ?></h4>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Nome</label>
                                                <input class="form-control" required type="text" name="nome"
                                                    value="<?= $imoveltipo->getNome() ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label">Ativo</label>
                                                <input class="ml-2" type="checkbox" name="ativo"
                                                    <?= $imoveltipo->getAtivo() ? ' checked="checked"' : '' ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 card">
                                        <div class="card-body">
                                            <h4 class="card_title">Caracteristicas:</h4>
                                            <div class="form-group">
                                                <?php foreach ($caracteristicas as $caracteristica): ?>
                                                    <?php $nomePost = str_replace(' ', '_', $caracteristica->getNome()); ?>
                                                    <input type="checkbox" name="caracteristicas[]" id="<?= $nomePost ?>"
                                                        value="<?= $caracteristica->getId() ?>"
                                                        <?= in_array($caracteristica->getId(), $arrImoveltipos) ? ' checked="checked"' : '' ?>>
                                                    <label for="<?= $nomePost ?>"
                                                        class="col-form-label"><?= $caracteristica->getNome() ?></label>
                                                    <br>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-inverse-success" type="submit"><i
                                        class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                <form action="" method="post">
                            </div>
                        </form>
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
            <p>&copy; Copyright
                <?= date("Y"); ?>. All right reserved. Template by Mateusfln.
            </p>
        </div>
    </footer>
    <!--=================================*
                End Footer Section
    *===================================-->

    </div>

    <?php require_once(realpath(dirname(__FILE__) . '/../../includes') . '/scripts.php'); ?>

</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->

</html>
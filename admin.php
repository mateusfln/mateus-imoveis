<?php 
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;

$imoveis = new ImovelDAO();
$imoveis = $imoveis->buscarListaDeImoveis();

if(!empty($_POST['delete_id'])){
    $dbNegociotipo = new ImovelDAO();
    $dbNegociotipo->delete($_POST['delete_id']);
    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php');
}

?>

<!DOCTYPE html>
<html lang="zxx">


<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/head.php');?>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/headerSection.php');?>
<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/sidebarMenu.php');?>


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
                                <p class="text-muted mb-0 mr-1 hover-cursor">App</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 hover-cursor">Analytics</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card_title">
                                Tabela de Imóveis <a href="/src/View/adminCrud/imovel/add.php"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
                            </h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover progress-table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Identificação</th>
                                            <th scope="col">Matricula</th>
                                            <th scope="col">Inscrição Imobiliária</th>
                                            <th scope="col">Logradouro</th>
                                            <th scope="col">Numero Logradouro</th>
                                            <th scope="col">Rua</th>
                                            <th scope="col">Bairro</th>
                                            <th scope="col">Cidade</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Cep</th>
                                            <th scope="col">Ibge</th>
                                            <th scope="col">Ativo</th>
                                            <th scope="col">Criado</th>
                                            <th scope="col">Modificado</th>
                                            <th scope="col">Criador ID</th>
                                            <th scope="col">Modificador ID</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach($imoveis as $imovel):?>
                                        <tr>
                                        <th scope="row"><?=$imovel->getId()?></th>
                                            <td><?=$imovel->getIdentificacao()?></td>
                                            <td><?=$imovel->getMatricula()?></td>
                                            <td><?=$imovel->getInscricaoImobiliaria()?></td>
                                            <td><?=$imovel->getLogradouro()?></td>
                                            <td><?=$imovel->getNumeroLogradouro()?></td>
                                            <td><?=$imovel->getRua()?></td>
                                            <td><?=$imovel->getBairro()?></td>
                                            <td><?=$imovel->getCidade()?></td>
                                            <td><?=$imovel->getEstado()?></td>
                                            <td><?=$imovel->getCep()?></td>
                                            <td><?=$imovel->getIbge()?></td>
                                            <td><?=$imovel->getAtivo()?></td>
                                            <td><?=$imovel->getCriado()->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel->getModificado()->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel->getCriadorId()?></td>
                                            <td><?=$imovel->getModificadorId()?></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=<?= $imovel->getId()?>&identificacao=<?= $imovel->getIdentificacao()?>" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="<?=$imovel->getId()?>">
                                                        <li class="mr-3"><button type="submit" class="btn btn-inverse-danger"><i class="bi bi-trash mr-1"></i>Delete</button></li>
                                                    </form>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                        </tbody>
                                    </table>
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
<!--=========================*
        End Page Container
*===========================-->
</body>


<script src="adminAssets/js/jquery.min.js"></script>
<!-- bootstrap 4 js -->
<script src="adminAssets/js/popper.min.js"></script>
<script src="adminAssets/js/bootstrap.min.js"></script>
<!-- Owl Carousel Js -->
<script src="adminAssets/js/owl.carousel.min.js"></script>
<!-- Metis Menu Js -->
<script src="adminAssets/js/metisMenu.min.js"></script>
<!-- SlimScroll Js -->
<script src="adminAssets/js/jquery.slimscroll.min.js"></script>
<!-- Slick Nav -->
<script src="adminAssets/js/jquery.slicknav.min.js"></script>
<!-- ========== This Page js ========== -->

<!--Chart Js-->
<script src="adminAssets/vendors/charts/charts-bundle/Chart.bundle.js"></script>

<!-- Flot Chart -->
<script src="adminAssets/vendors/charts/flot/jquery.flot.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.resize.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.categories.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.fillbetween.js"></script>
<script src="adminAssets/vendors/charts/flot/jquery.flot.stack.js"></script>
<script src="adminAssets/vendors/charts/float-bundle/jquery.flot.pie.js"></script>

<!--Home Script-->
<script src="adminAssets/js/home.js"></script>

<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="adminAssets/js/main.js"></script>
<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/scripts.php');?>


</html>

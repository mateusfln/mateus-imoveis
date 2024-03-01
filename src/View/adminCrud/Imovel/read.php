<?php 
require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;

$imoveis = new ImovelDAO();
$imoveis = $imoveis->buscarListaDeImoveis();

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Read</p>
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
                                Tabela de Imóveis <a href="/src/View/adminCrud/Midias/add.php"><button type="button" class="btn btn-inverse-success ml-3"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button></a>
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
                                            <th scope="row"><?=$imovel->id?></th>
                                            <td><?=$imovel->identificacao?></td>
                                            <td><?=$imovel->matricula?></td>
                                            <td><?=$imovel->inscricaoImobiliaria?></td>
                                            <td><?=$imovel->logradouro?></td>
                                            <td><?=$imovel->numeroLogradouro?></td>
                                            <td><?=$imovel->rua?></td>
                                            <td><?=$imovel->bairro?></td>
                                            <td><?=$imovel->cidade?></td>
                                            <td><?=$imovel->estado?></td>
                                            <td><?=$imovel->cep?></td>
                                            <td><?=$imovel->ibge?></td>
                                            <td><?=$imovel->ativo?></td>
                                            <td><?=$imovel->criado->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel->modificado->format('Y-m-d H:i:s')?></td>
                                            <td><?=$imovel->criadorId?></td>
                                            <td><?=$imovel->modificadorId?></td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="/src/View/adminCrud/Imovel/update.php?id=<?= $imovel->id?>&identificacao=<?= $imovel->identificacao?>" class="btn btn-inverse-warning"><i class="bi bi-pencil-square mr-1"></i>Edit</a></li>
                                                    <form method="POST">
                                                        <input type="hidden" name="delete_id" value="<?=$imovel->id?>">
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
<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/scripts.php');?>
</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>

<?php 
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;

$imoveis = new ImovelDAO();
$imoveis = $imoveis->buscarListaDeImoveis();

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/head.php');?>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

    <!--==================================*
               Header Section
    *====================================-->
    <div class="header-area">

        <!--======================*
                   Logo
        *=========================-->
        <div class="header-area-left">
            <a href="index.html" class="logo">
                <span>
                    <img src="https://rtsolutz.com/vizzstudio/demo-falr/falr/assets/images/logo.svg" alt="" height="18">
                </span>
                <i>
                    <img src="https://rtsolutz.com/vizzstudio/demo-falr/falr/assets/images/logo-collapsed.svg" alt="" height="22">
                </i>
            </a>
        </div>
        <!--======================*
                  End Logo
        *=========================-->

        <div class="row align-items-center header_right">
            <!--==================================*
                     Navigation and Search
            *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
                <div class="nav-btn button-menu-mobile pull-left">
                    <button class="open-left waves-effect">
                        <i class="ion-android-menu"></i>
                    </button>
                </div>
                <div class="search-box pull-left">
                    <form action="#">
                        <i class="ti-search"></i>
                        <input type="text" name="search" placeholder="Search..." required="">
                    </form>
                </div>
            </div>
            <!--==================================*
                     End Navigation and Search
            *====================================-->
            <!--==================================*
                     Notification Section
            *====================================-->
            <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                    <li class="mobile_menu_btn">
                        <span class="nav-btn pull-left d_none_lg">
                            <button class="open-left waves-effect">
                                <i class="ion-android-menu"></i>
                            </button>
                        </span>
                    </li>
                     
                    <li id="full-view" class="d_none_sm"><i class="feather ft-maximize"></i></li>
                    <li id="full-view-exit" class="d_none_sm"><i class="feather ft-minimize"></i></li>
                    <li class="user-dropdown">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/user.jpg" alt="" class="img-fluid">
                            </button>
                            <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="user_img mb-3">
                                        <img src="../assets/images/user.jpg" alt="User Image">
                                    </div>
                                    <div class="user_bio text-center">
                                        <p class="name font-weight-bold mb-0">Monica Jhonson</p>
                                        <p class="email text-muted mb-3"><a class="pl-3 pr-3" href="monica%40jhon.co.html">monica@jhon.co.uk</a></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html"><i class="ti-user"></i> Profile</a>
                                <span role="separator" class="divider"></span>
                                <a class="dropdown-item" href="login.html"><i class="ti-power-off"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--==================================*
                     End Notification Section
            *====================================-->
        </div>

    </div>
    <!--==================================*
               End Header Section
    *====================================-->

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
                                <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                                <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
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
                                Tabela de Imóveis
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
                                                    <li class="mr-3"><button type="button" class="btn btn-inverse-info">View</button></li>
                                                    <li class="mr-3"><button type="button" class="btn btn-inverse-warning">Edit</button></li>
                                                    <li class="mr-3"><button type="button" class="btn btn-inverse-danger">Delete</button></li>
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
<?php require_once(realpath(dirname(__FILE__) . '/includes/admin') .'/scripts.php');?>

</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>

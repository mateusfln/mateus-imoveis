<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Imoveis\ImovelDAO;

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>

    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Falr - Bootstrap 4 Admin Dashboard Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>Falr - Bootstrap 4 Admin Dashboard Template</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="/../../../../adminAssets/images/favicon.png">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/bootstrap.min.css">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/style.css">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="/../../../../adminAssets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="/../../../../adminAssets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/font-awesome.min.css">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/themify-icons.css">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="/../../../../adminAssets/css/ionicons.min.css" rel="stylesheet"/>

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/et-line.css" rel="stylesheet"/>

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/feather.css" rel="stylesheet"/>

    <!--=========================*
              Flag Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/flag-icon.min.css" rel="stylesheet"/>

    <!--=========================*
              Material Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/materialdesignicons.min.css" rel="stylesheet"/>

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="/../../../../adminAssets/js/modernizr-2.8.3.min.js"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/metisMenu.css">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/css/slicknav.min.css">
    
    <!--=========================*
              Flag Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/flag-icon.min.css" rel="stylesheet"/>

    <!--=========================*
              Material Icons
    *===========================-->
    <link href="/../../../../adminAssets/css/materialdesignicons.min.css" rel="stylesheet"/>

    <!--=========================*
               AM Chart
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/vendors/am-charts/css/am-charts.css" type="text/css" media="all" />

    <!--=========================*
               Morris Css
    *===========================-->
    <link rel="stylesheet" href="/../../../../adminAssets/vendors/charts/morris-bundle/morris.css">

    <!--=========================*
           J Vector Map Css
    *===========================-->
    <link href="/../../../../adminAssets/vendors/j-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Font USE: 'Roboto', sans-serif;-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

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

            <?php 
            
            if(!empty($_POST)){
                print_r($_POST);
                $hoje = new \DateTimeImmutable();
                
                $imovel = new Imovel();
            
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
            }
            
            ?>
            
            <div class="row">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="Admin.php" method="post">
                                        <h4 class="card_title">Cadastro de Imóveis</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Identificacao</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Matricula</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">inscrição Imobiliaria</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">logradouro</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Numero Logradouro</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Rua</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Complemento</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Bairro</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Cidade</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Estado</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Cep</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ibge</label>
                                            <input class="form-control" type="text" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ativo</label>
                                            <input class="" type="checkbox" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <input class=" btn btn-inverse-success" type="submit" id="example-text-input">
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

<script src="/../../../../adminAssets/js/jquery.min.js"></script>
<script src="/../../../../adminAssets/js/popper.min.js"></script>
<script src="/../../../../adminAssets/js/bootstrap.min.js"></script>
<script src="/../../../../adminAssets/js/owl.carousel.min.js"></script>
<script src="/../../../../adminAssets/js/metisMenu.min.js"></script>
<script src="/../../../../adminAssets/js/jquery.slimscroll.min.js"></script>
<script src="/../../../../adminAssets/js/jquery.slicknav.min.js"></script>
<script src="/../../../../adminAssets/vendors/charts/charts-bundle/Chart.bundle.js"></script>
<script src="/../../../../adminAssets/vendors/charts/flot/jquery.flot.js"></script>
<script src="/../../../../adminAssets/vendors/charts/flot/jquery.flot.resize.js"></script>
<script src="/../../../../adminAssets/vendors/charts/flot/jquery.flot.categories.js"></script>
<script src="/../../../../adminAssets/vendors/charts/flot/jquery.flot.fillbetween.js"></script>
<script src="/../../../../adminAssets/vendors/charts/flot/jquery.flot.stack.js"></script>
<script src="/../../../../adminAssets/vendors/charts/float-bundle/jquery.flot.pie.js"></script>
<script src="/../../../../adminAssets/js/home.js"></script>
<script src="/../../../../adminAssets/js/main.js"></script>
</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>
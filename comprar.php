<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
// $imoveis = new ImovelDAO();
// $imoveis = $imoveis->buscarListaDeImoveisENegocioTipoECaracteristicasImovelTiposECaracteristicasEMidias();

$imoveisDAO = new ImovelDAO();
$imovel = $imoveisDAO->read($_GET['id']);

$estados = new ImovelDAO();
$estados = $estados->buscarListaDeEstados();

$tipos = new ImoveltiposDAO();
$tipos = $tipos->buscarListaDeImovelTipos();

$estados = new ImovelDAO();
$estados = $estados->buscarListaDeEstados();
?>





<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/khonike/khonike/single-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:07 GMT -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>
<body>
    
<div id="main-wrapper">
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>
    <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(assets/images/bg/single-property-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Imóveis</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active"><?=$imovel->getIdentificacao()?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!--Page Banner Section end-->

    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                               
                                <div class="head">
                                    <div class="left">
                                        <h1 class="title"><?=$imovel->getIdentificacao()?></h1>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt=""><?=$imovel->getRua()?>, <?=$imovel->getBairro()?>, <?=$imovel->getEstado()?></span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price"><?= $imovel->imovelCaracteristicasImovelTipos->getValor()?>
                                            <?php if ($imovel->negocioTipos->getNome() == 'Venda'):?>
                                                <?php  echo '<span>Mil</span>'?>
                                            <?php else:?>
                                                <?php  echo '<span>Mês</span>'?>
                                            <?php endif;?>
                                            </span>
                                            <span class="type"><?=$imovel->negocioTipos->getNome()?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="image mb-30">
                                    <img src="<?=$imovel->midias->getNomeDisco()?>" alt="<?=$imovel->midias->getIdentificacao()?>">
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p>Khonike - Real Estate Bootstrap 5 Templateipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor nt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                                <div class="property-search sidebar-property-search">

                            <form action="https://wa.me/5548998100686">

                                <div>
                                    <button>Enviar Mensagem para o corretor</button>
                                </div>

                            </form>

                        </div>
                            </div>
                        </div>
                        <!--Property end-->
                    </div>
                </div>
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                <div class="content">
                                    
                    <h3>Description</h3>
                    
                    <p>Khonike - Real Estate Bootstrap 5 Templateipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo.</p>
                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor nt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu.</p>
                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->
    <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/footer.php');?>
</div>

<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/scripts.php');?>

</body>


<!-- Mirrored from htmldemo.net/khonike/khonike/single-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:08 GMT -->
</html>
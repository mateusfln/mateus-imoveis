<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;

require_once(realpath(dirname(__FILE__) . '/') . '/src/Model/Imoveis/ImovelDAO.php');
require_once(realpath(dirname(__FILE__) . '/includes') .'/funcoes.php');

$imoveis = new ImovelDAO();
$imoveis = $imoveis->findAll();

?>

<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/khonike/khonike/properties-list-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:07 GMT -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>


<body>
    
<div id="main-wrapper">
   
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>

    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Admin</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Admin</li>
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
            
                <div class="col-lg-8 col-12 order-1 mb-sm-50 mb-xs-50">
                    <div class="row">
                            <?php foreach($imoveis as $imovel):?>
                        <!--Property start-->
                        <div class="property-item list col-md-6 col-12 mb-40">
                            <div class="property-inner">
                                <div class="image">
                                    <a href="single-properties.html"><img src="<?= $imovel->midias->nomeDisco?>" alt="<?= $imovel->midias->identificacao?>"></a>
                                    <ul class="property-feature">
                                        <li>
                                            <span class="area"><img src="assets/images/icons/area.png" alt="">550 SqFt</span>
                                        </li>
                                        <li>
                                            <span class="bed"><img src="assets/images/icons/bed.png" alt="">6</span>
                                        </li>
                                        <li>
                                            <span class="bath"><img src="assets/images/icons/bath.png" alt="">4</span>
                                        </li>
                                        <li>
                                            <span class="parking"><img src="assets/images/icons/parking.png" alt="">3</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="title"><a href="single-properties.html"><?= $imovel->identificacao?></a></h3>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt=""><?= $imovel->rua. ", " .$imovel->bairro.", ".$imovel->cidade.", ".$imovel->estado ?></span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                        <span class="price">R$<?= $imovel->imovelCaracteristicasImovelTipos->valor?>
                                           <?php if($imovel->negocioTipos->nome == 'Aluguel'):?>
                                               <span>M</span>
                                               <?php else:?>
                                               <span>Mil</span>
                                           <?php endif;?>
                                       </span>
                                       <span class="type"><?= $imovel->negocioTipos->nome?></span>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <p>Friuli-Venezia Giflia is the best theme for elit, sed door dolor sit amet, conse ctetur adipiscing elit, sed do eiud in tempor incididun</p>
                                    </div>
                                    <a href="single-properties.html" class="read-more">View Property</a>
                                    <a href="single-properties.html" class="read-more">Edit Property</a>
                                    <a href="single-properties.html" class="read-more">Delete</a>
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                        <?php endforeach;?>
                    </div>

                    <div class="row mt-20">
                        <div class="col">
                            <ul class="page-pagination">
                                <li><a href="#"><i class="fa fa-angle-left"></i> Prev</a></li>
                                <li class="active"><a href="#">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                                <li><a href="#">04</a></li>
                                <li><a href="#">05</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Search Property</span><span class="shape"></span></h4>
                        
                    
                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">

                            <form action="#">

                                <div>
                                    <input type="text" placeholder="Location">
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>All Cities</option>
                                        <option>Athina</option>
                                        <option>Austin</option>
                                        <option>Baytown</option>
                                        <option>Brampton</option>
                                        <option>Cedar Hill</option>
                                        <option>Chester</option>
                                        <option>Chicago</option>
                                        <option>Coleman</option>
                                        <option>Corpus Christi</option>
                                        <option>Dallas</option>
                                        <option>distrito federal</option>
                                        <option>Fayetteville</option>
                                        <option>Galveston</option>
                                        <option>Jersey City</option>
                                        <option>Los Angeles</option>
                                        <option>Midland</option>
                                        <option>New York</option>
                                        <option>Odessa</option>
                                        <option>Reno</option>
                                        <option>San Angelo</option>
                                        <option>San Antonio</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>For Rent</option>
                                        <option>For Sale</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Type</option>
                                        <option>Apartment</option>
                                        <option>Cafe</option>
                                        <option>House</option>
                                        <option>Restaurant</option>
                                        <option>Store</option>
                                        <option>Villa</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div>
                                    <select class="nice-select">
                                        <option>Bathrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                </div>

                                <div>
                                    <div id="search-price-range"></div>
                                </div>

                                <div>
                                    <button>search</button>
                                </div>

                            </form>

                        </div>
                        <!--Property Search end-->
                        
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Add Property</span><span class="shape"></span></h4>
                        
                    
                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">

                            <form action="/addImovel.php">
                                <div>
                                    <button>Add</button>
                                </div>

                            </form>
                        </div>
                        <!--Property Search end-->
                    </div>
                    <!--Sidebar end-->
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


<!-- Mirrored from htmldemo.net/khonike/khonike/properties-list-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:07 GMT -->
</html>
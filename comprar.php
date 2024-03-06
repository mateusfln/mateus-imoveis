<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;
$imoveis = new ImovelDAO();
$imoveis = $imoveis->buscarListaDeImoveisENegocioTipoECaracteristicasImovelTiposECaracteristicasEMidias();
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
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><?=$_GET['imovelNome']?></li>
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
                                        <h1 class="title">Friuli-Venezia Giulia</h1>
                                        <span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">$550<span>Month</span></span>
                                            <span class="type">For Rent</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="image mb-30">
                                    <img src="assets/images/property/single-property-1.jpg" alt="">
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p>Khonike - Real Estate Bootstrap 5 Templateipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor nt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu.</p>
                                    <p>Khonike - Real Estate Bootstrap 5 Templateis the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore gna iqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                    </div>
                </div>
                
                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">
                    
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
                        
                    </div>
                    <!--Sidebar end-->
                    
                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Feature Property</span><span class="shape"></span></h4>
                        
                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">
                            <?php foreach($imoveis as $imovel)?>
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type"><?=$imovel->negocioTipos->nome?></span>
                                    <a href="single-properties.html"><img src="assets/images/property/sidebar-property-1.jpg" alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span>
                                    <span class="price">$550 <span>Month</span></span>
                                </div>
                            </div>
                            
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">For Sale</span>
                                    <a href="single-properties.html"><img src="assets/images/property/sidebar-property-2.jpg" alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Marvel de Villa</a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span>
                                    <span class="price">$2550</span>
                                </div>
                            </div>
                            
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">For Rent</span>
                                    <a href="single-properties.html"><img src="assets/images/property/sidebar-property-3.jpg" alt=""></a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt="">215 L AH Rod, California</span>
                                    <span class="price">$550 <span>Month</span></span>
                                </div>
                            </div>
                            
                        </div>
                        <!--Sidebar Property end-->
                        
                    </div>
                    
                    
                        
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
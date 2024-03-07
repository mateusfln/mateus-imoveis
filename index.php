<?php 
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;
require_once(realpath(dirname(__FILE__) . '/includes') .'/funcoes.php');
?>

<?php
 $imoveis = new ImovelDAO();
 $imoveis = $imoveis->findAll();

 $estados = new ImovelDAO();
 $estados = $estados->buscarListaDeEstados();

 //pr($imoveis); die;
 $imoveisAVenda = new ImovelDAO();
 $imoveisAVenda = $imoveisAVenda->buscarListaDeImoveisVenda();
 $imoveisAAluguel = new ImovelDAO();
 $imoveisAAluguel = $imoveisAAluguel->buscarListaDeImoveisAluguel();
 $imoveisTipos = new ImovelDAO();
 $imoveisTipos = $imoveisTipos->buscarListaDeImoveisTipo();
 $negociosTipos = new ImovelDAO();
 $negociosTipos = $negociosTipos->buscarListaDeNegociosTipo();

 $imoveisNossosServicos = new ImovelDAO();
 $imoveisNossosServicos = $imoveisNossosServicos->findAllNoFilters();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>
<body>
    
<div id="main-wrapper">
   
    <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>
    
    <!--slider section start-->
    <div class="hero-section section position-relative">
           
        <!--Hero Item start-->
        <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/hero/hero-1.jpg); height:600px">
                <div class="container">
                <div class="row">
                    <div class="col-12">
                       
                        <!--Hero Content start-->
                        <div class="hero-content mt-5">

                            <h3>QUER ALUGAR OU COMPRAR UMA MORADIA ?</h3>
                            <h1><span>Mateus Imóveis</span> Resolve seus problemas</h1>

                        </div>
                        <!--Hero Content end-->
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!--Hero Item end-->
        
    </div>
    <!--slider section end-->

    <!--Search Section start-->
    <div class="search-section section pt-0 pt-sm-60 pt-xs-50 ">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row d-flex d-lg-none">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Find Your Home</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <div class="col-12">

                    <!--Hero Search start-->
                    <div class="hero-search">

                        <form method="GET">

                            <div>
                                <h4>Pretensão</h4>
                                <select class="nice-select" name="pretensao">
                                <option value="">Todos</option>
                                <?php foreach($negociosTipos as $tipo): ?>
                                        <option value="<?= $tipo->getNome() ?>"><?= $tipo->getNome() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <h4>Tipo</h4>
                                <select class="nice-select" name="tipo">
                                    <option value="">Todos</option>
                                    <?php foreach($imoveisTipos as $tipo): ?>
                                        <option value="<?= $tipo->getNome() ?>"><?= $tipo->getNome() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <h4>Estado</h4>
                                <select class="nice-select" name="estado">
                                <option value="">Todos</option>
                                    <?php foreach($estados as $estado): ?>
                                    <option value="<?= $estado->getEstado() ?>"><?= $estado->getEstado() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <!-- <div>
                            <div class="d-flex flex-column justify-content-between gap-3">
                            <h4>Pesquisar</h4>
                            
                            <div class="form-outline" data-mdb-input-init>
                                <input id="search-input" type="search" id="form1" class="" placeholder="Digite região, bairro, cidade etc." />
                            </div>
                            </div>
                            </div> -->
                            

                            <div>
                               <h4>Buscar</h4>
                                <div class="submit">
                                    <button>Clique aqui</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!--Hero Search end-->

                </div>
            </div>
            
        </div>
    </div>
    <!--Search Section end-->

    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Propriedades para alugar</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <!--Property start-->
                <?php foreach($imoveis as $imovel):?>

                   
                <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <a href="comprar.php?id=<?=$imovel->getId()?>"><img src="<?= $imovel->midias->getNomeDisco()?>" alt="<?= $imovel->midias->getIdentificacao()?>"></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="assets/images/icons/area.png" alt=""><?= $imovel->getMetrosQuadrados()?></span>
                                </li>
                                <li>
                                    <span class="bed"><img src="assets/images/icons/bed.png" alt=""><?= $imovel->getQuartos()?></span>
                                </li>
                                <li>
                                    <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?= $imovel->getBanheiros()?></span>
                                </li>
                                <li>
                                    <span class="parking"><img src="assets/images/icons/parking.png" alt=""><?= $imovel->getVagasGaragem()?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="content" >
                            <div class="left">
                                <h3 class="title"><a href="comprar.php?id=<?=$imovel->getId()?>"><?= $imovel->getIdentificacao()?></a></h3>
                                <span class="location"><img src="assets/images/icons/marker.png" alt=""><?= $imovel->getRua(). ", " .$imovel->getBairro().", ".$imovel->getCidade().", ".$imovel->getEstado() ?></span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">R$<?= $imovel->negocioTipos->getValor()?>
                                        <?php if($imovel->negocioTipos->getNome() == 'Aluguel'):?>
                                            <span>M</span>
                                            <?php else:?>
                                            <span>Mil</span>
                                        <?php endif;?>
                                    </span>
                                    <span class="type"><?= $imovel->negocioTipos->getNome()?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!--Property end-->
            </div>
            
            
        </div>
    </div>
    <!--New property section end-->

    <!--Services section start-->
    <div id="nossosservissos" class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
        
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Nossos Serviços</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row row-30 align-items-center">
                <div class="col-lg-5 col-12 mb-30">
                    <div class="property-slider-2">
                        
                        <?php foreach($imoveisNossosServicos as $imovel):?>
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="comprar.php?id=<?=$imovel->getId()?>" class="image"><img src="<?= $imovel->midias->getNomeDisco()?>" alt="<?= $imovel->midias->getIdentificacao()?>"></a>
                                <div class="content">
                                    <h4 class="title"><a href="comprar.php?id=<?=$imovel->getId()?>"><?= $imovel->getIdentificacao()?></a></h4>
                                    <span class="location"><?= $imovel->getRua(). ", " .$imovel->getBairro().", ".$imovel->getCidade().", ".$imovel->getEstado() ?></span>
                                    <h4 class="type"><?= $imovel->negocioTipos->getNome()?> <span>R$<?= $imovel->imovelCaracteristicasImovelTipos->getValor()?>
                                     <?php if($imovel->negocioTipos->getNome() == 'Aluguel'):?>
                                        <span>Mês</span>
                                        <?php else:?>
                                        <span>Mil</span>
                                        <?php endif;?>
                                    </span></h4>
                                    <ul>
                                        <li><?= $imovel->caracteristicas->getNome() ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row row-20">

                    <?php 
                    $textos = 
                    [
                        ['titulo' => 'Comprar ', 'descricao'=> 'Khonike - Real Estate Bootstrap 5 Template best theme for elit, seddo eiumod tempor dolor sit.'],
                        ['titulo' => 'Vender ', 'descricao'=> 'Khonike - Real Estate Bootstrap 5 Template best theme for elit, seddo eiumod tempor dolor sit.'],
                        ['titulo' => 'Alugar ', 'descricao'=> 'Khonike - Real Estate Bootstrap 5 Template best theme for elit, seddo eiumod tempor dolor sit.']
                    ]
                    ?>
                        <?php foreach($textos as $texto):?>
                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="assets/images/service/service-1.png" alt=""></div>
                                        <h4><?= $texto['titulo']?></h4>
                                    </div>
                                    <div class="content">
                                        <p><?= $texto['descricao']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Services section end-->

    <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!--CTA start-->
                    <div class="cta-content text-center">
                        <h1>Quer <span>Comprar</span> ou <span>Vender</span> Uma nova propriedade ?<br> Faça isso em segundos com <span>Mateus Imóveis</span></h1>
                        <div class="buttons">
                            <?php
                            /*
                            @todo Fazer uma verificação de sessão para caso o usuario nao estiver logado ele seja redirecionado para tela de login
                            */
                            ?>
                            <a href="addImovel.php">Cadastrar Propriedades</a>
                            <a href="#">Pesquisar Propriedades</a>
                        </div>
                    </div>
                    <!--CTA end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->

    <!--Feature property section start-->
    <div id="imoveisalugar" class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Imóveis para Alugar</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section slider-space-30">

                    <!--Property start-->
                    <?php foreach ($imoveisAAluguel as $imovel):?>
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="comprar.php?id=<?=$imovel->getId()?>"><img src="<?= $imovel->midias->getNomeDisco()?>" alt="<?= $imovel->midias->getIdentificacao()?>"></></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png" alt=""><?=$imovel->getMetrosQuadrados()?></span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png" alt=""><?=$imovel->getQuartos()?></span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?=$imovel->getBanheiros()?></span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png" alt=""><?=$imovel->getVagasGaragem()?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="comprar.php?id=<?=$imovel->getId()?>"><?= $imovel->getIdentificacao()?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?= $imovel->getRua(). ", " .$imovel->getBairro().", ".$imovel->getCidade().", ".$imovel->getEstado() ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">R$<?= $imovel->imovelCaracteristicasImovelTipos->getValor()?><span>M</span></span>
                                        <span class="type"><?= $imovel->negocioTipos->getNome()?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <!--Property end-->
                </div>
                <!--Property Slider end-->
                
            </div>
        </div>
    </div>
    <!--Feature property section end-->

    <!--CTA Section start-->
    <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url(assets/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <!--CTA start-->
                    <div class="cta-content text-center">
                        <h1>Ainda não possui uma <span>Conta</span> ? <br> Crie sua conta agora no <span>Mateus Imóveis</span></h1>
                        <div class="buttons">
                            <a href="loginRegister.php">Fazer Cadastro</a>
                        </div>
                    </div>
                    <!--CTA end-->
                    
                </div>
            </div>
        </div>
    </div>
    <!--CTA Section end-->

    <!--Feature property section start-->
    <div id="imoveisavenda" class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Imóveis a Venda</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section slider-space-30">

                    <!--Property start-->
                    <?php foreach ($imoveisAVenda as $imovel):?>
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="comprar.php?id=<?=$imovel->getId()?>"><img src="<?= $imovel->midias->getNomeDisco()?>" alt="<?= $imovel->midias->getIdentificacao()?>"></></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="assets/images/icons/area.png" alt=""><?=$imovel->getMetrosQuadrados()?></span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="assets/images/icons/bed.png" alt=""><?=$imovel->getQuartos()?></span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="assets/images/icons/bath.png" alt=""><?=$imovel->getBanheiros()?></span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="assets/images/icons/parking.png" alt=""><?=$imovel->getVagasGaragem()?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="comprar.php?id=<?=$imovel->getId()?>"><?= $imovel->getIdentificacao()?></a></h3>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt=""><?= $imovel->getRua(). ", " .$imovel->getBairro().", ".$imovel->getCidade().", ".$imovel->getEstado() ?></span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">R$<?= $imovel->imovelCaracteristicasImovelTipos->getValor()?></span>
                                        <span class="type"><?= $imovel->negocioTipos->getNome()?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <!--Property end-->
                </div>
                <!--Property Slider end-->
                
            </div>
        </div>
    </div>
    <!--Feature property section end-->
    <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/footer.php');?>

</div>
<!-- Placed js at the end of the document so the pages load faster -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/scripts.php');?>
</body>
</html>
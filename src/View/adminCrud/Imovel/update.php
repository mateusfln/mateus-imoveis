<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;

if (empty(trim($_GET['id'])) || !is_numeric($_GET['id'])) {
    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php?error=Código da característica não informado');
    exit;
}

$campos = array('IDENTIFICACAO','MATRICULA','INSCRICAO IMOBILIARIA','LOGRADOURO','NUMERO LOGRADOURO','RUA','BAIRRO','CIDADE','ESTADO','CEP','IBGE');

$imovelDAO = new ImovelDAO();
$imovel = $imovelDAO->read($_GET['id']);

if(!empty($_POST['identificacao'])&& !empty($_POST['matricula'])&& !empty($_POST['inscricao_imobiliaria'])
&& !empty($_POST['logradouro']) && !empty($_POST['numero_logradouro']) && !empty($_POST['rua']) && !empty($_POST['bairro'])
&& !empty($_POST['cidade']) && !empty($_POST['estado']) && !empty($_POST['cep']) && !empty($_POST['ibge'])){
    $hoje = new \DateTimeImmutable();
    $imovel->setIdentificacao($_POST['identificacao']);
    $imovel->setMatricula($_POST['matricula']);
    $imovel->setInscricaoImobiliaria($_POST['inscricao_imobiliaria']);
    $imovel->setLogradouro($_POST['logradouro']);
    $imovel->setNumeroLogradouro($_POST['numero_logradouro']);
    $imovel->setRua($_POST['rua']);
    $imovel->setBairro($_POST['bairro']);
    $imovel->setCidade($_POST['cidade']);
    $imovel->setEstado($_POST['estado']);
    $imovel->setCep($_POST['cep']);
    $imovel->setIbge($_POST['ibge']);
    $imovel->setAtivo(false);
    if(!empty($_POST['ativo'])){
        $imovel->setAtivo($_POST['ativo']);
    }
    $imovel->setModificadorId(1);
    $imovel->setModificado($hoje);
    
    $imovelDAO->update($imovel, $_GET['id']);

    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php');
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
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <form method="POST">
                                        <h4 class="card_title">Editar "<?= $_GET['identificacao']?>"</h4>
                                        <?php foreach ($campos as $campo):?>
                                            <div class="form-group">
                                                <label for="example-text-input" class="col-form-label"><?=$campo?></label>
                                                <?php
                                             $campo = strtolower($campo);
                                             $campo = str_replace(" ", "", $campo);
                                             $methodName = "get" . ucfirst($campo);
                                             $method = $imovel->$methodName();
                                            ?>
                                                <input class="form-control" required type="text"name="<?=$campo?>" value="<?= $method ?>">
                                            </div>
                                        <?php endforeach;?>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ativo</label>
                                            <input class="ml-2" type="checkbox" name="ativo" <?= $imovel->getAtivo() ? ' checked="checked"' : ''?>>
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


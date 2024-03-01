<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Imoveis\ImovelDAO;

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
    header('Location: https://mateusimoveis.local/Admin.php');
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Create</p>
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
                                        <h4 class="card_title">Cadastro de Imóveis</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Identificacao</label>
                                            <input class="form-control" required type="text"name="identificacao">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Matricula</label>
                                            <input class="form-control" required type="text" name="matricula">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">inscrição Imobiliaria</label>
                                            <input class="form-control" required type="text" name="inscricao_imobiliaria">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">logradouro</label>
                                            <input class="form-control" required type="text" name="logradouro">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Numero Logradouro</label>
                                            <input class="form-control" required type="text" name="numero_logradouro">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Rua</label>
                                            <input class="form-control" required type="text" name="rua">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Complemento</label>
                                            <input class="form-control" required type="text" name="complemento">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Bairro</label>
                                            <input class="form-control" required type="text" name="bairro">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Cidade</label>
                                            <input class="form-control" required type="text" name="cidade">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Estado</label>
                                            <input class="form-control" required type="text" name="estado">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Cep</label>
                                            <input class="form-control" required type="text" name="cep">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Ibge</label>
                                            <input class="form-control" required type="text" name="ibge">
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
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
</html>


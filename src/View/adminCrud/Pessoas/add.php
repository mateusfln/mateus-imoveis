<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Pessoas;
use Imobiliaria\Model\Imoveis\PessoaDAO;

if(!empty($_POST)){
    print_r($_POST);
    $hoje = new \DateTimeImmutable();
    
    $pessoa = new Pessoas();

    $pessoa->setNome($_POST['nome']);
    $pessoa->setCpf($_POST['cpf']);
    $pessoa->setLogin($_POST['login']);
    $pessoa->setSenha(hash('sha256', $_POST['senha']));
    $pessoa->setAtivo(true);
    $pessoa->setCriado($hoje);
    $pessoa->setCriadorId(1);
    $pessoa->setModificadorId(1);
    $pessoa->setModificado($hoje);
    $dbPessoa = new PessoaDAO();
    $dbPessoa->create($pessoa);
    header('Location: https://mateusimoveis.local/src/View/adminCrud/Pessoas/read.php');
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Pessoas</p>
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
                                        <h4 class="card_title">Cadastro de Pessoas</h4>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nome</label>
                                            <input class="form-control" required type="text"name="nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">CPF</label>
                                            <input class="form-control" required type="text" name="cpf">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Login</label>
                                            <input class="form-control" required type="text" name="login">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Senha</label>
                                            <input class="form-control" required type="password" name="senha">
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

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>


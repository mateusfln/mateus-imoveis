<?php
use Imobiliaria\Model\Imoveis\ImovelDAO;

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Midias;
use Imobiliaria\Model\Imoveis\MidiasDAO;

$imoveis = new ImovelDAO();
$imoveis = $imoveis->buscarListaDeImoveis();

?>

<?php

    function enviarArquivos($error, $size, $name, $tmp_name){

        if($error){
            echo('Falha ao enviar o arquivo');
        }

        if($size > 2097152){
            echo('Arquivo maior que o limite máximo de tamanho (2Mb)');
        }

        $pasta = "../../../../assets/images/imoveis/";
        $nomeDoArquivo = $name;
        $nomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $pasta.$nomeDoArquivo.".".$extensao;
        $caminho = "/assets/images/imoveis/".$nomeDoArquivo.'.'.$extensao;
        $sucesso = move_uploaded_file($tmp_name, $path);
        
        if($extensao != 'jpg' && $extensao != 'png' ){
            header('Location: https://mateusimoveis.local/src/View/adminCrud/Midias/add.php?erro=tipo de midia não suportado, favor inserir uma midia com a extensão PNG ou JPG.');
            exit;
        }
        if($sucesso){
            $hoje = new \DateTimeImmutable();

            $midia = new Midias();
        
            $midia->setImovelId($_POST['imovel_id']);
            $midia->setIdentificacao($nomeDoArquivo);
            $midia->setNomeDisco($caminho);
            $midia->setCapa(false);
            $midia->setAtivo(true);
            $midia->setCriado($hoje);
            $midia->setCriadorId(1);
            $midia->setModificadorId(1);
            $midia->setModificado($hoje);
            $dbMidia = new MidiasDAO();
            $dbMidia->create($midia);
            $dbMidia->getInsertId();
            header('Location: https://mateusimoveis.local/src/View/adminCrud/Midias/read.php');
            return true;
        }else{
            return false;
        }
}   // if(isset($_FILES) && count($_FILES) > 0) {
    // echo '<pre>';
    // var_dump($_FILES); die;

    // }
   
    if (isset($_FILES['arquivo']) && isset($_POST['imovel_id'])){
        
        $arquivo = $_FILES['arquivo'];

        $success = true;

        foreach($arquivo['name'] as $index => $arq){

            $works = enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index]);
            if(!$works){
                $success = false;
            }

            if ($index === array_key_first($arquivo)){

            $hoje = new \DateTimeImmutable();

            $midia = new Midias();
        
            $midia->setImovelId($_POST['imovel_id']);
            $midia->setIdentificacao($nomeDoArquivo);
            $midia->setNomeDisco($caminho);
            $midia->setCapa(true);
            $midia->setAtivo(true);
            $midia->setCriado($hoje);
            $midia->setCriadorId(1);
            $midia->setModificadorId(1);
            $midia->setModificado($hoje);
            $dbMidia = new MidiasDAO();
            $dbMidia->update($midia, $midia->getId());
            }
        }

        if($success){

            echo '<p> todos os arquivos foram enviados com sucesso';
            die;
        }
        else{

            echo '<p> erro ao enviar arquivos';
            die;
        }

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Mídias</p>
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
                                    <form enctype="multipart/form-data" method="POST">
                                        <h4 class="card_title">Cadastro de Mídias</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">ID do Imovel</label>
                                            <select class="form-control" name='imovel_id'>
                                                <?php foreach ($imoveis as $imovel):?>
                                                    <option value="<?=$imovel->getId()?>"/><?=$imovel->getIdentificacao()?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?php if (isset($_GET['erro'])):?>
                                            <p style="color: red"><?=$_GET['erro']?></p>
                                        <?php endif;?>
                                        </div>
                                       
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input multiple type="file" name="arquivo[]">
                                            </div>
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


<?php

require_once('../../../../vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Imoveis\ImovelDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\ImovelNegociotiposDAO;
use Imobiliaria\Model\Imoveis\NegociotiposDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicasImoveltiposDAO;
use Imobiliaria\Model\Entity\CaracteristicasImoveltipos;
use Imobiliaria\Model\Entity\ImovelNegociostipos;

if (empty(trim($_GET['id'])) || !is_numeric($_GET['id'])) {
    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php?error=Código da característica não informado');
    exit;
}

// $campos = array('IDENTIFICACAO','MATRICULA','INSCRICAO IMOBILIARIA','LOGRADOURO','NUMERO LOGRADOURO','RUA','BAIRRO','CIDADE','ESTADO','CEP','IBGE', 'metrosQuadrados',
// 'Quartos',
// 'Banheiros',
// 'Garagem',);
$caracteristicasDAO = new CaracteristicaDAO();
$caracteristicas = $caracteristicasDAO->buscarListaDeCaracteristicas();


$imovelDAO = new ImovelDAO();
$imovel = $imovelDAO->read($_GET['id']);

// echo '<pre>';
// print_r($imovel); die;

$caracteristicasImoveltiposDao = new CaracteristicasImoveltiposDAO();
$caracteristicasImoveltipos = $caracteristicasImoveltiposDao->buscarListaDeCaracteristicasImovelTiposPorImovelTipo($imovel->imovelTipos->getId());

$arrImoveltipos = [];

foreach ($caracteristicasImoveltipos as $imoveltipos) {
    $arrImoveltipos[] = $imoveltipos->getCaracteristicaId();
}

//  echo '<pre>';
//  print_r($arrImoveltipos); die;

$imovelNegociostiposDAO = new ImovelNegociotiposDAO();
$imovelNegociostipos = $imovelNegociostiposDAO->readPorImoveltipoId($_GET['id']);

$imoveltiposDAO = new ImoveltiposDAO();
$imoveltipos = $imoveltiposDAO->buscarListaDeImovelTipos();

$negociotipos = new NegociotiposDAO();
$negociotipos = $negociotipos->buscarListaDeNegocioTipos();


//  echo '<pre>';
//  print_r($_POST); die;
if(!empty($_POST)){

    $hoje = new \DateTimeImmutable();
    $imovel->setImoveltipoId($_POST['imoveltipo']);
    $imovel->setIdentificacao($_POST['IDENTIFICACAO']);
    $imovel->setMatricula($_POST['MATRICULA']);
    $imovel->setInscricaoImobiliaria($_POST['INSCRICAO_IMOBILIARIA']);
    $imovel->setLogradouro($_POST['LOGRADOURO']);
    $imovel->setNumeroLogradouro($_POST['NUMERO_LOGRADOURO']);
    $imovel->setRua($_POST['RUA']);
    $imovel->setBairro($_POST['BAIRRO']);
    $imovel->setCidade($_POST['CIDADE']);
    $imovel->setEstado($_POST['ESTADO']);
    $imovel->setCep($_POST['CEP']);
    $imovel->setIbge($_POST['IBGE']);
    $imovel->setAtivo(false);
    if(!empty($_POST['ativo'])){
        $imovel->setAtivo($_POST['ativo']);
    }
    $imovel->setMetrosQuadrados($_POST['metrosQuadrados']);
    $imovel->setQuartos($_POST['Quartos']);
    $imovel->setBanheiros($_POST['Banheiros']);
    $imovel->setVagasGaragem($_POST['Garagem']);
    $imovelDAO->update($imovel, $_GET['id']);

    $imovelNegociotipos = new ImovelNegociostipos();

    $imovelNegociotipos->setimovelId($_GET['id']);
    $imovelNegociotipos->setNegocioTipoId($_POST['negociotipo']);
    $imovelNegociotipos->setValor($_POST['valor']);
    $imovelNegociotipos->setAtivo(true);
    $imovelNegociotipos->setCriado($hoje);
    $imovelNegociotipos->setCriadorId(1);
    $imovelNegociotipos->setModificadorId(1);
    $imovelNegociotipos->setModificado($hoje);

    $dbImovelNegociotipos = new ImovelNegociotiposDAO();
    //$dbImovelNegociotipos->create($imovelNegociotipos);

    // $caracteristicaDao = new CaracteristicaDAO();
    // $caracteristica = $caracteristicaDao->read($_GET['id']);

    // $caracteristicaDao->update($caracteristica, $_GET['id']);

    $dbImovelNegociotipos->update($imovelNegociotipos, $_GET['id']);
    
    $caracteristicasImoveltiposDao->deletePorImovelTipo($_POST['imoveltipo']);
    
    //print_r($_POST['imoveltipos']); die;

    foreach ($_POST['caracteristicas'] as $caracteristica) {

        $caracteristicasImoveltipos = new CaracteristicasImoveltipos();

        $caracteristicasImoveltipos->setCaracteristicaId($caracteristica);
        $caracteristicasImoveltipos->setImovelTipoId($_POST['imoveltipo']);
        $caracteristicasImoveltipos->setAtivo(true);
        $caracteristicasImoveltipos->setCriado($hoje);
        $caracteristicasImoveltipos->setCriadorId(1);
        $caracteristicasImoveltipos->setModificadorId(1);
        $caracteristicasImoveltipos->setModificado($hoje);

        $dbCaracteristicaImoveltipo = new CaracteristicasImoveltiposDAO();
        $dbCaracteristicaImoveltipo->create($caracteristicasImoveltipos);
    }

    header('Location: https://mateusimoveis.local/src/View/adminCrud/Imovel/read.php');
    exit;

}

$caracteristicasImoveltiposDao = new CaracteristicasImoveltiposDAO();
$caracteristicasImoveltipos = $caracteristicasImoveltiposDao->buscarListaDeCaracteristicasImovelTipos();

$listaCaracteristicaImoveltipo = [];
foreach($caracteristicasImoveltipos as $caracteristicaImoveltipo) {
    $listaCaracteristicaImoveltipo[$caracteristicaImoveltipo->getImovelTipoId()][] = $caracteristicaImoveltipo->getCaracteristicaId();
}

$jsonCaracteristicaImoveltipo = json_encode($listaCaracteristicaImoveltipo);

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
                                        <div class="card">
                                        <div class="col-12 d-flex">
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Cadastro de Imóveis</h4>
                                                            
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IDENTIFICACAO</label>
                                                                    <input class="form-control" required type="text"name="IDENTIFICACAO" value="<?=$imovel->getIdentificacao()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">MATRICULA</label>
                                                                    <input class="form-control" required type="text"name="MATRICULA" value="<?=$imovel->getMatricula()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">INSCRICAO IMOBILIARIA</label>
                                                                    <input class="form-control" required type="text"name="INSCRICAO IMOBILIARIA" value="<?=$imovel->getInscricaoImobiliaria()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="LOGRADOURO" value="<?=$imovel->getLogradouro()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">NUMERO LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="NUMERO LOGRADOURO" value="<?=$imovel->getNumeroLogradouro()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">RUA</label>
                                                                    <input class="form-control" required type="text"name="RUA" value="<?=$imovel->getRua()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">BAIRRO</label>
                                                                    <input class="form-control" required type="text"name="BAIRRO" value="<?=$imovel->getBairro()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CIDADE</label>
                                                                    <input class="form-control" required type="text"name="CIDADE" value="<?=$imovel->getCidade()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">ESTADO</label>
                                                                    <input class="form-control" required type="text"name="ESTADO" value="<?=$imovel->getEstado()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CEP</label>
                                                                    <input class="form-control" required type="text"name="CEP" value="<?=$imovel->getCep()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IBGE</label>
                                                                    <input class="form-control" required type="text"name="IBGE" value="<?=$imovel->getIbge()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">metrosQuadrados</label>
                                                                    <input class="form-control" required type="text"name="metrosQuadrados" value="<?=$imovel->getMetrosQuadrados()?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Quartos</label> 
                                                                    <select class="form-control" name="Quartos" value="<?=$imovel->getQuartos()?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Banheiros</label> 
                                                                    <select class="form-control" name="Banheiros" value="<?=$imovel->getBanheiros()?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Garagem</label> 
                                                                    <select class="form-control" name="Garagem" value="<?=$imovel->getVagasGaragem()?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                
                                                    </div>
                                                </div>
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Tipo do Imóvel:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='imoveltipo' id='imoveltipo'>
                                                                <?php foreach($imoveltipos as $imoveltipo):?>
                                                                <option value="<?=$imoveltipo->getId()?>" <?= $imovel->imovelTipos->getId() == $imoveltipo->getId()?  'selected="selected"': '' ?> id="<?=$imoveltipo->getNome()?>"><?=$imoveltipo->getNome()?></option>
                                                                <label for="<?=$imoveltipo->getNome()?>" class="col-form-label"><?=$imoveltipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Tipo de Negócio:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='negociotipo'>
                                                                <?php foreach($negociotipos as $negociotipo):?>
                                                                <option value="<?=$negociotipo->getId()?>" <?= $imovel->negocioTipos->getId() == $negociotipo->getId()?  'selected="selected"': '' ?> id="<?=$negociotipo->getNome()?>"><?=$negociotipo->getNome()?></option>
                                                                <label for="<?=$negociotipo->getNome()?>" class="col-form-label"><?=$negociotipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Caracteristicas inclusas:</h4>
                                                            <div class="form-group">
                                                            
                                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                                <div>
                                                                <input type="checkbox" name="caracteristicas[]" id="<?=$caracteristica->getId()?>" value="<?=$caracteristica->getId()?>" <?= in_array($caracteristica->getId(), $arrImoveltipos) ? ' checked="checked"' : '' ?>>
                                                                <label for="<?=$caracteristica->getId()?>" class="col-form-label"><?=$caracteristica->getNome()?></label>
                                                                <br>
                                                                </div>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Valor</label>
                                                                <input class="form-control" required type="number" name="valor" value="<?=$imovelNegociostipos->getValor()?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                            </div>
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

<script>
    let jsonCaracteristicaImoveltipo = JSON.parse('<?=$jsonCaracteristicaImoveltipo?>');

function getCaracteristicasByImovelTipoId(imovelTipoId) {
    for (item in jsonCaracteristicaImoveltipo) {
        if (item == imovelTipoId) {
            return jsonCaracteristicaImoveltipo[item];
        }
    }
}

$('#imoveltipo').change(function(){
    let imovelTipoId = $(this).val();
    let caracteristicas = getCaracteristicasByImovelTipoId(imovelTipoId);
    $("input[name='caracteristicas[]']").each(function(index){
        if (caracteristicas.includes(parseInt($(this).val()))) {
            $(this).parent().show();
        } else {
            $(this).parent().hide();
        }
    });
});

$('#imoveltipo').trigger('change');
</script>
</body>

<!-- Mirrored from rtsolutz.com/vizzstudio/demo-falr/falr/dark-sidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 19:04:59 GMT -->
</html>


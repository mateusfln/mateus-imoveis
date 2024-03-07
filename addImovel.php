<?php 
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imoveltipos;
use Imobiliaria\Model\Entity\Midias;
use Imobiliaria\Model\Entity\NegocioTipos;
use Imobiliaria\Model\Entity\Imovel;
use Imobiliaria\Model\Entity\ImovelNegociostipos;
use Imobiliaria\Model\Entity\ImovelCaracteristicasImovelTipos;

use Imobiliaria\Model\DAO;
use Imobiliaria\Model\Imoveis\ImovelNegociotiposDAO;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicaDAO;
use Imobiliaria\Model\Imoveis\MidiasDAO;
use Imobiliaria\Model\Imoveis\NegociotiposDAO;
use Imobiliaria\Model\Imoveis\ImovelDAO;
use Imobiliaria\Model\Imoveis\ImovelCaracteristicasImovelTiposDAO;
use Imobiliaria\Model\Imoveis\CaracteristicasImoveltiposDAO;

require_once(realpath(dirname(__FILE__) . '/includes') .'/funcoes.php');

$listaImoveisTiposDAO = new ImovelDAO();
$listaImoveisTipos = $listaImoveisTiposDAO->buscarListaDeImoveisTipo();
$listaImoveisDAO = new ImovelDAO();
$listaImoveis = $listaImoveisDAO->buscarListaDeEstados(); 
$negociotiposDAO = new NegociotiposDAO();
$negociotipos = $negociotiposDAO->buscarListaDeNegocioTipos();
$imoveltiposDAO = new ImoveltiposDAO();
$imoveltipos = $imoveltiposDAO->buscarListaDeImovelTipos();
$caracteristicasDAO = new CaracteristicaDAO();
$caracteristicas = $caracteristicasDAO->buscarListaDeCaracteristicas();
    
?>

<?php pr($_POST);pr($_FILES);?>
                <?php 
                if (isset($_FILES['arquivo'])){
                    $arquivo = $_FILES['arquivo'];
                    
                    
                    if($arquivo['error']){
                        echo('Falha ao enviar o arquivo');
                    }

                    if($arquivo['size'] > 2097152){
                        echo('Arquivo maior que o limite máximo de tamanho (2Mb)');
                    }
                    
                    $pasta = "assets/images/imoveis/";
                    $nomeDoArquivo = $arquivo['name'];
                    $nomeDoArquivo = uniqid();
                    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
                    $path = $pasta.$nomeDoArquivo.".".$extensao;
                    
                    if($extensao != 'jpg' && $extensao != 'png' ){
                        echo('Tipo de arquivo não aceito');
                    }else{
                        $sucesso = move_uploaded_file($arquivo['tmp_name'], $path);

                    }
                }
                ?>

<?php

if(!empty($_POST)){
    print_r($_POST);
    $hoje = new \DateTimeImmutable();
    
    $imovel = new Imovel();
    //$imoveltipos = new ImovelTipos();
    $imovelNegociotipos = new ImovelNegociostipos();
    $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();
    $negociosTipos = new NegocioTipos();
    $midias = new Midias();

    $imovel->setImoveltipoId($_POST['imoveltipo']);
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
    $imovel->setMetrosQuadrados($_POST['metros_quadrados']);
    $imovel->setQuartos($_POST['quartos']);
    $imovel->setBanheiros($_POST['banheiros']);
    $imovel->setVagasGaragem($_POST['garagem']);
    $imovel->setAtivo(true);
    $imovel->setCriado($hoje);
    $imovel->setCriadorId(1);
    $imovel->setModificadorId(1);
    $imovel->setModificado($hoje);
    $dbImovel = new ImovelDAO();
    $dbImovel->create($imovel);
    $imovelId = $dbImovel->getInsertId();
    
    $midias->setImovelId($imovelId);
    $midias->setNomeDisco($path);
    $midias->setIdentificacao($nomeDoArquivo);
    $midias->setCapa(1);
    $midias->setAtivo(true);
    $midias->setCriado($hoje);
    $midias->setCriadorId(1);
    $midias->setModificadorId(1);
    $midias->setModificado($hoje);
    $dbMidias = new MidiasDAO();
    $dbMidias->create($midias);

    $imovelNegociotipos->setimovelId($imovelId);
    $imovelNegociotipos->setNegocioTipoId($_POST['negociotipos']);
    $imovelNegociotipos->setValor($_POST['preco']);
    $imovelNegociotipos->setAtivo(true);
    $imovelNegociotipos->setCriado($hoje);
    $imovelNegociotipos->setCriadorId(1);
    $imovelNegociotipos->setModificadorId(1);
    $imovelNegociotipos->setModificado($hoje);
    $dbImovelNegociotipos = new ImovelNegociotiposDAO();
    $dbImovelNegociotipos->create($imovelNegociotipos);

    foreach ($_POST['caracteristicas'] as $caracteristica){

        // print($caracteristica); die;

        $imovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTipos();

        $imovelCaracteristicasImovelTipos->setimovelId($imovelId);
        $imovelCaracteristicasImovelTipos->setCaracteristicaImoveltipoId($caracteristica);
        $imovelCaracteristicasImovelTipos->setValor(0);
        $imovelCaracteristicasImovelTipos->setAtivo(true);
        $imovelCaracteristicasImovelTipos->setCriado($hoje);
        $imovelCaracteristicasImovelTipos->setCriadorId(1);
        $imovelCaracteristicasImovelTipos->setModificadorId(1);
        $imovelCaracteristicasImovelTipos->setModificado($hoje);
    
        $dbImovelCaracteristicasImovelTipos = new ImovelCaracteristicasImovelTiposDAO();
        $dbImovelCaracteristicasImovelTipos->create($imovelCaracteristicasImovelTipos);
    }   

    header('Location: https://mateusimoveis.local/');

    
}

$caracteristicasImoveltiposDao = new CaracteristicasImoveltiposDAO();
$caracteristicasImoveltipos = $caracteristicasImoveltiposDao->buscarListaDeCaracteristicasImovelTipos();

$listaCaracteristicaImoveltipo = [];
foreach($caracteristicasImoveltipos as $caracteristicaImoveltipo) {
    $listaCaracteristicaImoveltipo[$caracteristicaImoveltipo->getImovelTipoId()][] = $caracteristicaImoveltipo->getCaracteristicaId();
}

$jsonCaracteristicaImoveltipo = json_encode($listaCaracteristicaImoveltipo);

// pr($jsonCaracteristicaImoveltipo);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/head.php');?>

<body>
    
<div id="main-wrapper">
   
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/navbar.php');?>
    
    <!--Page Banner Section start-->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">Adicionar Imóveis</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Add Properties</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--Add Properties section start-->
    
    <div class="add-properties-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
                <div class="add-property-wrap col">
                    <ul class="add-property-tab-list nav mb-50">
                        <li class="working"><a href="#basic_info" data-bs-toggle="tab">1. Formulário de Cadastro</a></li>
                        <li><a href="#gallery_video" data-bs-toggle="tab">2. Fotos</a></li>
                    </ul>

                    <div class="add-property-form tab-content">

                        <div class="tab-pane show active" id="basic_info">
                            <div class="tab-body">

                                <form enctype="multipart/form-data" method="POST" id="formAddImovel">
                                    <div class="row">
                                        <div class="col-12 mb-30">
                                            <label>Titulo Do Anúncio</label>
                                            <input required type="text" name="identificacao">
                                        </div>
                                        
                                        <div class="col-3 mb-30">
                                            <label>Matricula</label>
                                            <input required type="text" name="matricula">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Inscrição imobiliaria</label>
                                            <input required type="text" name="inscricao_imobiliaria">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Logradouro</label>
                                            <input required type="text" name="logradouro">
                                        </div>
                                        <div class="col-3 mb-30">
                                            <label>Numero Logradouro</label>
                                            <input required type="text" name="numero_logradouro">
                                        </div>
                                        <div class="col-4 mb-30">
                                            <label>Cep</label>
                                            <input required type="text" name="cep">
                                        </div>
                                        <div class="col-4 mb-30">
                                            <label>IBGE</label>
                                            <input required type="text" name="ibge">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Rua</label>
                                            <input required type="text" name="rua">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Complemento</label>
                                            <input required type="text" name="complemento">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Bairro</label>
                                            <input required type="text" name="bairro">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Cidade</label>
                                            <input required type="text" name="cidade">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Estado</label>
                                            <select class="nice-select" required name="estado">
                                                <option value="AC">AC </option>
                                                <option value="AL">AL </option>
                                                <option value="AM">AM </option>
                                                <option value="AP">AP </option>
                                                <option value="BA">BA </option>
                                                <option value="CE">CE </option>
                                                <option value="DF">DF </option>
                                                <option value="ES">ES </option>
                                                <option value="GO">GO </option>
                                                <option value="MA">MA </option>
                                                <option value="MG">MG </option>
                                                <option value="MS">MS </option>
                                                <option value="MT">MT </option>
                                                <option value="PA">PA </option>
                                                <option value="PB">PB </option>
                                                <option value="PE">PE </option>
                                                <option value="PI">PI </option>
                                                <option value="PR">PR </option>
                                                <option value="RJ">RJ </option>
                                                <option value="RN">RN </option>
                                                <option value="RO">RO </option>
                                                <option value="RR">RR </option>
                                                <option value="RS">RS </option>
                                                <option value="SC">SC </option>
                                                <option value="SE">SE </option>
                                                <option value="SP">SP </option>
                                                <option value="TO">TO </option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Status</label>
                                            <select class="nice-select" required name="negociotipos">
                                            <?php foreach($negociotipos as $negociotipo):?>
                                                    <option value="<?=$negociotipo->getId()?>" id="<?=$negociotipo->getNome()?>" /><?=$negociotipo->getNome()?></option>
                                                    <label for="<?=$negociotipo->getNome()?>" class="col-form-label"><?=$negociotipo->getNome()?></label>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Tipo</label>
                                            <select class="nice-select" required name='imoveltipo' id='imoveltipo'>
                                                <?php foreach($imoveltipos as $tipo):?>
                                                    <option value="<?=$tipo->getId()?>" id="<?=$tipo->getNome()?>" /><?=$tipo->getNome()?></option>
                                                    <label for="<?=$tipo->getNome()?>" class="col-form-label"><?=$tipo->getNome()?></label>
                                                <?php endforeach;?>
                                            </select>
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label for="property_price">Preço<span>(BRL)</span></label>
                                            <input required type="text" id="property_price" name="preco">
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label for="metros_quadrados">Metros quadrados</label>
                                            <input required type="number" id="metros_quadrados" name="metros_quadrados">
                                        </div>

                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Quartos</label>
                                            <select class="nice-select" required name='quartos'>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Banheiros</label>
                                            <select class="nice-select" required name='banheiros'>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-12 mb-30">
                                            <label>Vagas Garagem</label>
                                            <select class="nice-select" required name='garagem'>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-30">
                                            <h4>Caracteristicas do Imóvel</h4>
                                            <ul class="other-features">
                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                    <li><input type="checkbox" name="caracteristicas[]" id="<?=$caracteristica->getId()?>" value="<?=$caracteristica->getId()?>"><label for="<?=$caracteristica->getId()?>"><?=$caracteristica->getNome()?></label></li>
                                                    <br>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>

                                        <div class="tab-pane" id="gallery_video">
                                        <div class="tab-body">
                                    
                                
                                        <div class="row">
                                        <div class="col-12 mb-30">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Imagens do Imóvel</label>
                                            <input class="form-control" required type="file" id="formFile" name="arquivo">
                                            </div>
                                            
                                        </div>

                                        <div class="nav d-flex justify-content-end col-12 mb-30 pl-15 pr-15">
                                            <input type="button" id="botaoSubmit" data-bs-toggle="tab" class="btn" value="Enviar">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Properties section end-->
</div>
 <!--Feature property section end-->
 <?php require_once(realpath(dirname(__FILE__) . '/includes') .'/footer.php');?>

</div>


<!-- Placed js at the end of the document so the pages load faster -->
<?php require_once(realpath(dirname(__FILE__) . '/includes') .'/scripts.php');?>

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

    $('#botaoSubmit').click(function (){
        let camposObrigatoriosNaoPreenchidos = false
        if ($('#formAddImovel input:checked').length > 0){
            $('#formAddImovel').find('input').each(function(){
                if($(this).prop('required') && $(this).val() == ''){
                    camposObrigatoriosNaoPreenchidos = true
                }
            });
        }else{
            camposObrigatoriosNaoPreenchidos = true
        }
        if(camposObrigatoriosNaoPreenchidos){
            alert('todos os campos obrigatórios devem ser preenchidos!')

        }else{
            $('#formAddImovel').submit()
        }

    })
</script>
</body>


<!-- Mirrored from htmldemo.net/khonike/khonike/add-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Feb 2024 13:03:18 GMT -->
</html>
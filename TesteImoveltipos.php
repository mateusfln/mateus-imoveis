<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

require_once(realpath(dirname(__FILE__) . '/') . '/src/Model/DAO.php');
require_once(realpath(dirname(__FILE__) . '/') . '/src/Model/Imoveis/ImoveltiposDAO.php');
require_once(realpath(dirname(__FILE__) . '/') . '/src/Model/Entity/ImovelTipos.php');

if(!empty($_POST)){
    print_r($_POST);
    $imoveltipos = new ImovelTipos();
    print_r($imoveltipos);
    $imoveltipos->setAtivo(true);
    $imoveltipos->setNome($_POST['imoveltipos']);
    $imoveltipos->setCriado(date('Y:m:d H:I:S'));
    $imoveltipos->setCriadorId(1);
    $imoveltipos->setModificadorId(1);
    $imoveltipos->setModificado(date('Y:m:d H:I:S'));
    print_r($imoveltipos->nome);
    // $imovelTipos->setNome($_POST['imoveltipos']);
    $db = new ImoveltiposDAO();
    $db->create($imoveltipos);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Imoveltipos</label>
    <input type="text" class="form-control" name="imoveltipos">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
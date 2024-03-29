<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Imoveltipos;
use Imobiliaria\Model\Imoveis\ImoveltiposDAO;

if(!empty($_POST)) :
  $msgResultado = '';
  try {
    $hoje = new \DateTimeImmutable();
  
    $imoveltipos = (new ImovelTipos())
      ->setAtivo(true)
      ->setModificado($hoje)
      ->setCriado($hoje)
      ->setCriadorId(1)
      ->setModificadorId(1)
      ->setNome(htmlspecialchars(stripslashes($_POST['imoveltipos'])));
  
    $db = new ImoveltiposDAO();
    $db->create($imoveltipos);

    $msgResultado = 'Cadastro realizado com sucesso!';
  } catch (\Exception $e) {
    $msgResultado = $e->getMessage();
  }

endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php if ($msgResultado):?>
    <div><?= $msgResultado?></div>
  <?php endif;?>
<form method="POST">
  <div class="mb-3">
    <label class="form-label">Imoveltipos</label>
    <input type="text" class="form-control" name="imoveltipos" value="<?= $_POST['imoveltipos'] ?? ''?>" />
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\NegocioTipos;
use Imobiliaria\Model\Imoveis\NegociotiposDAO;

if(!empty($_POST)) :
  $msgResultado = '';
  try {
    $hoje = new \DateTimeImmutable();
  
    $imoveltipos = (new NegocioTipos())
      ->setAtivo(true)
      ->setModificado($hoje)
      ->setCriado($hoje)
      ->setCriadorId(1)
      ->setModificadorId(1)
      ->setNome(htmlspecialchars(stripslashes($_POST['negociotipos'])));
  
    $db = new NegociotiposDAO();
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
    <label class="form-label">NegocioTipos</label>
    <input type="text" class="form-control" name="negociotipos" required value="<?= $_POST['negociotipos'] ?? ''?>" />
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
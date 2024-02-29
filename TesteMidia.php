<?php
require_once('vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use Imobiliaria\Model\Entity\Midias;
use Imobiliaria\Model\Imoveis\MidiasDAO;

if(!empty($_POST)) :
  $msgResultado = '';
  try {
    $hoje = new \DateTimeImmutable();
  
    $imoveltipos = (new Midias())
      ->setAtivo(true)
      ->setModificado($hoje)
      ->setCriado($hoje)
      ->setCriadorId(1)
      ->setModificadorId(1)
      ->setIdentificacao(htmlspecialchars(stripslashes($_POST['identificacao'])))
      ->setNomeDisco(htmlspecialchars(stripslashes($_POST['nome'])));
  
    $db = new MidiasDAO();
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
<?php

require_once(realpath(dirname(__FILE__) . '/..') .'/src/Models/DAO/PessoasDAO.php');

$paginaAtual = $_GET['pagina'] ?? 1;

$limite = 3;

$offset = ($paginaAtual -1) * $limite;

$inicio = $paginaAtual * $limite - $limite;

$query = new PessoasDAO();

$registros = $query->numRegistros();

$paginasTotais = ceil($registros / $limite);


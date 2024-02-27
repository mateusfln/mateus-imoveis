<nav aria-label="Page navigation example" class="my-3">
  <ul class="pagination">
    <?php if ($paginaAtual > 1): ?>
      <li class="page-item"><a class="page-link" href="?pagina=1">Primeira</a></li>
      <li class="page-item"><a class="page-link" href="?pagina=<?=$paginaAtual-1 ?>"><-</a></li>
    <?php endif; ?>
    <li class="page-item"><p class="page-link" href="?pagina=<?=$paginaAtual?>"><?= $paginaAtual ?></p></li>
    <?php if ($paginaAtual < $paginasTotais): ?>
      <li class="page-item"><a class="page-link" href="?pagina=<?=$paginaAtual+1 ?>">-></a></li>
      <li class="page-item"><a class="page-link" href="?pagina=<?=$paginasTotais ?>">Última</a></li>
    <?php endif; ?>

  </ul>
</nav>

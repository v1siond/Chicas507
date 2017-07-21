<?php $pagina = numero_paginas($blog_config['post_por_pagina'], $conexion);?>
<ul class="col-xs-12 text-center blog-pagination">
  <?php if (pagina_actual() === 1):  ?>
      <li class="disabled arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></li>
  <?php else: ?>
      <li class="arrow"><a href="?p=<?php echo pagina_actual() - 1 ?>"><i class="fa fa-angle-left"></i></a></li>
  <?php endif; ?>
  <?php
    for ($i=1; $i <= $pagina ; $i++) {
      if (pagina_actual() === $i) {
        echo "<li class='disable page'>$i</li>";
      }
      else{
        echo "<li class='pag'><a href='?p=$i'>$i</a></li>";
      }
    }
   ?>
  <?php if (pagina_actual() == $pagina):  ?>
      <li class="disabled arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
  <?php else: ?>
      <li class="arrow"><a href="?p=<?php echo pagina_actual() + 1 ?>"><i class="fa fa-angle-right"></i></a></li>
  <?php endif; ?>
</ul>
<?php
  $_SESSION["pagina_anterior"] = true; 
?>
<section class="ht-produtos">
  <div class="ht-produtos__sidebar">
    <?php get_template_part("template/produtos","sidebar"); ?>
  </div>
  <div class="ht-produtos__lista">
    <?php get_template_part("template/produtos", "lista"); ?>
  </div>
</section>

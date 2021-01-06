<?php
$p = get_queried_object();
$content = get_field("ht_post_content", $p);
$calendario = get_field("ht_segmento_calendario",$p);
?>
<div class="segmento">
  <h1 class="title segmento__title"><?php print $p->post_title; ?></h1>
  <div class="post segmento__content">
    <?php print wpautop($content); ?>
  </div>
  <?php if(!empty($calendario)): ?>
  <div class="segmento__calendario">
    <a href="<?php print $calendario["url"] ?>" class="button segmento__button">
      Ver calendário <i class="far fa-calendar-alt segmento__icon" style="margin-left:15px;"></i>
    </a>
  </div>
  <?php endif; ?>
</div>

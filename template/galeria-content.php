<?php
$p = get_queried_object();
$galerias = new ht_post_group("galeria");
$galerias = $galerias->get_post();
if(!empty($galerias)):
?>
<div class="galeria">
  <h1 class="title galeria__title">Galeria de fotos</h1>
  <?php if(!empty($p->post_content)): ?>
  <div class="galeria__desc">
    <?php print wpautop($p->post_content); ?>
  </div>
  <?php endif; ?>
  <label class="galeria__search">
    <i class="fas fa-search galeria__search--icon"></i>
    <input type="text" class="galeria__search--field" placeholder="Procure pelo nome do álbum">
  </label>

  <div class="galeria__list">
    <?php foreach($galerias as $galeria): ?>
      <div class="galeria__item" data-title="<?php print mb_strtolower($galeria->post_title); ?>">
        <h2 class="title galeria__title--item"><?php print $galeria->post_title; ?></h2>
        <div class="galeria__content">
          <?php
            $fotos = get_field("ht_galeria", $galeria);
            if(!empty($fotos)):
              foreach($fotos as $i => $foto):
              ?>
              <a href="<?php print $foto["url"]; ?>" class="galeria__photo<?php

                if($i>=1 && $i<=3) print " galeria__photo--hide-mobile";
                if($i >3 ) print " galeria__photo--hide";

              ?>" style="background-image:url('<?php print $foto["sizes"]["medium"]; ?>')">
                <img src="<?php print $foto["sizes"]["thumbnail"]; ?>" alt="<?php print $foto["alt"]; ?>" class="galeria__photo--thumb">
                <?php if($i==3 && count($fotos) > 4): ?>
                  <div class="galeria__photo--wrapper">
                    <i class="fas fa-plus galeria__photo--icon"></i>
                    Veja mais fotos
                  </div>
                <?php endif; ?>
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

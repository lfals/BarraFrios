<?php
$p = get_queried_object();
$parceiros = new ht_post_group("parceiro");
$parceiros = $parceiros->get_post();
$rand = array_rand($parceiros, 3);
$link = get_field("ht_home_parceiros_url", $p);
$content = get_field("ht_home_parceiros", $p);
?>
<div class="parceiros">
  <div class="parceiros__wrapper">
    <h2 class="title title--dark parceiros__title">Nossos Parceiros</h2>
    <?php if(!empty($content)): ?>
    <div class="parceiro__desc">
      <?php print wpautop($content); ?>
    </div>
    <?php endif; ?>
    <div class="parceiros__list parceiros__list--home">
      <?php foreach($rand as $r): ?>
        <div class="parceiro__item">
          <h2 class="parceiro__title"><?php print $parceiros[$r]->post_title ?></h2>
          <div class="parceiro__content">
            <?php
              print mb_substr(get_field("ht_parceiro_content", $parceiros[$r]),0,280);
              if(mb_strlen(get_field("ht_parceiro_content", $parceiros[$r])) > 280):
            ?>
            [...] <a href="#" class="parceiro__leia modal__show" data-id="modal__<?php print $r; ?>">Leia mais</a>

            <?php endif; ?>
          </div>
          <div class="parceiro__contato">
            <?php if(!empty(get_field("ht_parceiro_facebook", $parceiros[$r]))): ?>
              <a href="<?php print get_field("ht_parceiro_facebook", $parceiros[$r]); ?>">
                <i class="fab fa-facebook-f parceiro__icon"></i>
              </a>
            <?php endif; ?>
            <?php if(!empty(get_field("ht_parceiro_instagram", $parceiros[$r]))): ?>
              <a href="<?php print get_field("ht_parceiro_instagram", $parceiros[$r]); ?>">
                <i class="fab fa-instagram parceiro__icon"></i>
              </a>
            <?php endif; ?>
            <?php if(!empty(get_field("ht_parceiro_whatsapp", $parceiros[$r]))): ?>
              <a href="<?php
                $telefone = get_field("ht_parceiro_whatsapp", $parceiros[$r]);
                $telefone = str_replace("(","",$telefone);
                $telefone = str_replace(")","",$telefone);
                $telefone = str_replace("-","",$telefone);
                $telefone = str_replace(" ","",$telefone);
                print "https://wa.me/55{$telefone}";
              ?>">
                <i class="fab fa-whatsapp parceiro__icon"></i>
              </a>
            <?php endif; ?>
            <?php if(!empty(get_field("ht_parceiro_site", $parceiros[$r]))): ?>
              <a href="<?php print get_field("ht_parceiro_site", $parceiros[$r]); ?>">
                <i class="fas fa-globe parceiro__icon"></i>
              </a>
            <?php endif; ?>
            <?php if(!empty(get_field("ht_parceiro_rota", $parceiros[$r]))): ?>
              <a href="<?php print get_field("ht_parceiro_rota", $parceiros[$r]); ?>">
                <i class="fas fa-map-marker-alt parceiro__icon"></i>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if(!empty($link)): ?>
      <a href="<?php print $link ?>" class="button button--dark parceiros__cta">
        Veja mais <i class="fas fa-long-arrow-alt-right" style="margin-left:15px"></i>
      </a>
    <?php endif; ?>
  </div>
  <?php foreach($rand as $r): ?>
    <div class="modal__wrapper modal__<?php print $r; ?>">
      <div class="modal__container">
        <div class="modal__header">
          <a href="#" class="modal__close" data-id="modal__<?php print $r; ?>">Fechar <i class="fas fa-times"></i></a>
        </div>
        <div class="modal__body">
          <?php print wpautop(get_field("ht_parceiro_content", $parceiros[$r])); ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

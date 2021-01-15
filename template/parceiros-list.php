<?php
$p = get_queried_object();
$parceiros = new ht_post_group("parceiro");
$parceiros = $parceiros->get_post();
$link = get_field("ht_home_parceiros_url", $p);
$content = $p->post_content;
$taxonomia = get_terms("segmento", array(
  "post_type" => "parceiro",
));
?>
<div class="parceiros">
  <div class="parceiros__wrapper">
    <h2 class="title title--dark parceiros__title">Nossos Parceiros</h2>
    <?php if(!empty($content)): ?>
    <div class="parceiro__desc">
      <?php print wpautop($content); ?>
    </div>
    <?php if(!empty($taxonomia)): ?>
    <div class="parceiro__filtro">
      <select class="parceiro__combo">
        <option value="1">Todos</option>
        <?php foreach($taxonomia as $t): ?>
          <option value="<?php print "parceiro__list--". $t->slug ?>"><?php print $t->name ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="parceiros__list parceiros__list--global">
      <?php foreach($parceiros as $parceiro): ?>
        <div class="parceiro__item<?php
        $terms = null;
          $terms = get_the_terms($parceiro,"segmento");

          if($terms){
            foreach($terms as $t){
              print " parceiro__list--". $t->slug;
            }
          }
         ?>">
          <h2 class="parceiro__title"><?php print $parceiro->post_title ?></h2>
          <div class="parceiro__content">
            <?php
              print mb_substr(get_field("ht_parceiro_content", $parceiro),0,280);
              if(mb_strlen(get_field("ht_parceiro_content", $parceiro)) > 280):
            ?>
            [...] <a href="#" class="parceiro__leia modal__show" data-id="modal__<?php print $parceiro->ID; ?>">Leia mais</a>

            <?php endif; ?>
          </div>
          <div class="parceiro__contato">
            <?php if(!empty(get_field("ht_parceiro_facebook", $parceiro))): ?>
              <a href="<?php print get_field("ht_parceiro_facebook", $parceiro); ?>">
                <i class="fab fa-facebook-f parceiro__icon"></i>
              </a>
            <?php endif; ?>
            <?php if(!empty(get_field("ht_parceiro_instagram", $parceiro))): ?>
              <a href="<?php print get_field("ht_parceiro_instagram", $parceiro); ?>">
                <i class="fab fa-instagram parceiro__icon"></i>
              </a>
           mpty($link)): ?>
      <a href="<?php print $link ?>" class="button button--dark parceiros__cta">
        Veja mais <i class="fas fa-long-arrow-alt-right" style="margin-left:15px"></i>
      </a>
    <?php endif; ?>
  </div>
  <?php foreach($parceiros as $parceiro): ?>
    <div class="modal__wrapper modal__<?php print $parceiro->ID; ?>">
      <div class="modal__container">
        <div class="modal__header">
          <a href="#" class="modal__close" data-id="modal__<?php print $parceiro->ID; ?>">Fechar <i class="fas fa-times"></i></a>
        </div>
        <div class="modal__body">
          <?php print wpautop(get_field("ht_parceiro_content", $parceiro)); ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

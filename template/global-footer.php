<?php
$logo = ht_get_logo();
$contatos = ht_get_contact();
$social = ht_get_social();
$nav = ht_get_nav();

?>



<div class="footer">
  <div class="footer__logo">
    <?php if(!empty($logo["secound"])): ?>
      <img src="<?php print $logo["secound"]["url"]; ?>" class="footer__logo--image" alt="Logo <?php print bloginfo("name"); ?>">
    <?php else: ?>
      <span class="footer__logo--text"><?php print bloginfo("name"); ?></span>
    <?php endif; ?>
  </div>
  <div class="footer__social">
    <?php if(!empty($social)): ?>
      <?php if(!empty($social["linkedin"])): ?>
        <a href="<?php print $social["linkedin"]; ?>" class="footer__social--item">
          <i class="fab fa-linkedin footer__social--icon"></i>
        </a>
      <?php endif; ?>
      <?php if(!empty($social["facebook"])): ?>
        <a href="<?php print $social["facebook"]; ?>" class="footer__social--item">
          <i class="fab fa-facebook-square footer__social--icon"></i>
        </a>
      <?php endif; ?>
      <?php if(!empty($social["instagram"])): ?>
        <a href="<?php print $social["instagram"]; ?>" class="footer__social--item">
          <i class="fab fa-instagram footer__social--icon"></i>
        </a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <div class="footer__nav">
    <?php if(!empty($nav["nav"])): ?>
      <div  class="footer__nav--item">
       
      </div>
      <?php foreach($nav["nav"] as $n): ?>
        <?php if(empty($n["sub_item"])): ?>
        <div  class="footer__nav--item">
          <a href="<?php print $n["url"] ?>" class="ht-header__nav--label">
            <?php print $n["label"] ?>
          </a>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  
  <div class="footer__items">
    <a href="https://hattrickcomunicacao.com.br" class="footer__link footer__link--hat-trick" target="_blank">
      Desenvolvido por<br>
      <img
      src="<?php print get_template_directory_uri() ?>/image/logo-hat-trick.png"
      alt="Logo Hat Trick Comunicação"
      class="footer__image footer__image--hat-trick"
      target="_blank">
    </a>
  </div>
</div>

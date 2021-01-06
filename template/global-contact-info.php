<?php
$endereco = ht_get_address();
$contato = ht_get_contact();
?>
<div class="footer__contact">
  <div class="footer__wrapper">
    <?php if(!empty($contato["phone"])): ?>
      <div class="footer__contact--item">
        <div class="contact__item--wrapper">
          <div class="footer__contact--icon">
            <img
            src="<?php print get_template_directory_uri(); ?>/image/icon-phone-green.png"
            alt="Ícone de telefone"
            class="footer__contact--image"
            >
          </div>
          <div class="footer__contact--content">
            <h3 class="footer__contact--title">Telefone</h3>
            <p class="footer__contact--text"><?php print $contato["phone"]; ?></p>
            <p class="footer__contact--text"><?php print $contato["whatsapp"]["number"]; ?></p>
            

          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(!empty($endereco["address"])): ?>
      <div class="footer__contact--item">
        <div class="contact__item--wrapper">
          <div class="footer__contact--icon">
            <img
            src="<?php print get_template_directory_uri(); ?>/image/icon-maps-green.png"
            alt="Ícone de mapa"
            class="footer__contact--image"
            >
          </div>
          <div class="footer__contact--content">
            <h3 class="footer__contact--title">Endereço</h3>
            <p class="footer__contact--text"><?php print $endereco["address"]; ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if(!empty($contato["mail"])): ?>
      <div class="footer__contact--item">
        <div class="contact__item--wrapper">
          <div class="footer__contact--icon">
            <img
            src="<?php print get_template_directory_uri(); ?>/image/icon-mail-green.png"
            alt="Ícone de telefone"
            class="footer__contact--image"
            >
          </div>
          <div class="footer__contact--content">
            <h3 class="footer__contact--title">E-mail</h3>
            <p class="footer__contact--text"><?php print $contato["mail"]; ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

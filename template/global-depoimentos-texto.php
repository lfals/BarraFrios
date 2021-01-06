<?php
$depoimentos = get_field("ht_depoimento_texto", "options");
if(!empty($depoimentos)):
?>
<div class="depoimentos depoimentos--texto">
  <div class="depoimentos__list--texto depoimentos--texto-js">
    <?php foreach($depoimentos as $i => $depoimento): ?>
      <div class="depoimentos__item--texto">
        <h3 class="depoimento__item--title"><?php print $depoimento["ht_depoimento_texto_nome"]; ?></h3>
        <div class="depoimento__container">
          <?php
            print mb_substr($depoimento["ht_depoimento_texto_content"],0,250);
            if(mb_strlen($depoimento["ht_depoimento_texto_content"]) > 250):
          ?>
          [...] <a href="#" class="depoimento__leia modal__show" data-id="modal__<?php print $i; ?>">Leia mais</a>
          <?php endif; ?>
        </div>
        <div class="depoimento__item--subtitulo">
          <?php print $depoimento["ht_depoimento_texto_subtitulo"]; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="depoimento__cta">
    <a href="#" class="button depoimento__button modal__show"  data-id="modal__mail">
      Envie seu sepoimento <img src="<?php print get_template_directory_uri() ?>/image/icon-send.png" style="height:15px; width: auto; margin-left:15px;" alt="Ícone de envio">
    </a>
  </div>
</div>
<?php foreach($depoimentos as $i => $depoimento): ?>
  <div class="modal__wrapper modal__<?php print $i; ?>">
    <div class="modal__container">
      <div class="modal__header">
        <a href="#" class="modal__close" data-id="modal__<?php print $i; ?>">Fechar <i class="fas fa-times"></i></a>
      </div>
      <div class="modal__body">
        <?php print wpautop($depoimento["ht_depoimento_texto_content"]); ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<div class="modal__wrapper modal__mail">
  <div class="modal__container">
    <div class="modal__header">
      <a href="#" class="modal__close" data-id="modal__mail">Fechar <i class="fas fa-times"></i></a>
    </div>
    <div class="modal__body">
      <form class="depoimento__send" method="post">
        <div class="depoimento__group">
          <label class="contact__label" for="<?php print md5("ht-depoimento-nome") ?>">Seu nome</label>
          <input type="text" class="contact__field" name="<?php print md5("ht-depoimento-nome") ?>" placeholder="Ex: Antônio Rodrigues">
        </div>
        <div class="depoimento__group">
          <label class="contact__label" for="<?php print md5("ht-depoimento-relação") ?>">Relação com a escola</label>
          <input type="text" class="contact__field" name="<?php print md5("ht-depoimento-nome") ?>" placeholder="Ex: Mãe de aluno">
        </div>
        <div class="depoimento__group depoimento__group--line">
          <label class="contact__label" for="<?php print md5("ht-depoimento-depoimento") ?>">Depoimento</label>
          <textarea name="<?php print md5("ht-depoimento-depoimento") ?>" rows="8" class="contact__field contact__field--textarea"></textarea>
        </div>
        <div class="depoimento__group depoimento__group--line depoimento__group--submit">
          <button type="submit" name="<?php print md5("ht-depoimento-button") ?>" class="button depoimento__button">Enviar  <img src="<?php print get_template_directory_uri() ?>/image/icon-send.png" style="height:15px; width: auto; margin-left:15px;" alt="Ícone de envio"></button>
          <input type="hidden" name="<?php print md5("ht-action") ?>" value="<?php print md5("ht-depoimento") ?>">
        </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>

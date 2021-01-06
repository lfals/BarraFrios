<?php
$depoimentos = get_field("ht_depoimento_video", "options");
if(!empty($depoimentos)):
?>
<div class="depoimentos depoimentos--video">
  <h2 class="title depoimentos__title">O que dizem de nós</h2>
  <div class="depoimentos__list--video depoimentos--video-js">
    <?php foreach($depoimentos as $depoimento): ?>
      <div class="depoimentos__item--video">
        <div class="depoimento__embed">
          <?php print $depoimento["ht_depoimento_video_embed"]; ?>
        </div>
        <div class="depoimentos__info">
          <div class="depoimentos__info--icon">
            <img src="<?php print get_template_directory_uri(); ?>/image/testimony.png" alt="Ícone de Depoímento">
          </div>
          <div class="depoimentos__info--text">
            <span class="depoimento__info--name">
              <?php print $depoimento["ht_depoimento_video_nome"]; ?>
            </span>
            <?php if(!empty($depoimento["ht_depoimento_video_subtitulo"])): ?>
              <span class="depoimento__info--subtitulo">
                <?php print $depoimento["ht_depoimento_video_subtitulo"]; ?>
              </span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

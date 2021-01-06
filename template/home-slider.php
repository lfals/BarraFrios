<?php
$p = get_queried_object();
$banners = get_field("ht_home_banner", $p);
if(!empty($banners)):
?>
<div class="home-banner home-banner--desktop home-banner--js">
  <?php foreach($banners as $banner): ?>
    <div class="home-banner__item home-banner__item--desktop" style="background-image:url('<?php print $banner["ht_home_banner_imagem_desktop"]["url"] ?>')">
      <div class="home-banner__content--desktop">

        <div class="home-banner__wrapper--desktop">
          <h3 class="home-banner__title home-banner__title--desktop"><?php print $banner["ht_home_banner_titulo"]; ?></h3>
          <div class="home-banner__text home-banner__text--desktop">
            <?php print $banner["ht_home_banner_conteudo"]; ?>
          </div>
          <?php if(!empty($banner["ht_home_banner_link"])): ?>
            <a href="<?php print $banner["ht_home_banner_link"] ?>" class="home-banner__link home-banner__link--desktop">
            <img src="<?php print get_template_directory_uri(); ?>/image/icon-cta-blue.png" class="ht-header__contact--icon" alt="Ícone do CTA"><?php print $banner["ht_home_banner_cta"] ?>
            </a>
          <?php endif; ?>
        </div>

      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="home-banner home-banner--mobile home-banner--js">
  <?php foreach($banners as $banner): ?>
    <div class="home-banner__item home-banner__item--mobile" style="background-image:url('<?php print $banner["ht_home_banner_imagem_mobile"]["url"] ?>')">
      <div class="home-banner__content--mobile">
        <div class="home-banner__wrapper--mobile">
          <h3 class="home-banner__title home-banner__title--mobile"><?php print $banner["ht_home_banner_titulo"]; ?></h3>
          <div class="home-banner__text home-banner__text--mobile">
            <?php print $banner["ht_home_banner_conteudo"]; ?>
          </div>
          <?php if(!empty($banner["ht_home_banner_link"])): ?>
            <a href="<?php print $banner["ht_home_banner_link"] ?>" class="home-banner__link home-banner__link--desktop">
              <img src="<?php print get_template_directory_uri(); ?>/image/icon-cta-blue.png" class="ht-header__contact--icon" alt="Ícone do CTA"> <?php print $banner["ht_home_banner_cta"] ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>

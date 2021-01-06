<?php
$p = get_queried_object();
$about = get_field("ht_quem_somos_content", $p);
if(!empty($about)):
?>
<div class="about">
  <div class="about__image">
    <div class="wrapper">
      <img src="<?php print get_template_directory_uri() ?>/image/logo.png" alt="Logo de <?php print bloginfo("name") ?>">
    </div>
  </div>
  <div class="about__content">
    <div class="wrapper">
      <h2 class="title"><?php print the_content( ) ?></h2>
      <div class="about__text about__text--scroll">
        <?php print wpautop($about); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

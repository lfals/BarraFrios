<?php
$p = get_queried_object();
$post = [
  "content" => get_field("ht_post_content", $p),
  "image" => get_field("ht_post_image", $p),
];

if(!empty($post["content"])):
?>
<div class="post">
  <div class="post__container">
    <?php if(!empty($post["image"]["url"])): ?>
    <div class="image__wrapper">
      <a
      href="<?php print $post["image"]["url"] ?>"
      class="post__image"
      style="background-image:url('<?php print $post["image"]["sizes"]["large"]; ?>')"
      >
      Imagem destacada
      </a>
    </div>
  <?php endif; ?>
  <h1 class="title post__title"><?php print $p->post_title; ?></h1>
  <div class="post__content">
    <?php print wpautop($post["content"]); ?>
  </div>
  </div>
</div>
<?php endif; ?>

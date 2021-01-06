<?php
if(is_front_page() == true)
  $p = get_post(get_option( 'page_for_posts' ));
else
  $p = get_queried_object();

if(empty($_GET["s"]))
{
  $posts = new ht_post_group("post");
  if(is_front_page() == true)
    $posts->set_number_post(3);
  $posts = $posts->get_post();
}else{
  // $args = [
  //   "posts_per_page" => -1,
  // ];
  // $posts = query_posts($args);
  global $query_string;
  $args = [
    "posts_per_page" => -1,
  ];
  wp_parse_str( $query_string, $search_query, $args );
  $posts = query_posts( $search_query );
}
?>
<div class="blog__wrapper">
  <h1 class="title title--dark blog__title"><?php print $p->post_title ?></h1>
  <div class="blog__desc">
    <?php print wpautop($p->post_content); ?>
  </div>
  <?php if(!is_front_page()) get_search_form(); ?>
  <?php if(!empty($posts)): ?>
  <div class="blog__list<?php if(is_front_page()) print " blog__list--home" ?>">
    <?php foreach($posts as $post): ?>
      <a href="<?php print get_permalink($post); ?>" class="blog__item">
        <div
        class="blog__thumb"
        style="background-image:url(<?php print get_field("ht_post_image", $post)["sizes"]["medium"];  ?>)">

        </div>
        <div class="blog__info">
          <h2 class="title blog__info--title"><?php print $post->post_title ?></h2>
          <div class="blog__resume">
            <?php
              print substr(strip_tags(get_field("ht_post_content", $post)),0,100) ."[...] <span class=\"blog__leia\">Leia mais</sapn>";
            ?>
          </div>
          <div class="blog__date">
            <?php print ucfirst(get_the_date("l , d/m/Y", $p->ID )); ?>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <?php else: ?>
  <div class="blog__no-post">
    <div class="blog__no-post--label">
      Nenhuma publicação foi encontrada
    </div>
  </div>
  <?php endif; ?>
  <?php if(is_front_page()): ?>
  <div class="blog__mais">
    <a href="<?php print get_permalink(get_option( 'page_for_posts' )) ?>" class="button button--dark-outline mais__button">
      Veja mais  <i class="fas fa-long-arrow-alt-right" style="margin-left:10px;"></i>
    </a>
  </div>
  <?php endif; ?>
</div>

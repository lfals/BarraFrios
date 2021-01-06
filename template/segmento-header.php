<?php
$p = get_queried_object();
$imagem = get_field("ht_post_image", $p);
if(!empty($imagem)):
?>
<div class="segmento__header" style="background-image:url('<?php print $imagem["url"]; ?>')">

</div>
<?php endif; ?>

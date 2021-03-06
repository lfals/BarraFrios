<?php 
$images = get_field('ht_clients', 'option');
$subtitle = get_field('ht_client_text', 'option');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

?>

<div class="ht__global-clientes">
    <h1>Conheça Nossos Parceiros</h1>

    <p><?php print $subtitle ?></p>
    <div>
        <button class="prev_arrow"><i class="fas fa-angle-left"></i></button>
            <div class="clientes-carroussel parceiros__list--home">
                <?php if( $images ):
                    foreach( $images as $image ): ?>
                                <a class="service__gallery" href="<?php print $image?>">
                                    <img src="<?php print $image?>" alt="">
                                </a>
                        <?php endforeach; 
                    endif; ?>
            </div>
        <button class="next_arrow"><i class="fas fa-angle-right"></i></button>
    </div>
</div>
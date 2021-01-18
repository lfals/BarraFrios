<div class="produtos">
    <div class="imagem">
        <img src="<?php print get_template_directory_uri() ?>/image/img.png" alt="">
    </div>
    <div class="bloco-texto">
        <h1 class="ht_produtos__titulo">Conheça Nossos Produtos</h1>
        <p class="ht_produtos__sobre"><?php print the_field("ht__product-description-short", 'option') ?></p>
        <a class="ht_produtos__link" href="<?php print the_field("ht__product-description-cta", 'option')?>">
            <button class="ht_produtos__cta-button">Saiba Mais</button>
        </a>
    </div>
</div>
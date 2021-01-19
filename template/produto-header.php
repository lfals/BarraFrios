<div class="header-produto">
    <div>
        <div class="ht__produto-image-container">
            <a class="no-mobile" href="<?php print get_permalink( get_post()->post_parent) ?>">Retornar à página anterior</a>
            <div style="background-image: url('<?php print get_field("ht__produto-foto") ?>'); background-position: center; background-size: cover;">
            </div>
        </div>
        <div class="ht__produto-info">
            <h1><?php print the_title() ?> <?php print get_field("ht__produto-peso") ?></h1>
            <p><?php print wpautop(the_content(), false) ?></p>
            <p>( <?php print get_field("ht__produto-descr") ?> - Peso mínimo <?php print get_field("ht__produto-peso-min") ?> - Venda disponível apenas peça inteira)</p>
            <div>
                <a href="<?php print get_field("ht_nav_contact", "option"); ?>">Entre em Contato</a>
                <p>Consulte todas informações com um de nossos atendente</p>
            </div>
            <p class="detail">Fabricante: <?php print get_field("ht__produto-fabricante") ?></p>
            <p class="detail">Categoria: <?php print get_field("ht__produto-tipo") ?></p>
            <p class="detail">Corte: <?php print get_field("ht__produto-corte") ?></p>
        </div>
    </div>
</div>
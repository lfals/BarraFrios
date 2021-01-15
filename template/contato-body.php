<?php 
       $args = array(  
        'post_type' => 'atendente',
        'post_status' => 'publish',
    );
    $loop = new WP_Query( $args ); 
        
    
?>
<div class="ht__contato-body-wraper" id="contato">
    <div class="ht__contato-body-header">
        <h1>Nossos Atendentes Comerciais</h1>
        <p><? print get_field("ht__contato-texto-atendentes")?></p>

        <select name="estados" id="estados">
            <option value="Selecione seu estado" autofocus>Selecione seu estado</option>
            <option value="Rio de Janeiro">Rio de Janeiro</option>
            <option value="São Paulo">São Paulo</option>
            <option value="Espírito Santo">Espírito Santo</option>
            <option value="Minas Gerais">Minas Gerais</option>
        </select>
    </div>
    <div class="ht__contato-card-holder">
        <?php
            while ( $loop->have_posts() ) : $loop->the_post(); 
        ?>
        <div class="ht__contato-card">
        <h1></h1>
            <h1 class="ht__contato-nome"><? print the_title()?></h1>
            <p class="ht__contato-tel"><? print get_field("ht_contato_atendente--telefone") ?></p>
            <p class="ht__contato-email"><? print get_field("ht_contato_atendente--email") ?></p>
            <p class="ht__contato-cep"><? print get_field("ht_contato_atendente--cidade") ?>, <? print get_field("ht_contato_atendente--estado") ?></p>
        </div>
        <?php
            endwhile;
            wp_reset_postdata(); 
        ?>
    </div>
</div>
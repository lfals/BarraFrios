    <?php
    $current_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
    $slug = $current_page->post_name;

    $args = array(  
        'post_type' => 'produto',
        'post_status' => 'publish',
    );
    $loop = new WP_Query( $args ); 
    $taxonomies = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $info =  get_field("ht__produto-fabricante");
        $fabricantes = $info->name;
        if(!in_array($fabricantes, $taxonomies)){
            array_push($taxonomies, $fabricantes);
        };
    endwhile;
    
        
    ?>
    

<div class="vitrine-body-wraper">
    <div class="filtro-wraper">
        <!-- <div class="filtro-categorias">
            <h1>categorias</h1>
        </div> -->
        <!-- <div class="filtro-subcategorias">
            <h1>Subcategorias</h1>
        </div> -->
        <!-- <div class="filtro-fornecedores">
            <h1>Fornecedores</h1>
            <ul>
                <?php 
                    foreach($taxonomies as $taxonomie){
                        print '<li> <input type="checkbox" name="'.$taxonomie.'" id="'.$taxonomie.'"><label for="'. $taxonomie. '">'. $taxonomie. '</label></li>';
                    }
                ?>
            </ul>
        </div> -->
        <form action="POST" class="box-newsletter" id="box-newsletter">
            <h1>Receba Novidades</h1>
            <p>Cadastre seu contato para receber novidades sempre!</p>
            <input type="email"  name="site-footer-news-email" id="site-footer-news-email" placeholder="E-mail ou Número de Telefone" >
            <button type="submit" name="site-footer-news-btn">Cadastrar Contato</button>
        </form>
    </div>
    <div class="vitrine-produtos-wraper">
        <?php
            while ( $loop->have_posts() ) : $loop->the_post(); 
                    $fabricante =  get_field("ht__produto-fabricante");
                    $field = get_field_object( 'ht__produto-tipo' );
                    $value = $field['value'];
                    $label = $field['choices'][ $value ];

                    if($value == $slug) :
                        
                        ?>
        <div class="cortes-card cards-vitrine ">
            <div class="foto-corte" style=" background-size: cover; background-position: center; background-image: url(<?php print get_field("ht__produto-foto")?>);">
                <div class="image-button">
                    <a href="<?php print get_post_permalink() ?>">Saiba Mais</a>
                </div>
                
            </div>
            <h1 class="card-title" ><?php print the_title() ?> <? print get_field("ht__produto-peso") ?></h1>
            <p class="card-description">(<?php print get_field("ht__produto-descr") ?> - Peso mínimo <?php print get_field("ht__produto-peso-min") ?>)</p>
            <a class="card-button" href="<?php print get_field("ht_nav_contact", "option") ?>">Entre Em Contato</a>
            
        </div>
        <?php
            endif;
            endwhile;
            wp_reset_postdata(); 
        ?>
       
    </div>
</div>

<style>
    .contato-wraper{
        margin-top: 150px;
    }
</style>
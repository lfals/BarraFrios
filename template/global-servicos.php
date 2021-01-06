<?php
    $args = array(
        'post_type' => 'page',//it is a Page right?
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-template-servico.php',
    );

 
// The Query
$the_query = new WP_Query( $args );
// The Loop

?>


<div class="ht_global_services">
        <h1>Nossos Serviços</h1>
        <p><?php print  get_the_excerpt(  ) ?></p>
            <div class="ht_services_carroussel_card">
                <?php 
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                ?>
                <div class="ht_service_card">
                    <?php if( get_field('ht_service_icon') ): ?>
                        <img src="<?php the_field('ht_service_icon'); ?>" />
                    <?php endif; ?>
                    <h1> <?php print get_the_title() ?></h1>
                    <a href="<?php print get_the_permalink() ?>">Saiba Mais<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.51189 4.35562C9.46824 4.39917 9.4336 4.45089 9.40997 4.50784C9.38634 4.56479 9.37418 4.62584 9.37418 4.6875C9.37418 4.74916 9.38634 4.81021 9.40997 4.86716C9.4336 4.9241 9.46824 4.97583 9.51189 5.01937L11.9935 7.5L9.51189 9.98062C9.46831 10.0242 9.43374 10.0759 9.41015 10.1329C9.38656 10.1898 9.37442 10.2509 9.37442 10.3125C9.37442 10.3741 9.38656 10.4352 9.41015 10.4921C9.43374 10.5491 9.46831 10.6008 9.51189 10.6444C9.55547 10.688 9.60721 10.7225 9.66416 10.7461C9.7211 10.7697 9.78213 10.7818 9.84377 10.7818C9.9054 10.7818 9.96643 10.7697 10.0234 10.7461C10.0803 10.7225 10.1321 10.688 10.1756 10.6444L12.9881 7.83187C13.0318 7.78833 13.0664 7.7366 13.0901 7.67965C13.1137 7.62271 13.1259 7.56166 13.1259 7.5C13.1259 7.43834 13.1137 7.37729 13.0901 7.32034C13.0664 7.26339 13.0318 7.21167 12.9881 7.16812L10.1756 4.35562C10.1321 4.31197 10.0804 4.27734 10.0234 4.25371C9.96647 4.23007 9.90542 4.21791 9.84377 4.21791C9.78211 4.21791 9.72106 4.23007 9.66411 4.25371C9.60716 4.27734 9.55543 4.31197 9.51189 4.35562Z" fill="#281D75"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.6562 7.5C12.6562 7.37568 12.6069 7.25645 12.519 7.16854C12.431 7.08064 12.3118 7.03125 12.1875 7.03125H2.34375C2.21943 7.03125 2.1002 7.08064 2.01229 7.16854C1.92439 7.25645 1.875 7.37568 1.875 7.5C1.875 7.62432 1.92439 7.74355 2.01229 7.83146C2.1002 7.91936 2.21943 7.96875 2.34375 7.96875H12.1875C12.3118 7.96875 12.431 7.91936 12.519 7.83146C12.6069 7.74355 12.6562 7.62432 12.6562 7.5Z" fill="#281D75"/>
</svg>
</a>
                </div>
                <?php } ?>
            </div>
    </div>



<?php 
}

wp_reset_postdata();

    
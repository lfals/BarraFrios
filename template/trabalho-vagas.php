<?php 
       $args = array(  
        'post_type' => 'vagas',
        'post_status' => 'publish',
    );
    $loop = new WP_Query( $args ); 
        
    
?>


<div class="ht__vagas">
    <h1>Trabalhe Conosco</h1>
    <p><?php print the_content( ) ?></p>
    
    <div>
        <?php 
            while ( $loop->have_posts() ) : $loop->the_post(); 
        ?>
        <div class="ht_vagas_cards">
            <h1><?php print the_title() ?></h1>
			<div>
           		 <p><?php the_excerpt(  ) ?></p>
			</div>
			</div>
        <?php
            endwhile;
            wp_reset_postdata(); 
        ?>


    </div>
</div>
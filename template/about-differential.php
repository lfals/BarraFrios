<div class="ht__differential">
    <h1>Diferencial da Qualitec</h1>
    <div>
        <img src="<?php print get_template_directory_uri() ?>/image/about-icon-1.png" alt="">
        <img src="<?php print get_template_directory_uri() ?>/image/about-icon-2.png" alt="">
        <img src="<?php print get_template_directory_uri() ?>/image/about-icon-3.png" alt="">
    </div>
    <div class="list ht__list-carroussel">
        <div class="ht_service_list_group">
            <ul class="ht_service_list_item_group">
                <?php
                if( have_rows('ht_differential_column_1') ):
                    while( have_rows('ht_differential_column_1') ) : the_row();
                ?>
                <li class="ht_service_list_item"> <img
                        src="<?php print get_template_directory_uri() ?>/image/list-icon.png" alt=""> <span>
                        <?php print get_sub_field('ht_differential_column_item'); ?> </span> </li>

                <?php
                    endwhile;
                    endif;
                ?>
            </ul>
        </div>
        <div class="ht_service_list_group">
            <ul class="ht_service_list_item_group">
                <?php
                if( have_rows('ht_differential_column_1') ):
                    while( have_rows('ht_differential_column_1') ) : the_row();
                ?>
                <li class="ht_service_list_item"> <img
                        src="<?php print get_template_directory_uri() ?>/image/list-icon.png" alt=""> <span>
                        <?php print get_sub_field('ht_differential_column_item'); ?> </span> </li>

                <?php
                    endwhile;
                    endif;
                ?>
            </ul>
        </div>
    </div>
    <div class="ht_carroussel_button no-desktop">
        <button type="button" class="prev">
            <svg width="52" height="27" viewBox="0 0 52 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M51 13.5L1 13.5" stroke="#281D75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.5 1L1 13.5L13.5 26" stroke="#281D75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button type="button" class="next">
            <svg width="52" height="27" viewBox="0 0 52 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 13.5L51 13.5" stroke="#281D75" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M38.5 1L51 13.5L38.5 26" stroke="#281D75" stroke-width="2" stroke-linecap="round"stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>
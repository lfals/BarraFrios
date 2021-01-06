<?php 
    $vantagens = get_field("ht_benefit_group")
?>
<div class="ht__benefits">
    <h1>Vantagens de Terceirizar Seus Serviços</h1>
    <span></span>
    <div class="ht__list-carroussel-benefits"> 
        <?php if( have_rows('ht_benefit_group') ): ?>
            <?php while( have_rows('ht_benefit_group') ): the_row(); ?>
                    <div class="ht_benefits_cards_group">
                        <div class="ht_benefits_cards">
                            <h1><?php print get_row_index() ?></h1>
                            <div class="ht_benefits_cards_body">
                                <img src="<?php print get_sub_field('ht_benefit_icon') ?>" alt="">
                                <h1><?php print get_sub_field('ht_benefit') ?></h1>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="ht_carroussel_button no-desktop">
        <button type="button" class="prev-benefits">
            <svg width="52" height="27" viewBox="0 0 52 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M51 13.5L1 13.5" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.5 1L1 13.5L13.5 26" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button type="button" class="next-benefits">
            <svg width="52" height="27" viewBox="0 0 52 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 13.5L51 13.5" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M38.5 1L51 13.5L38.5 26" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>
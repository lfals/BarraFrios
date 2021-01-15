<?php
//Template name: Vitrine
get_header();
get_template_part("template/global","header");
get_template_part("template/button","float");

get_template_part("template/vitrine","header");
get_template_part("template/vitrine", "body");

get_template_part("template/global","contato");
get_template_part("template/global","footer");
get_footer();

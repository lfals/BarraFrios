<?php
/* Arquivo para Modelo de Página Padrão*/
get_header();
get_template_part("template/global","header");
get_template_part("template/produto","header");
    
// get_template_part("template/global", "produtos-relacionados");
get_template_part("template/global", "contato");
get_template_part("template/global","footer");
get_footer();

<?php
/**
* Todo o setup do tema deve ser feito neste arquivo.
*
* Instanciando uma nova classe HT
*/
$ht = new hattrick;
session_start();
date_default_timezone_set('america/sao_paulo');
/*
* Adicionando o CSS
*/
$ht->register_css(array(
  array("ht_reset", get_template_directory_uri() ."/css/reset.css"),
  array("ht_main_css", get_template_directory_uri() ."/css/main.css"),
  array("ht_header_css", get_template_directory_uri() ."/css/header.css"),
  array("ht_slider_css", get_template_directory_uri() ."/css/slider.css"),
  array("ht_about_css", get_template_directory_uri() ."/css/about.css"),
  array("ht_differential_css", get_template_directory_uri() ."/css/differential.css"),
  array("ht_galeria_css", get_template_directory_uri() ."/css/galeria.css"),
  array("ht_float_css", get_template_directory_uri() ."/css/float.css"),
  array("ht_benefits_css", get_template_directory_uri() ."/css/benefits.css"),
  array("ht_contact_css", get_template_directory_uri() ."/css/contact.css"),
  array("ht_servicos_css", get_template_directory_uri() ."/css/servicos.css"),
  array("ht_servico_css", get_template_directory_uri() ."/css/servico.css"),
  array("ht_clientes_css", get_template_directory_uri() ."/css/clientes.css"),
  array("ht_vagas_css", get_template_directory_uri() ."/css/vagas.css"),
  array("ht_segmento_css", get_template_directory_uri() ."/css/segmento.css"),
  array("ht_blog_css", get_template_directory_uri() ."/css/blog.css"),
  array("ht_depoimentos_css", get_template_directory_uri() ."/css/depoimentos.css"),
  array("ht_footer_css", get_template_directory_uri() ."/css/footer.css"),
  array('fontawesome_css', get_template_directory_uri() . '/css/vendor/all.css'),
  array('slick_css', get_template_directory_uri() . '/css/vendor/slick.min.css'),
  array('datapicker_css', get_template_directory_uri() . '/css/vendor/datarangepicker.min.css'),
  array('lightgallery_css', get_template_directory_uri() . '/css/vendor/lightgallery.min.css'),
  array('sweetalert2_css', get_template_directory_uri() . '/css/vendor/sweetalert2.min.css'),
));
$ht->do_css();
/*
* Adicionando o JS
*/
$ht->register_js(array(
  array('jquery', get_template_directory_uri() . '/js/vendor/jquery.min.js'),
  array('ht_main_js', get_stylesheet_directory_uri() . '/js/main.js'),
  array('fontawesome_js', get_stylesheet_directory_uri() . '/js/all.js'),
  array('jquery_mobile', get_template_directory_uri() . '/js/vendor/jquery.mobile.custom.min.js', array('jquery')),
  array('jquery_mask', get_template_directory_uri() . '/js/vendor/jquery.mask.min.js', array('jquery')),
  array('slick_js', get_template_directory_uri() . '/js/vendor/slick.min.js'),
  array('lightgallery_js', get_template_directory_uri() . '/js/vendor/lightgallery.min.js', array('jquery')),
  array('lg_fullscreen_js', get_template_directory_uri() . '/js/vendor/lg-fullscreen.min.js', array('jquery')),
  array('lg_thumnail_js', get_template_directory_uri() . '/js/vendor/lg-thumbnail.min.js', array('jquery')),
  array('lg_video_js', get_template_directory_uri() . '/js/vendor/lg-video.min.js', array('jquery')),
  array('sweetalert2_js', get_template_directory_uri() . '/js/vendor/sweetalert2.min.js', array('jquery')),
));
$ht->do_js();
/*
* Adicionando os campos de otimização SEO nos tipos de post especificados em $postTypes
*/
$postTypesFields = array( "post", "page");
$ht->add_seo_fields($postTypesFields);
$ht->add_fb_fields($postTypesFields);
/*
* Configurando o dashboard, login e admin menu
* Para alterar o layout da página de login, atualize essas configuracoes
* $ht->login_logo = "url";
* $ht->$login_bg = "url";
* $ht->login_header_url = "url";
*/
$ht->add_default_dashboard();
//$ht->remove_menu_itens(); #<-- Remove opções do menu da Dashboard
/*
* Adicionando as option pages padrões
*/
$ht->add_default_options_pages();
//$ht->add_options_pages("Informações Básicas", "conf_base_info", "Informações Básicas", "conf_site");
// $ht->add_options_pages("Serviços", "conf_services", "Serviços", "conf_site");
$ht->add_options_pages("Depoimentos", "conf_testimony", "Depoimentos", "conf_site");



/*
* Tipos de post
*/

$servicos = new ht_custom_post("Vagas", "vagas");
$servicos->set_arg("menu_icon", "dashicons-insert");
$servicos->do_post();

// $mural = new ht_custom_post("Mural de recados", "mural");
// $mural->set_arg("menu_icon", "dashicons-megaphone");
// $mural->do_post();





//Caso seja preciso remover os editores
//function sem_editor() { remove_post_type_support( 'exemplo', 'editor' );}
//add_action( 'init', 'sem_editor' );
//Forçar que o DatePicker do ACF salve o valor como TIMESTAMP
function ht_date_timestamp( $value, $post_id, $field ) { return strtotime( $value ); }
add_filter('acf/update_value/type=date_time_picker', 'ht_date_timestamp', 10, 3);
//Incluindo arquivo file.php caso seja necessário realizar uploads
if(!function_exists('wp_handle_upload')) { require_once( ABSPATH . 'wp-admin/includes/file.php' ); }
//Inserindo o arquivo admin.css no Dashboard
function ht_admin_css(){ if(file_exists(get_template_directory() ."/css/admin.css")) print "<style>@import \"". get_template_directory_uri() ."/css/admin.css\"</style>"; }
add_action('admin_head', 'ht_admin_css');
//Inserindo o arquivo admin.js no Dashboard
function ht_admin_js(){if(file_exists(get_template_directory() ."/js/admin.js")) print "<script src=\"". get_template_directory_uri() ."/js/admin.js\"></script>"; }
add_action('admin_head', 'ht_admin_js');

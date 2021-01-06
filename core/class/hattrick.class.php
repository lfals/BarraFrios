<?php
class hattrick{
  /**
  TODO: adicionar campos padrões para as option pages INSTITUCIONAL e NAVEGACAO.
  criar as funcoes default_fields_institucional e default_fields_navegacao
  se usadas as funções, eles populam com o código padrão. Caso precise fazer
  campos específicos, basta nao chamar a funcao.
  */
  private $css;
  private $js;

  public $login_logo = "http://hattrickcomunicacao.com.br/feed/login/login-logo.png";
  public $login_header_url = "http://htcomunicacao.com.br";
  public $login_bg = "http://hattrickcomunicacao.com.br/feed/login/bg-body.png";

  public function __construct(){}
  public function register_css($name, $path = NULL){
    if(is_array($name)){
      foreach($name as $i => $n){
          $this->css[] = $n;
      }
    }elseif(is_string($name)){
      if($path)
        $this->css[] = array($name, $path);
      else
        return FALSE;
    }elseif(!$name)
      return NULL;
  }
  public function register_js($name, $path = NULL){
    if(is_array($name)){
      foreach($name as $i => $n){
          $this->js[] = $n;
      }
    }elseif(is_string($name)){
      if($path)
        $this->js[] = array($name, $path);
      else
        return FALSE;
    }elseif(!$name)
      return NULL;
  }
  public function do_css(){
    if($this->css){
      foreach($this->css as $c){
        if($GLOBALS['pagenow'] != 'wp-login.php')
          if(!is_admin())
            wp_enqueue_style($c[0], $c[1], $c[2], $c[3], $c[4]);
      }

      return TRUE;
    }else
      return FALSE;
  }
  public function do_js(){
    if($this->js){
      foreach($this->js as $c){
        if($GLOBALS['pagenow'] != 'wp-login.php')
          //if(!is_admin())
            wp_enqueue_script($c[0], $c[1], $c[2], $c[3], $c[4]);
      }
      return TRUE;
    }else
      return FALSE;
  }
  public function do_woocoomerce(){ add_theme_support( 'woocommerce' ); }
  public function ht_woocommerce(){ add_action( 'after_setup_theme', array($this, "do_woocoomerce") ); }
  public function hide_admin_bar(){ add_filter('show_admin_bar', '__return_false'); }
  public function show_admin_bar(){ add_filter('show_admin_bar', '__return_true'); }
  public function add_thumb($size_h = NULL, $size_v = NULL){
    if(!$size_h)
      $size_h = 120;
    if(!$size_v)
      $size_v = 120;
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( $size_h, $size_v );
  }
  /*
  * Função para adicionar os campos de otmização SEO
  *
  * Adicionada em 26/09/2019
  */
  public function add_seo_fields($args = NULL){
    if(!$args)
      $args = array("post", "page");
    foreach($args as $a){
      $arr_post_type[] = array(
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => "$a",
        )
      );
    }
    if(function_exists('acf_add_local_field_group')){

      acf_add_local_field_group(array (
      	'key' => 'group_5c796a0a3317f',
      	'title' => 'Otimização SEO',
      	'fields' => array (
      		array (
      			'key' => 'field_5c796a69bd89a',
      			'label' => 'Tag title otimizada',
      			'name' => 'ht_seo_title',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_5c796a86bd89b',
      			'label' => 'Metatag description otimizada',
      			'name' => 'ht_seo_description',
      			'type' => 'textarea',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'maxlength' => 319,
      			'rows' => 5,
      			'new_lines' => '',
      		),

      	),
      	'location' => $arr_post_type,
      	'menu_order' => 10,
      	'position' => 'side',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'active' => 1,
      	'description' => '',
      ));
    }

  }
  /*
  * Função para adicionar os campos de otmização de compartilhamento do FB
  *
  * Adicionada em 26/09/2019
  */
  public function add_fb_fields($args = NULL){
    if(!$args)
      $args = array("post", "page");
    foreach($args as $a){
      $arr_post_type[] = array(
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => "$a",
        )
      );
    }
    if(function_exists('acf_add_local_field_group')){

      acf_add_local_field_group(array (
      	'key' => 'group_5c796b0b47308',
      	'title' => 'Otimização para Facebook',
      	'fields' => array (
      		array (
      			'key' => 'field_5c796b3205232',
      			'label' => 'Título',
      			'name' => 'ht_site_og_title',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array (
      			'key' => 'field_5c796b9305233',
      			'label' => 'Tipo',
      			'name' => 'ht_site_og_type',
      			'type' => 'select',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'choices' => array (
      				'activity' => 'activity',
      				'actor' => 'actor',
      				'album' => 'album',
      				'article' => 'article',
      				'athlete' => 'athlete',
      				'author' => 'author',
      				'band' => 'band',
      				'bar' => 'bar',
      				'blog' => 'blog',
      				'book' => 'book',
      				'cafe' => 'cafe',
      				'cause' => 'cause',
      				'city' => 'city',
      				'company' => 'company',
      				'country' => 'country',
      				'director' => 'director',
      				'drink' => 'drink',
      				'food' => 'food',
      				'game' => 'game',
      				'government' => 'government',
      				'hotel' => 'hotel',
      				'landmark' => 'landmark',
      				'movie' => 'movie',
      				'musician' => 'musician',
      				'non_profit' => 'non_profit',
      				'politician' => 'politician',
      				'product' => 'product',
      				'public_figure' => 'public_figure',
      				'restaurant' => 'restaurant',
      				'school' => 'school',
      				'song' => 'song',
      				'sport' => 'sport',
      				'sports_league' => 'sports_league',
      				'sports_team' => 'sports_team',
      				'state_province' => 'state_province',
      				'tv_show' => 'tv_show',
      				'university' => 'university',
      				'website' => 'website',
      			),
      			'default_value' => array (
                      'article'
      			),
      			'allow_null' => 0,
      			'multiple' => 0,
      			'ui' => 0,
      			'ajax' => 0,
      			'return_format' => 'value',
      			'placeholder' => '',
      		),

      		array (
      			'key' => 'field_5c796dbb05234',
      			'label' => 'Descrição',
      			'name' => 'ht_site_og_description',
      			'type' => 'textarea',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'maxlength' => 297,
      			'rows' => 5,
      			'new_lines' => '',
      		),
      		array (
      			'key' => 'field_5c796de905235',
      			'label' => 'Imagem',
      			'name' => 'ht_site_og_image',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array (
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'return_format' => 'array',
      			'preview_size' => 'thumbnail',
      			'library' => 'all',
      			'min_width' => '',
      			'min_height' => '',
      			'min_size' => '',
      			'max_width' => '',
      			'max_height' => '',
      			'max_size' => '',
      			'mime_types' => '',
      		),
      	),

      	'location' => $arr_post_type,
      	'menu_order' => 10,
      	'position' => 'side',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'active' => 1,
      	'description' => '',
      ));
    }

  }
  /*
  * Função para adicionar páginas de opção
  *
  * Adicionada em 26/09/2019
  */
  public function add_options_pages($page_title, $menu_slug, $menu_title = NULL, $parent_slug = NULL, $capability = "edit_posts", $position = 2){
    if($parent_slug && function_exists("acf_add_options_sub_page")){
      if(!$menu_title)
        $menu_title = $page_title;
      $args = array("page_title"  => $page_title,"menu_title"  => $menu_title,"menu_slug"   => $menu_slug,"parent_slug" => $parent_slug);
      $parent = acf_add_options_sub_page($args);
      $args = NULL;
    }elseif(function_exists("acf_add_options_page")){
      if(!$menu_title)
        $menu_title = $page_title;
      $args = array("page_title"  => $page_title,"menu_slug"   => $menu_slug,"capability"  => $capability,"position"    => $position );
      $parent = acf_add_options_page($args);
      $args = NULL;
    }else{return false;}
  }
  /*
  * Função para adicionar páginas de opção padrão
  *
  * Adicionada em 26/09/2019
  */
  public function add_default_options_pages(){
    $this->add_options_pages("Opções do site", "conf_site", "Opções do site");
    $this->add_options_pages("Configurar Institucional", "conf_site_institucional", "Institucional", "conf_site");
    $this->add_options_pages("Configurar Navegação", "conf_site_navegacao", "Navegação", "conf_site");
    $this->add_options_pages("Configurar Scripts", "conf_site_scripts", "Scripts", "conf_site");
    if( function_exists('acf_add_local_field_group') ){
      //Institucional
      acf_add_local_field_group(array(
      	'key' => 'group_5f42981875468',
      	'title' => 'Institucional',
      	'fields' => array(
      		array(
      			'key' => 'field_5f42981ea3458',
      			'label' => 'Logo',
      			'name' => 'ht_option_logo',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'return_format' => 'array',
      			'preview_size' => 'medium',
      			'library' => 'all',
      			'min_width' => '',
      			'min_height' => '',
      			'min_size' => '',
      			'max_width' => '',
      			'max_height' => '',
      			'max_size' => '',
      			'mime_types' => '',
      		),
      		array(
      			'key' => 'field_5f42983da3459',
      			'label' => 'Logo negativo',
      			'name' => 'ht_option_logo_negative',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'return_format' => 'array',
      			'preview_size' => 'medium',
      			'library' => 'all',
      			'min_width' => '',
      			'min_height' => '',
      			'min_size' => '',
      			'max_width' => '',
      			'max_height' => '',
      			'max_size' => '',
      			'mime_types' => '',
      		),
      		array(
      			'key' => 'field_5f429855a345a',
      			'label' => 'Favicon',
      			'name' => 'ht_option_favicon',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'return_format' => 'array',
      			'preview_size' => 'medium',
      			'library' => 'all',
      			'min_width' => '',
      			'min_height' => '',
      			'min_size' => '',
      			'max_width' => '',
      			'max_height' => '',
      			'max_size' => '',
      			'mime_types' => '',
      		),
      		array(
      			'key' => 'field_5f4298faa345b',
      			'label' => 'Endereço',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 0,
      		),
      		array(
      			'key' => 'field_5f429905a345c',
      			'label' => 'Endereço completo',
      			'name' => 'ht_option_address',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array(
      			'key' => 'field_5f42993fa345d',
      			'label' => 'Link da rota',
      			'name' => 'ht_option_rote',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '50',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array(
      			'key' => 'field_5f429954a345e',
      			'label' => 'iFrame do Google Maps',
      			'name' => 'ht_option_map',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '50',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array(
      			'key' => 'field_5f429969a345f',
      			'label' => '',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 1,
      		),
      		array(
      			'key' => 'field_5f429dfcc0cb6',
      			'label' => 'Contato',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 0,
      		),
      		array(
      			'key' => 'field_5f429abba3460',
      			'label' => 'E-mail principal',
      			'name' => 'ht_option_mail',
      			'type' => 'email',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '20',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      		),
      		array(
      			'key' => 'field_5f429c46a3461',
      			'label' => 'WhatsApp',
      			'name' => 'ht_option_whatsapp',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '20',
      				'class' => 'ht-mask__tel',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array(
      			'key' => 'field_5f429c46a3w61',
      			'label' => 'Telefone fixo',
      			'name' => 'ht_option_phone',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '20',
      				'class' => 'ht-mask__tel',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      			'prepend' => '',
      			'append' => '',
      			'maxlength' => '',
      		),
      		array(
      			'key' => 'field_5f429c6ea3462',
      			'label' => 'Link para WhatsApp',
      			'name' => 'ht_option_whatsapp_url',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '20',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array(
            'key' => 'field_5f429c6ea3463',
      			'label' => 'Chamada para ação',
      			'name' => 'ht_option_whatsapp_cta',
      			'type' => 'text',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '20',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => '',
      		),
      		array(
      			'key' => 'field_5f429e0ec0cb7',
      			'label' => '',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 1,
      		),
      		array(
      			'key' => 'field_5f429cd6a3463',
      			'label' => 'Social',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 0,
      		),
      		array(
      			'key' => 'field_5f429ce0a3464',
      			'label' => 'Facebook',
      			'name' => 'ht_option_social_fb',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => 'Ex.: https://facebook.com/seu_usuario',
      		),
      		array(
      			'key' => 'field_5f429ceda3465',
      			'label' => 'Instagram',
      			'name' => 'ht_option_social_ig',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => 'Ex.: https://instagram.com/seu_usuario',
      		),
      		array(
      			'key' => 'field_5f429d05a3466',
      			'label' => 'Linkedin',
      			'name' => 'ht_option_social_in',
      			'type' => 'url',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'placeholder' => 'Ex.: https://linkedin.com/usuario',
      		),
          array(
      			'key' => 'field_5f42981ea3499',
      			'label' => 'OG Imagem Global',
      			'name' => 'ht_site_og_image',
      			'type' => 'image',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '33.3',
      				'class' => '',
      				'id' => '',
      			),
      			'return_format' => 'array',
      			'preview_size' => 'medium',
      			'library' => 'all',
      			'min_width' => '',
      			'min_height' => '',
      			'min_size' => '',
      			'max_width' => '',
      			'max_height' => '',
      			'max_size' => '',
      			'mime_types' => '',
      		),
      		array(
      			'key' => 'field_5f429d348b991',
      			'label' => 'Social',
      			'name' => '',
      			'type' => 'accordion',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'open' => 1,
      			'multi_expand' => 1,
      			'endpoint' => 1,
      		),

      	),
      	'location' => array(
      		array(
      			array(
      				'param' => 'options_page',
      				'operator' => '==',
      				'value' => 'conf_site_institucional',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => '',
      	'active' => true,
      	'description' => '',
      ));
      acf_add_local_field_group(array(
        'key' => 'group_5d8d12b2b92a1',
        'title' => "Partes de códigos",
        'fields' => array(
          array(
            'key' => 'field_5d8d12b7a0913',
            'label' => 'Códigos no cabeçalho',
            'name' => 'ht_site_scripts_inicio',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5d8d12c9a0914',
            'label' => 'Códigos no rodapé',
            'name' => 'ht_site_scripts_fim',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'conf_site_scripts',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
      ));

      //Navegação
      // acf_add_local_field_group(array(
      // 	'key' => 'group_5f42a24fca363',
      // 	'title' => 'Navegação do cabeçalho',
      // 	'fields' => array(
      // 		array(
      // 			'key' => 'field_5f42a25bb21ed',
      // 			'label' => 'Navegação',
      // 			'name' => 'ht_nav',
      // 			'type' => 'repeater',
      // 			'instructions' => '',
      // 			'required' => 0,
      // 			'conditional_logic' => 0,
      // 			'wrapper' => array(
      // 				'width' => '',
      // 				'class' => '',
      // 				'id' => '',
      // 			),
      // 			'collapsed' => '',
      // 			'min' => 0,
      // 			'max' => 0,
      // 			'layout' => 'block',
      // 			'button_label' => 'Novo item',
      // 			'sub_fields' => array(
      // 				array(
      // 					'key' => 'field_5f42a26ab21ee',
      // 					'label' => 'Rótulo',
      // 					'name' => 'ht_nav_label',
      // 					'type' => 'text',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => 0,
      // 					'wrapper' => array(
      // 						'width' => '',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 					'prepend' => '',
      // 					'append' => '',
      // 					'maxlength' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a289b21ef',
      // 					'label' => 'Link externo?',
      // 					'name' => 'ht_nav_external',
      // 					'type' => 'true_false',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => 0,
      // 					'wrapper' => array(
      // 						'width' => '20',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'message' => '',
      // 					'default_value' => 0,
      // 					'ui' => 1,
      // 					'ui_on_text' => '',
      // 					'ui_off_text' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a2a1b21f0',
      // 					'label' => 'Link',
      // 					'name' => 'ht_nav_url',
      // 					'type' => 'url',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a289b21ef',
      // 								'operator' => '==',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '80',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a2b9b21f1',
      // 					'label' => 'Link',
      // 					'name' => 'ht_nav_url',
      // 					'type' => 'page_link',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a289b21ef',
      // 								'operator' => '!=',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '50',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'post_type' => '',
      // 					'taxonomy' => '',
      // 					'allow_null' => 0,
      // 					'allow_archives' => 0,
      // 					'multiple' => 0,
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a2ebb21f2',
      // 					'label' => 'Ancora',
      // 					'name' => 'ht_nav_anchor',
      // 					'type' => 'text',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a289b21ef',
      // 								'operator' => '!=',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '30',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 					'prepend' => '',
      // 					'append' => '',
      // 					'maxlength' => '',
      // 				),
      // 			),
      // 		),
      // 		array(
      // 			'key' => 'field_5f42a39b62670',
      // 			'label' => 'Exibir redes sociais?',
      // 			'name' => 'ht_nav_social_check',
      // 			'type' => 'true_false',
      // 			'instructions' => '',
      // 			'required' => 0,
      // 			'conditional_logic' => 0,
      // 			'wrapper' => array(
      // 				'width' => '33.3',
      // 				'class' => '',
      // 				'id' => '',
      // 			),
      // 			'message' => '',
      // 			'default_value' => 0,
      // 			'ui' => 1,
      // 			'ui_on_text' => '',
      // 			'ui_off_text' => '',
      // 		),
      // 		array(
      // 			'key' => 'field_5f42a39b62671',
      // 			'label' => 'Exibir CTA?',
      // 			'name' => 'ht_nav_cta_check',
      // 			'type' => 'true_false',
      // 			'instructions' => '',
      // 			'required' => 0,
      // 			'conditional_logic' => 0,
      // 			'wrapper' => array(
      // 				'width' => '33.3',
      // 				'class' => '',
      // 				'id' => '',
      // 			),
      // 			'message' => '',
      // 			'default_value' => 0,
      // 			'ui' => 1,
      // 			'ui_on_text' => '',
      // 			'ui_off_text' => '',
      // 		),
      // 		array(
      // 			'key' => 'field_5f42a39b62672',
      // 			'label' => 'Navegação diferente no rodapé?',
      // 			'name' => 'ht_nav_footer_check',
      // 			'type' => 'true_false',
      // 			'instructions' => '',
      // 			'required' => 0,
      // 			'conditional_logic' => 0,
      // 			'wrapper' => array(
      // 				'width' => '33.3',
      // 				'class' => '',
      // 				'id' => '',
      // 			),
      // 			'message' => '',
      // 			'default_value' => 0,
      // 			'ui' => 1,
      // 			'ui_on_text' => '',
      // 			'ui_off_text' => '',
      // 		),
      // 		array(
      // 			'key' => 'field_5f42a3b362673',
      // 			'label' => 'Navegação Footer',
      // 			'name' => 'ht_nav_footer',
      // 			'type' => 'repeater',
      // 			'instructions' => '',
      // 			'required' => 0,
      // 			'conditional_logic' => array(
      // 				array(
      // 					array(
      // 						'field' => 'field_5f42a39b62672',
      // 						'operator' => '==',
      // 						'value' => '1',
      // 					),
      // 				),
      // 			),
      // 			'wrapper' => array(
      // 				'width' => '',
      // 				'class' => '',
      // 				'id' => '',
      // 			),
      // 			'collapsed' => '',
      // 			'min' => 0,
      // 			'max' => 0,
      // 			'layout' => 'block',
      // 			'button_label' => 'Novo item',
      // 			'sub_fields' => array(
      // 				array(
      // 					'key' => 'field_5f42a3b362674',
      // 					'label' => 'Rótulo',
      // 					'name' => 'ht_nav_label',
      // 					'type' => 'text',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => 0,
      // 					'wrapper' => array(
      // 						'width' => '',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 					'prepend' => '',
      // 					'append' => '',
      // 					'maxlength' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a3b362675',
      // 					'label' => 'Link externo?',
      // 					'name' => 'ht_nav_external',
      // 					'type' => 'true_false',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => 0,
      // 					'wrapper' => array(
      // 						'width' => '20',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'message' => '',
      // 					'default_value' => 0,
      // 					'ui' => 1,
      // 					'ui_on_text' => '',
      // 					'ui_off_text' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a3b362676',
      // 					'label' => 'Link',
      // 					'name' => 'ht_nav_url',
      // 					'type' => 'url',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a3b362675',
      // 								'operator' => '==',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '80',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a3b362677',
      // 					'label' => 'Link',
      // 					'name' => 'ht_nav_url',
      // 					'type' => 'page_link',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a3b362675',
      // 								'operator' => '!=',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '50',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'post_type' => '',
      // 					'taxonomy' => '',
      // 					'allow_null' => 0,
      // 					'allow_archives' => 0,
      // 					'multiple' => 0,
      // 				),
      // 				array(
      // 					'key' => 'field_5f42a3b362678',
      // 					'label' => 'Ancora',
      // 					'name' => 'ht_nav_anchor',
      // 					'type' => 'text',
      // 					'instructions' => '',
      // 					'required' => 0,
      // 					'conditional_logic' => array(
      // 						array(
      // 							array(
      // 								'field' => 'field_5f42a3b362675',
      // 								'operator' => '!=',
      // 								'value' => '1',
      // 							),
      // 						),
      // 					),
      // 					'wrapper' => array(
      // 						'width' => '30',
      // 						'class' => '',
      // 						'id' => '',
      // 					),
      // 					'default_value' => '',
      // 					'placeholder' => '',
      // 					'prepend' => '',
      // 					'append' => '',
      // 					'maxlength' => '',
      // 				),
      // 			),
      // 		),
      // 	),
      // 	'location' => array(
      // 		array(
      // 			array(
      // 				'param' => 'options_page',
      // 				'operator' => '==',
      // 				'value' => 'conf_site_navegacao',
      // 			),
      // 		),
      // 	),
      // 	'menu_order' => 0,
      // 	'position' => 'normal',
      // 	'style' => 'default',
      // 	'label_placement' => 'top',
      // 	'instruction_placement' => 'label',
      // 	'hide_on_screen' => '',
      // 	'active' => true,
      // 	'description' => '',
      // ));



    }
  }
  /*
  * Função para adicionar o dashboard padrão
  *
  * Adicionada em 27/09/2019
  */
  public function add_default_dashboard(){
    add_action('wp_dashboard_setup', function(){
      global $wp_meta_boxes;
      add_action('wp_dashboard_setup', $this->dashboard_remove_meta_box());
      add_meta_box('ht_div_bem_vindo', 'Bem vindo!', function(){
        print "<div>\n";
        print "\t<p><strong>Muito obrigado por ter confiado na <a href=\"http://hattrickcomunicacao.com.br\" target=\"_blank\">HT Comunicação</a></strong>. O projeto para <strong>". (get_bloginfo('name')) ."</strong> foi único, o que nos possibilitou encontrar soluções criativas para atender as necessidades da forma ideal!</p>\n";
        print "\t<p>Caso tenha alguma dúvida, entre em contato conosco através do telefone <strong><a href=\"tel:+552441050439\">(24) 4105-0439</a></strong> ou pelo email <strong><a href=\"mailto:atendimento@htcomunicacao.com.br\">atendimento@htcomunicacao.com.br</a></strong>.</p>\n";
        print "\t<p><img src=\"http://hattrickcomunicacao.com.br/feed/institucional/solucao_na_medida.png\" alt=\"HT Comunicação - Solução na medida\" style=\"width:100%; height:auto;\"></p>\n";
        print "</div>\n";
      }, 'dashboard', 'normal', 'high');
      add_meta_box('ht_div_redes_sociais', 'Nós podemos te ajudar', function(){
        print "<div>\n";
        print "\t<p><a href=\"http://hattrickcomunicacao.com.br\"><img src=\"http://hattrickcomunicacao.com.br/feed/social/redes_sociais.jpg\" alt=\"HT Comunicação - Solução em Redes Sociais\" style=\"width:100%; height:auto;\"></a></p>\n";
        print "</div>\n";
      }, 'dashboard', 'side', 'high');
      remove_action( 'welcome_panel', 'wp_welcome_panel' );
      add_filter("login_headerurl", function(){ return "{$this->login_header_url}"; });
      add_filter("login_headertitle", function(){ return get_bloginfo('name'); });
      });
      add_filter("admin_footer_text", function(){ print "<span id=\"footer-thankyou\">Desenvolvido com muito amor por nós da <a href=\"http://hattrickcomunicacao.com.br\" target=\"_blank\">Hat Trick Comunicação 😍</a></span>"; });
      add_action("login_head", function(){
        print "<style type=\"text/css\">\n";
        print "\t .login{ background-image:url('{$this->login_bg}'); background-size:cover; }\n";
        print ".login{ background-color:#eaeaea; }\n";
        print "\t .login h1 a { background-image:url('{$this->login_logo}'); background-repeat:no-repeat; background-position:center; background-size: contain !important; width: auto !important; text-indent: -9999px !important; height: 80px !important; }";
        print "</style>\n";
      });
      add_action('admin_bar_menu', function($wp_admin_bar){
        global $wp_admin_bar;
        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->add_node(array(
          "id"  => "ht-bar",
          "title" => "<span class=\"ht-admin-bar-icon\" style=\"float:left; width:22px !important; height:22px !important;margin-left: 5px !important; margin-top: 5px !important; background-image:url('http://hattrickcomunicacao.com.br/feed/ht-logo.png'); background-size:cover;\"></span>",
          "meta"  => array("class" => "ht-admin-bar"),
        ));
        $wp_admin_bar->add_node(array(
          "id"  => "ht-bar-site",
          "title" => "Visite nosso site",
          "meta"  => array("class" => "ht-admin-item ht-admin-bar-site"),
          "href"  => "https://hattrickcomunicacao.com.br",
          "parent"  => "ht-bar",
        ));
        $wp_admin_bar->add_node(array(
          "id"  => "ht-bar-contato",
          "title" => "Fale conosco",
          "meta"  => array("class" => "ht-admin-item ht-admin-bar-contato"),
          "href"  => "https://hattrickcomunicacao.com.br/#contato",
          "parent"  => "ht-bar",
        ));
        $wp_admin_bar->add_node(array(
          "id"  => "ht-bar-whatsapp",
          "title" => "WhatsApp",
          "meta"  => array("class" => "ht-admin-item ht-admin-bar-wpp"),
          "href"  => "https://htlink.me/whatsapp/",
          "parent"  => "ht-bar",
        ));
      add_action( 'wp_before_admin_bar_render', function(){
        global $wp_admin_bar;
        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('archive');
        $wp_admin_bar->remove_node('customize');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
      });

    });
    add_action('admin_init', function(){
      $args = array(
        'ID' => get_current_user_id(),
        'admin_color' => 'midnight'
      );
      wp_update_user( $args );
    });

  }
  /*
  * Função para remover boxes do dashboard. O action não funcionou com função anonima.
  *
  * Adicionada em 27/09/2019
  */
  public function dashboard_remove_meta_box(){
    remove_meta_box("dashboard_browser_nag","dashboard","normal");
    remove_meta_box("dashboard_right_now","dashboard","normal");
    remove_meta_box("dashboard_activity","dashboard","normal");
    remove_meta_box("dashboard_quick_press","dashboard","core");
    remove_meta_box("dashboard_primary","dashboard","core");
    remove_meta_box("dashboard_primary","dashboard","side");
    remove_meta_box("dashboard_primary","dashboard","normal");
    remove_meta_box("dashboard_quick_press","dashboard","side");
  }
  /*
  * Função para remover os itens do menu que não utilizaremos
  *
  * Adicionada em 29/09/2019
  */
  public function remove_menu_itens($args = NULL){
    add_action('admin_menu', function() use($args){
      if(!$args){
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'upload.php' );
      }elseif(is_string($args)){
        remove_menu_page( $args );
      }elseif(is_array($args)){
        foreach($args as $a){
          remove_menu_page( $a );
        }
      }else{
        return false;
      }
    });
  }

  public static function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if($page) { return $page->ID; } else { return null; }
  }

}

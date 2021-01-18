<?php
/* Adicionar Loader das Classes */
require_once 'core/class/loader.php';
/* Setup padrão HT */
require_once 'core/setup.php';
/* Funções dos temas HT */
require_once 'core/ht_functions.php';

remove_filter('the_content', 'wpautop');

if(
  $_POST[md5("ht-action")] == md5("ht-email") &&
  !empty($_POST[md5("ht-name")]) &&
  !empty($_POST[md5("ht-email")])
  )
{
  $nome = filter_var($_POST[md5("ht-name")], FILTER_DEFAULT);
  $email = filter_var($_POST[md5("ht-email")], FILTER_DEFAULT);
  $phone = filter_var($_POST[md5("ht-phone")], FILTER_DEFAULT);
  $message = filter_var($_POST[md5("ht-message")], FILTER_DEFAULT);

  $body = "Nome: {$nome}<br>
  E-mail: {$email}<br>
  Telefone: {$phone}<br>
  Como podemos ajudar?<br>
  {$message}";

  $to = ht_get_contact();
  $headers = array(
    "Content-Type: text/html; charset=UTF-8",
    "Reply-To: {$nome} <{$email}>"
  );

  wp_mail( $to["mail"], "Solicitação feita através do site", $body, $headers );

  wp_redirect(get_field("ht_thank_you_mail", "options"));
  exit;
}

if(
  $_POST[md5("ht-action")] == md5("ht-trabalhe") &&
  !empty($_POST[md5("ht-name")]) &&
  !empty($_POST[md5("ht-email")])
  )
{
  $name = filter_var($_POST[md5("ht-name")], FILTER_DEFAULT);
  $email = filter_var($_POST[md5("ht-email")], FILTER_DEFAULT);
  $phone = filter_var($_POST[md5("ht-phone")], FILTER_DEFAULT);
  $specialty = filter_var($_POST[md5("ht-specialty")], FILTER_DEFAULT);
  $message = filter_var($_POST[md5("ht-message")], FILTER_DEFAULT);
  $file = $_FILES[md5("ht-resume")];

  $upload_overrides = array(
    'test_form' => false
  );

  $movefile = wp_handle_upload( $file, $upload_overrides );

  if(!isset($movefile['error']))
  {
    $attachments = $movefile['file'];
    $body = "Nome: {$name}<br>
    E-mail: {$email}<br>
    Telefone: {$phone}<br>
    Especialidade: {$specialty}<br>
    Mensagem:<br>
    {$message}";

    $to = ht_get_contact();
    $headers = array(
      "Content-Type: text/html; charset=UTF-8",
      "Reply-To: {$nome} <{$email}>"
    );

    wp_mail( $to["mail"], "Cadastro de currículo via site", $body, $headers, $attachments );
    wp_delete_file($attachments);

    wp_redirect(get_field("ht_thank_you_resume", "options"));
    exit;
  }
  else
  {
    
    die("<h1>Houve algum erro no servidor</h1>");
  }
}

//Este bloco cria o tipo de post
$lista = new ht_custom_post("Lista","lista");
$lista->set_arg("menu_icon", "dashicons-email-alt");
$lista->set_arg('capabilities', array('create_posts' => 'do_not_allow'));
$lista->do_post();

//Aqui verificamos se o formulário foi disparado
// No caso, o campo de email no formulário se chama 'box-newsletter'
if($_POST["box-newsletter"]){
  $contato = sanitize_text_field($_POST["box-newsletter"]);
  $lista_content = array(
    "post_title" => "Contato de {$contato}",
    "post_status" => "publish",
    "post_type" => "lista",
  );
  //Aqui ele salva o post
  $post_lista = wp_insert_post( $lista_content );
  //E aqui atualiza o campo personalizado com o email
  update_post_meta($post_lista, "lista_email", "{$contato}");
  //E redireciona para uma página de obrigado. Você pode criar um campo 
  // wp_redirect( COLOCAR O ID DE ALGUMA PAGINA);
  exit;
}
//Essa funcao formata como o post será exibido na área interna do site, mostrando só 2 colunas
function remove_row_actions( $actions ){
  if( get_post_type() === 'lista' )
    unset( $actions['view'] );
  return $actions;
}
add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );

function lista_colunas($columns){
  $columns = array(
    'email'     => 'E-mail',
    'data'      => 'Data',
  );
  return $columns;
}
add_filter("manage_lista_posts_columns", "lista_colunas");

function lista_custom_colunas($column){
  global $post;

  if ($column == 'email'){
    print get_post_meta( $post->ID, "lista_email" )[0];
  }elseif($column == 'data'){
    $dataFormatada = new DateTime($post->post_date);
    print $dataFormatada->format('d/m/Y H:i');
  }
	else{print "";}
}
add_action("manage_lista_posts_custom_column", "lista_custom_colunas");
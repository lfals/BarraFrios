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

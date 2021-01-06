<?php
//Arquivo de funções de estilização do tema

function ht_get_title($separator = " | ")
{
  $p = get_queried_object();
  $blog_name = get_bloginfo("name");
  $description = get_bloginfo("description");

  //Título otimizado
  $optimize_title = get_field("ht_seo_title", $p);


  $title = $blog_name . $separator;

  if(!empty($optimize_title))
  {
    $title .= $optimize_title;
  }
  else
  {
    if(is_front_page())
      $title .= $description;
    else
      $title .= $p->post_title;
  }

  return $title;
}

function ht_title()
{
  print ht_get_title();
}

function ht_get_meta_headers()
{
  $p = get_queried_object();
  $description = get_field("ht_seo_description", $p);
  $favicon = get_field("ht_option_favicon", "option");
  if(empty($description)) $description = get_bloginfo("description");
  $og_title = get_field("ht_site_og_title", $p);
  if(empty($title)) $title = ht_get_title();
  $og_url = get_permalink($p);
  $og_type = get_field("ht_site_og_type", $p);
  if(empty($og_type)) $og_type = "article";
  $og_description = get_field("ht_site_og_description", $p);
  if(empty($og_description)) $og_description = $description;
  $og_image = get_field("ht_site_og_image", $p);
  if(empty($og_image)) $og_image = get_field("ht_site_og_image", "option");

  $meta = "<meta name=\"description\" content=\"{$description}\">";
  if(!empty($favicon))
    $meta .= "<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"{$favicon["url"]}\">";
  if(!empty($og_title))
    $meta .= "<meta property=\"og:title\" content=\"{$og_title}\">";
  if(!empty($og_url))
    $meta .= "<meta property=\"og:url\" content=\"{$og_url}\">";
  if(!empty($og_type))
    $meta .= "<meta property=\"og:type\" content=\"{$og_type}\">";
  if(!empty($og_description))
    $meta .= "<meta property=\"og:description\" content=\"{$og_description}\">";
  if(!empty($og_image))
    $meta .= "<meta property=\"og:image\" content=\"{$og_image["url"]}\">";
  $meta.= "<meta property=\"og:locale\" content=\"pt_BR\" />";

  return $meta;
}

function ht_meta_headers()
{
  print ht_get_meta_headers();
}

function ht_get_logo()
{
  $logo = [
    "main" => get_field("ht_option_logo", "option"),
    "secound" => get_field("ht_option_logo_negative", "option"),
    "favicon" => get_field("ht_option_favicon", "option"),
  ];

  return $logo;
}

function ht_get_address()
{
  $address = [
    "address" => get_field("ht_option_address", "option"),
    "route" => get_field("ht_option_rote", "option"),
    "map" => get_field("ht_option_map", "option"),
  ];

  return $address;
}

function ht_get_contact()
{
  $url = get_field("ht_option_whatsapp_url", "option");
  if(empty($url))
  {
    if(!empty(get_field("ht_option_whatsapp", "option")))
    {
      $number = str_replace("(","", get_field("ht_option_whatsapp", "option"));
      $number = str_replace(")","", $number);
      $number = str_replace(" ","", $number);
      $number = str_replace("-","", $number);

      $url = "https://api.whatsapp.com/send?phone=55{$number}";
    }
  }
  $contact = [
    "mail" => get_field("ht_option_mail", "option"),
    "phone" => get_field("ht_option_phone", "option"),
    "whatsapp" => [
      "number" => get_field("ht_option_whatsapp", "option"),
      "url" => $url,
      "cta" => get_field("ht_nav_cta_check", "option"),
    ],
  ];

  return $contact;
}

function ht_get_social()
{
  $return["instagram"] = get_field("ht_option_social_ig", "options");
  $return["linkedin"] = get_field("ht_option_social_in", "options");
  $return["facebook"] = get_field("ht_option_social_fb", "options");
  $return["og_image"] = get_field("ht_site_og_image", "options");

  return $return;
}

function ht_get_mail()
{
  $contact = ht_get_contact();
  return $contact["mail"];
}

function ht_get_wpp()
{
  $contact = ht_get_contact();
  return $contact["whatsapp"];
}

function ht_get_nav()
{
  $nav = get_field("ht_nav", "option");
  $contato = get_field("ht_nav_contact", "option");
  $social = ht_get_social();
  $wpp = ht_get_wpp();

  if(!empty($nav))
  {
    foreach($nav as $n)
    {
      if(!empty($n["ht_nav_subitem"]))
      {
        foreach($n["ht_nav_subitem"] as $si)
        {
          $sublink = null;
          if($si["ht_nav_subitem_external"]){
            $sublink = $si["ht_nav_subitem_link"];
          }else{
            $sublink = $si["ht_nav_subitem_link_internal"];
          }
          $sub_item[] = [
            "label" => $si["ht_nav_subitem_label"],
            "url" => $sublink . $si["ht_nav_subitem_anchor"],
          ];
        }
      }
      else
      {
        $sub_item = null;
      }
      $link = null;
      if($n["ht_nav_external"]){
        $link = $n["ht_nav_link"];
      }else{
        $link = $n["ht_nav_link_internal"];
      }
      $return["nav"][] = [
        "label" => $n["ht_nav_label"],
        "url" => $link . $n["ht_nav_anchor"],
        "sub_item" => $sub_item,
      ];
    }
  }

  if(!empty($contato)) $return["contact"] = $contato;

  if(!empty($social))
  {
    if(!empty($social["instagram"]))
    {
      $return["social"][] = [
        "label" => "Instagram",
        "url" => $social["instagram"],
      ];
    }
    if(!empty($social["facebook"]))
    {
      $return["social"][] = [
        "label" => "Facebook",
        "url" => $social["facebook"],
      ];
    }
    if(!empty($social["linkedin"]))
    {
      $return["social"][] = [
        "label" => "Linkedin",
        "url" => $social["linkedin"],
      ];
    }
  }

  if(!empty($wpp))
  {
    $return["whatsapp"] = [
      "label" => $wpp["cta"],
      "url" => $wpp["url"],
    ];
  }

  return $return;
}
?>

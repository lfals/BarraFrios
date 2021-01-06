<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <title><?php ht_title(); ?></title>
    <?php ht_meta_headers(); ?>
    <?php wp_head(); ?>
    <?php if( function_exists('acf_add_options_page') ) {
        $scriptInicio = get_field('ht_site_scripts_inicio', 'option');
        if (!empty($scriptInicio)) print $scriptInicio;
    } ?>
</head>
<body <?php body_class(); ?>>

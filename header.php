<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="row">
    <div class="large-3 columns logo">
      <div id="little-logo"><img src="<?php bloginfo('template_directory'); ?>/img/little-logo.png"></div>
    </div>
    <div class="large-9 columns">
      <?php wp_nav_menu( 'menu=main_nav'); ?>
    </div>
  </header>
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
<?php if (is_front_page()) { ?>
  <header class="front-page">
    <a href="/"><div class="logo"><img src="<?php staengl_image('big-boi.jpg'); ?>"></div></a>
<?php } else { ?>
  <header>
    <a href="/"><div class="logo">&nbsp;</div></a>
<?php } ?>
    <div class="menu"><?php wp_nav_menu( 'menu=main_nav'); ?></div>
    <div class="clear"></div>
  </header>

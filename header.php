<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title>
    <?php wp_title(''); ?>
    <?php if(wp_title('', false)) { echo ' - '; } ?>
    <?php bloginfo('name'); if(is_home() || is_front_page()) { echo ' - '; bloginfo('description'); } ?>
  </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="image_src" type="image/jpeg" href="<?php bloginfo('template_url'); ?>/images/ls.jpg" />
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
  <link href='https://fonts.googleapis.com/css?family=Just+Another+Hand&amp;v1' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body>
  <div id="wrapper">
    <div id="scrollWrapper">
      <div id="scrollTop">
        <img alt="Top Scroll" class="scroll" src="<?php bloginfo('template_url'); ?>/images/scrollTop.png"
          width="740" height="204" />
      </div>
      <!--/scrollTop-->
      <div id="scrollMiddle">
        <div id="scrollInside">
          <div id="mainLogo">
            <h1><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></h1>
          </div>
          <!--/mainLogo-->
          <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
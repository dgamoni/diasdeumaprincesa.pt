<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ThemeMove
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_theme_mod( 'favicon_image', favicon_image ); ?>">
  <link rel="apple-touch-icon" href="<?php echo get_theme_mod( 'apple_touch_icon', apple_touch_icon ); ?>" />
  <?php wp_head(); ?>



</head>

<body <?php body_class('princesa'); ?>>



<div id="page" class="hfeed site <?php if ( Kirki::get_option( 'infinity', 'enable_page_transition' ) ) {
  echo 'animsition';
} ?>">
  <div class="header-wrapper">
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 logomenu">
            <div class="site-branding">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-otimized.svg" alt="logo" />
                </a>

            </div>
          </div>
          <div class="col-xs-12 menucatarina">
            <div class="row middle-sm">
              
              <div class="last-sm first-lg col-lg-12">

                  <div id="navbar" class="navbar">
                    <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                      <?php
                      wp_nav_menu( array(
                                     'theme_location' => 'primary',
                                     'menu_class'     => 'nav-menu',
                                     'menu_id'        => 'primary-menu',
                                   ) ); ?>
                    </nav>
                    <!-- #site-navigation -->
                  </div><!-- #navbar -->
  
              </div>

            </div>
          </div>
        </div>
      </div>
    </header>



  </div>
  <!-- .header-wrapper -->

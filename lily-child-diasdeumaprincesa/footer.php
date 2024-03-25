<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ThemeMove
 */

?>
<div class="bottom-wrapper">
  <footer class="footer">
    <div class="container">
		<h2 class="footerh2">Sigam-me no Instagram</h2>
		<?php echo wdi_feed(array('id'=>'1')); ?>
		
      <div class="row">
        <?php if ( is_active_sidebar( 'footer' ) ) { ?>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <?php dynamic_sidebar( 'footer' ); ?>
          </div>
        <?php } ?>
        <?php if ( is_active_sidebar( 'footer2' ) ) { ?>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-lg-offset-1">
            <?php dynamic_sidebar( 'footer2' ); ?>
          </div>
        <?php } ?>
        <?php if ( is_active_sidebar( 'footer3' ) ) { ?>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 col-lg-offset-1">
            <?php dynamic_sidebar( 'footer3' ); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </footer>
	
	
  <?php
	
	
	
  if ( has_nav_menu( 'footer' ) ) { ?>
    <div class="footer-menu">
      <?php
      wp_nav_menu( array(
                     'theme_location' => 'footer',
                     'fallback_cb'    => false,
                   ) );
      ?>
    </div>
  <?php } ?>
  <?php if ( get_theme_mod( 'footer_copyright_enable', footer_copyright_enable ) ) { ?>

  <?php } ?>
</div><!-- .bottom-wrapper -->
</div><!-- #page -->

<!-- Scroll to top -->
<?php if ( get_theme_mod( 'enable_back_to_top', enable_back_to_top ) ) { ?>
  <a class="scrollup"><i class="fa fa-angle-up"></i><?php echo __( 'Go to top', 'infinity' ); ?></a>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>

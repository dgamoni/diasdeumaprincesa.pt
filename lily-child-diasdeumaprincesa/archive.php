<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeMove
 */
$infinity_title_style      = Kirki::get_option( 'infinity', 'page_heading_style' );
$infinity_heading_image    = get_theme_mod( 'page_heading_image', page_heading_image );
$infinity_heading_bg_color = Kirki::get_option( 'infinity', 'page_heading_bg_color' );
$infinity_heading_color    = Kirki::get_option( 'infinity', 'page_heading_color' );
$infinity_disable_parallax = ! Kirki::get_option( 'infinity', 'page_heading_disable_parallax' );
$layout                    = Kirki::get_option( 'infinity', 'archive_layout' );
$post_grid_layout          = Kirki::get_option( 'infinity', 'post_grid_layout' );

get_header();

if ( class_exists( 'NS_Featured_Posts' ) ) {
  $infinity_post_featured_enable                   = Kirki::get_option( 'infinity', 'post_featured_enable' );
  $infinity_post_featured_number_of_posts          = Kirki::get_option( 'infinity', 'post_featured_number_of_posts' );
  $infinity_post_featured_number_of_posts_in_a_row = Kirki::get_option( 'infinity', 'post_featured_number_of_posts_in_a_row' );
  $infinity_post_featured_show_after               = Kirki::get_option( 'infinity', 'post_featured_show_after' );
} else {
  $infinity_post_featured_enable = false;
}


if ( $infinity_post_featured_enable && class_exists( 'NS_Featured_Posts' ) ) {
  $class_featured_post = "col-md-" . $infinity_post_featured_number_of_posts_in_a_row;
  if ( 'masonry' == $post_grid_layout ) {
    $class_featured_post = 'col-xs-12';
  }
  $featured_post_html = thememove_get_featured_post( $infinity_post_featured_number_of_posts, $class_featured_post );
}

?>
  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        

        <?php if ( 'sidebar-content' == $layout ) : ?>
          <?php get_sidebar(); ?>
        <?php endif; ?>
        <?php if ( 'sidebar-content' == $layout || 'content-sidebar' == $layout ) : ?>
          <?php $class = 'col-md-9'; ?>
        <?php else : ?>
          <?php $class = 'col-md-12'; ?>
        <?php endif; ?>


        <div class="<?php echo esc_attr( $class ); ?>">
          <main id="main" class="content site-main">
            <?php if ( have_posts() ) : ?>
                  

                  <?php if ( 'image' == $infinity_title_style ) : //If enable heading image ?>
                    <header class="big-title image-background"
                      <?php if ( "on" != $infinity_disable_parallax ) : ?>
                        data-stellar-background-ratio="0.5"
                      <?php endif; ?>>
                      <?php
                      infinity_the_archive_title( '<h1 class="entry-title"  style="color: ' . $infinity_heading_color . ';">', '</h1>' );
                      the_archive_description( '<div class="taxonomy-description">', '</div>' );
                      ?>
                    </header><!-- .entry-header -->
                  <?php else : // single color heading ?>
                    <header class="princ-cat-tile big-title color-background" style="background-color: <?php echo esc_attr( $infinity_heading_bg_color ); ?>">
                      <?php infinity_entry_categories(); ?>
                      <?php
                      //infinity_the_archive_title( '<h1 class="entry-title" style="color:"' . $infinity_heading_color . ';">', '</h1>' );
                      //the_archive_description( '<div class="taxonomy-description">', '</div>' );
                      ?>
                    </header><!-- .entry-header -->
                  <?php endif; ?>



                  <div class="post-grid-layout row">

                     <?php while ( have_posts() ) : the_post(); ?>
                        <?php $post_class = 'col-md-6'; ?>
                        <div class="<?php echo esc_attr( $post_class ); ?>">
                          <?php get_template_part( 'template-parts/content', 'category' ); ?>
                        </div>
                    <?php endwhile; ?>
                  
                  </div>

              <?php infinity_paging_nav(); ?>

            <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>
          </main>
          <!-- #main -->
        </div>

        <?php if ( 'content-sidebar' == $layout ) { ?>
          <?php get_sidebar(); ?>
        <?php } ?>

      </div>
    </div>
  </div><!--.content-wrapper-->

<?php get_footer(); ?>
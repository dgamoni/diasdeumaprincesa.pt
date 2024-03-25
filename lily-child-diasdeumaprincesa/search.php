<?php
/**TODO: edit search layout
 * The template for displaying search results pages.
 *
 * @package ThemeMove
 */
$layout = Kirki::get_option( 'infinity', 'search_layout' );
get_header(); ?>

<div class="content-wrapper">
  <div class="container">
    <div class="row">

      <?php if ( 'sidebar-content' == $layout ) { ?>
        <?php //get_sidebar(); ?>
      <?php } ?>


      <?php if ( 'sidebar-content' == $layout || 'content-sidebar' == $layout ) { ?>
        <?php $class = 'col-md-9'; ?>
      <?php } else { ?>
        <?php $class = 'col-md-12'; ?>
      <?php } ?>

      <div class="<?php echo esc_attr( $class ); ?>">
        <main id="main" class="site-main">

          <?php if ( have_posts() ) : ?>

            <header class="page-header">
              <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'infinity' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            </header><!-- .page-header -->

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

              <?php
              /**
               * Run the loop for the search to output the results.
               * If you want to overload this in a child theme then include a file
               * called content-search.php and that will be used instead.
               */
              get_template_part( 'template-parts/content', 'category' );
              ?>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

          <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>

        </main>
        <!-- #main -->
      </div>

      
        <?php get_sidebar(); ?>
      
    </div>
  </div>
</div><!--.content-wrapper-->
<?php get_footer(); ?>

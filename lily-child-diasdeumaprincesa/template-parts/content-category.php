<?php
/**
 * Template part for displaying posts.
 * Grid layout
 *
 * @package ThemeMove
 */
$infinity_post_general_display_full_post   = false;
$infinity_post_general_excerpt_length      = '150';
$infinity_post_general_post_title_position = Kirki::get_option( 'infinity', 'post_general_post_title_position' );
$infinity_hide_category                    = true;
$infinity_hide_date                        = Kirki::get_option( 'infinity', 'post_general_hide_date' );
$infinity_hide_tags                        = Kirki::get_option( 'infinity', 'post_general_hide_tags' );
$infinity_hide_share_buttons               = Kirki::get_option( 'infinity', 'post_general_hide_share_buttons' );
$post_general_hide_read_more               = Kirki::get_option( 'infinity', 'post_general_hide_read_more' );
$infinity_hide_comment_link                = Kirki::get_option( 'infinity', 'post_general_hide_comment_link' );
$infinity_hide_featured_image              = Kirki::get_option( 'infinity', 'post_general_hide_featured_image' );

$infinity_post_grid_align = Kirki::get_option( 'infinity', 'post_grid_align' );
?>
<article <?php post_class( 'post-grid-item' ); ?> style="text-align: <?php echo esc_attr( $infinity_post_grid_align ); ?>">

  <?php if ( $infinity_post_general_post_title_position ) { ?>
    <div class="entry-header above">

      <?php if ( ! $infinity_hide_category ) { ?>
        <div class="post-categories">
          <?php infinity_entry_categories(); ?>
        </div><!--post-categories-->
      <?php } ?>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

    </div>
    <!-- .entry-header -->
  <?php } ?>

  <?php if ( ! $infinity_hide_featured_image ) { ?>
    <?php if ( has_post_format( 'gallery' ) ) { ?>
      <?php $gallery_images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
      <?php $gallery_type = get_post_meta( get_the_ID(), '_format_gallery_type', true ); ?>
      <?php if ( $gallery_images ) { ?>
        <?php if ( 'slider' == $gallery_type ) { ?>
          <div class="post-img post-gallery<?php echo ' ' . esc_attr( $gallery_type ); ?>">
            <?php foreach ( $gallery_images as $image ) { ?>
              <?php $img = wp_get_attachment_image_src( $image, 'grid-thumb' ); ?>
              <?php $caption = get_post_field( 'post_excerpt', $image ); ?>
              <div><img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo ''; ?>"></div>
            <?php } ?>
          </div>
        <?php } else { ?>
          <div class="post-img">
            <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail( 'grid-thumb' ); ?></a>
          </div>
        <?php } ?>
      <?php } ?>
    <?php } else { ?>
      <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-img">
          <a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail( 'grid-thumb' ); ?></a>
          <?php if ( has_post_format( 'video' ) ) { ?>
            <i class="fa fa-video-camera"></i>
          <?php } ?>
          <?php if ( has_post_format( 'audio' ) ) { ?>
            <i class="fa fa-music"></i>
          <?php } ?>
        </div>
      <?php } ?>
    <?php } ?>
  <?php } ?>

  <?php if ( ! $infinity_post_general_post_title_position ) { ?>
    <div class="entry-header">

      <?php if ( ! $infinity_hide_category ) { ?>
        <div class="post-categories">
          <?php infinity_entry_categories(); ?>
        </div><!--post-categories-->
      <?php } ?>
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

    </div>
    <!-- .entry-header -->
  <?php } ?>

  <div class="entry-content">
    <?php if ( $infinity_post_general_display_full_post ) { ?>
      <p><?php the_content(); ?></p>
    <?php } else { ?>
      <p class="princ_excerpt"><?php infinity_print_the_excerpt_princ( $infinity_post_general_excerpt_length ); ?>
        <a class="princ_more-link" href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Continuar a ler', 'infinity' ); ?></a>
      </p>
    <?php } ?>
  </div>
  <!-- .entry-content -->

  <div class="entry-footer">
    <?php if ( ! $infinity_hide_tags ) { ?>
      <div class="post-tags">
        <?php infinity_entry_tags(); ?>
      </div><!--post-tags-->
    <?php } ?>
    <div class="post-meta princ-meta">
      <div class="row">
        <?php if ( $infinity_hide_date || $infinity_hide_share_buttons ) {
          $class = 'col-xs-12 meta-center';
        } else {
          $class = 'col-xs-6';
        } ?>

        <?php if ( ! $infinity_hide_date ) { ?>
          <div class="post-date <?php echo esc_attr( $class ); ?>">
            <?php infinity_posted_on(); ?>
          </div><!--post-date-->
        <?php } ?>
          <div class="col-xs-6 princ-commen-count">
            <p><?php comments_number( 'No Comentários', 'One Comentário', '% Comentários' ); ?></p>
          </div>
      </div>
    </div>
  </div>

</article>
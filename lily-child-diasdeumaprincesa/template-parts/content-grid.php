<?php
/**
 * Template part for displaying posts.
 * Grid layout
 *
 * @package ThemeMove
 */
$infinity_post_general_display_full_post   = Kirki::get_option( 'infinity', 'post_general_display_full_post' );
$infinity_post_general_excerpt_length      = Kirki::get_option( 'infinity', 'post_general_excerpt_length' );
$infinity_post_general_post_title_position = Kirki::get_option( 'infinity', 'post_general_post_title_position' );
$infinity_hide_category                    = Kirki::get_option( 'infinity', 'post_general_hide_category' );
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
      <p><?php echo infinity_print_the_excerpt( $infinity_post_general_excerpt_length ); ?></p>
      <?php if ( ! $post_general_hide_read_more ) { ?>
        <p class="more-link">
          <a href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Continuar a ler', 'infinity' ); ?></a></p>
      <?php } ?>
    <?php } ?>
  </div>
  <!-- .entry-content -->

  <div class="entry-footer">
    <?php if ( ! $infinity_hide_tags ) { ?>
      <div class="post-tags">
        <?php infinity_entry_tags(); ?>
      </div><!--post-tags-->
    <?php } ?>
    <div class="post-meta">
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
        <?php if ( ! $infinity_hide_share_buttons ) { ?>
          <div class="post-share-buttons <?php echo esc_attr( $class ); ?>">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo rawurlencode( the_title( '', '', false ) ); ?>%20-%20<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-twitter"></i>
            </a>
            <?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
            <a data-pin-do="skipLink" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url( $pin_image ); ?>&amp;description=<?php echo rawurlencode( the_title( '', '', false ) ); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-pinterest"></i>
            </a>
            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <i class="fa fa-google-plus"></i>
            </a>
            <a href="mailto:<?php echo get_option( 'admin_email' ); ?>"><i class="fa fa-envelope-o"></i></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</article>
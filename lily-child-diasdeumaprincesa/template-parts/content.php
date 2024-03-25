<?php
/**
 * Template part for displaying posts.
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
<article <?php post_class(); ?> style="text-align: <?php echo esc_attr( $infinity_post_grid_align ); ?>">
  <?php if ( $infinity_post_general_post_title_position ) { ?>
    <div class="entry-header above">

      <?php if ( ! $infinity_hide_category ) { ?>
        <div class="post-categories">
          <?php infinity_entry_categories(); ?>
        </div><!--post-categories-->
      <?php } ?>
      
		

				
            
  <?php if ( ! $infinity_hide_date ) { ?>
        <div class="post-date">
          <?php infinity_posted_on(); ?>
        </div><!--post-date-->
      <?php } ?>
		
		
		
      
     <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		
		

      
      
      
      
      
      

      


		
    
    </div>
    <!-- .entry-header -->
  <?php } ?>

  <?php if ( has_post_format( 'gallery' ) && ! $infinity_hide_featured_image ) { ?>
    <?php $gallery_images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
    <?php $gallery_type = get_post_meta( get_the_ID(), '_format_gallery_type', true ); ?>
    <?php if ( $gallery_images ) { ?>
      <div class="post-img post-gallery<?php echo ' ' . esc_attr( $gallery_type ); ?>">
        <?php if ( 'masonry' == $gallery_type ) { ?>
          <div class="grid-thumb-sizer"></div><?php } ?>
        <?php foreach ( $gallery_images as $image ) { ?>
          <?php $img = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
          <?php $caption = get_post_field( 'post_excerpt', $image ); ?>
          <div <?php if ( 'masonry' == $gallery_type ) { ?> class="thumb-masonry-item" <?php } ?>>
            <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php echo ''; ?>"></div>
        <?php } ?>
      </div>
    <?php } ?>
  <?php } elseif ( has_post_format( 'video' ) ) { ?>
    <div class="post-video">
      <?php $video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
      <?php if ( wp_oembed_get( $video ) ) { ?>
        <?php echo wp_oembed_get( $video ); ?>
      <?php } else { ?>
        <?php echo $video; ?>
      <?php } ?>
    </div>
  <?php } elseif ( has_post_format( 'audio' ) ) { ?>
    <div class="post-audio">
      <?php $audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
      <?php if ( wp_oembed_get( $audio ) ) { ?>
        <?php echo wp_oembed_get( $audio ); ?>
      <?php } else { ?>
        <?php echo $audio; ?>
      <?php } ?>
    </div>
  <?php } elseif ( has_post_format( 'quote' ) ) { ?>
    <?php $source_name = get_post_meta( $post->ID, '_format_quote_source_name', true ); ?>
    <?php $url = get_post_meta( $post->ID, '_format_quote_source_url', true ); ?>
    <?php $quote = get_post_meta( $post->ID, '_format_quote_text', true ); ?>
    <?php if ( $quote ) { ?>
      <div class="post-quote">
        <h2><?php echo esc_attr( $quote ); ?></h2>

        <div class="source-name">
          <?php if ( $source_name ) { ?>
            <?php if ( $url ) { ?>
              <a href="<?php echo esc_url( $url ); ?>" target="_blank"><?php echo $source_name; ?></a>
            <?php } else { ?>
              <span><?php echo $source_name; ?></span>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  <?php } else { ?>
    <?php if ( has_post_thumbnail() && ! $infinity_hide_featured_image ) { ?>
      <div class="post-img">
        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'single-thumb' ); ?></a>
      </div>
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

      <?php if ( ! $infinity_hide_date ) { ?>
        <div class="post-date">
          <?php infinity_posted_on(); ?>
        </div><!--post-date-->
      <?php } ?>

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
          <a href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Continue reading', 'infinity' ); ?></a></p>
      <?php } ?>
    <?php } ?>
  </div>
  <!-- .entry-content -->


</article><!-- #post-## -->
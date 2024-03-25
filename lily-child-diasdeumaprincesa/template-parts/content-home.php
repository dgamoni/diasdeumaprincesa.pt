<?php
/**
 * Template part for displaying posts.
 *
 * @package ThemeMove
 */

$infinity_post_general_display_full_post   = false;
$infinity_post_general_excerpt_length      = '450';
$infinity_post_general_post_title_position = true;
$infinity_hide_category                    = Kirki::get_option( 'infinity', 'post_general_hide_category' );
$infinity_hide_date                        = true;
$infinity_hide_tags                        = Kirki::get_option( 'infinity', 'post_general_hide_tags' );
$infinity_hide_share_buttons               = false;
$post_general_hide_read_more               = Kirki::get_option( 'infinity', 'post_general_hide_read_more' );
$infinity_hide_comment_link                = Kirki::get_option( 'infinity', 'post_general_hide_comment_link' );
$infinity_hide_featured_image              = Kirki::get_option( 'infinity', 'post_general_hide_featured_image' );

$infinity_post_grid_align = Kirki::get_option( 'infinity', 'post_grid_align' );
?>



<article <?php post_class(); ?> >
  <?php if ( $infinity_post_general_post_title_position ) { ?>
    <div class="entry-header above">

      <?php if ( ! $infinity_hide_category ) { ?>
        <div class="_post-categories princess_post-categories">
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
      <?php $video = get_post_meta( get_the_ID(), '_format_video_embed', true ); 
      //var_dump($video);
      $content = apply_filters( 'the_content', $post->post_content );
      $embeds = get_media_embedded_in_content( $content );
      //var_dump($embeds);
      ?>
<!--       <?php if ( wp_oembed_get( $video ) ) { ?>
        <?php echo wp_oembed_get( $video ); ?>
      <?php } else { ?>
        <?php echo $video; ?>
      <?php } ?> -->
      <?php if (  $embeds ) { ?>
        <?php echo  $embeds[0]; ?>
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
          <a href="<?php echo get_permalink(); ?>"><?php esc_html_e( 'Continuar a ler', 'infinity' ); ?></a></p>
      <?php } ?>
    <?php } ?>
  </div>
  <!-- .entry-content -->

  <div class="entry-footer">

    <div class="post-meta princ-meta">
      <div class="row">
      
          <div class="post-date col-xs-3">
            <?php infinity_posted_on(); ?>
          </div><!--post-date-->
        

          <div class="post-share-buttons col-xs-6">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <!-- <i class="fa fa-facebook"></i> -->Facebook
            </a>
            <span class="prince-slash"> / </span>
            <a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo rawurlencode( the_title( '', '', false ) ); ?>%20-%20<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <!-- <i class="fa fa-twitter"></i> -->Twitter
            </a>
            <span class="prince-slash"> / </span>
            <?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>
            <a data-pin-do="skipLink" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url( $pin_image ); ?>&amp;description=<?php echo rawurlencode( the_title( '', '', false ) ); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <!-- <i class="fa fa-pinterest"></i> -->Pinterest
            </a>
            <span class="prince-slash"> / </span>
            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
               onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=455,width=600'); return false;">
              <!-- <i class="fa fa-google-plus"></i> -->Google
            </a>
          </div>


          <div class="col-xs-3 princ-commen-count">
            <p>
              <a href="<?php echo get_comments_link(); ?>">
                <?php comments_number( 'Sem Comentários', 'One Comentário', '% Comentários' ); ?>
              </a>
            </p>
          </div>

      </div>
    </div>
  </div>
  <!-- end entry-footer -->

</article><!-- #post-## -->
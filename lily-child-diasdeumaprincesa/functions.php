<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

define('CORE_PATH', get_stylesheet_directory() . '/core');
define('CORE_URL', get_stylesheet_directory_uri()  . '/core');
 
$dirs = array(
    //CORE_PATH . '/post_types/',
    CORE_PATH . '/functions/',
);
foreach ($dirs as $dir) {
    $other_inits = array();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (false !== ($file = readdir($dh))) {
                if ($file != '.' && $file != '..' && stristr($file, '.php') !== false) {
                    list($nam, $ext) = explode('.', $file);
                    if ($ext == 'php')
                        $other_inits[] = $file;
                }
            }
            closedir($dh);
        }
    }
    asort($other_inits);
    foreach ($other_inits as $other_init) {
        if (file_exists($dir . $other_init))
            include_once $dir . $other_init;
    }
}


function infinity_print_the_excerpt_princ( $length ) {
  global $post;
  $text = $post->post_excerpt;
  if ( '' == $text ) {
    $text = get_the_content( '' );
    $text = apply_filters( 'the_content', $text );
    $text = str_replace( ']]>', ']]>', $text );
  }
  $text = strip_shortcodes( $text );
  $text = strip_tags( $text );

  $text    = substr( $text, 0, $length );
  $excerpt = infinity_reverse_strrchr( $text, '.', 1 );
  if ( $excerpt ) {
    echo $excerpt.'..  ';
  } else {
    echo $text.'...  ';
  }
}

if ( ! function_exists( 'infinity_posted_on_' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function infinity_posted_on_() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

    $posted_on = sprintf( esc_html_x( '%s', 'post date', 'infinity' ), $time_string );

    $byline = sprintf( esc_html_x( 'by %s', 'post author', 'infinity' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );

    echo '<span class="posted-on">' . gmdate("d F, Y", get_the_time( 'U' )) . '</span>';

  }
endif;

if ( ! function_exists( 'infinity_posted_on' ) ) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function infinity_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

    $posted_on = sprintf( esc_html_x( '%s', 'post date', 'infinity' ), $time_string );

    $byline = sprintf( esc_html_x( 'by %s', 'post author', 'infinity' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> </span>';

  }
endif;



add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
	<script>
		jQuery(document).ready(function($) {
			

			$("#wpp-2 ul > li").addClass(function(i){return " customitem item" + (i + 1);});
			
		});
	</script>
	<style>

	</style>
	<?php
}
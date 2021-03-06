<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package understrap
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function understrap_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'understrap_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function understrap_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'understrap_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function understrap_wp_title( $title, $sep ) {
        if ( is_feed() ) {
            return $title;
        }
        global $page, $paged;
// Add the blog name
        $title .= get_bloginfo( 'name', 'display' );
// Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title .= " $sep $site_description";
        }
// Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
            $title .= " $sep " . sprintf( __( 'Page %s', 'understrap' ), max( $paged, $page ) );
        }
        return $title;
    }
    add_filter( 'wp_title', 'understrap_wp_title', 10, 2 );
    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function understrap_render_title() {

        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
    }
    add_action( 'wp_head', 'understrap_render_title' );

endif;

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */

	function understrap_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
	}
	add_action( 'wp_head', 'understrap_render_title' );
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function understrap_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'understrap_setup_author' );

function get_image_custom($postid, $size) {
    $thumb_id = get_post_thumbnail_id($postid);
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
    $thumb_url = $thumb_url_array[0];
    
    return $thumb_url;
}

// Add custom fields created by Types plugin to public types_custom_meta key
function add_types_custom_meta($data, $post, $context) {
    if (function_exists(types_get_fields_by_group)) {
        $post_custom_data = get_post_custom( $post['ID'] );

        // Get a list of Types custom fields in the "public" group
        $public_types_fields = types_get_fields_by_group('public');

        foreach ( $post_custom_data as $key => $value ) {
            if ( in_array($key, array_keys($public_types_fields)) ) {
                $types_custom_meta[$key] = $value;
            }
        }

        if ( !empty($types_custom_meta) ) {
            $data['types_custom_meta'] = $types_custom_meta;
        }
    }

    return $data;
}
add_filter( 'json_prepare_post', 'add_types_custom_meta', 10, 3 );

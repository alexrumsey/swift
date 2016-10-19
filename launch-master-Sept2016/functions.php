<?php
/*
Author: Caitlin DiMare-Oliver
URL: htp://launchdigitalmarketing.com

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************
*
* UNCOMMENT THESE AS NEEDED. NOT NEEDED FOR EVERY PROJECT.
*
/* 


1. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/

// require_once( 'library/custom-post-type.php' ); // you can disable this if you like

/*

2. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/

// require_once( 'library/admin.php' ); // this comes turned off by default

/*
3. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/*
4. /custom-meta.php
	- For custom fields. Requires Meta-Box Plugin by Rilwis
*/

// include 'custom-meta.php';


/************* GENERATE HTML SITEMAP *************/

if (isset($_GET['activated']) && is_admin()){
        $new_page_title = 'Sitemap';
        $new_page_content = '';
        $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
        
        //don't change the code below
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
}


function GenerateSitemap($params = array()) {
    // default parameters
    extract(shortcode_atts(array(
        'title' => 'Site map',
        'id' => 'sitemap',
        'depth' => 2,
    ), $params));
    // create sitemap
	
//  use the exclude= to add pages to exclude  
//	$sitemap = wp_list_pages('title_li=&depth=1&sort_column=menu_order&exclude=6343,9,6640');
	
	$sitemap = wp_list_pages('title_li=&depth=1&sort_column=menu_order');
    if ($sitemap != '') {
        $sitemap =
            ($title == '' ? '' : "<h2>$title</h2>") .
            "<ul>$sitemap</ul>";
    }
    return $sitemap;
}
add_shortcode('sitemap', 'GenerateSitemap');


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'acf', 200 ); // ACF Images
add_image_size('hero', 1920, 1080 , true);


//add_filter( 'image_size_names_choose', 'launch_custom_image_sizes' );
//
//function launch_custom_image_sizes( $sizes ) {
//    return array_merge( $sizes, array(
//        'launch-thumb-600' => __('600px by 150px'),
//        'launch-thumb-300' => __('300px by 100px'),
//    ) );
//}

/*
The function above adds the ability to use the dropdown menu to select 
the new images sizes you have just created from within the media manager 
when you add media to your content blocks. If you add more image sizes, 
duplicate one of the lines in the array and name it according to your 
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function launch_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Primary Sidebar', 'launchtheme' ),
		'description' => __( 'Primary sidebar.', 'launchtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'launchtheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'launchtheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function launch_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
				<?php printf(__( '<cite class="fn">%s</cite>', 'launchtheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'launchtheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'launchtheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'launchtheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content ">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function launch_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'launchtheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'launchtheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
} // don't remove this bracket!


/************* ADDITIONAL FUNCTIONS TO CLEAN THINGS UP and ENQUEUE SCRIPTS ************/


// we're firing all out initial functions at the start
add_action( 'after_setup_theme', 'launch_ahoy', 16 );

function launch_ahoy() {
	// remove WP version from RSS
	add_filter( 'the_generator', 'launch_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'launch_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'launch_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'launch_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'launch_scripts_and_styles', 999 );
	// ie conditional containerper

	// launching this stuff after theme setup
	launch_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'launch_register_sidebars' );
	// adding the launch search form (created in functions.php)
	add_filter( 'get_search_form', 'launch_wpsearch' );

	// cleaning up random code around images
	add_filter( 'the_content', 'launch_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'launch_excerpt_more' );

} /* end launch ahoy */

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

// remove WP version from RSS
function launch_rss_version() { return ''; }

// remove WP version from scripts
function launch_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

// remove injected CSS for recent comments widget
function launch_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function launch_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function launch_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery plus other custom scripts and styles
function launch_scripts_and_styles() {
	global $wp_styles; // call global $wp_styles variable to add conditional containerper around ie stylesheet the WordPress way
	if (!is_admin()) {

		// modernizr (without media query polyfill)
		wp_register_script( 'launch-modernizr', get_stylesheet_directory_uri() . '/library/js/modernizr.custom.72363.js', array('jquery'), '2.5.3', false );
		wp_register_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/library/js/bootstrap.min.js', array('jquery'), '2.5.3', false );
		wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array('jquery'), '', true );
		wp_register_script( 'font-awesome', '//use.fontawesome.com/e484509499.js', array('jquery'), '', false );
		
		
		// register main stylesheet
		wp_register_style( 'bootstrap-stylesheet', get_stylesheet_directory_uri() . '/library/css/bootstrap.min.css', array(), '', 'all' );
		wp_register_style( 'main-styles', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
		wp_register_style( 'custom-stylesheet', get_stylesheet_directory_uri() . '/custom.css', array(), '', 'all' );

		

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}


		// enqueue styles and scripts
		wp_enqueue_script( 'launch-modernizr' );
		wp_enqueue_style( 'bootstrap-stylesheet' );
		wp_enqueue_style( 'main-styles' );
		wp_enqueue_style( 'custom-stylesheet' );


		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'font-awesome' );
		wp_enqueue_script( 'custom-js' );
	}
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function launch_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// rss thingy
	add_theme_support('automatic-feed-links');

	// adding post format support
//	add_theme_support( 'post-formats',
//		array(
//			'aside',             // title less blurb
//			'gallery',           // gallery of images
//			'link',              // quick link to other site
//			'image',             // an image
//			'quote',             // a quick quote
//			'status',            // a Facebook like status update
//			'video',             // video
//			'audio',             // audio
//			'chat'               // chat transcript
//		)
//	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'launchtheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'launchtheme' ) // secondary nav in footer
		)
	);
} /* end launch theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function launch_main_nav() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'menu ',           // class of container (should you choose to use it)
		'menu' => __( 'Main Navigation', 'launchtheme' ),  // nav name
		'menu_class' => 'nav navbar-nav navbar-right',         // adding custom nav class
		'theme_location' => 'main-nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'launch_main_nav_fallback'      // fallback function
	));
} /* end launch main nav */

// the footer menu (should you choose to use one)
function launch_footer_links() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => '',                              // remove nav container
		'container_class' => 'footer-links ',   // class of container (should you choose to use it)
		'menu' => __( 'Footer Links', 'launchtheme' ),   // nav name
		'menu_class' => 'nav footer-nav ',      // adding custom nav class
		'theme_location' => 'footer-links',             // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'launch_footer_links_fallback'  // fallback function
	));
} /* end launch footer link */

// this is the fallback for header menu
function launch_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
		'menu_class' => 'nav navbar-nav navbar-right',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
		'link_before' => '',                            // before each link
		'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function launch_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using launch_related_posts(); )
function launch_related_posts() {
	echo '<ul id="launch-related-posts">';
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) { 
			$tag_arr .= $tag->slug . ',';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 5, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
				<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; }
		else { ?>
			<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'launchtheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end launch related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function launch_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	
	echo '<nav class="pagination">';
	
		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
	
	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function launch_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function launch_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'launchtheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'launchtheme' ) .'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function launch_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}





/*********************
OPTIONS PAGE
*********************/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' => '59',
	));
	
}


/*********************
GET PAGE ID FROM SLUG
*********************/
// Usage:
// get_id_by_slug('any-page-slug');

function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}
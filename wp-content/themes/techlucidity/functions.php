<?php 

if ( ! function_exists( 'blank_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function blank_setup() {

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'blank' ),
        ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

    }
endif;
add_action( 'after_setup_theme', 'blank_setup' );


// Enqueue styles
    function load_my_styles() {
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu:300,400', false ); 
    }
    add_action('wp_enqueue_scripts','load_my_styles');

// Enqueue footer styles
    function load_footerstyles() {
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    }
    add_action('get_footer','load_footerstyles');

// Enqueue jQuery
function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
        wp_enqueue_script('jquery');
    }
}

// Enqueue Javascript
    function load_my_scripts() {
    wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), false, true);
    wp_register_script('cookie_consent','//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js',false,false,true);
    wp_enqueue_script('scripts');
    wp_enqueue_script('cookie_consent');
    }
    add_action( 'wp_enqueue_scripts', 'load_my_scripts' );  
    add_action( 'wp_enqueue_scripts', 'register_jquery' );


// control plugin loading
    function my_deregister_javascript() {
        if (!is_single() ) {
            wp_dequeue_script('zilla-likes');
            }
            wp_deregister_script( 'wp-embed' );
    }
    add_action('wp_print_scripts', 'my_deregister_javascript' );
    
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blank_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'blank' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'blank' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'blank_widgets_init' );

// applies browser class to body
function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;
}
add_filter('body_class','mv_browser_body_class');

// =========================================================================
// REMOVE JUNK FROM HEAD
// =========================================================================
    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version

    remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
    remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    // Disable REST API link tag
    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    // Disable oEmbed Discovery Links
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Disable REST API link in HTTP headers
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Creates Review Custom Post Type
function custom_review_init() {
    $args = array(
        'label' => 'Reviews',
        'description' => 'Add a new review',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'taxonomies' => array('category'),
        'hierarchical' => false,
        'rewrite' => array('slug' => 'reviews'),
        'query_var' => true,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
        );
    register_post_type( 'reviews', $args );
}
add_action( 'init', 'custom_review_init' );

// Creates Article Custom Post Type
function custom_article_init() {
    $args = array(
        'label' => 'Articles',
        'description' => 'Add a new article',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'taxonomies' => array('category'),
        'hierarchical' => false,
        'rewrite' => array('slug' => 'articles'),
        'query_var' => true,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
        );
    register_post_type( 'articles', $args );
}
add_action( 'init', 'custom_article_init' );

// Creates Product Roundup Custom Post Type
function custom_roundup_init() {
    $args = array(
        'label' => 'Roundups',
        'description' => 'Add a new roundup',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'taxonomies' => array('category'),
        'hierarchical' => false,
        'rewrite' => array('slug' => 'roundups'),
        'query_var' => true,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',)
        );
    register_post_type( 'roundups', $args );
}
add_action( 'init', 'custom_roundup_init' );

//========
// Content Functionality Functions - these create the variouse components of the content body
//========

// Table of contents

function createContentsTable() {
    echo '<div class="content-body__contents marb_d">';
    echo '  <h2>Table of Contents</h2>';
    echo '      <ul>';
        // check if the flexible content field has rows of data
    if( have_rows('content_body') ):
         // loop through the rows of data
        $counter = 1;
        while ( have_rows('content_body') ) : the_row();

            if( get_row_layout() == 'content_body_text_block' ):

                include(locate_template('template-parts/posts/custom/content-table-contents.php'));
            endif;

        endwhile;
     endif; 

     echo ' </ul>';
     echo '</div>';
}

// Content Body
function createContentBody() {
    // check if the flexible content field has rows of data
    if( have_rows('content_body') ):

         // loop through the rows of data
        while ( have_rows('content_body') ) : the_row();

            if( get_row_layout() == 'content_body_text_block' ):

                get_template_part('template-parts/posts/custom/content', 'text-block');

            elseif( get_row_layout() == 'content_body_blockquote' ):

                get_template_part('template-parts/posts/custom/content', 'blockquote');

            elseif( get_row_layout() == 'content_body_image' ):

                get_template_part('template-parts/posts/custom/content', 'image');

            elseif( get_row_layout() == 'round_up_item' ):

                get_template_part('template-parts/posts/custom/content', 'roundup-item');
            endif;

        endwhile; 
    endif;   
} 

// star rating
function createStars($location) {
    if ($location == 'summary__rating') {
        $review_count = get_field($location, false, false);
    } else {
        $review_count = get_sub_field($location, false, false);
    }
    

    if ((int) $review_count == $review_count) {
        for($i = 0; $i < 5; $i++) {
            
            if ($i < $review_count) {
                echo '<span class="fa fa-star"></span>';
            } else {
                echo '<span class="fa fa-star-o"></span>';
            }
        }  
    } else {
        $review_count_round = floor($review_count);

        for($i = 0; $i < $review_count_round; $i++) {
            echo '<span class="fa fa-star"></span>';
        }   
        echo '<span class="fa fa-star-half-o"></span>'; 

        $remainder = 5 - $review_count;

        for ($i = 0; $i < floor($remainder); $i++) {
            echo '<span class="fa fa-star-o"></span>';
        }               
    }   

}




?>
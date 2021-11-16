<?php
/**
 * wp-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wp_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wp-theme, use a find and replace
		 * to change 'wp-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => 'Main Menu'
			)
		);
		// register_nav_menus(
		// 	array(
		// 		'footer-menu-1' => 'Footer Menu Contact'
		// 	)
		// );
		register_nav_menus(
			array(
				'footer-menu-2' => 'Footer Menu My Account'
			)
		);
		register_nav_menus(
			array(
				'footer-menu-3' => 'Footer Menu Infomation'
			)
		);
		register_nav_menus(
			array(
				'footer-menu-4' => 'Footer Menu Quick Link'
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wp_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wp_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Banner', 'wp-theme' ),
			'id'            => 'banner',
			'description'   => esc_html__( 'Add Banner here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Category', 'wp-theme' ),
			'id'            => 'category',
			'description'   => esc_html__( 'Add Category here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'About Us', 'wp-theme' ),
			'id'            => 'about-us',
			'description'   => esc_html__( 'Add about us here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Brain', 'wp-theme' ),
			'id'            => 'brain',
			'description'   => esc_html__( 'Add brain here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function wp_theme_scripts() {
// 	wp_enqueue_style( 'wp-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'wp-theme-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'wp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'wp_theme_scripts' );

function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/scss/reset.css', array(), '1.1', 'all');
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/scss/fontawesome.min.css', array(), '1.1', 'all');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/scss/slick.css', array(), '1.1', 'all');
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/scss/slick-theme.css', array(), '1.1', 'all');
	wp_enqueue_style( 'style-scss', get_template_directory_uri() . '/scss/style.css', array(), '1.1', 'all');
	
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
	
	  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	  }
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
* Add Widgets
*/
require get_template_directory() . '/widgets/banner.php';
require get_template_directory() . '/widgets/category1.php';
require get_template_directory() . '/widgets/category2.php';
require get_template_directory() . '/widgets/about-us.php';
require get_template_directory() . '/widgets/brain.php';

/**
 * 
 * Customizer Zone ^^
 * 
 */

/**
 *Customizer Copyright
 */

function customizer_copyright( $wp_customize ) {
	// Tạo section
    $wp_customize->add_section (
        'section_copyright',
        array(
            'title' => 'Copyright',
            'description' => 'Text Copyright Footer',
            'priority' => 25
        )
    );

    // Tạo setting
    $wp_customize->add_setting (
	    'copyright',
	    array(
	        'default' => 'Copyright © 2019 Gymax - Design by ArrowHitech - All Rights Reserved'
	    )
	);

	// Tạo coltrol
	$wp_customize->add_control (
	    'control_copyright',
	    array(
	        'label' => 'Copyright Text',
	        'section' => 'section_copyright',
	        'type' => 'textarea',
	        'settings' => 'copyright'
	    )
	);

}
add_action( 'customize_register', 'customizer_copyright' );

/**
 * Customizer Social */
function customizer_social( $wp_customize ) {
	// Tạo section
    $wp_customize->add_section (
        'section_social',
        array(
            'title' => 'Social',
            'description' => 'Social in footer',
            'priority' => 25
        )
    );

    // Tạo setting Facebook
    $wp_customize->add_setting (
	    'facebook',
	    array(
	        'default' => '#'
	    )
	);

	// Tạo coltrol Facebook
	$wp_customize->add_control (
	    'control_facebook',
	    array(
	        'label' => 'Facebook Link',
	        'section' => 'section_social',
	        'type' => 'text',
	        'settings' => 'facebook'
	    )
	);	
	
	// Tạo setting Twitter
    $wp_customize->add_setting (
	    'twitter',
	    array(
	        'default' => '#'
	    )
	);

	// Tạo coltrol Twitter
	$wp_customize->add_control (
	    'control_twitter',
	    array(
	        'label' => 'Twitter Link',
	        'section' => 'section_social',
	        'type' => 'text',
	        'settings' => 'twitter'
	    )
	);	
	// Tạo setting Google
    $wp_customize->add_setting (
	    'google',
	    array(
	        'default' => '#'
	    )
	);

	// Tạo coltrol Google
	$wp_customize->add_control (
	    'control_google',
	    array(
	        'label' => 'Google Link',
	        'section' => 'section_social',
	        'type' => 'text',
	        'settings' => 'google'
	    )
	);	
	// Tạo setting Youtube
    $wp_customize->add_setting (
	    'youtube',
	    array(
	        'default' => '#'
	    )
	);

	// Tạo coltrol Youtube
	$wp_customize->add_control (
	    'control_youtube',
	    array(
	        'label' => 'Youtube Link',
	        'section' => 'section_social',
	        'type' => 'text',
	        'settings' => 'youtube'
	    )
	);	


}
add_action( 'customize_register', 'customizer_social' );


/**
 * Customizer Contact Us */
function customizer_contact_us( $wp_customize ) {
	// Tạo section
    $wp_customize->add_section (
        'section_contact_us',
        array(
            'title' => 'Contact Us',
            'description' => 'Contact Us in footer',
            'priority' => 25
        )
    );

    // Tạo setting address
    $wp_customize->add_setting (
	    'address',
	    array(
	        'default' => 'VN'
	    )
	);

	// Tạo coltrol address
	$wp_customize->add_control (
	    'control_address',
	    array(
	        'label' => 'Address',
	        'section' => 'section_contact_us',
	        'type' => 'text',
	        'settings' => 'address'
	    )
	);	
	
	// Tạo setting phone
    $wp_customize->add_setting (
	    'phone',
	    array(
	        'default' => '69696969'
	    )
	);

	// Tạo coltrol phone
	$wp_customize->add_control (
	    'control_phone',
	    array(
	        'label' => 'Phone',
	        'section' => 'section_contact_us',
	        'type' => 'text',
	        'settings' => 'phone'
	    )
	);	
	// Tạo setting mail
    $wp_customize->add_setting (
	    'mail',
	    array(
	        'default' => 'mail@example.com'
	    )
	);

	// Tạo coltrol mail
	$wp_customize->add_control (
	    'control_mail',
	    array(
	        'label' => 'Mail',
	        'section' => 'section_contact_us',
	        'type' => 'text',
	        'settings' => 'mail'
	    )
	);	
	// Tạo setting time
    $wp_customize->add_setting (
	    'time',
	    array(
	        'default' => '6:09 - 9:06'
	    )
	);

	// Tạo coltrol time
	$wp_customize->add_control (
	    'control_time',
	    array(
	        'label' => 'Time',
	        'section' => 'section_contact_us',
	        'type' => 'text',
	        'settings' => 'time'
	    )
	);	


}
add_action( 'customize_register', 'customizer_contact_us' );
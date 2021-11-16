<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-theme
 */

?>
<!--  -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <!-- Link CSS -->
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <!-- Header -->
        <div class="header">
            <!-- Navbar -->
            <div class="container">
                <div class="navbar">
                    <!-- Icon Responsive -->
                    <div class="navbar-icon"><i class="fas fa-bars"></i></div>
                    <!-- End Icon Responsive -->
                    <!-- Logo -->
                    <div class="navbar-logo">
                        <a href="<?php echo get_home_url(); ?>">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							 
							if ( has_custom_logo() ) {
								echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
							} else {
								echo '<h4>' . get_bloginfo('name') . '</h4>';
							}
						 ?>
						</a>
                    </div>
                    <!-- End Logo -->
                    <!-- Menu -->
                    <!-- <div class="navbar-menu">
                        <ul>
                            <li class="navbar-item"><a href="#">Home</a></li>
                            <li class="navbar-item"><a href="#">Pages</a></li>
                            <li class="navbar-item"><a href="#">Classes</a></li>
                            <li class="navbar-item"><a href="#">Portfolio</a></li>
                            <li class="navbar-item"><a href="#">Blog</a></li>
                            <li class="navbar-item"><a href="#">Contacts</a></li>
                        </ul>
                    </div> -->
					<?php
					wp_nav_menu(
						array(
						  'theme_location' => 'main-menu',
						  'menu_class' => 'navbar-menu',
						  'before' => '<div class="navbar-item">',
						  'after' => '</div>'
						)
					); 
					?>
                    <!-- End Menu -->
                    <!-- Tools -->
                    <div class="navbar-tools">
                        <form id="search" action="#">
                            <input type="text" id='search' name="s" value="<?php the_search_query(); ?>" placeholder="Press enter to search" onkeypress="handle" />
                        </form>
                        <div class="tools-item"><a href="#"><i class="fas fa-search"></i></a></div><span
                            class="between-item">|</span>
                        <div class="tools-item"><a href="<?php echo wc_get_cart_url(); ?>"><i class="fas fa-shopping-basket"></i><span class="cat-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a></div><span
                            class="between-item">|</span>
                        <div class="tools-item"><a href="#"><i class="fas fa-user"></i></a></div>
                    </div>
                    <!-- End Tools -->
                </div>
                <!-- Navbar Responsive -->
                <div class="navbar-menu-res">
                    <?php
					wp_nav_menu(
						array(
						  'theme_location' => 'main-menu',
						  'menu_class' => 'menu-res',
						  'before' => '<div class="navbar-item">',
						  'after' => '</div>'
						)
					); 
					?>
                    <!-- End Menu res -->
                </div>
                <!-- End Navbar Responsive -->
            </div>
            <!-- End Navbar -->
        </div>
        <!-- End Header -->
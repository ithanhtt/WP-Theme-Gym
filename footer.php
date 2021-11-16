<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-theme
 */

?>

<!-- Footer -->
<footer class="footer">
            <div class="container">
                <!-- Footer Info -->
                <div class="footer-info">
                    <div class="footer-info-logo">
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
                    <div class="footer-info-des">
                        <?php echo get_bloginfo('description') ?>
                    </div>
                    <div class="footer-info-social">
                        <a href="<?php echo get_theme_mod( 'facebook' ); ?>"><i class="is fab fa-facebook-f"></i></a>
                        <a href="<?php echo get_theme_mod( 'twitter' ); ?>"><i class="is fab fa-twitter"></i></a>
                        <a href="<?php echo get_theme_mod( 'google' ); ?>"><i class="is fab fa-google-plus-g"></i></a>
                        <a href="<?php echo get_theme_mod( 'youtube' ); ?>"><i class="is fab fa-youtube"></i></a>
                    </div>
                </div>
                <!-- End Footer Info -->
                <!-- Footer Content -->
                <div class="footer-content">
                    <div class="row">
                        <!-- Col 1 -->
                        <div class="col-content">
                            <div class="col-content-title">Contact us</div>
                            <div class="col-content-item">
                                <i class="fas fa-map-marker-alt"></i>
								<?php echo get_theme_mod( 'address' ); ?>
                            </div>
                            <div class="col-content-item">
								<i class="fas fa-phone"></i>
								<?php echo get_theme_mod( 'phone' ); ?>
                            </div>
                            <div class="col-content-item">
								<i class="fas fa-envelope"></i>
								<?php echo get_theme_mod( 'mail' ); ?>
                            </div>
                            <div class="col-content-item">
                                <i class="fas fa-clock"></i>
                                <?php echo get_theme_mod( 'time' ); ?>
                            </div>
                        </div>
                        <!-- End Col 1 -->
                        <!-- Col 2 -->
                        <div class="col-content">
                            <div class="col-content-title">My Account</div>
							<?php
							wp_nav_menu(
								array(
								'theme_location' => 'footer-menu-2',
								'menu_class' => 'navbar-menu',
								'before' => '<div class="col-content-item">',
								'after' => '</div>'
								)
							); 
							?>
                        </div>
                        <!-- End Col 2 -->
                        <!-- Col 3 -->
                        <div class="col-content">
                            <div class="col-content-title">Information</div>
                            <?php
							wp_nav_menu(
								array(
								'theme_location' => 'footer-menu-3',
								'menu_class' => 'navbar-menu',
								'before' => '<div class="col-content-item">',
								'after' => '</div>'
								)
							); 
							?>
                        </div>
                        <!-- End Col 3 -->
                        <!-- Col 4 -->
                        <div class="col-content">
                            <div class="col-content-title">Quick link</div>
                            <?php
							wp_nav_menu(
								array(
								'theme_location' => 'footer-menu-4',
								'menu_class' => 'navbar-menu',
								'before' => '<div class="col-content-item">',
								'after' => '</div>'
								)
							); 
							?>
                        </div>
                        <!-- End Col 4 -->
                    </div>
                </div>
                <!-- End Footer Content -->
            </div>
            <!-- Copyright -->
            <div class="copyright"><?php echo get_theme_mod( 'copyright' ); ?></div>
            <!-- End Copyright -->
        </footer>
        <!-- End Footer -->
    </div>

<?php wp_footer(); ?>

</body>
</html>

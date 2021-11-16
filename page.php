<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-theme
 */

get_header();
?>

	<!-- <main id="primary" class="site-main"> -->

		<?php
		// while ( have_posts() ) :
		// 	the_post();

		// 	// get_template_part( 'template-parts/content', 'page' );

		// 	// If comments are open or we have at least one comment, load up the comment template.
		// 	if ( comments_open() || get_comments_number() ) :
		// 		comments_template();
		// 	endif;

		// endwhile; // End of the loop.
		?>

	<!-- </main> -->


<?php
while(have_posts()) : the_post();
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
	?>
	<div class="page-header" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $url ?>') top center/cover no-repeat;"></div>
	<div class="page-title">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</div>
	<div class="page-author">
		Author: <?php the_author('<b>', '</b>'); ?>
	</div>
	<div class="container">
		<div class="page-content">
		<?php the_content(); ?>
		</div>
	</div>
	<?php
		endwhile; 
?>
<?php
get_sidebar();
get_footer();

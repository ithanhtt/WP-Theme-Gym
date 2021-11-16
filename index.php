<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-theme
 */

get_header(); //Header

/* Show Banner */
if (is_active_sidebar('banner')) {
    dynamic_sidebar('banner'); //Banner
}
/* End Banner */

/* Show Cagegory */
if (is_active_sidebar('category')) {
    echo '<div class="main-content">
            <div class="category container">
                <div class="row">';
                    dynamic_sidebar('category');
    echo '</div></div>';
}
/* End Category */

?>
<div class="container">
    <!-- ############################### Start Product ############################## -->
    <!-- Title Main -->
    <div class="title-main">
        <ul>
            <li><a href="javascript:;" class="title-p" onclick="openCity(event, 'p1')" id="defaultOpen">Top
                    Sellers</a></li>
            <li><a href="javascript:;" class="title-p" onclick="openCity(event, 'p2')">Featured</a></li>
            <li><a href="javascript:;" class="title-p" onclick="openCity(event, 'p3')">Most Reviews</a></li>
        </ul>
    </div>
    <!-- End Title Main -->
    <!-- Product 1-->
    <div class="product" id="p1">
        <div class="row">
            <!-- Product 1 -->
            <?php
            $args = array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'order' => 'desc',
            );
            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;
            ?>
                <div class="product-item">
                    <div class="border-box">
                        <div class="product-item-img">
                            <a href="<?php echo get_permalink() ?>">
                                <?php echo woocommerce_get_product_thumbnail() ?>
                            </a>
                            <ul class="action">
                                <li onclick="location.href='<?php echo $product->add_to_cart_url() ?>';"><i class="fas fa-shopping-basket"></i></li>
                                <li onclick="location.href='<?php echo get_permalink() ?>';"><i class="fas fa-eye"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-heart"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-exchange-alt"></i></li>
                            </ul>
                        </div>
                        <div class="product-item-name"><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></div>
                        <div class="product-item-price"><?php echo '$' . $product->get_price(); ?></div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            <!-- End Product 1 -->
        </div>
    </div>
    <!-- Featured -->
    <div class="product" id="p2">
        <div class="row">
            <!-- Product 1 -->
            <?php
            $args = array(
                'post_type' => 'product',
                'order' => 'desc',
                'post__in' => wc_get_featured_product_ids(),
            );
            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;
            ?>
                <div class="product-item">
                    <div class="border-box">
                        <div class="product-item-img">
                            <a href="<?php echo get_permalink() ?>">
                                <?php echo woocommerce_get_product_thumbnail() ?>
                            </a>
                            <ul class="action">
                                <li onclick="location.href='<?php echo $product->add_to_cart_url() ?>';"><i class="fas fa-shopping-basket"></i></li>
                                <li onclick="location.href='<?php echo get_permalink() ?>';"><i class="fas fa-eye"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-heart"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-exchange-alt"></i></li>
                            </ul>
                        </div>
                        <div class="product-item-name"><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></div>
                        <div class="product-item-price"><?php echo '$' . $product->get_price(); ?></div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            <!-- End Product 1 -->
        </div>
    </div>
    <!-- Most Reviews -->
    <div class="product" id="p3">
        <div class="row">
            <!-- Product 1 -->
            <?php
            $args = array(
                'post_type' => 'product',
                'orderby' => 'comment_count',
                'order' => 'DESC',
            );
            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
                global $product;
            ?>
                <div class="product-item">
                    <div class="border-box">
                        <div class="product-item-img">
                            <a href="<?php echo get_permalink() ?>">
                                <?php echo woocommerce_get_product_thumbnail() ?>
                            </a>
                            <ul class="action">
                                <li onclick="location.href='<?php echo $product->add_to_cart_url() ?>';"><i class="fas fa-shopping-basket"></i></li>
                                <li onclick="location.href='<?php echo get_permalink() ?>';"><i class="fas fa-eye"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-heart"></i></li>
                                <li onclick="location.href='#';"><i class="fas fa-exchange-alt"></i></li>
                            </ul>
                        </div>
                        <div class="product-item-name"><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></div>
                        <div class="product-item-price"><?php echo '$' . $product->get_price(); ?></div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_query();
            ?>
            <!-- End Product 1 -->
        </div>
    </div>
    <!-- ################################# End Product ############################### -->
    <?php
    /* Show About Us */
    if (is_active_sidebar('about-us')) {
        echo '<div class="about-us-title">See What They Said About Us</div>
                <div class="about-us">';
        dynamic_sidebar('about-us'); //About Us
        echo '</div>';
    }
    /* End About Us */ 

    /* Show Brain */
    if (is_active_sidebar('brain')) {
        echo '
        <div class="brand">
            <div class="row">';
            
        dynamic_sidebar('brain'); //Brain

        echo '</div>
        </div>';
    }
    /* End Brain */
    ?>
</div></div>
<?php
//get_sidebar(); //get sidebar
get_footer();

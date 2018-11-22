<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 * 
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
	

if ( ! isset( $classes ) ) 
	$classes = '';

?>
<li <?php post_class( $classes ); ?>>
	<div class="product_outer">
	<?php 
		woocommerce_show_product_loop_sale_flash();
		
		$availability = $product->get_availability();

		if (esc_attr($availability['class']) == 'out-of-stock') {
			echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
		}
	?>
		<article class="product_inner">
			<figure class="cmsms_product_img preloader">
				<a href="<?php the_permalink(); ?>">
					<?php woocommerce_template_loop_product_thumbnail(); ?>
				</a>
			</figure>
			<header class="entry-header cmsms_product_header">
				<h5 class="entry-title cmsms_product_title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h5>
			</header>
			<?php 
			if (get_the_terms($product->get_id(), 'product_cat')) {
				echo '<div class="cmsms_product_cat entry-meta">' . 
					wc_get_product_category_list($product->get_id(), ', ', ' ') . 
				'</div>';
			}
			?>
			<div class="cmsms_product_info">
			<?php
				cmsms_woocommerce_rating('cmsms-icon-star-empty', 'cmsms-icon-star-1');
				
				woocommerce_template_loop_price();
			?>
			</div>
			<footer class="entry-meta cmsms_product_footer">
			<?php 
				cmsms_woocommerce_add_to_cart_button();
			?>
			</footer>
		</article>
	</div>
</li>
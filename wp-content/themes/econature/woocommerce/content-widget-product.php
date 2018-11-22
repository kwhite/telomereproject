<?php 
/**
 * The template for displaying product widget entries
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 *
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.3.2
 */


global $product;

?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
		<?php echo $product->get_title(); ?>
	</a>
	<?php 
	cmsms_woocommerce_rating('cmsms-icon-star-empty', 'cmsms-icon-star-1');
	
	echo $product->get_price_html(); 
	?>
</li>
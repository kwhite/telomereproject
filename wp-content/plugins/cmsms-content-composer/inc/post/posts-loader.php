<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.2.6
 * 
 * Attachments Posts Loader
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


if (isset($_POST['offset'])) {
	$layout = $_POST['layout'];
	$orderby = $_POST['orderby'];
	$order = $_POST['order'];
	$count = $_POST['count'];
	$categories = $_POST['categories'];
	$metadata = $_POST['metadata'];
	$offset = $_POST['offset'];
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args_all = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		-1, 
		'category_name' => 			$categories, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	if ($orderby == 'meta_value_num') {
		$args_all['meta_key'] = 'cmsms_likes';
	}
	
	
	$cmsms_query_all = new WP_Query($args_all);
	
	
	if ($cmsms_query_all->post_count <= ($offset + $count)) {
		echo 'finish';
	}
	
	
	wp_reset_query();
	
	
	global $cmsms_metadata;
	
	
	$cmsms_metadata = $metadata;
	
	
	$args = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'category_name' => 			$categories, 
		'ignore_sticky_posts' => 	true, 
		'offset' => 				$offset 
	);
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsms_likes';
	}
	
	
	$cmsms_query = new WP_Query($args);
	
	
	if ($cmsms_query->have_posts()) : 
		while ($cmsms_query->have_posts()) : $cmsms_query->the_post();
			if ($layout == 'columns') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/masonry/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/masonry/standard');
				}
			} elseif ($layout == 'timeline') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/timeline/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/timeline/standard');
				}
			} else {
				if (get_post_format() != '') {
					get_template_part('framework/postType/blog/page/default/' . get_post_format());
				} else {
					get_template_part('framework/postType/blog/page/default/standard');
				}
			}
		endwhile;
	endif;
	
	
	wp_reset_query();
}


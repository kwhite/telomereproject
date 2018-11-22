<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.2.9
 * 
 * Likes Post Type
 * Created by CMSMasters
 * 
 */


class Cmsms_Likes {
	public function __construct() {
		$like_labels = array( 
			'name' => esc_html__('Likes', 'cmsms_content_composer'), 
			'singular_name' => esc_html__('Like', 'cmsms_content_composer') 
		);
		
		
		$like_args = array( 
			'labels' => $like_labels, 
			'public' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'exclude_from_search' => true, 
			'publicly_queryable' => false, 
			'show_ui' => false, 
			'show_in_nav_menus' => false 
		);
		
		
		register_post_type('cmsms_like', $like_args);
	}
}


function cmsms_likes_init() {
	global $lk;
	
	
	$lk = new Cmsms_Likes();
}

add_action('init', 'cmsms_likes_init');


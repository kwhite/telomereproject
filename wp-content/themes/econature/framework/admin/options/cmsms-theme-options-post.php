<?php 
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version 	1.3.1
 * 
 * Post Options Functions
 * Created by CMSMasters
 * 
 */


if (!function_exists('get_custom_post_meta_fields')) {
function get_custom_post_meta_fields() {
	$cmsms_option = cmsms_get_global_options();
	
	
	$cmsms_global_blog_post_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_blog_post_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_blog_post_layout'] !== '') ? $cmsms_option[CMSMS_SHORTNAME . '_blog_post_layout'] : 'r_sidebar';
	
	$cmsms_global_bottom_sidebar = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar']) && $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsms_global_bottom_sidebar_layout = (isset($cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'])) ? $cmsms_option[CMSMS_SHORTNAME . '_bottom_sidebar_layout'] : '14141414';
	
	$cmsms_global_blog_post_title = (isset($cmsms_option[CMSMS_SHORTNAME . '_blog_post_title']) && $cmsms_option[CMSMS_SHORTNAME . '_blog_post_title'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_blog_post_title'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsms_global_blog_post_share_box = (isset($cmsms_option[CMSMS_SHORTNAME . '_blog_post_share_box']) && $cmsms_option[CMSMS_SHORTNAME . '_blog_post_share_box'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_blog_post_share_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsms_global_blog_post_author_box = (isset($cmsms_option[CMSMS_SHORTNAME . '_blog_post_author_box']) && $cmsms_option[CMSMS_SHORTNAME . '_blog_post_author_box'] !== '') ? (($cmsms_option[CMSMS_SHORTNAME . '_blog_post_author_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsms_global_bg = (isset($cmsms_option[CMSMS_SHORTNAME . '_theme_layout']) && $cmsms_option[CMSMS_SHORTNAME . '_theme_layout'] === 'boxed') ? true : false;
	
	
	if (isset($cmsms_option[CMSMS_SHORTNAME . '_blog_more_posts_box']) && $cmsms_option[CMSMS_SHORTNAME . '_blog_more_posts_box'] !== '') {
		$cmsms_global_blog_more_posts_box = array();
		
		
		foreach($cmsms_option[CMSMS_SHORTNAME . '_blog_more_posts_box'] as $key => $val) {
			if ($val == 'true') {
				$cmsms_global_blog_more_posts_box[] = $key;
			}
		}
	} else {
		$cmsms_global_blog_more_posts_box = array( 
			'related', 
			'popular', 
			'recent' 
		);
	}
	
	
	$cmsms_option_name = 'cmsms_post_';
	
	
	$tabs_array = array();
	
	
	$tabs_array['cmsms_post'] = array( 
		'label' => __('Post', 'econature'), 
		'value'	=> 'cmsms_post' 
	);
	
	
	$tabs_array['cmsms_layout'] = array( 
		'label' => __('Layout', 'econature'), 
		'value'	=> 'cmsms_layout' 
	);
	
	
	if ($cmsms_global_bg) {
		$tabs_array['cmsms_bg'] = array( 
			'label' => __('Background', 'econature'), 
			'value'	=> 'cmsms_bg' 
		);
	}
	
	
	$tabs_array['cmsms_heading'] = array( 
		'label' => __('Heading', 'econature'), 
		'value'	=> 'cmsms_heading' 
	);
	
	
	$custom_post_meta_fields = array( 
		array( 
			'id'	=> 'cmsms_post_standard', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('Don\'t Show Featured Image in Open Post', 'econature'), 
			'desc'	=> esc_html__('Don\'t Show', 'econature'), 
			'id'	=> $cmsms_option_name . 'image_show', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> 'false' 
		), 
		array( 
			'id'	=> 'cmsms_post_standard', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_aside', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Aside Text', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'aside_text', 
			'type'	=> 'textarea', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_aside', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_status', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Status Text', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'status_text', 
			'type'	=> 'textarea', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_status', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_chat', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Chat Text', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'chat_text', 
			'type'	=> 'textarea', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_chat', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_quote', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Quote Text', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'quote_text', 
			'type'	=> 'textarea', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Quote Author', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'quote_author', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_quote', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_link', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Link Text', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'link_text', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Link Address', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'link_address', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_link', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_image', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Post Image', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'image_link', 
			'type'	=> 'image', 
			'hide'	=> '', 
			'cancel' => 'true', 
			'std'	=> '', 
			'frame' => 'select', 
			'multiple' => false 
		), 
		array( 
			'id'	=> 'cmsms_post_image', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_gallery', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Post Gallery', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'images', 
			'type'	=> 'images_list', 
			'hide'	=> '', 
			'std'	=> '', 
			'frame' => 'post', 
			'multiple' => true 
		), 
		array( 
			'id'	=> 'cmsms_post_gallery', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_video', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Video Type', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'video_type', 
			'type'	=> 'radio', 
			'hide'	=> '', 
			'std'	=> 'embedded', 
			'options' => array( 
				'embedded' => array( 
					'label' => __('Embedded (YouTube, Vimeo)', 'econature'), 
					'value'	=> 'embedded' 
				), 
				'selfhosted' => array( 
					'label' => __('Self-Hosted', 'econature'), 
					'value'	=> 'selfhosted' 
				) 
			) 
		), 
		array( 
			'label'	=> __('Embedded Video Link', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'video_link', 
			'type'	=> 'text_long', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Self-Hosted Video Links', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'video_links', 
			'type'	=> 'repeatable', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_video', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_audio', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> __('Audio Links', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'audio_links', 
			'type'	=> 'repeatable', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_audio', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsms_post_format', 
			'type'	=> 'content_start', 
			'box'	=> '' 
		), 
		array( 
			'id'	=> 'cmsms_post_format', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> $cmsms_option_name . 'tabs', 
			'type'	=> 'tabs', 
			'std'	=> 'cmsms_post', 
			'options' => $tabs_array 
		), 
		array( 
			'id'	=> 'cmsms_post', 
			'type'	=> 'tab_start', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> __('Post Title', 'econature'), 
			'desc'	=> __('Show', 'econature'), 
			'id'	=> $cmsms_option_name . 'title', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_blog_post_title 
		), 
		array( 
			'label'	=> __('Sharing Box', 'econature'), 
			'desc'	=> __('Show', 'econature'), 
			'id'	=> $cmsms_option_name . 'sharing_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_blog_post_share_box 
		), 
		array( 
			'label'	=> __('About Author Box', 'econature'), 
			'desc'	=> __('Show', 'econature'), 
			'id'	=> $cmsms_option_name . 'author_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_blog_post_author_box 
		), 
		array( 
			'label'	=> __('More Posts Box', 'econature'), 
			'desc'	=> '', 
			'id'	=> $cmsms_option_name . 'more_posts', 
			'type'	=> 'checkbox_group', 
			'hide'	=> '', 
			'std'	=> ((isset($_GET['post']) && get_post_meta($_GET['post'], 'cmsms_heading', true)) ? '' : $cmsms_global_blog_more_posts_box), 
			'options' => array( 
				'related' => array( 
					'label' => 'Show Related Tab', 
					'value'	=> 'related' 
				), 
				'popular' => array( 
					'label' => 'Show Popular Tab', 
					'value'	=> 'popular' 
				), 
				'recent' => array( 
					'label' => 'Show Recent Tab', 
					'value'	=> 'recent' 
				) 
			) 
		), 
		array( 
			'label'	=> __("'Read More' Buttons Text", 'econature'), 
			'desc'	=> __("Enter the 'Read More' button text that should be used in you blog shortcode", 'econature'), 
			'id'	=> $cmsms_option_name . 'read_more', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> __('Read More', 'econature') 
		), 
		array( 
			'id'	=> 'cmsms_post', 
			'type'	=> 'tab_finish' 
		), 
		array( 
			'id'	=> 'cmsms_layout', 
			'type'	=> 'tab_start', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Page Color Scheme', 'econature'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_page_scheme', 
			'type'	=> 'select_scheme', 
			'hide'	=> 'false', 
			'std'	=> 'default' 
		), 
		array( 
			'label'	=> __('Page Layout', 'econature'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_layout', 
			'type'	=> 'radio_img', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_blog_post_layout, 
			'options' => array( 
				'r_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg', 
					'label' => __('Right Sidebar', 'econature'), 
					'value'	=> 'r_sidebar' 
				), 
				'l_sidebar' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg', 
					'label' => __('Left Sidebar', 'econature'), 
					'value'	=> 'l_sidebar' 
				), 
				'fullwidth' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg', 
					'label' => __('Full Width', 'econature'), 
					'value'	=> 'fullwidth' 
				) 
			) 
		), 
		array( 
			'label'	=> __('Choose Right\Left Sidebar', 'econature'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Bottom Sidebar', 'econature'), 
			'desc'	=> __('Show', 'econature'), 
			'id'	=> 'cmsms_bottom_sidebar', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsms_global_bottom_sidebar 
		), 
		array( 
			'label'	=> __('Choose Bottom Sidebar', 'econature'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_bottom_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> __('Choose Bottom Sidebar Layout', 'econature'), 
			'desc'	=> '', 
			'id'	=> 'cmsms_bottom_sidebar_layout', 
			'type'	=> 'select', 
			'hide'	=> 'true', 
			'std'	=> $cmsms_global_bottom_sidebar_layout, 
			'options' => array( 
				'11' => array( 
					'label' => '1/1',
					'value'	=> '11' 
				), 
				'1212' => array( 
					'label' => '1/2 + 1/2',
					'value'	=> '1212' 
				), 
				'1323' => array( 
					'label' => '1/3 + 2/3',
					'value'	=> '1323' 
				), 
				'2313' => array( 
					'label' => '2/3 + 1/3',
					'value'	=> '2313' 
				), 
				'1434' => array( 
					'label' => '1/4 + 3/4',
					'value'	=> '1434' 
				), 
				'3414' => array( 
					'label' => '3/4 + 1/4',
					'value'	=> '3414' 
				), 
				'131313' => array( 
					'label' => '1/3 + 1/3 + 1/3',
					'value'	=> '131313' 
				), 
				'121414' => array( 
					'label' => '1/2 + 1/4 + 1/4',
					'value'	=> '121414' 
				), 
				'141214' => array( 
					'label' => '1/4 + 1/2 + 1/4',
					'value'	=> '141214' 
				), 
				'141412' => array( 
					'label' => '1/4 + 1/4 + 1/2',
					'value'	=> '141412' 
				), 
				'14141414' => array( 
					'label' => '1/4 + 1/4 + 1/4 + 1/4',
					'value'	=> '14141414' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsms_layout', 
			'type'	=> 'tab_finish' 
		) 
	);
	
	
	return $custom_post_meta_fields;
}
}


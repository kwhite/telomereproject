<?php
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.3.0
 * 
 * Admin Panel Appearance
 * Created by CMSMasters
 * 
 */


function cmsms_options_style_tabs() {
	$cmsms_option = cmsms_get_global_options();
	
	$tabs = array();
	
	$tabs['logo'] = esc_attr__('Logo', 'econature');
	
	if ($cmsms_option[CMSMS_SHORTNAME . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'econature');
	}
	
	$tabs['header'] = esc_attr__('Header', 'econature');
	$tabs['content'] = esc_attr__('Content', 'econature');
	$tabs['footer'] = esc_attr__('Footer', 'econature');
	$tabs['icon'] = esc_attr__('Social Icons', 'econature');
	
	return $tabs;
}


function cmsms_options_style_sections() {
	$tab = cmsms_get_the_tab();
	
	switch ($tab) {
	case 'logo':
		$sections = array();
		
		$sections['logo_section'] = esc_attr__('Logo Options', 'econature');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'econature');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'econature');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'econature');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'econature');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'econature');
		
		break;
	}
	
	return $sections;
} 


function cmsms_options_style_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsms_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'logo':
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_type', 
			'title' => __('Logo Type', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				__('Image', 'econature') . '|image', 
				__('Text', 'econature') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_url', 
			'title' => __('Logo Image', 'econature'), 
			'desc' => __('Choose your website logo image.', 'econature'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_url_retina', 
			'title' => __('Retina Logo Image', 'econature'), 
			'desc' => __('Choose logo image for retina displays.', 'econature'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_title', 
			'title' => __('Logo Title', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : CMSMS_FULLNAME), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_subtitle', 
			'title' => __('Logo Subtitle', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_custom_color', 
			'title' => __('Custom Text Colors', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_title_color', 
			'title' => __('Logo Title Color', 'econature'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#3d3d3d|100' 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_logo_subtitle_color', 
			'title' => __('Logo Subtitle Color', 'econature'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#3d3d3d|100' 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_favicon', 
			'title' => __('Favicon', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'logo_section', 
			'id' => CMSMS_SHORTNAME . '_favicon_url', 
			'title' => __('Favicon URL', 'econature'), 
			'desc' => __('Choose your website favicon image url.', 'econature'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/favicon.ico', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_col', 
			'title' => __('Background Color', 'econature'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_img_enable', 
			'title' => __('Background Image Visibility', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_img', 
			'title' => __('Background Image', 'econature'), 
			'desc' => __('Choose your custom website background image url.', 'econature'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_rep', 
			'title' => __('Background Repeat', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				__('No Repeat', 'econature') . '|no-repeat', 
				__('Repeat Horizontally', 'econature') . '|repeat-x', 
				__('Repeat Vertically', 'econature') . '|repeat-y', 
				__('Repeat', 'econature') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_pos', 
			'title' => __('Background Position', 'econature'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				__('Top Left', 'econature') . '|top left', 
				__('Top Center', 'econature') . '|top center', 
				__('Top Right', 'econature') . '|top right', 
				__('Center Left', 'econature') . '|center left', 
				__('Center Center', 'econature') . '|center center', 
				__('Center Right', 'econature') . '|center right', 
				__('Bottom Left', 'econature') . '|bottom left', 
				__('Bottom Center', 'econature') . '|bottom center', 
				__('Bottom Right', 'econature') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_att', 
			'title' => __('Background Attachment', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				__('Scroll', 'econature') . '|scroll', 
				__('Fixed', 'econature') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMS_SHORTNAME . '_bg_size', 
			'title' => __('Background Size', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				__('Auto', 'econature') . '|auto', 
				__('Cover', 'econature') . '|cover', 
				__('Contain', 'econature') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_fixed_header', 
			'title' => __('Fixed Header', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_top_line', 
			'title' => __('Top Line', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_top_height', 
			'title' => __('Top Height', 'econature'), 
			'desc' => __('pixels', 'econature'), 
			'type' => 'number', 
			'std' => '35', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_top_line_short_info', 
			'title' => __('Top Short Info', 'econature'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'econature') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_top_line_add_cont', 
			'title' => __('Top Additional Content', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				__('None', 'econature') . '|none', 
				__('Top Line Social Icons', 'econature') . '|social', 
				__('Top Line Navigation', 'econature') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_styles', 
			'title' => __('Header Styles', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				__('Default Style', 'econature') . '|default', 
				__('Compact Style Left Navigation', 'econature') . '|l_nav', 
				__('Compact Style Right Navigation', 'econature') . '|r_nav', 
				__('Compact Style Center Navigation', 'econature') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_mid_height', 
			'title' => __('Header Middle Height', 'econature'), 
			'desc' => __('pixels', 'econature'), 
			'type' => 'number', 
			'std' => '95', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_bot_height', 
			'title' => __('Header Bottom Height', 'econature'), 
			'desc' => __('pixels', 'econature'), 
			'type' => 'number', 
			'std' => '45', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_search', 
			'title' => __('Header Search', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_add_cont', 
			'title' => __('Header Additional Content', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cust_html', 
			'choices' => array( 
				__('None', 'econature') . '|none', 
				__('Header Social Icons', 'econature') . '|social', 
				__('Header Custom HTML', 'econature') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMS_SHORTNAME . '_header_add_cont_cust_html', 
			'title' => __('Header Custom HTML', 'econature'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'econature') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_layout', 
			'title' => __('Layout Type by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				__('Right Sidebar', 'econature') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				__('Left Sidebar', 'econature') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				__('Full Width', 'econature') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_alignment', 
			'title' => __('Heading Alignment by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				__('Left', 'econature') . '|left', 
				__('Right', 'econature') . '|right', 
				__('Center', 'econature') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_scheme', 
			'title' => __('Heading Custom Color Scheme by Default', 'econature'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsms_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_image_enable', 
			'title' => __('Heading Background Image Visibility by Default', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_image', 
			'title' => __('Heading Background Image by Default', 'econature'), 
			'desc' => __('Choose your custom heading background image by default.', 'econature'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_repeat', 
			'title' => __('Heading Background Repeat by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				__('No Repeat', 'econature') . '|no-repeat', 
				__('Repeat Horizontally', 'econature') . '|repeat-x', 
				__('Repeat Vertically', 'econature') . '|repeat-y', 
				__('Repeat', 'econature') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_attachment', 
			'title' => __('Heading Background Attachment by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				__('Scroll', 'econature') . '|scroll', 
				__('Fixed', 'econature') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_size', 
			'title' => __('Heading Background Size by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				__('Auto', 'econature') . '|auto', 
				__('Cover', 'econature') . '|cover', 
				__('Contain', 'econature') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_color', 
			'title' => __('Heading Background Color Overlay by Default', 'econature'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#000000' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_bg_color_opacity', 
			'title' => __('Heading Background Color Overlay Transparency by Default', 'econature'), 
			'desc' => __('percentage', 'econature'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '100' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_heading_height', 
			'title' => __('Heading Height by Default', 'econature'), 
			'desc' => __('pixels', 'econature'), 
			'type' => 'number', 
			'std' => '70', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_breadcrumbs', 
			'title' => __('Breadcrumbs Visibility by Default', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_breadcrumbs_alignment', 
			'title' => __('Breadcrumbs Alignment by Default', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'right', 
			'choices' => array( 
				__('Left', 'econature') . '|left', 
				__('Right', 'econature') . '|right', 
				__('Center', 'econature') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_bottom_scheme', 
			'title' => __('Bottom Custom Color Scheme', 'econature'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsms_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_bottom_sidebar', 
			'title' => __('Bottom Sidebar Visibility by Default', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMS_SHORTNAME . '_bottom_sidebar_layout', 
			'title' => __('Bottom Sidebar Layout by Default', 'econature'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '131313', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_scheme', 
			'title' => __('Footer Custom Color Scheme', 'econature'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsms_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_type', 
			'title' => __('Footer Type', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				__('Default', 'econature') . '|default', 
				__('Small', 'econature') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_additional_content', 
			'title' => __('Footer Additional Content', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				__('None', 'econature') . '|none', 
				__('Footer Navigation', 'econature') . '|nav', 
				__('Social Icons', 'econature') . '|social', 
				__('Custom HTML', 'econature') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_fixed_footer', 
			'title' => __('Fixed Footer', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_height', 
			'title' => __('Footer Height', 'econature'), 
			'desc' => __('pixels', 'econature'), 
			'type' => 'number', 
			'std' => '450', 
			'min' => '200' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_logo', 
			'title' => __('Footer Logo', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_logo_url', 
			'title' => __('Footer Logo', 'econature'), 
			'desc' => __('Choose your website footer logo image.', 'econature'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_logo_url_retina', 
			'title' => __('Footer Logo for Retina', 'econature'), 
			'desc' => __('Choose your website footer logo image for retina.', 'econature'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_nav', 
			'title' => __('Footer Navigation', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_social', 
			'title' => __('Footer Social Icons', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_html', 
			'title' => __('Footer Custom HTML', 'econature'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'econature') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMS_SHORTNAME . '_footer_copyright', 
			'title' => __('Copyright Text', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => CMSMS_FULLNAME . ' &copy; 2017 | ' . __('All Rights Reserved', 'econature'), 
			'class' => 'nohtml' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => CMSMS_SHORTNAME . '_social_icons', 
			'title' => __('Social Icons', 'econature'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsms-icon-twitter-circled|#|' . __('Twitter', 'econature') . '|true', 
				'cmsms-icon-facebook-circled|#|' . __('Facebook', 'econature') . '|true', 
				'cmsms-icon-gplus-circled|#|' . __('Google+', 'econature') . '|true', 
				'cmsms-icon-vimeo-circled|#|' . __('Vimeo', 'econature') . '|true', 
				'cmsms-icon-skype-circled|#|' . __('Skype', 'econature') . '|true' 
			) 
		);
		
		break;
	}
	
	return $options;	
}


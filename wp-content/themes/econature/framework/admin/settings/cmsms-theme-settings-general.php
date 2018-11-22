<?php 
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version 	1.3.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function cmsms_options_general_tabs() {
	$tabs = array();
	
	$tabs['general'] = __('General', 'econature');
	$tabs['sidebar'] = __('Sidebars', 'econature');
	$tabs['sitemap'] = __('Sitemap', 'econature');
	$tabs['error'] = __('404', 'econature');
	$tabs['lightbox'] = __('Lightbox', 'econature');
	$tabs['code'] = __('Custom Codes', 'econature');
	
	if (class_exists('Cmsms_Form_Builder')) {
		$tabs['recaptcha'] = __('reCAPTCHA', 'econature');
	}
	
	return $tabs;
}


function cmsms_options_general_sections() {
	$tab = cmsms_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = __('General Options', 'econature');
		
		break;
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = __('Custom Sidebars', 'econature');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = __('Sitemap Page Options', 'econature');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = __('404 Error Page Options', 'econature');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = __('Theme Lightbox Options', 'econature');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = __('Custom Codes', 'econature');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = __('Form Builder Plugin reCAPTCHA Keys', 'econature');
		
		break;
	}
	
	return $sections;	
} 


function cmsms_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsms_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_theme_layout', 
			'title' => __('Theme Layout', 'econature'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				__('Liquid', 'econature') . '|liquid', 
				__('Boxed', 'econature') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_responsive', 
			'title' => __('Responsive Layout', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_retina', 
			'title' => __('High Resolution', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_preload', 
			'title' => __('Ajax Preloader', 'econature'), 
			'desc' => __('enable', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_preload_bg', 
			'title' => __('Preloader Background Color', 'econature'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_preload_color', 
			'title' => __('Preloader Bar Color', 'econature'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#dadada' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_preload_effect', 
			'title' => __('Preloader Animation Effect', 'econature'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'grow', 
			'choices' => array( 
				__('Grow', 'econature') . '|grow', 
				__('Fade', 'econature') . '|fade', 
				__('Minimal', 'econature') . '|minimal', 
				__('Flash', 'econature') . '|flash', 
				__('Barber Shop', 'econature') . '|barber-shop', 
				__('Mac OSX', 'econature') . '|mac-osx', 
				__('Fill Left', 'econature') . '|fill-left', 
				__('Flat Top', 'econature') . '|flat-top', 
				__('Big Counter', 'econature') . '|big-counter', 
				__('Corner Indicator', 'econature') . '|corner-indicator', 
				__('Bounce', 'econature') . '|bounce', 
				__('Loading Bar', 'econature') . '|loading-bar', 
				__('Center Circle', 'econature') . '|center-circle', 
				__('Center Atom', 'econature') . '|center-atom', 
				__('Center Radar', 'econature') . '|center-radar', 
				__('Center Simple', 'econature') . '|center-simple' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMS_SHORTNAME . '_preload_percentage', 
			'title' => __('Preloader Percentage', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => CMSMS_SHORTNAME . '_sidebar', 
			'title' => __('Custom Sidebars', 'econature'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_nav', 
			'title' => __('Website Pages', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_categs', 
			'title' => __('Blog Archives by Categories', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_tags', 
			'title' => __('Blog Archives by Tags', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_month', 
			'title' => __('Blog Archives by Month', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_pj_categs', 
			'title' => __('Portfolio Archives by Categories', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMS_SHORTNAME . '_sitemap_pj_tags', 
			'title' => __('Portfolio Archives by Tags', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMS_SHORTNAME . '_error_bg_color', 
			'title' => __('Background Color', 'econature'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#3d3d3d|100' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMS_SHORTNAME . '_error_bg_image', 
			'title' => __('Background Image', 'econature'), 
			'desc' => __('Choose your custom error page background image.', 'econature'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMS_SHORTNAME . '_error_search', 
			'title' => __('Search Line', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMS_SHORTNAME . '_error_sitemap_button', 
			'title' => __('Sitemap Button', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMS_SHORTNAME . '_error_sitemap_link', 
			'title' => __('Sitemap Page URL', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_skin', 
			'title' => __('Skin', 'econature'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				__('Dark', 'econature') . '|dark', 
				__('Light', 'econature') . '|light', 
				__('Mac', 'econature') . '|mac', 
				__('Metro Black', 'econature') . '|metro-black', 
				__('Metro White', 'econature') . '|metro-white', 
				__('Parade', 'econature') . '|parade', 
				__('Smooth', 'econature') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_path', 
			'title' => __('Path', 'econature'), 
			'desc' => __('Sets path for switching windows', 'econature'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				__('Vertical', 'econature') . '|vertical', 
				__('Horizontal', 'econature') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_infinite', 
			'title' => __('Infinite', 'econature'), 
			'desc' => __('Sets the ability to infinite the group', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_aspect_ratio', 
			'title' => __('Keep Aspect Ratio', 'econature'), 
			'desc' => __('Sets the resizing method used to keep aspect ratio within the viewport', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_mobile_optimizer', 
			'title' => __('Mobile Optimizer', 'econature'), 
			'desc' => __('Make lightboxes optimized for giving better experience with mobile devices', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_max_scale', 
			'title' => __('Max Scale', 'econature'), 
			'desc' => __('Sets the maximum viewport scale of the content', 'econature'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_min_scale', 
			'title' => __('Min Scale', 'econature'), 
			'desc' => __('Sets the minimum viewport scale of the content', 'econature'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_inner_toolbar', 
			'title' => __('Inner Toolbar', 'econature'), 
			'desc' => __('Bring buttons into windows, or let them be over the overlay', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_smart_recognition', 
			'title' => __('Smart Recognition', 'econature'), 
			'desc' => __('Sets content auto recognize from web pages', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_fullscreen_one_slide', 
			'title' => __('Fullscreen One Slide', 'econature'), 
			'desc' => __('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_fullscreen_viewport', 
			'title' => __('Fullscreen Viewport', 'econature'), 
			'desc' => __('Sets the resizing method used to fit content within the fullscreen mode', 'econature'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				__('Center', 'econature') . '|center', 
				__('Fit', 'econature') . '|fit', 
				__('Fill', 'econature') . '|fill', 
				__('Stretch', 'econature') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_toolbar', 
			'title' => __('Toolbar Controls', 'econature'), 
			'desc' => __('Sets buttons be available or not', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_arrows', 
			'title' => __('Arrow Controls', 'econature'), 
			'desc' => __('Enable the arrow buttons', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_fullscreen', 
			'title' => __('Fullscreen Controls', 'econature'), 
			'desc' => __('Sets the fullscreen button', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_thumbnail', 
			'title' => __('Thumbnails Controls', 'econature'), 
			'desc' => __('Sets the thumbnail navigation', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_keyboard', 
			'title' => __('Keyboard Controls', 'econature'), 
			'desc' => __('Sets the keyboard navigation', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_mousewheel', 
			'title' => __('Mouse Wheel Controls', 'econature'), 
			'desc' => __('Sets the mousewheel navigation', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_swipe', 
			'title' => __('Swipe Controls', 'econature'), 
			'desc' => __('Sets the swipe navigation', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMS_SHORTNAME . '_ilightbox_controls_slideshow', 
			'title' => __('Slideshow Controls', 'econature'), 
			'desc' => __('Enable the slideshow feature and button', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_google_analytics', 
			'title' => __('Google Analytics', 'econature'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_custom_css', 
			'title' => __('Custom CSS', 'econature'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_custom_js', 
			'title' => __('Custom JavaScript', 'econature'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_gmap_api_key', 
			'title' => __('Google Maps API key', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_api_key', 
			'title' => __('Twitter API key', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_api_secret', 
			'title' => __('Twitter API secret', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_access_token', 
			'title' => __('Twitter Access token', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMS_SHORTNAME . '_access_token_secret', 
			'title' => __('Twitter Access token secret', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMS_SHORTNAME . '_recaptcha_public_key', 
			'title' => __('reCAPTCHA Public Key', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMS_SHORTNAME . '_recaptcha_private_key', 
			'title' => __('reCAPTCHA Private Key', 'econature'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}


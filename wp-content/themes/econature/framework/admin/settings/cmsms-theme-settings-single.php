<?php 
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.3.0
 * 
 * Admin Panel Post, Project & Profile Options
 * Created by CMSMasters
 * 
 */


function cmsms_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = __('Post', 'econature');
	
	if (class_exists('Cmsms_Projects')) {
		$tabs['project'] = __('Project', 'econature');
	}
	
	if (class_exists('Cmsms_Profiles')) {
		$tabs['profile'] = __('Profile', 'econature');
	}
	
	
	return $tabs;
}


function cmsms_options_single_sections() {
	$tab = cmsms_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = __('Blog Post Options', 'econature');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = __('Portfolio Project Options', 'econature');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = __('Person Block Profile Options', 'econature');
		
		
		break;
	}
	
	
	return $sections;
} 


function cmsms_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsms_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_layout', 
			'title' => __('Layout Type', 'econature'), 
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
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_title', 
			'title' => __('Post Title', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_date', 
			'title' => __('Post Date', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_cat', 
			'title' => __('Post Categories', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_author', 
			'title' => __('Post Author', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_comment', 
			'title' => __('Post Comments', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_tag', 
			'title' => __('Post Tags', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_like', 
			'title' => __('Post Likes', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_nav_box', 
			'title' => __('Posts Navigation Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_share_box', 
			'title' => __('Sharing Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_author_box', 
			'title' => __('About Author Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_more_posts_box', 
			'title' => __('More Posts Box', 'econature'), 
			'desc' => '', 
			'type' => 'multi-checkbox', 
			'std' => array( 
				'related' => 'true', 
				'popular' => 'true', 
				'recent' => 'true' 
			), 
			'choices' => array( 
				__('Show Related Tab', 'econature') . '|related', 
				__('Show Popular Tab', 'econature') . '|popular', 
				__('Show Recent Tab', 'econature') . '|recent' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMS_SHORTNAME . '_blog_post_r_p_l_number', 
			'title' => __('Related, Popular & Latest Posts Boxes Items Number', 'econature'), 
			'desc' => __('posts', 'econature'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '10', 
			'step' => '2' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_title', 
			'title' => __('Project Title', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_details_title', 
			'title' => __('Project Details Title', 'econature'), 
			'desc' => __('Enter a project details block title', 'econature'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_date', 
			'title' => __('Project Date', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_cat', 
			'title' => __('Project Categories', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_author', 
			'title' => __('Project Author', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_comment', 
			'title' => __('Project Comments', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_tag', 
			'title' => __('Project Tags', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_like', 
			'title' => __('Project Likes', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_link', 
			'title' => __('Project Link', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_share_box', 
			'title' => __('Sharing Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_nav_box', 
			'title' => __('Projects Navigation Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_author_box', 
			'title' => __('About Author Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_more_projects_box', 
			'title' => __('More Projects Box', 'econature'), 
			'desc' => '', 
			'type' => 'multi-checkbox', 
			'std' => array( 
				'related' => 'true', 
				'popular' => 'true', 
				'recent' => 'true' 
			), 
			'choices' => array( 
				__('Show Related Tab', 'econature') . '|related', 
				__('Show Popular Tab', 'econature') . '|popular', 
				__('Show Recent Tab', 'econature') . '|recent' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_r_p_l_number', 
			'title' => __('Related, Popular & Latest Projects Boxes Items Number', 'econature'), 
			'desc' => __('projects', 'econature'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '10', 
			'step' => '2' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMS_SHORTNAME . '_portfolio_project_slug', 
			'title' => __('Project Slug', 'econature'), 
			'desc' => __('Enter a page slug that should be used for your projects single item', 'econature'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_title', 
			'title' => __('Profile Title', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_details_title', 
			'title' => __('Profile Details Title', 'econature'), 
			'desc' => __('Enter a profile details block title', 'econature'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_cat', 
			'title' => __('Profile Categories', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_comment', 
			'title' => __('Profile Comments', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_nav_box', 
			'title' => __('Profiles Navigation Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_share_box', 
			'title' => __('Sharing Box', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMS_SHORTNAME . '_profile_post_slug', 
			'title' => __('Profile Slug', 'econature'), 
			'desc' => __('Enter a page slug that should be used for your profiles single item', 'econature'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;	
}


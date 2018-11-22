<?php 
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.3.0
 * 
 * Admin Panel Colors Options
 * Created by CMSMasters
 * 
 */


function cmsms_options_color_tabs() {
	$tabs = array();
	
	
	foreach (cmsms_all_color_schemes_list() as $key => $value) {
		$tabs[$key] = $value;
	}
	
	
	return $tabs;
}



function cmsms_options_color_sections() {
	$tab = cmsms_get_the_tab();
	
	
	$schemes = cmsms_all_color_schemes_list();
	
	
	$sections = array();
	
	
	$sections[$tab . '_section'] = $schemes[$tab] . ' ' . __('Color Scheme Options', 'econature');
	
	
	return $sections;
} 



function cmsms_options_color_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsms_get_the_tab();
	}
	
	
	$defaults = cmsms_color_schemes_defaults();
	
	
	$options = array();
	
	
	if ($tab == 'header') { // Header
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_color', 
			'title' => __('Text Font Color', 'econature'), 
			'desc' => __('Font color for header text', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_link', 
			'title' => __('Primary Font Color', 'econature'), 
			'desc' => __('Font color for header headings, links, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['color'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_hover', 
			'title' => __('Rollover Font Color', 'econature'), 
			'desc' => __('Font color for header links rollovers, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_bg', 
			'title' => __('Background Color', 'econature'), 
			'desc' => __('Header block background color', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_hover_bg', 
			'title' => __('Rollover Background Color', 'econature'), 
			'desc' => __('Background color for main navigation top level links rollovers and some other elements', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['hover_bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_border', 
			'title' => __('Border Color', 'econature'), 
			'desc' => __('Color for borders in header block', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['border'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_link', 
			'title' => __('Dropdown Links Color', 'econature'), 
			'desc' => __('Links color for header main navigation dropdown', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_link'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_hover', 
			'title' => __('Dropdown Rollover Font Color', 'econature'), 
			'desc' => __('Font color for header links rollovers in main navigation dropdown, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_bg', 
			'title' => __('Dropdown Background Color', 'econature'), 
			'desc' => __('Header block background color for main navigation dropdown', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_hover_bg', 
			'title' => __('Dropdown Rollover Background Color', 'econature'), 
			'desc' => __('Background color for main navigation dropdown links rollovers and some other elements', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_hover_bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_border', 
			'title' => __('Dropdown Border Color', 'econature'), 
			'desc' => __('Color for borders for main navigation dropdown in header block ', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_border'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_shadow', 
			'title' => __('Dropdown Shadow', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_shadow_opacity', 
			'title' => __('Dropdown Shadow Opacity', 'econature'), 
			'desc' => '', 
			'type' => 'number', 
			'std' => '2', 
			'min' => '0', 
			'max' => '100' 
		);
	} elseif ($tab == 'header_top') { // Header Top
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_color', 
			'title' => __('Content Font Color', 'econature'), 
			'desc' => __('Font color for header top main content, headings, links, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['color'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_link', 
			'title' => __('Primary Font Color', 'econature'), 
			'desc' => __('Font color for header top headings, links, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['color'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_hover', 
			'title' => __('Rollover Font Color', 'econature'), 
			'desc' => __('Font color for header top links rollovers, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_bg', 
			'title' => __('Background Color', 'econature'), 
			'desc' => __('Header top block background color', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_border', 
			'title' => __('Border Color', 'econature'), 
			'desc' => __('Color for borders in header top block', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['border'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_link', 
			'title' => __('Dropdown Links Color', 'econature'), 
			'desc' => __('Links color for header top main navigation dropdown', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_link'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_hover', 
			'title' => __('Dropdown Rollover Font Color', 'econature'), 
			'desc' => __('Font color for header top links rollovers in main navigation dropdown, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_bg', 
			'title' => __('Dropdown Background Color', 'econature'), 
			'desc' => __('Header top block background color for main navigation dropdown', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_border', 
			'title' => __('Dropdown Border Color', 'econature'), 
			'desc' => __('Color for borders for main navigation dropdown in header top block ', 'econature'), 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['dropdown_border'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_shadow', 
			'title' => __('Dropdown Shadow', 'econature'), 
			'desc' => __('show', 'econature'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_dropdown_shadow_opacity', 
			'title' => __('Dropdown Shadow Opacity', 'econature'), 
			'desc' => '', 
			'type' => 'number', 
			'std' => '80', 
			'min' => '0', 
			'max' => '100' 
		);
	} else { // Other
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_color', 
			'title' => __('Main Content Font Color', 'econature'), 
			'desc' => __('Font color for main content', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['color'] : $defaults['default']['color'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_link', 
			'title' => __('Primary Color', 'econature'), 
			'desc' => __('Color for links and some other elements (e.g. buttons, icon boxes, ets.)', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['link'] : $defaults['default']['link'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_hover', 
			'title' => __('Highlight Color', 'econature'), 
			'desc' => __('Color for links rollovers, etc', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['hover'] : $defaults['default']['hover'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_heading', 
			'title' => __('Headings Color', 'econature'), 
			'desc' => __('Color for headings and some other elements', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['heading'] : $defaults['default']['heading'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_bg', 
			'title' => __('Main Background Color', 'econature'), 
			'desc' => __('Main background color for some elements (e.g. tabs, toggles, ets.)', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['bg'] : $defaults['default']['bg'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_alternate', 
			'title' => __('Alternate Background Color', 'econature'), 
			'desc' => __('Alternate background color for some elements (e.g. quotes, form fields, ets.)', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['alternate'] : $defaults['default']['alternate'] 
		);
		
		$options[] = array( 
			'section' => $tab . '_section', 
			'id' => CMSMS_SHORTNAME . '_' . $tab . '_border', 
			'title' => __('Borders Color', 'econature'), 
			'desc' => __('Color for borders (e.g. dividers, form fields, ets.)', 'econature'), 
			'type' => 'rgba', 
			'std' => (isset($defaults[$tab])) ? $defaults[$tab]['border'] : $defaults['default']['border'] 
		);
	}
	
	
	return $options;	
}


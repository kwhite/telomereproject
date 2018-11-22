/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Mega Menu
 * @version 	1.1.0
 * 
 * Mega Menu Builder Scripts
 * Created by CMSMasters
 * 
 */


(function ($) { 
	// rewrite jquery original append & prepend functions
	var origAppend = $.fn.append, 
		origPrepend = $.fn.prepend;
	
	
	$.fn.append = function () { 
		return origAppend.apply(this, arguments).trigger('append');
	};
	
	
	$.fn.prepend = function () { 
		return origPrepend.apply(this, arguments).trigger('prepend');
	};
	
	
	$(document).ready(function() { 
		var mega_ul = $('#menu-to-edit'), 
			mega_checkboxes = mega_ul.find('.menu-item.menu-item-depth-0 .menu-item-mega:checked');
		
		// color picker loaded fields start
		$('.menu-item-color').wpColorPicker( { 
			palettes : [ 
				'#000000', 
				'#ffffff', 
				'#4ecdc4', 
				'#ff6b6b', 
				'#556270', 
				'#aed957', 
				'#707070', 
				'#3d3d3d' 
			] 
		} );
		
		// appended menu items color picker start
		mega_ul.on('append prepend', function (el) { 
			if (typeof $(el.target).attr('id') !== 'undefined' && $(el.target).attr('id') === 'menu-to-edit') {
				$(el.target).find('> li.menu-item.pending .menu-item-color').each(function () { 
					if (!$(this).is('.wp-color-picker')) {
						$(this).wpColorPicker( { 
							palettes : [ 
								'#000000', 
								'#ffffff', 
								'#4ecdc4', 
								'#ff6b6b', 
								'#556270', 
								'#aed957', 
								'#707070', 
								'#3d3d3d' 
							] 
						} );
					}
				} );
			}
		} );
		
		// mega checkboxes test
		mega_checkboxes.each(function () { 
			$(this).megaMenuToggle(); // start mega menu toggle function
		} );
		
		// mega checkbox change
		$(document).on('change', '.menu-item-mega', function () { 
			$(this).megaMenuToggle(); // start mega menu toggle function
		} );
		
		// move buttons click
		$(document).on('click', '.field-move .menus-move-up, .field-move .menus-move-down, .field-move .menus-move-left, .field-move .menus-move-right, .field-move .menus-move-top', function (e) { 
			setTimeout(function () { 
				var li_prev_array = $(e.currentTarget).parents('.menu-item').prevAll('.menu-item.menu-item-depth-0'), // all previous menu items with depth = 0
					li_prev_count = li_prev_array.length, // count all previous menu items with depth = 0
					li_prev_mega = (li_prev_count > 0) ? $(li_prev_array[0]).find('.menu-item-mega') : $(e.currentTarget).parents('.menu-item').find('.menu-item-mega'); // mega menu checkbox choose
				
				
				if ($(e.currentTarget).parents('.menu-item').hasClass('menu-item-depth-0')) { // if current menu item depth = 0
					li_prev_mega = $(e.currentTarget).parents('.menu-item').find('.menu-item-mega');
				}
				
				
				li_prev_mega.megaMenuToggle(); // start mega menu toggle function
			}, 250);
			
			
			e.preventDefault();
		} );
		
		// sort menu items
		mega_ul.on('sortstop', function(event, ui) { 
			setTimeout(function () { 
				var li_prev_array = $(ui.item).prevAll('.menu-item.menu-item-depth-0'), // all previous menu items with depth = 0
					li_prev_count = li_prev_array.length, // count all previous menu items with depth = 0
					li_prev_mega = (li_prev_count > 0) ? $(li_prev_array[0]).find('.menu-item-mega') : $(ui.item).find('.menu-item-mega'); // mega menu checkbox choose
				
				
				if ($(ui.item).hasClass('menu-item-depth-0')) { // if current menu item depth = 0
					li_prev_mega = $(ui.item).find('.menu-item-mega');
				}
				
				
				li_prev_mega.megaMenuToggle(); // start mega menu toggle function
			}, 250);
		} );
		
		// menu item highlight change
		$(document).on('change', '.menu-item-highlight', function () { 
			var checkbox = $(this), 
				checkbox_container = checkbox.parents('.menu-item');
			
			
			if (checkbox.is(':checked')) {
				checkbox_container.find('span.menu-item-title').addClass('cmsms_highlight');
			} else {
				checkbox_container.find('span.menu-item-title').removeClass('cmsms_highlight');
			}
		} );
		
		// drop side right change
		$(document).on('change', '.menu-item-drop_side', function () { 
			var checkbox = $(this), 
				checkbox_container = checkbox.parents('.menu-item');
			
			
			if (checkbox.is(':checked')) {
				checkbox_container.find('span.is-drop-side-right').show();
			} else {
				checkbox_container.find('span.is-drop-side-right').hide();
			}
		} );
		
		// hide column text change
		$(document).on('change', '.menu-item-hide_text', function () { 
			var checkbox = $(this), 
				checkbox_container = checkbox.parents('.menu-item');
			
			
			if (checkbox.is(':checked')) {
				checkbox_container.find('span.menu-item-title').addClass('cmsms_hide_text');
			} else {
				checkbox_container.find('span.menu-item-title').removeClass('cmsms_hide_text');
			}
		} );
		
		// mega description text change
		$(document).on('change', '.menu-item-mega_descr_text', function () { 
			var checkbox = $(this), 
				checkbox_container = checkbox.parents('.menu-item');
			
			
			if (checkbox.is(':checked')) {
				checkbox_container.find('span.is-mega-descr-text').show();
				
				checkbox_container.find('span.is-submenu').hide();
			} else {
				checkbox_container.find('span.is-mega-descr-text').hide();
				
				checkbox_container.find('span.is-submenu').show();
			}
		} );
	} );
	
	
	$.fn.extend( { 
		megaMenuToggle : function () { // mega menu toggle
			var mega = $(this), // mega menu checkbox
				container = mega.parents('.menu-item'), // mega menu checkbox container (menu item)
				cont_depth = container.menuItemDepth(), // mega menu checkbox container depth
				li_array = container.nextUntil('.menu-item-depth-0'); // mega menu items
			
			
			mega.megaMenuHideElems(container, cont_depth); // start mega menu show/hide custom fields function
			
			
			li_array.each(function () { // mega menu items forEach
				var li = $(this), // mega menu item
					depth = li.menuItemDepth(); // mega menu item depth
				
				
				if (depth === 1) { // depth = 1
					mega.megaMenuHideElems(li, depth); // start mega menu show/hide custom fields function
				}
				
				
				if (depth > 1) { // depth > 1
					mega.megaMenuHideElems(li, depth); // start mega menu show/hide custom fields function
				}
			} );
		}, 
		megaMenuHideElems : function (cont, depth) { // mega menu show/hide custom fields
			var checkbox = $(this), 
				drop_side_class = cont.find('.is-drop-side-right'), 
				drop_side_field = cont.find('p.field-drop_side'), 
				mega_class = cont.find('.is-mega-menu'), 
				mega_field = cont.find('p.field-mega'), 
				mega_cols_field = cont.find('p.field-mega_cols'), 
				mega_cols_full_field = cont.find('p.field-mega_cols_full'), 
				column_class = cont.find('.is-column'), 
				hide_text_class = cont.find('span.menu-item-title'), 
				hide_text_field = cont.find('p.field-hide_text'), 
				submenu_class = cont.find('.is-submenu'), 
				descr_text_class = cont.find('.is-mega-descr-text'), 
				descr_text_field = cont.find('p.field-mega_descr_text');
			
			
			if (depth === 0) {
				var drop_side_test = drop_side_field.find('input.menu-item-drop_side').is(':checked');
				
				
				if (checkbox.is(':checked')) {
					cont.addClass('cmsms_mega_menu'); // menu item class
					
					// depth = 0
					if (drop_side_test) {
						drop_side_class.show(); // drop side right class
					} else {
						drop_side_class.hide(); // drop side right class
					}
					
					
					drop_side_field.show(); // drop side right field
					
					mega_class.show(); // mega class
					
					mega_field.show(); // mega field
					
					mega_cols_field.show(); // mega columns field
					
					mega_cols_full_field.show(); // mega columns fullwidth field
				} else {
					cont.removeClass('cmsms_mega_menu'); // menu item class
					
					// depth = 0
					if (drop_side_test) {
						drop_side_class.show(); // drop side right class
					} else {
						drop_side_class.hide(); // drop side right class
					}
					
					
					drop_side_field.show(); // drop side right field
					
					mega_class.hide(); // mega class
					
					mega_field.show(); // mega field
					
					mega_cols_field.hide(); // mega columns field
					
					mega_cols_full_field.hide(); // mega columns fullwidth field
				}
				
				// depth = 1
				column_class.hide(); // column class
				
				hide_text_class.removeClass('cmsms_hide_text'); // column hide text class
				
				hide_text_field.hide(); // column hide text field
				
				// depth > 1
				submenu_class.hide(); // submenu class
				
				descr_text_class.hide(); // description text class
				
				descr_text_field.hide(); // description text field
			} else if (depth === 1) {
				var hide_text_test = hide_text_field.find('input.menu-item-hide_text').is(':checked');
				
				
				cont.removeClass('cmsms_mega_menu'); // menu item class
				
				// depth = 0
				drop_side_class.hide(); // drop side right class
				
				drop_side_field.hide(); // drop side right field
				
				mega_class.hide(); // mega class
				
				mega_field.hide(); // mega field
				
				mega_cols_field.hide(); // mega columns field
				
				mega_cols_full_field.hide(); // mega columns fullwidth field
				
				
				if (checkbox.is(':checked')) {
					// depth = 1
					column_class.show(); // column class
					
					
					if (hide_text_test) {
						hide_text_class.addClass('cmsms_hide_text'); // column hide text class
					} else {
						hide_text_class.removeClass('cmsms_hide_text'); // column hide text class
					}
					
					
					hide_text_field.show(); // column hide text field
				} else {
					// depth = 1
					column_class.hide(); // column class
					
					hide_text_class.removeClass('cmsms_hide_text'); // column hide text class
					
					hide_text_field.hide(); // column hide text field
				}
				
				// depth > 1
				if (checkbox.is(':checked')) {
					submenu_class.hide(); // submenu class
				} else {
					submenu_class.show(); // submenu class
				}
				
				
				descr_text_class.hide(); // description text class
				
				descr_text_field.hide(); // description text field
			} else {
				var descr_text_test = descr_text_field.find('input.menu-item-mega_descr_text').is(':checked');
				
				
				cont.removeClass('cmsms_mega_menu'); // menu item class
				
				// depth = 0
				drop_side_class.hide(); // drop side right class
				
				drop_side_field.hide(); // drop side right field
				
				mega_class.hide(); // mega class
				
				mega_field.hide(); // mega field
				
				mega_cols_field.hide(); // mega columns field
				
				mega_cols_full_field.hide(); // mega columns fullwidth field
				
				// depth = 1
				column_class.hide(); // column class
				
				hide_text_class.removeClass('cmsms_hide_text'); // column hide text class
				
				hide_text_field.hide(); // column hide text field
				
				
				if (checkbox.is(':checked')) {
					// depth > 1
					if (descr_text_test) {
						submenu_class.hide(); // submenu class
						
						descr_text_class.show(); // description text class
					} else {
						submenu_class.show(); // submenu class
						
						descr_text_class.hide(); // description text class
					}
					
					
					descr_text_field.show(); // description text field
				} else {
					// depth > 1
					submenu_class.show(); // submenu class
					
					descr_text_class.hide(); // description text class
					
					descr_text_field.hide(); // description text field
				}
			}
		} 
	} );
} )(jQuery);


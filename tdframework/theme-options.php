<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
 * Theme Options
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */

// Adds some option values to javascript
//
function theme_options_javascript() {
	// Colors
	$theme_colors = array(
		'color_button',
		'color_button_hover',
		'color_button_text',
		'color_button_text_hover',
		//'color_search_field',
	);

	echo "<script type='text/javascript'>\n";

	echo "var theme_colors = {\n";

	// Build list of colors as javascript dictionary strings
	$colorlist = '';
	foreach ($theme_colors as $color) {
		$colorlist .= $color . ': "' . core_options_get($color) . '",';
	}

	// Remove last comma (IE)
	echo substr($colorlist, 0, -1);

	echo "};\n";
	echo '</script>';
}
add_action('wp_head', 'theme_options_javascript');


// Adds all theme options
//
function theme_options_register() {
	global $core_theme_options_handler;

	// General options
	//
	$options_general = new CoreOptionGroup('general', __('General', THEME_SLUG), __('General theme options.', THEME_SLUG), CORE_URI. '/images/options-general.png');
	$core_theme_options_handler->default_group = 'general';
	$core_theme_options_handler->group_add($options_general);

	// General
	$section = new CoreOptionSection('options', __('Settings', THEME_SLUG));
	$options_general->section_add($section);

	$option = new CoreOption('layout_style', __('Page Layout Style', THEME_SLUG), 'select', __('This setting toggles the 100% fullwidth or boxed layout style of your site.', THEME_SLUG), 'fluid');
	$option->parameters = array('boxed' => 'Boxed', 'fullwidth' => 'Fullwidth');
	$section->option_add($option);

	$option = new CoreOption('homepage_layout_style', __('Homepage Layout Style', THEME_SLUG), 'select', __('This setting enables you to select you homepage layout.', THEME_SLUG), 'fluid');
	$option->parameters = array('layout-1' => 'Layout 1', 'layout-2' => 'Layout 2', 'layout-3' => 'Layout 3' );
	$section->option_add($option);

	$section->option_add(new CoreOption('homepage_layout_category', __('Categories', THEME_SLUG), 'text', __('This settings let you select which categories will be display on the homepage.', THEME_SLUG), null));

	$section->option_add(new CoreOption('meta', __('Display blog meta', THEME_SLUG), 'checkbox', __('This setting toggles the display of meta-information in blog posts.', THEME_SLUG), true));
	$section->option_add(new CoreOption('breadcrumbs', __('Display breadcrumbs', THEME_SLUG), 'checkbox', __('This setting toggles the display of the breadcrumbs navigation aid.', THEME_SLUG), true));
	$section->option_add(new CoreOption('titles', __('Display page titles', THEME_SLUG), 'checkbox', __('This setting toggles the display of the titles at the top of every page.', THEME_SLUG), true));
	$section->option_add(new CoreOption('featured_img', __('Display featured image', THEME_SLUG), 'checkbox', __('This setting toggles the display of the featured image on top of every post.', THEME_SLUG), true));
	$section->option_add(new CoreOption('core_loader', __('Enable Page Loader', THEME_SLUG), 'checkbox', __('This allows you to add a page loader to the site.', THEME_SLUG), false));

	$section = new CoreOptionSection('images', __('Images', THEME_SLUG));
	$options_general->section_add($section);
	$section->option_add(new CoreOption('favicon', __('Favicon', THEME_SLUG), 'image', __('This image is displayed in the browser window\'s title and in browser favourites.', THEME_SLUG), null));
	$section->option_add(new CoreOption('logo', __('Logo', THEME_SLUG), 'image', __('The logo is displayed in the site\'s header.', THEME_SLUG), null));
	$section->option_add(new CoreOption('login_logo', __('Login logo', THEME_SLUG), 'image', __('The logo displayed on the user login page.', THEME_SLUG), null));
	$section->option_add(new CoreOption('main_background_color', __('Main Background Color', THEME_SLUG), 'color', __('The default, site-wide background color.', THEME_SLUG), null));
	$section->option_add(new CoreOption('background_image', __('Background image', THEME_SLUG), 'image', __('The default, site-wide background image.', THEME_SLUG), null));
	$section->option_add(new CoreOption('background_image_author', __('Image Author', THEME_SLUG), 'text', __('The author of the background image.', THEME_SLUG), null));
	$section->option_add(new CoreOption('background_image_link', __('Author Link', THEME_SLUG), 'text', __('The author link of the background image.', THEME_SLUG), null));

	$section->option_add(new CoreOption('background_repeat', __('Background Repeat', THEME_SLUG), 'checkbox', __('Toggles the display setting of the background to repeat or no-repeat.', THEME_SLUG), true));
	$section->option_add(new CoreOption('background_size', __('Background Size: 100%', THEME_SLUG), 'checkbox', __('Toggles the display setting of the background size to "100%" or "automatic"', THEME_SLUG), true));


	$option = new CoreOption('pattern', __('Pattern', THEME_SLUG), 'pattern', __('The pattern displayed inside various elements.', THEME_SLUG), 'none');
	$option->directory = THEME_PATH . '/images/patterns';
	$section->option_add($option);

	$section = new CoreOptionSection('miscellaneous', __('Miscellaneous', THEME_SLUG));
	$options_general->section_add($section);
	$section->option_add(new CoreOption('customize', __('Enable Customize Preview', THEME_SLUG), 'checkbox', __('See your site how it looks with the selection of different fonts and patterns.', THEME_SLUG), false));
	$section->option_add(new CoreOption('seobasic', __('Enable SEO Basic', THEME_SLUG), 'checkbox', __('WARNING! Only enable this if you do not have any WP SEO installed.', THEME_SLUG), false));
	$section->option_add(new CoreOption('google_analytics', __('Google analytics code', THEME_SLUG), 'text-multiline', __('Place your Google Analytics code snippet here and it will be included in every page.', THEME_SLUG), null));

	$section->option_add(new CoreOption('custom_css', __('Custom CSS', THEME_SLUG), 'text-multiline', __('Place your custom css styles here', THEME_SLUG), null));
	$section->option_add(new CoreOption('custom_js', __('Custom Javascript', THEME_SLUG), 'text-multiline', __('Place your custom javascripts here', THEME_SLUG), null));


	// Copyright
	//
	$options_copyright = new CoreOptionGroup('copyright', __('Copyright', THEME_SLUG), __('Customize the footer\'s copyright message.', THEME_SLUG), CORE_URI. '/images/options-copyright.png');
	$core_theme_options_handler->group_add($options_copyright);

	// Copyright
	$section = new CoreOptionSection('copyright');
	$options_copyright->section_add($section);
	$section->option_add(new CoreOption('copyright_name', __('Copyright name', THEME_SLUG), 'text', __('The name which will be displayed in the footers\'s copyright.', THEME_SLUG), 'Theme Dutch'));
	$section->option_add(new CoreOption('copyright_link', __('Copyright link', THEME_SLUG), 'text', __('The full link to the copyright holder\'s website.', THEME_SLUG), 'http://www.theme-dutch.com/'));
	$section->option_add(new CoreOption('copyright_html', __('Copyright', THEME_SLUG), 'text-multiline', __('This will appear at the footer and the above options will be overwritten if you enter your html formatted copyright here', THEME_SLUG), '&copy; 2013 All Rights Reserved. <a href="http://www.theme-dutch.com/">Theme Dutch</a>'));


	// Fonts
	//
	$options_typography = new CoreOptionGroup('typography', __('Typography', THEME_SLUG), __('Adjust the theme\'s typography. You can choose one of the predefined fonts, or enter a custom font name from the <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a> service.', THEME_SLUG), CORE_URI. '/images/options-typography.png');
	$core_theme_options_handler->group_add($options_typography);

	// Fonts
	$section = new CoreOptionSection('fonts', __('Fonts', THEME_SLUG));
	$options_typography->section_add($section);

	$section->option_add(new CoreOption('font_menu', __('Menu font', THEME_SLUG), 'font', null, 'Titillium Web'));
	$section->option_add(new CoreOption('font_heading', __('Heading font', THEME_SLUG), 'font', null, 'Titillium Web'));
	$section->option_add(new CoreOption('font_paragraph', __('Paragraph font', THEME_SLUG), 'font', null, 'Titillium Web'));

	// Heading sizes
	$section = new CoreOptionSection('font-size-headings', __('Heading sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_heading1', __('Heading 1', THEME_SLUG), 'number', null, '24');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading2', __('Heading 2', THEME_SLUG), 'number', null, '22');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading3', __('Heading 3', THEME_SLUG), 'number', null, '20');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading4', __('Heading 4', THEME_SLUG), 'number', null, '18');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading5', __('Heading 5', THEME_SLUG), 'number', null, '16');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading6', __('Heading 6', THEME_SLUG), 'number', null, '14');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	// Menu sizes
	$section = new CoreOptionSection('font-size-menu', __('Menu sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_mainmenu', __('Main menu', THEME_SLUG), 'number', null, '12');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_mainmenu_sub', __('Main menu submenu', THEME_SLUG), 'number', null, '12');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_footermenu', __('Footer menu', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	// Other sizes
	$section = new CoreOptionSection('font-size-other', __('Other sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_other_paragraph', __('Paragraph', THEME_SLUG), 'number', null, '9');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_sidebar_header', __('Widget Titles', THEME_SLUG), 'number', null, '14');
	$option->step = 2;
	$option->min = 8;
	$option->max = 36;
	$section->option_add($option);

	$option = new CoreOption('font_size_other_copyright', __('Copyright', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_other_footer', __('Footer', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);


	// Colors
	//
	$options_colors = new CoreOptionGroup('colors', __('Colors', THEME_SLUG), __('Customize the theme\'s colors.', THEME_SLUG), CORE_URI. '/images/options-colors.png');
	$core_theme_options_handler->group_add($options_colors);

	// Colors
	$section = new CoreOptionSection('colors-headings', __('Headings', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_heading1', __('Heading 1', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_heading2', __('Heading 2', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_heading3', __('Heading 3', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_heading4', __('Heading 4', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_heading5', __('Heading 5', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_heading6', __('Heading 6', THEME_SLUG), 'color', null, '#000000'));

	$section = new CoreOptionSection('colors-menu', __('Top Navigation', THEME_SLUG));
	$options_colors->section_add($section);


	$section->option_add(new CoreOption('color_top_nav_bg', __('Background Color', THEME_SLUG), 'color', null, '#969696'));

	$option = new CoreOption('color_top_nav_opacity', __('Background Opacity', THEME_SLUG), 'number', null, '100');
	$option->step = 1;
	$option->min = 0;
	$option->max = 100;
	$section->option_add($option);

	$section->option_add(new CoreOption('color_menu_text', __('Menu', THEME_SLUG), 'color', null, '#969696'));
	$section->option_add(new CoreOption('color_menu_text_hover', __('Menu hover', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_menu_background', __('Menu background', THEME_SLUG), 'color', null, '#e86f43'));
	$section->option_add(new CoreOption('color_submenu_text', __('Submenu text', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_submenu_text_hover', __('Submenu text hover', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_submenu_background', __('Submenu background', THEME_SLUG), 'color', null, '#e86f43'));
	$section->option_add(new CoreOption('color_submenu_background_hover', __('Submenu background hover', THEME_SLUG), 'color', null, '#ffffff'));

	$section = new CoreOptionSection('colors-breadcrumb', __('Breadcrumb', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_breadcrumb_text', __('Breadcrumb text', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_breadcrumb_text_hover', __('Breadcrumb text hover', THEME_SLUG), 'color', null, '#CCCCCC'));

	$section = new CoreOptionSection('colors-footer', __('Footer', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_footer_menu_text', __('Footer menu text', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_footer_menu_text_hover', __('Footer menu text hover', THEME_SLUG), 'color', null, '#f59403'));
	$section->option_add(new CoreOption('color_footer_background', __('Footer background', THEME_SLUG), 'color', null, '#3b3a3b'));
	$section->option_add(new CoreOption('color_copyright', __('Copyright', THEME_SLUG), 'color', null, '#000000'));

	$section = new CoreOptionSection('colors-other', __('Content', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_content_background', __('Content background', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_paragraphs', __('Paragraphs', THEME_SLUG), 'color', null, '#707070'));
	$section->option_add(new CoreOption('color_links', __('Links', THEME_SLUG), 'color', null, '#e86f43'));
	$section->option_add(new CoreOption('color_links_hover', __('Links hover', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_button', __('Button', THEME_SLUG), 'color', null, '#e86f43'));
	$section->option_add(new CoreOption('color_button_hover', __('Button hover', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_button_text', __('Button text', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_button_text_hover', __('Button text hover', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_sidebar_header_text', __('Widget Title text', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_sidebar_header_background', __('Widget Title background', THEME_SLUG), 'color', null, '#f0f0f0'));
	$section->option_add(new CoreOption('color_search_field', __('Search', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_custom_content', __('Custom content block', THEME_SLUG), 'color', null, '#ffffff'));


	// Category options
	$options = new CoreOptionGroup('categories', __('Categories', THEME_SLUG), __('Use this page to define options for individual categories.', THEME_SLUG), CORE_URI. '/images/options-categories.png');
	$core_theme_options_handler->group_add($options);

	// Post categories
	$categories = get_categories(array(
									'type'      => 'post',
									'orderby'      => 'name',
									'order'        => 'ASC',
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'pad_counts'   => false
								));
	foreach ($categories as $category) {
		theme_category_add($options, $category);
	}

	// WooCommerce product categories
	$categories = get_categories(array(
									'type'         => 'product',
									'orderby'      => 'name',
									'order'        => 'ASC',
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'pad_counts'   => false
								));
	foreach ($categories as $category) {
		theme_category_add($options, $category);
	}
}

function theme_category_add($options, $category) {
	global $core_layout_default;

	$section = new CoreOptionSection('category-' .$category->slug, $category->name);
	$options->section_add($section);

	// Layouts have a special name (layout-*) so that the layout module can recognize them
	$section->option_add(new CoreOption('layout-category-' .$category->slug, __('Layout', THEME_SLUG), 'layout', null, $core_layout_default));

	// Slider
	$section->option_add(new CoreOption('slider_' .$category->slug, __('Slider', THEME_SLUG), 'sliders', __('The slider will be displayed at the top of the page.', THEME_SLUG)));

	$section->option_add(new CoreOption('category_thumbnail_' .$category->slug, __('Thumbnail', THEME_SLUG), 'image'));
	$section->option_add(new CoreOption('category_background_' .$category->slug, __('Background', THEME_SLUG), 'image'));
	$section->option_add(new CoreOption('category_background_author_' .$category->slug, __('Image Author', THEME_SLUG), 'text', __('The author of the background image.', THEME_SLUG)));
	$section->option_add(new CoreOption('category_background_link_' .$category->slug, __('Author Link', THEME_SLUG), 'text', __('The author link of the background image.', THEME_SLUG)));

	$section->option_add(new CoreOption('category_colorscheme_' .$category->slug, __('Color scheme', THEME_SLUG), 'colorschemes-list'));

	// Custom Category Content section
	$section->option_add(new CoreOption('custom_content_' .$category->slug , __('Category HTML section', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	// Basic SEO Category Content section
	$section->option_add(new CoreOption('seo_desc-' .$category->slug , __('Meta Description', THEME_SLUG), 'text-multiline', __('Enter the meta description for this category page.', THEME_SLUG)));
	$section->option_add(new CoreOption('seo_keywords-' .$category->slug , __('Meta Keywords', THEME_SLUG), 'text', __('Enter the meta keywords separated by commas', THEME_SLUG)));

}

?>
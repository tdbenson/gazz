<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Styles
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
	define('BASE_FONT_SIZE', 12);

	// Fonts that need to be loaded through the Google Fonts API
	global $theme_load_fonts;
	$theme_load_fonts = array();

	// Fonts
	$fonts = array(
		'font_menu' => array('#theme-menu-main', '#menu-footer', '#sidebar-navigation'),
		'font_heading' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		'font_paragraph' => array('body'),
	);

	// Font sizes
	$fontsizes = array(
		'font_size_heading1' => array('h1'),
		'font_size_heading2' => array('h2'),
		'font_size_heading3' => array('h3'),
		'font_size_heading4' => array('h4'),
		'font_size_heading5' => array('h5'),
		'font_size_heading6' => array('h6'),

		'font_size_mainmenu'          => array('#theme-menu-main > li a'),
		'font_size_mainmenu_sub'      => array('#theme-menu-main > li li a'),
		'font_size_footermenu'        => array('#footer .menu a'),

		'font_size_other_footer'      => array('#footer'),
		'font_size_other_paragraph'   => array('body'),
		'font_size_sidebar_header'    => array('.widget .widget-title'),
		'font_size_other_copyright'   => array('#footer .copyright', '#footer .powered'),
	);

	// Text colors
	$colors = array(

		// Heading Titles
		'color_heading1' => array('.theme-content h1'),
		'color_heading2' => array('.theme-content h2'),
		'color_heading3' => array('.theme-content h3'),
		'color_heading4' => array('.theme-content h4'),
		'color_heading5' => array('.theme-content h5'),
		'color_heading6' => array('.theme-content h6'),

		// Menu
		'color_menu_text' => array(
			'#theme-menu-main > li > a',
			'#theme-search-icon',
			'#theme-hand-icon',
			'.theme-search #searchform #s'
		),
		'color_menu_text_hover' => array(
			'#theme-menu-main > li:hover > a',
			'#theme-menu-main > li.current-menu-item:hover > a',
			'#theme-search-icon.hover',
			'#theme-hand-icon.hover'
		),
		'color_submenu_text' => array(
			'#theme-menu-main li li a',
			'.sb-options li a',
			'.sb-options a:link',
			'.sb-options a:visited'
		),
		'color_submenu_text_hover' => array(
			'#theme-menu-main li li a:hover',
			'.sb-options li a:hover'
		),

		// Breadcrumb
		'color_breadcrumb_text' => array(
			'.theme-breadcrumbs',
			'.theme-breadcrumbs a',
		),
		'color_breadcrumb_text_hover' => array(
			'.theme-breadcrumbs a:hover',
		),

		//Footer
		'color_footer_menu_text' => array(
			'#footer .menu li a'
		),
		'color_footer_menu_text_hover' => array(
			'#footer .menu li a:hover'
		),
		'color_copyright' => array(
			'#theme-copyright',
			'#theme-copyright a',
			'#theme-copyright a:hover'
		),

		// Content
		'color_paragraphs'            => array('#wrapper .grid'),
		'color_links'                 => array('a', '.theme-excerpts .item-day'),
		'color_links_hover'           => array('a:hover'),
		'color_button_text'           => array('.button', 'a.button', '#wp-submit', 'input[type="reset"]', 'input[type="button"]', 'input[type="submit"]', '#theme-slider .flex-direction-nav a', '#theme-slider .slide-category' ),
		'color_button_text_hover'     => array('.button:hover', 'a.button:hover', '#wp-submit:hover'),
		'color_sidebar_header_text'   => array('.widget .widget-title'),
		'color_search_field'		  => array('.theme-search .container'),

	);

	// Background colors
	$colors_background = array(

		// Body
		'main_background_color' => array('.theme_content_area'),

		// Menu
		'color_menu_background' => array(
			'#theme-menu-main > li:hover > a',
			'#theme-menu-main > li.current-menu-ancestor > a',
			'#theme-menu-main > li.current-menu-item > a',
			'#theme-menu-main > li.current_page_ancestor > a',
			'#theme-menu-main > li.current-page-item > a',
			'.theme-search .container',
			'#sidebar-selector',
			'#theme-search-icon:hover',
			'#theme-hand-icon:hover',
			'.sb-holder'
		),
		'color_submenu_background' => array('#theme-menu-main li li', '#theme-menu-main li li a', '.sb-options li'),
		'color_submenu_background_hover' => array('#theme-menu-main li:hover li:hover a:hover', '.sb-options li:hover'),

		// Footer
		'color_footer_background' => array(
			'#footer',
			'#footer-widget-area'
		),

		// Content
		'color_content_background' => array('#wrapper .theme_content_area'),
		'color_button' => array(
			'.button',
			'a.button',
			'#wp-submit',
			'input[type="reset"]',
			'input[type="button"]',
			'input[type="submit"]',
			'.theme-excerpts .item-month',
			'#theme-slider .flex-direction-nav a',
			'#theme-slider .slide-category'
		),
		'color_button_hover' => array(
			'.button:hover',
			'a.button:hover',
			'input[type="reset"]:hover',
			'input[type="button"]:hover',
			'input[type="submit"]:hover',
			'#wp-submit:hover',
		),
		'color_sidebar_header_background' => array('.widget .widget-title'),

		'color_custom_content'		  => array('#theme-custom-content'),

		// Accordion and Tabs
		'color_paragraphs'                 => array('ul.shortcode-toggle > li > div.header > .icon'),
		'color_links'                 => array('ul.shortcode-toggle > li > div.header > .icon.active', 'div.shortcode-notify.icon .circle', 'div.shortcode-notify.icon .circle'),
	);

	// Border colors
	$colors_border = array(
		// Menu
		'color_submenu_background' => array(
			'#theme-menu-main li li',
			'#theme-menu-main li li a'
		),
		'color_menu_text_hover' => array(
			'#theme-menu-main > li > a:hover span',
			'#theme-menu-main > li:hover > a span',
			'#theme-menu-main > li.current-menu-item > a span',
			'#theme-menu-main > li.current-page-item > a span'
		),

		// Links
		'color_links' => array(
			'a > img',
			'a .thumbs',
			'div.shortcode-tabs > .titles > .shortcode-tab-title.active',
		),
		'color_links_hover' => array(
			'a > img:hover',
			'.thumbs:hover',
			'img:hover',
			'area:focus',
			'input:focus',
			'textarea:focus'
		),

		'color_button' => array(
			'.slide-content'
		)

	);

	// Outline colors
	$colors_outline = array(
		'color_links_hover' => array(
			'ul.shortcode-gallery > li:hover',
		),
	);

	// Path to all theme images
	$imagepath = THEME_URI . '/images/';

	// Get background image
	// Post type > category > theme
	$backgroundimage = null;

	if ( is_singular() && (is_page() || is_single()) )
		$backgroundimage = core_options_get('background_image', get_post_type());
	else
		$backgroundimage = core_options_get('layout-default_background', 'theme');

	if (is_archive()){
		if (is_category() && !$backgroundimage) {
			$obj = get_queried_object();
			$backgroundimage = core_options_get('category_background_' .$obj->slug);
		} elseif (is_author())
			$backgroundimage = core_options_get('layout-author_background', 'theme');
		elseif (is_tag())
			$backgroundimage = core_options_get('layout-tag_background', 'theme');
		else
			$backgroundimage = core_options_get('layout-archive_background', 'theme');
	}

	if (is_404())
		$backgroundimage = core_options_get('layout-404_background', 'theme');

	if (is_search())
		$backgroundimage = core_options_get('layout-search_background', 'theme');

	$backgroundimage = apply_filters('layout_background', $backgroundimage);

	if (!$backgroundimage || $backgroundimage == 'none')
		$backgroundimage = core_options_get('background_image');

	// Other options
	$pattern = core_options_get('pattern');

	// Slogan Background
	function slogan_block_background(){
		$post_type          = get_post_type();
		$category           = get_query_var('cat');
		$current_category   = get_category ($category);

			// check if it's a page or post with a custom content block background
			if ( is_singular() && (is_page() || is_single()) )
				$slogan_bg = core_options_get('custom_content_image', $post_type);

			if (is_archive()){

				// check if it's a category and display the custom content if there are any
				if ( is_category() ){
					$obj = get_queried_object();
					$slogan_bg = core_options_get('custom_content_' .$obj->slug.'_bg');

				} elseif (is_author())
					$slogan_bg = core_options_get('custom_content_layout-author_bg', 'theme');

				elseif (is_tag())
					$slogan_bg = core_options_get('custom_content_layout-tag_bg', 'theme');

				else
					$slogan_bg = core_options_get('custom_content_layout-archive_bg', 'theme');
			}

			if (is_search())
				$slogan_bg = core_options_get('custom_content_layout-search_bg', 'theme');

		$slogan_bg = apply_filters('slogan_background', $slogan_bg);

		if ( !$slogan_bg || $slogan_bg == 'none' )
			$slogan_bg = core_options_get('custom_content_layout-default_bg', 'theme');

		$slogan_bg = "#theme-custom-content .bg{ background-image: url(".$slogan_bg."); background-position: top center; background-repeat: repeat; }\n";

		return $slogan_bg;
	}


?>

<style type="text/css">
	<?php

		// Content colors
		$color = core_hex2rgb(core_options_get('color_content_background'));
		$color['alpha'] = 1.0;
		echo '#wrapper .theme_content_area,';
		echo 'div.shortcode-header h1,';
		echo 'div.shortcode-header h2,';
		echo 'div.shortcode-header h3,';
		echo 'div.shortcode-header h4,';
		echo 'div.shortcode-header h5,';
		echo 'div.shortcode-header h6';
		echo '{ background-color:'.core_options_get('color_content_background').'; background-color: ', core_color2rgba($color), ';';
		$color['alpha'] = 1;
		echo ' outline-color: ', core_color2rgba($color), ';}';
		echo "\n"; ?>

	<?php
		// Top Navigation Backgroound color
		$color = core_hex2rgb(core_options_get('color_top_nav_bg'));
		$color['alpha'] = floatval(core_options_get('color_top_nav_opacity')/100);
	?>
	#top-nav {
		background-color: <?php echo core_options_get('color_top_nav_bg'); ?>;
		background-color: <?php echo core_color2rgba($color); ?>
	}

	<?php
		// Typography
		apply_fonts($fonts);
		apply_font_sizes($fontsizes);

		// Other color settings
		apply_colors('color', $colors);
		apply_colors('background-color', $colors_background);
		apply_colors('border-color', $colors_border);
		apply_colors('outline-color', $colors_outline);

		// Core custom CSS
		do_action('core_custom_css');
	?>

	body {
	<?php $new_base_font = intval(core_options_get('font_size_other_paragraph')) / BASE_FONT_SIZE; ?>
		background-color: <?php echo core_options_get('main_background_color'); ?>;
		background-image: url(<?php echo $backgroundimage; ?>);
		background-position: top left;
		background-attachment: fixed;
	<?php $bg_repeat = (core_options_get('background_repeat') == true) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;'; ?>
	<?php echo $bg_repeat . "\n"; ?>
	<?php $bg_size = (core_options_get('background_size') == false) ? 'background-size: cover;' : 'background-size: 100%;'; ?>
	<?php echo $bg_size . "\n"; ?>
	}

	h1 { <?php echo ( intval(core_options_get('font_size_heading1')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }
	h2 { <?php echo ( intval(core_options_get('font_size_heading2')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }
	h3 { <?php echo ( intval(core_options_get('font_size_heading3')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }
	h4 { <?php echo ( intval(core_options_get('font_size_heading4')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }
	h5 { <?php echo ( intval(core_options_get('font_size_heading5')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }
	h6 { <?php echo ( intval(core_options_get('font_size_heading6')) / BASE_FONT_SIZE ) + $new_base_font; ?>em; }

	<?php if($pattern != 'none') : ?>

	#sidebar {
		background-image: url(<?php echo $imagepath . 'patterns/' . $pattern; ?>);
	}

	<?php else : ?>
	#header, #site-navigation, #footer {
		background-image: none;
	}

	<?php endif; ?>

	<?php
		// Output the custom content background
		$slogan_block_background = slogan_block_background();
		if( $slogan_block_background  )
			//echo $slogan_block_background;

		// Menu color
		$color = core_hex2rgb(core_options_get('color_submenu_background'));
		$color['alpha'] = 0.95;
		echo '#theme-menu-main li li, #theme-menu-main li li a { background-color: transparent; }';
		echo '#theme-menu-main li ul { background-color: '.core_options_get('color_submenu_background').'; background-color: ', core_color2rgba($color), '; }';
	?>

	<?php core_theme_hook_styles(); ?>

</style>

<?php if (!is_null($theme_load_fonts)) : ?>
<script type="text/javascript">
window.WebFont.load({
google: {
families: [<?php
$text = '';
global $core_fonts;
$prev_font = array();
foreach ($theme_load_fonts as $font) {
	if (!in_array($font,$prev_font) && in_array($font, $core_fonts["Google fonts"])) {
		array_push($prev_font, $font);
		$text .= '"' . $font . '",';
	}
}
echo substr($text, 0, -1);
?>]
}
});
</script>
<?php endif; ?>

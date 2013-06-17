<?php

global $theme_post_options;

// Register post\page option sections
// Post\page option for themes
//

$theme_post_options = new CoreOptionHandler(THEME_SLUG . '-post-options', THEME_NAME . ' options', array('post', 'page'));
core_options_handler_register($theme_post_options);

$group = new CoreOptionGroup('general', __('General', THEME_SLUG));
$theme_post_options->group_add($group);

// Slider
$section = new CoreOptionSection('slider');
$group->section_add($section);
$section->option_add(new CoreOption('slider', __('Slider', THEME_SLUG), 'sliders', __('The slider will be displayed at the top of the page.', THEME_SLUG)));



// Other options
$section = new CoreOptionSection('options');
$group->section_add($section);

// Color schemes
$section->option_add(new CoreOption('colorscheme', __('Content color scheme', THEME_SLUG), 'colorschemes-list', __('The content block will use this color scheme.', THEME_SLUG)));

// Background image
$section->option_add(new CoreOption('background_image', __('Background image', THEME_SLUG), 'image', __('This background image will override the one defined under theme options.', THEME_SLUG)));

// Custom content section
$section->option_add(new CoreOption('custom_content', __('HTML section', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

?>
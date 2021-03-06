<?php

global $theme_post_options;

// Register post\page option sections
// Post\page option for themes
//

$theme_post_options = new CoreOptionHandler(THEME_SLUG . '-post-options', THEME_NAME . ' options', array('post'));
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

// Post excerpt size
$option = new CoreOption('post_width', __('Post Image Width', THEME_SLUG), 'select', __('The size of the post featured image.', THEME_SLUG), 'small');
$option->parameters = array('small' => 'Small', 'medium' => 'Medium', 'full' => 'Fullwidth');
$section->option_add($option);

// Color schemes
$section->option_add(new CoreOption('colorscheme', __('Content color scheme', THEME_SLUG), 'colorschemes-list', __('The content block will use this color scheme.', THEME_SLUG)));

// Background image
$section->option_add(new CoreOption('background_image', __('Background image', THEME_SLUG), 'image', __('This background image will override the one defined under theme options.', THEME_SLUG)));
$section->option_add(new CoreOption('background_image_author', __('Image Author', THEME_SLUG), 'text', __('The author of the background image.', THEME_SLUG)));
$section->option_add(new CoreOption('background_image_link', __('Author Link', THEME_SLUG), 'text', __('The author link of the background image.', THEME_SLUG)));

// Custom content section
$section->option_add(new CoreOption('custom_content', __('HTML section', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

?>
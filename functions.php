<?php

define ('THEME_URL', get_stylesheet_directory_uri() );

add_action('wp_head', 'ltd_janky_way_less');

function ltd_janky_way_less() { ?>
	<link rel="stylesheet/less" type="text/css" href="<?php echo THEME_URL; ?>/less/example.less">
	<script src="<?php echo THEME_URL; ?>/js/less-1.2.0.min.js" type="text/javascript"></script>
<?php } ?>

<?php
add_action('wp_print_styles', 'ltd_okay_way_2011css');

function ltd_okay_way_2011css() {
	wp_enqueue_style('twentyeleven-css', get_bloginfo( 'template_url' ) . '/style.css' , array(), '007');
} 
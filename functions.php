<?php

define ('THEME_URL', get_stylesheet_directory_uri() );

add_action('wp_head', 'ld_janky_way_less');

function ld_janky_way_less() { ?>
	<link rel="stylesheet/less" type="text/css" href="<?php echo THEME_URL; ?>/less/example.less">
	<script src="<?php echo THEME_URL; ?>/js/less-1.2.0.min.js" type="text/javascript"></script>
<?php } ?>
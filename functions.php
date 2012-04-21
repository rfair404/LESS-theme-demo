<?php

define ('THEME_URL', get_stylesheet_directory_uri() );

//add_action('wp_head', 'ltd_janky_way_less');

/* 
function ltd_janky_way_less() { ?>
	<link rel="stylesheet/less" type="text/css" href="<?php echo THEME_URL; ?>/less/example.less">
	<script src="<?php echo THEME_URL; ?>/js/less-1.2.0.min.js" type="text/javascript"></script>
<?php } 
*/

add_action('init', 'ltd_register_less');

function ltd_register_less() {
	wp_register_script('less', THEME_URL . '/js/less-1.2.0.min.js', array('jquery'), '007', true);
	wp_register_style('lesscss', THEME_URL . '/less/example.less', array(), '007', 'screen');
}

add_action ('wp_print_scripts', 'ltd_less_js');

function ltd_less_js() {
	if ( ! is_admin() )  
		wp_enqueue_script('less');
}

add_action('wp_print_styles', 'ltd_less_css');

function ltd_less_css() {
	if ( ! is_admin() ) 
		wp_enqueue_style('lesscss');
}

add_action('wp_print_styles', 'ltd_okay_way_2011css');

function ltd_okay_way_2011css() {
	if ( ! is_admin() )
		wp_enqueue_style('twentyeleven-css', get_bloginfo( 'template_url' ) . '/style.css' , array(), '007');
} 

function enqueue_less_styles($tag, $handle) {
    global $wp_styles;
    $match_pattern = '/\.less$/U';
    if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
        $handle = $wp_styles->registered[$handle]->handle;
        $media = $wp_styles->registered[$handle]->args;
        $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
        $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
        $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

        $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
    }
    return $tag;
}
add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);
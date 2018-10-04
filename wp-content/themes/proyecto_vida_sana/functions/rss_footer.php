<?php 

function dl_widgets() {
	register_sidebar( array(
		'name' => 'Widget Footer',
		'id'   => 'widget_footer'
	));
}

add_action('widgets_init', 'dl_widgets');

?>
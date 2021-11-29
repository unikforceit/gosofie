<?php
if ( gosofie_get_options('sidebar') ) {
	do_action('gosofie_sidebar');
} else {
	if ( is_active_sidebar('sidebar-1')){
		echo '<div class="blog-sidebar">';
		dynamic_sidebar('sidebar-1');
		echo '</div>';
	}
}
?>


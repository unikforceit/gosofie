<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'gosofie_register_required_plugins' );

function gosofie_register_required_plugins() {

	$plugins = array(

		array(
			'name' => esc_attr__('Gosofie Addon','gosofie'),
			'slug' => 'gosofie-addon',
			'source' => get_template_directory_uri() . '/plugin/gosofie-addon.zip',
			'required' => true,
			'version' => '', 
			'force_activation' => false,
			'force_deactivation' => false, 
			'external_url' => '',
		),

		array(
			'name' => esc_attr__('Contact Form 7','gosofie'), 
			'slug'=> 'contact-form-7', 
			'required' => true, 
			'force_activation'=> false,
			'force_deactivation' => false,
		),

		array(
			'name' => esc_attr__('Elementor','gosofie'),
			'slug' => 'elementor', 
			'required' => true, 
			'version' => '', 
			'force_activation' => false, 
			'force_deactivation' => false,
			'external_url' => '',
		),		
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true, 
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message'=> '',
    );

    tgmpa( $plugins, $config );

}
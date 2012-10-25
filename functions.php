<?php 
	//=============================================================================
	// Includes
	//=============================================================================
	require get_template_directory() . '/includes/cpt-class.php';	//The magic custom post type class

	//=============================================================================
	// Enqueue Scripts
	//=============================================================================
	add_action('wp_enqueue_scripts', 'enqueue_scripts');
	function enqueue_scripts() {	    
	    wp_register_script( 'bootstrap', get_bloginfo( 'template_url' ).'/js/core/bootstrap.min.js' );
	    wp_enqueue_script( 'bootstrap' );

	    wp_register_script( 'main', get_bloginfo( 'template_url' ).'/js/custom/main.js' );
	    wp_enqueue_script( 'main' );

	    wp_register_script( 'plugins', get_bloginfo( 'template_url' ).'/js/custom/plugins.js' );
	    wp_enqueue_script( 'plugins' );
	}


	/*###########################################################################*/


	/*================================================================================
	| Supports
	================================================================================*/
	add_theme_support( 'post-thumbnails' ); 
	show_admin_bar(false);

	//=============================================================================
	// Register Menus
	//=============================================================================
	register_nav_menus(array(
		'main'	=> 'Main'
	));
?>
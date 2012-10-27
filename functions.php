<?php //=============================================================================
	// 
	// 	functions.php
	// 	
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	//
	// Core Functions
	//
	//=============================================================================


	//=============================================================================
	// Variables
	//=============================================================================
	$wpjEditorCap = 'manage_options';	//The minimum capability required to use the WP Jumper editor


	//=============================================================================
	// Includes
	//=============================================================================
	require get_template_directory() . '/includes/core/cpt-class.php';				//The magic custom post type class
	require get_template_directory() . '/includes/core/wp-jumper-dashboard.php';	//Controls the Admin Dashboard
	require get_template_directory() . '/includes/core/helpers.php';				//Controls the Admin Dashboard

	//=============================================================================
	// Enqueue Scripts: Frontend
	//=============================================================================
	add_action('wp_enqueue_scripts', 'enqueue_frontend_scripts');
	function enqueue_frontend_scripts() {	    
	    wp_register_script( 'bootstrap', get_bloginfo( 'template_url' ).'/js/core/bootstrap.min.js' );
	    wp_enqueue_script( 'bootstrap' );

	    wp_register_script( 'main', get_bloginfo( 'template_url' ).'/js/custom/main.js' );
	    wp_enqueue_script( 'main' );

	    wp_register_script( 'plugins', get_bloginfo( 'template_url' ).'/js/custom/plugins.js' );
	    wp_enqueue_script( 'plugins' );
	}

	//=============================================================================
	// Enqueue Scripts: Backend
	//=============================================================================
	add_action('admin_enqueue_scripts', 'enqueue_backend_scripts');
	function enqueue_backend_scripts(){
		wp_register_style( 'backend-css', get_bloginfo( 'template_url' ).'/css/core/backend.css' );
		wp_enqueue_style( 'backend-css' );

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery-1.8.2', get_bloginfo( 'template_url' ).'/js/core/jquery-1.8.2.min.js' );
		wp_enqueue_script( 'jquery-1.8.2' );

		wp_register_script( 'jquery-ui-1.9.1.custom.min', get_bloginfo( 'template_url' ).'/js/core/jquery-ui-1.9.1.custom.min.js' );
		wp_enqueue_script( 'jquery-ui-1.9.1.custom.min' );

		wp_register_script( 'backend', get_bloginfo( 'template_url' ).'/js/core/backend.js' );
		wp_enqueue_script( 'backend' );
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
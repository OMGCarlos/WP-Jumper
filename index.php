<?php //=======================================================================
	//
	//	index.php
	//	
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	//
	// 			TEMPLATE FILES LOCATED IN THE templates FOLDER
	// 			
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	//
	// This file builds the page your visitor is about to view. Build your site
	// through the WP Jumper page in the dashboard. For more information, visit
	// http://wpjumper.com
	//
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	//
	//~~~~~~~~~~~~~~~~~~~~   DO NOT EDIT THIS FILE!   ~~~~~~~~~~~~~~~~~~~~~~~~~~
	// 
	//========================================================================*/ 

	global $post;
	$template = 'index';	//The main template file to load. It will first check
								// "templates/core", if it's not there it will then check
								// "templates/installed", if it's not there it will check
								// "tempaltes/custom". If the page is still not there,
								// the user will see a blank page.

	//=============================================================================
	// Determine the page type. Order is important, in the event a page falls under
	// multiple conditionals.
	//=============================================================================
	if ( is_single() )			$template = 'single';
	if ( is_page() )			$template = 'page';
	if ( is_category() )		$template = 'category';
	if ( is_tag() )				$template = 'tag';
	if ( is_tax() )				$template = 'tax';
	if ( is_author() )			$template = 'author';
	if ( is_search() )			$template = 'search';
	if ( is_front_page() )		$template = 'front-page';
	if ( is_home() ) 			$template = 'home';
	if ( is_404() ) 			$template = '404';

	//=============================================================================
	// Include the appropriate files.
	// 
	// If nothing was found, display an error message as this means 404.php wasn't
	// found either!
	//=============================================================================
	$result = locate_template( 'stemplates/core/' . $template . '.php', true, false);
	if($result === ''){
		echo '<b>Failed to load template for: <span style="color: #aa0000">' . $template . '</span></b>';
	}


?>
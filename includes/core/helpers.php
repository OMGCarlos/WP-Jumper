<?php //=============================================================================
	// 
	// 	functions.php
	// 	
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	//
	// 	Just a bunch of helper files.
	//
	//=============================================================================

	class WP_Jumper{

		//=============================================================================
		// Outputs the site structure
		//=============================================================================
		function site_structure(){
			
		}

		//=============================================================================
		// Outputs the available templates
		//=============================================================================
		function available_templates(){

		}

		//=============================================================================
		// Recursively scans a directory and returns the file structure
		// 
		// Arguments: 	$pattern 		STR 		glob search pattern
		// 				$flags 			INT 		glob search flags
		// 	
		// Returns: 					array 		files 			
		//=============================================================================
		function get_files($pattern, $flags = 0){
			$files = glob($pattern, 0);
	        
	        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
	            $files = array_merge($files, $this->get_files($dir.'/'.basename($pattern), $flags));
	        }

	        return $files;
		}

		//=============================================================================
		// Strips the pathname and .php from filenames, and places them inside a select
		// box as options.
		// 
		// Arguments:	$files 		ARRAY 		List of filenames to strip
		//=============================================================================
		function create_options($files){
			$str = '../' . str_replace(get_bloginfo('url') . '/', '', get_bloginfo('template_url')) . '/templates/';
			foreach($files as $file){
				$file = str_replace($str, '', $file);
				echo '<option value="' . esc_attr($file) . '">' . str_replace('/', ': ', $file) . '</option>';
			}
		}
	}
?>
<?php //=======================================================================
	// 
	// 	wp-jumper-dashboard.php
	// 
	// 	Sets up the dashboard area.
	//========================================================================*/

	//=============================================================================
	// Sidebar admin menu item
	//=============================================================================
	add_action('admin_menu', 'wp_jumper_dashboard_menu');
	function wp_jumper_dashboard_menu(){
		global $wpjEditorCap;
		add_menu_page('WP Jumper', 'WP Jumper', $wpjEditorCap, 'wp-jumper', 'wp_jumper', get_bloginfo('template_url') . '/img/wp-jumper.png', 59.1337);
	}

	//=============================================================================
	// The actual settings page
	//=============================================================================
	function wp_jumper(){
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Security
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		global $wpjEditorCap;
		if(!current_user_can($wpjEditorCap)) wp_die('You do not have sufficient permissions to access this page.');

		//=============================================================================
		// Save Content
		//=============================================================================
		if(isset($_POST['update_settings'])){
			if( !isset($_POST['nonce-wp-jumper']) || !wp_verify_nonce( $_POST['nonce-wp-jumper'], '@o]5DA\xQpOzR.aK')) wp_die('You do not have sufficient permissions to access this page.');
		}
		$WP_Jumper = new WP_Jumper;

		?>
			<?php //=======================================================================
			// The Form
			//========================================================================*/ ?>
			<div class="wrap">
				<div id="icon-wp-jumper" class="icon32 icon32-posts-page"><br></div>
				<h2>WP Jumper</h2>
				<form method="POST" name="theme-options" id="post">

					<?php //=======================================================================
					// Security
					//========================================================================*/ ?>
					<input class="hidden" type="text" value="TRUE" name="update_settings">
					<?php wp_nonce_field('@o]5DA\xQpOzR.aK', 'nonce-wp-jumper'); ?>

					<?php //=======================================================================
					// Finally, the actual Content. Unfortunately, WP requires a lot of markup.
					//========================================================================*/ ?>
					<div id="poststuff">
						<div id="post-body" class="metabox-holder columns-1">

							<?php //=======================================================================
							// Main Navigation Properties
							//========================================================================*/ ?>
							<div id="postbox-container-2" class="postbox-container">
								<div id="normal-sortables" class="meta-box-sortables ui-sortable">
									<div class="postbox " style="display: block; ">
										<div class="handlediv" title="Click to toggle"><br></div>
										<h3 class="hndle"><span>Site Builder</span></h3>
										<div id="site-builder" class="inside">

											<?php //=======================================================================
											// Site structure (left side)
											//========================================================================*/ ?>
											<div class="site-structure-wrapper">
												<h2>Site Structure</h2>
												<div class="site-structure">
													<br>
													<hr>
													<?php $WP_Jumper->site_structure(); ?>
													<p><strong>Add a new template to your site.</strong> 
														<br><small>* You can use the textbox to be more specific (ie selecting "Page" and typing "23" will build "page-23.php", which is used when the viewer visits a page with ID 23).</small></p>
													<select>
														<option value="front-page">Front Page</option>
														<option value="home">Blog</option>
														<option value="page">Page *</option>
														<option value="single">Single *</option>
														<option value="search">Search</option>
														<option value="taxonomy">Taxonomy *</option>
													</select> 
													<input type="text"> <a class="button">Add Template</a>
												</div>
											</div>


											<?php //=======================================================================
												// Site dropdowns (right side)
												//========================================================================*/ 
												$files = $WP_Jumper->get_files('../' . str_replace(get_bloginfo('url') . '/', '', get_bloginfo('template_url')) . '/templates/*.php');
											?>
											<div class="site-components-wrapper">
												<h2>Site Components</h2>
												<div class="site-components">

													<?php //=======================================================================
													// Available Template Files
													//========================================================================*/ ?>
													<p><strong>Available Template Files</strong></p>
													<select id="wpj-available-templates" class="wpj-full-width" multiple="multiple">
														<?php $WP_Jumper->create_options($files); ?>
													</select>

													<?php //=======================================================================
													// Target
													//========================================================================*/ ?>
													<p><strong>Target Template</strong></p>
													<select id="wpj-target-templates" class="wpj-full-width">
														<?php $WP_Jumper->available_templates(); ?>
													</select>

													<p><br><a class="button">Add Files to Template</a></p>
												</div>
											</div>
											<div class="clear"></div>
	
										</div>
									</div>
								</div>
							</div>

						</div><!-- /post-body -->
						<br class="clear">
					</div><!-- /poststuff -->

					<p><a class="button">Preview Site</a> <input type="submit" value="Create Site!" class="button-primary"/> </p>
				</form>
			</div>


			<?php //=======================================================================
			// Required JavaScript for drag and drop
			//========================================================================*/ ?>
			<script type="text/javascript">list_args = {"class":"WP_Post_Comments_List_Table","screen":{"id":"page","base":"post"}};</script>
			<link rel="stylesheet" href="http://localhost:8888/wpjumper.com/www/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load=wp-jquery-ui-dialog&amp;ver=3.4.2" type="text/css" media="all">
			<script type="text/javascript">
			/* <![CDATA[ */
			var commonL10n = {"warnDelete":"You are about to permanently delete the selected items.\n  'Cancel' to stop, 'OK' to delete."};var wpAjax = {"noPerm":"You do not have permission to do that.","broken":"An unidentified error has occurred."};var autosaveL10n = {"autosaveInterval":"60","savingText":"Saving Draft\u2026","saveAlert":"The changes you made will be lost if you navigate away from this page."};var postL10n = {"ok":"OK","cancel":"Cancel","publishOn":"Publish on:","publishOnFuture":"Schedule for:","publishOnPast":"Published on:","showcomm":"Show more comments","endcomm":"No more comments found.","publish":"Publish","schedule":"Schedule","update":"Update","savePending":"Save as Pending","saveDraft":"Save Draft","private":"Private","public":"Public","publicSticky":"Public, Sticky","password":"Password Protected","privatelyPublished":"Privately Published","published":"Published","comma":","};var thickboxL10n = {"next":"Next >","prev":"< Prev","image":"Image","of":"of","close":"Close","noiframes":"This feature requires inline frames. You have iframes disabled or your browser does not support them.","loadingAnimation":"http:\/\/localhost:8888\/wpjumper.com\/www\/wp-includes\/js\/thickbox\/loadingAnimation.gif","closeImage":"http:\/\/localhost:8888\/wpjumper.com\/www\/wp-includes\/js\/thickbox\/tb-close.png"};var wordCountL10n = {"type":"w"};var quicktagsL10n = {"wordLookup":"Enter a word to look up:","dictionaryLookup":"Dictionary lookup","lookup":"lookup","closeAllOpenTags":"Close all open tags","closeTags":"close tags","enterURL":"Enter the URL","enterImageURL":"Enter the URL of the image","enterImageDescription":"Enter a description of the image","fullscreen":"fullscreen","toggleFullscreen":"Toggle fullscreen mode","textdirection":"text direction","toggleTextdirection":"Toggle Editor Text Direction"};var wpLinkL10n = {"title":"Insert\/edit link","update":"Update","save":"Add Link","noTitle":"(no title)","noMatchesFound":"No matches found."};/* ]]> */
			</script>
			<script type="text/javascript" src="http://localhost:8888/wpjumper.com/www/wp-admin/load-scripts.php?c=1&amp;load=admin-bar,hoverIntent,common,jquery-color,schedule,wp-ajax-response,autosave,suggest,wp-lists,jquery-ui-core,jquery-ui-widget,jquery-ui-mouse,jquery-ui-sortable,postbox,post,thickbox,media-upload,word-count,editor,quicktags,jquery-ui-resizable,jquery-ui-draggable,jquery-ui-button,jquery-ui-position,jquery-ui-dialog,wpdialogs,wplink,wpdialogs-popup,wp-fullscreen&amp;ver=3.4.2"></script>

		<?php 
	}
?>
//=============================================================================
// 	backend.js
// 	
// 	Controls the backend, specifically the WP Jumper page
//=============================================================================
(function($){
	$(function(){
		//=============================================================================
		// Cache
		//=============================================================================
		var $templateName 		= $('#site-template-name'),
			$templatePicker 	= $('#site-template-picker'),
			$siteStructure 		= $('#site-structure-area'),
			$targetTemplate 	= $('#target-template'),
			$availableModules 	= $('#available-modules'),
			$warning001			= $('.warning-template-exists'),
			$warning002			= $('.warning-no-templates-loaded'),
			$warning003			= $('.warning-no-modules-selected'),
			$btnAddModules		= $('#btn-add-modules'),
			$btnAddTemplate 	= $('#btn-add-template');


		/*###########################################################################*/


		//=============================================================================
		// Make the #site-template-extendor (non)functional
		// 
		// Whenever the site-template-picker is set to a starred item, enable the 
		// extension box. Otherwise, disable it.
		//=============================================================================
		$templatePicker.change(function(){
			var isUnStarred = $('#site-template-picker').children('option:selected').first().hasClass('disable-ext');
			$templateName.prop('disabled', isUnStarred);
			$(this).data('isStarred', !isUnStarred);
		});
		$templatePicker.change();

		//=============================================================================
		// Add Templates to the site structure
		//=============================================================================
		$btnAddTemplate.click(function(e){
			e.preventDefault();

			//=============================================================================
			// Only use the value of #site-template-picker
			//=============================================================================
			if( !$templatePicker.data('isStarred') || ($templatePicker.data('isStarred') && $templateName.val().trim() === '')) {
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				// Exit if the template already exists
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				if( $siteStructure.find('li[data-type="' + $templatePicker.val() + '.php"]').length > 0 ){
					$warning001.stop(true).fadeTo(250, 1)
											.delay(1000)
											.fadeTo(1000, 0, 
												function(){
													$(this).hide()
												});
					return false;
				}

				$siteStructure.append('<li class="site-template" data-type="' 
																			+ $templatePicker.val() 
																			+ '.php">' 
																			+ $templatePicker.val().trim() 
																			+ '.php<a class="close-button" href="#">X</a><ul class="template-modules"></ul></li>');
		
			//=============================================================================
			// Use value of #site-template-picker AND #site-template-name
			//=============================================================================
			} else{
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				// Exit if the template already exists
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				if( $siteStructure.find('li[data-type="' + $templatePicker.val() + $templateName.val().trim() + '.php"]').length > 0 ){
					showWarning($warning001);
					return false;
				}				

				var name = $templatePicker.val() + ($templateName.val().trim() === '' ? '' : '-' + $templateName.val().trim());
				$siteStructure.append('<li class="site-template" data-type="' 
											+ name 
											+ '.php">' 
											+ name 
											+ '.php<a class="close-button" href="#">X</a><ul class="template-modules"></ul></li>');
			}

			//=============================================================================
			// Handle new elements
			//=============================================================================
			recreateTargetSelector();	
			makeModulesSortable();
		});

		//=============================================================================
		// Add the remove event to the new items
		//=============================================================================
		$siteStructure.on('click', '.close-button', function(e){
			e.preventDefault();
			$(this).parent().remove();
		});



		/*###########################################################################*/



		//=============================================================================
		// Add Modules to structure area
		//=============================================================================
		$btnAddModules.click(function(e){
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// Validation
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			e.preventDefault();
			if(!$siteStructure.find('li').length) return showWarning($warning002);
			if(!$availableModules.find('option:selected').length) return showWarning($warning003);

			//=============================================================================
			// Add the module
			// 
			// For each selected module, add it to the target template
			//=============================================================================
			var template = $('.site-template[data-type="' 
								+ $targetTemplate.children('option:selected').val() 
								+ '"] .template-modules');	//The selected target module

			$('.available-module:selected').each(function(){
				var $this = $(this);
				template.append('<li>' + $this.val() + '<a class="close-button" href="#">X</a></li>');
			});
			makeModulesSortable();
		});



		/*###########################################################################*/



		//=============================================================================
		// Recreate the Target Template selection box
		//=============================================================================
		function recreateTargetSelector(){
			$targetTemplate.empty();
			var options = [];
			$siteStructure.html($('#site-structure-area > li').sort(sortSiteStructure))
				.children('li')
				.each(function(){
					var val = $(this).data('type');
					options.push('<option value="' + val + '">' + val + '</option>');
				});
			$targetTemplate.html(options.join(''));		
		}
		recreateTargetSelector();

		//=============================================================================
		// Make modules sortable
		//=============================================================================
		function makeModulesSortable(){
			$siteStructure.find('.template-modules').sortable({
				connectWith: '.template-modules',
				placeholder: 'template-module-placeholder',
				forcePlaceholderSize: true
			}).end().disableSelection();
		}
		makeModulesSortable();
	});	//end document.ready


	//=============================================================================
	// Sorts the site structure list
	//=============================================================================
	function sortSiteStructure(a, b){
		return ($(b).html() < $(a).html());
	}

	//=============================================================================
	// Display Warning
	// 
	// Arguments: elem		OBJECT 		The warning element to show
	// Returns: 			false		Warnings are always falso
	//=============================================================================
	function showWarning(elem){
		elem.stop(true).fadeTo(250, 1).delay(1000).fadeTo(1000, 0, function(){$(this).hide()});
		return false;
	}
})(jQuery);
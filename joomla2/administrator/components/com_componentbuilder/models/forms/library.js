/*--------------------------------------------------------------------------------------------------------|  www.vdm.io  |------/
    __      __       _     _____                 _                                  _     __  __      _   _               _
    \ \    / /      | |   |  __ \               | |                                | |   |  \/  |    | | | |             | |
     \ \  / /_ _ ___| |_  | |  | | _____   _____| | ___  _ __  _ __ ___   ___ _ __ | |_  | \  / | ___| |_| |__   ___   __| |
      \ \/ / _` / __| __| | |  | |/ _ \ \ / / _ \ |/ _ \| '_ \| '_ ` _ \ / _ \ '_ \| __| | |\/| |/ _ \ __| '_ \ / _ \ / _` |
       \  / (_| \__ \ |_  | |__| |  __/\ V /  __/ | (_) | |_) | | | | | |  __/ | | | |_  | |  | |  __/ |_| | | | (_) | (_| |
        \/ \__,_|___/\__| |_____/ \___| \_/ \___|_|\___/| .__/|_| |_| |_|\___|_| |_|\__| |_|  |_|\___|\__|_| |_|\___/ \__,_|
                                                        | |                                                                 
                                                        |_| 				
/-------------------------------------------------------------------------------------------------------------------------------/

	@version		2.7.x
	@created		30th April, 2015
	@package		Component Builder
	@subpackage		library.js
	@author			Llewellyn van der Merwe <http://joomlacomponentbuilder.com>	
	@github			Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html 
	
	Builds Complex Joomla Components 
                                                             
/-----------------------------------------------------------------------------------------------------------------------------*/

// Some Global Values
jform_vvvvwaevzs_required = false;
jform_vvvvwakvzt_required = false;

// Initial Script
jQuery(document).ready(function()
{
	var how_vvvvwad = jQuery("#jform_how").val();
	vvvvwad(how_vvvvwad);

	var how_vvvvwae = jQuery("#jform_how").val();
	vvvvwae(how_vvvvwae);

	var how_vvvvwaf = jQuery("#jform_how").val();
	vvvvwaf(how_vvvvwaf);

	var how_vvvvwag = jQuery("#jform_how").val();
	vvvvwag(how_vvvvwag);

	var how_vvvvwah = jQuery("#jform_how").val();
	vvvvwah(how_vvvvwah);

	var how_vvvvwai = jQuery("#jform_how").val();
	vvvvwai(how_vvvvwai);

	var how_vvvvwaj = jQuery("#jform_how").val();
	vvvvwaj(how_vvvvwaj);

	var type_vvvvwak = jQuery("#jform_type input[type='radio']:checked").val();
	vvvvwak(type_vvvvwak);
});

// the vvvvwad function
function vvvvwad(how_vvvvwad)
{
	if (isSet(how_vvvvwad) && how_vvvvwad.constructor !== Array)
	{
		var temp_vvvvwad = how_vvvvwad;
		var how_vvvvwad = [];
		how_vvvvwad.push(temp_vvvvwad);
	}
	else if (!isSet(how_vvvvwad))
	{
		var how_vvvvwad = [];
	}
	var how = how_vvvvwad.some(how_vvvvwad_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('#jform_addconditions-lbl').closest('.control-group').show();
	}
	else
	{
		jQuery('#jform_addconditions-lbl').closest('.control-group').hide();
	}
}

// the vvvvwad Some function
function how_vvvvwad_SomeFunc(how_vvvvwad)
{
	// set the function logic
	if (how_vvvvwad == 2)
	{
		return true;
	}
	return false;
}

// the vvvvwae function
function vvvvwae(how_vvvvwae)
{
	if (isSet(how_vvvvwae) && how_vvvvwae.constructor !== Array)
	{
		var temp_vvvvwae = how_vvvvwae;
		var how_vvvvwae = [];
		how_vvvvwae.push(temp_vvvvwae);
	}
	else if (!isSet(how_vvvvwae))
	{
		var how_vvvvwae = [];
	}
	var how = how_vvvvwae.some(how_vvvvwae_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('#jform_php_setdocument').closest('.control-group').show();
		if (jform_vvvvwaevzs_required)
		{
			updateFieldRequired('php_setdocument',0);
			jQuery('#jform_php_setdocument').prop('required','required');
			jQuery('#jform_php_setdocument').attr('aria-required',true);
			jQuery('#jform_php_setdocument').addClass('required');
			jform_vvvvwaevzs_required = false;
		}

	}
	else
	{
		jQuery('#jform_php_setdocument').closest('.control-group').hide();
		if (!jform_vvvvwaevzs_required)
		{
			updateFieldRequired('php_setdocument',1);
			jQuery('#jform_php_setdocument').removeAttr('required');
			jQuery('#jform_php_setdocument').removeAttr('aria-required');
			jQuery('#jform_php_setdocument').removeClass('required');
			jform_vvvvwaevzs_required = true;
		}
	}
}

// the vvvvwae Some function
function how_vvvvwae_SomeFunc(how_vvvvwae)
{
	// set the function logic
	if (how_vvvvwae == 3)
	{
		return true;
	}
	return false;
}

// the vvvvwaf function
function vvvvwaf(how_vvvvwaf)
{
	if (isSet(how_vvvvwaf) && how_vvvvwaf.constructor !== Array)
	{
		var temp_vvvvwaf = how_vvvvwaf;
		var how_vvvvwaf = [];
		how_vvvvwaf.push(temp_vvvvwaf);
	}
	else if (!isSet(how_vvvvwaf))
	{
		var how_vvvvwaf = [];
	}
	var how = how_vvvvwaf.some(how_vvvvwaf_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('.note_display_library_config').closest('.control-group').show();
	}
	else
	{
		jQuery('.note_display_library_config').closest('.control-group').hide();
	}
}

// the vvvvwaf Some function
function how_vvvvwaf_SomeFunc(how_vvvvwaf)
{
	// set the function logic
	if (how_vvvvwaf == 2 || how_vvvvwaf == 3)
	{
		return true;
	}
	return false;
}

// the vvvvwag function
function vvvvwag(how_vvvvwag)
{
	if (isSet(how_vvvvwag) && how_vvvvwag.constructor !== Array)
	{
		var temp_vvvvwag = how_vvvvwag;
		var how_vvvvwag = [];
		how_vvvvwag.push(temp_vvvvwag);
	}
	else if (!isSet(how_vvvvwag))
	{
		var how_vvvvwag = [];
	}
	var how = how_vvvvwag.some(how_vvvvwag_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('.note_display_library_files_folders_urls').closest('.control-group').show();
	}
	else
	{
		jQuery('.note_display_library_files_folders_urls').closest('.control-group').hide();
	}
}

// the vvvvwag Some function
function how_vvvvwag_SomeFunc(how_vvvvwag)
{
	// set the function logic
	if (how_vvvvwag == 1 || how_vvvvwag == 2 || how_vvvvwag == 3)
	{
		return true;
	}
	return false;
}

// the vvvvwah function
function vvvvwah(how_vvvvwah)
{
	if (isSet(how_vvvvwah) && how_vvvvwah.constructor !== Array)
	{
		var temp_vvvvwah = how_vvvvwah;
		var how_vvvvwah = [];
		how_vvvvwah.push(temp_vvvvwah);
	}
	else if (!isSet(how_vvvvwah))
	{
		var how_vvvvwah = [];
	}
	var how = how_vvvvwah.some(how_vvvvwah_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('.note_no_behaviour_one').closest('.control-group').show();
		jQuery('.note_no_behaviour_three').closest('.control-group').show();
		jQuery('.note_no_behaviour_two').closest('.control-group').show();
	}
	else
	{
		jQuery('.note_no_behaviour_one').closest('.control-group').hide();
		jQuery('.note_no_behaviour_three').closest('.control-group').hide();
		jQuery('.note_no_behaviour_two').closest('.control-group').hide();
	}
}

// the vvvvwah Some function
function how_vvvvwah_SomeFunc(how_vvvvwah)
{
	// set the function logic
	if (how_vvvvwah == 0)
	{
		return true;
	}
	return false;
}

// the vvvvwai function
function vvvvwai(how_vvvvwai)
{
	if (isSet(how_vvvvwai) && how_vvvvwai.constructor !== Array)
	{
		var temp_vvvvwai = how_vvvvwai;
		var how_vvvvwai = [];
		how_vvvvwai.push(temp_vvvvwai);
	}
	else if (!isSet(how_vvvvwai))
	{
		var how_vvvvwai = [];
	}
	var how = how_vvvvwai.some(how_vvvvwai_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('.note_yes_behaviour_one').closest('.control-group').show();
		jQuery('.note_yes_behaviour_two').closest('.control-group').show();
	}
	else
	{
		jQuery('.note_yes_behaviour_one').closest('.control-group').hide();
		jQuery('.note_yes_behaviour_two').closest('.control-group').hide();
	}
}

// the vvvvwai Some function
function how_vvvvwai_SomeFunc(how_vvvvwai)
{
	// set the function logic
	if (how_vvvvwai == 1)
	{
		return true;
	}
	return false;
}

// the vvvvwaj function
function vvvvwaj(how_vvvvwaj)
{
	if (isSet(how_vvvvwaj) && how_vvvvwaj.constructor !== Array)
	{
		var temp_vvvvwaj = how_vvvvwaj;
		var how_vvvvwaj = [];
		how_vvvvwaj.push(temp_vvvvwaj);
	}
	else if (!isSet(how_vvvvwaj))
	{
		var how_vvvvwaj = [];
	}
	var how = how_vvvvwaj.some(how_vvvvwaj_SomeFunc);


	// set this function logic
	if (how)
	{
		jQuery('.note_build_in_behaviour_one').closest('.control-group').show();
		jQuery('.note_build_in_behaviour_three').closest('.control-group').show();
		jQuery('.note_build_in_behaviour_two').closest('.control-group').show();
	}
	else
	{
		jQuery('.note_build_in_behaviour_one').closest('.control-group').hide();
		jQuery('.note_build_in_behaviour_three').closest('.control-group').hide();
		jQuery('.note_build_in_behaviour_two').closest('.control-group').hide();
	}
}

// the vvvvwaj Some function
function how_vvvvwaj_SomeFunc(how_vvvvwaj)
{
	// set the function logic
	if (how_vvvvwaj == 4)
	{
		return true;
	}
	return false;
}

// the vvvvwak function
function vvvvwak(type_vvvvwak)
{
	// set the function logic
	if (type_vvvvwak == 2)
	{
		jQuery('#jform_libraries').closest('.control-group').show();
		if (jform_vvvvwakvzt_required)
		{
			updateFieldRequired('libraries',0);
			jQuery('#jform_libraries').prop('required','required');
			jQuery('#jform_libraries').attr('aria-required',true);
			jQuery('#jform_libraries').addClass('required');
			jform_vvvvwakvzt_required = false;
		}

	}
	else
	{
		jQuery('#jform_libraries').closest('.control-group').hide();
		if (!jform_vvvvwakvzt_required)
		{
			updateFieldRequired('libraries',1);
			jQuery('#jform_libraries').removeAttr('required');
			jQuery('#jform_libraries').removeAttr('aria-required');
			jQuery('#jform_libraries').removeClass('required');
			jform_vvvvwakvzt_required = true;
		}
	}
}

// update required fields
function updateFieldRequired(name,status)
{
	var not_required = jQuery('#jform_not_required').val();

	if(status == 1)
	{
		if (isSet(not_required) && not_required != 0)
		{
			not_required = not_required+','+name;
		}
		else
		{
			not_required = ','+name;
		}
	}
	else
	{
		if (isSet(not_required) && not_required != 0)
		{
			not_required = not_required.replace(','+name,'');
		}
	}

	jQuery('#jform_not_required').val(not_required);
}

// the isSet function
function isSet(val)
{
	if ((val != undefined) && (val != null) && 0 !== val.length){
		return true;
	}
	return false;
}


jQuery(document).ready(function()
{
	// get the linked details
	getLinked();
	// now load the displays
	getAjaxDisplay('library_config');
	getAjaxDisplay('library_files_folders_urls');
});

function addData(result,where){
	jQuery(result).insertAfter(jQuery(where).closest('.control-group'));
}

function addButtonID_server(type, size){
	var getUrl = JRouter("index.php?option=com_componentbuilder&task=ajax.getButtonID&format=json&vdm="+vastDevMod);
	if(token.length > 0 && type.length > 0 && size > 0){
		var request = 'token='+token+'&type='+type+'&size='+size;
	}
	return jQuery.ajax({
		type: 'GET',
		url: getUrl,
		dataType: 'jsonp',
		data: request,
		jsonp: 'callback'
	});
}
function addButtonID(type, where, size){
	addButtonID_server(type, size).done(function(result) {
		if(result){
			if (2 == size) {
				jQuery('#'+where).html(result);
			} else {
				addData(result, '#jform_'+where);
			}
		}
	});
}

function addButton_server(type, size){
	var getUrl = JRouter("index.php?option=com_componentbuilder&task=ajax.getButton&format=json&vdm="+vastDevMod);
	if(token.length > 0 && type.length > 0){
		var request = 'token='+token+'&type='+type+'&size='+size;
	}
	return jQuery.ajax({
		type: 'GET',
		url: getUrl,
		dataType: 'jsonp',
		data: request,
		jsonp: 'callback'
	});
}
function addButton(type, where, size){
	// just to insure that default behaviour still works
	size = typeof size !== 'undefined' ? size : 1;
	addButton_server(type, size).done(function(result) {
		if(result){
			if (2 == size) {
				jQuery('#'+where).html(result);
			} else {
				addData(result, '#jform_'+where);
			}
		}
	})
}

function getLinked_server(type){
	var getUrl = "index.php?option=com_componentbuilder&task=ajax.getLinked&format=json&vdm="+vastDevMod;
	if(token.length > 0 && type > 0){
		var request = 'token='+token+'&type='+type;
	}
	return jQuery.ajax({
		type: 'GET',
		url: getUrl,
		dataType: 'jsonp',
		data: request,
		jsonp: 'callback'
	});
}

function getLinked(){
	getLinked_server(1).done(function(result) {
		if(result){
			jQuery('#display_linked_to').html(result);
		}
	});
}

function getAjaxDisplay(type){
	getAjaxDisplay_server(type).done(function(result) {
		if (result) {
			jQuery('#display_'+type).html(result);
		}
		// set button
		addButtonID(type,'header_'+type+'_buttons', 2); // <-- little edit button
	});
}

function getAjaxDisplay_server(type){
	var getUrl = "index.php?option=com_componentbuilder&task=ajax.getAjaxDisplay&format=json&vdm="+vastDevMod;
	if (token.length > 0 && type.length > 0) {
		var request = 'token='+token+'&type=' + type;
	}
	return jQuery.ajax({
		type: 'GET',
		url: getUrl,
		dataType: 'jsonp',
		data: request,
		jsonp: 'callback'
	});
}

function getFieldSelectOptions_server(fieldId){
	var getUrl = "index.php?option=com_componentbuilder&task=ajax.fieldSelectOptions&format=json";
	if (token.length > 0 && fieldId > 0) {
		var request = 'token='+token+'&id='+fieldId;
	}
	return jQuery.ajax({
		type: 'GET',
		url: getUrl,
		dataType: 'jsonp',
		data: request,
		jsonp: 'callback'
	});
}

function getFieldSelectOptions(fieldKey){
	// first check if the field is set
	if(jQuery("#jform_addconditions__addconditions"+fieldKey+"__option_field").length) {
		var fieldId = jQuery("#jform_addconditions__addconditions"+fieldKey+"__option_field option:selected").val();
		getFieldSelectOptions_server(fieldId).done(function(result) {
			if(result) {
				jQuery('textarea#jform_addconditions__addconditions'+fieldKey+'__field_options').val(result);
			} else {
				jQuery('textarea#jform_addconditions__addconditions'+fieldKey+'__field_options').val('');
			}
		});
	}
} 

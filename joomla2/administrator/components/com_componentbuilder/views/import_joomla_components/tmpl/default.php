<?php
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
	@subpackage		default.php
	@author			Llewellyn van der Merwe <http://joomlacomponentbuilder.com>	
	@github			Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html 
	
	Builds Complex Joomla Components 
                                                             
/-----------------------------------------------------------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');
JHtml::_('script', 'system/core.js', false, true);
JHtml::_('behavior.keepalive');
?>
<script type="text/javascript">
<?php if ($this->hasPackage && $this->dataType === 'smart_package'): ?>
	Joomla.continueExtImport = function()
	{
		var form = document.getElementById('adminForm');
		jQuery('#loading').css('display', 'block');
		form.gettype.value = 'continue-ext';
		form.submit();
	};
	Joomla.cancelImport = function()
	{
		var form = document.getElementById('adminForm');
		jQuery('#loading').css('display', 'block');
		form.gettype.value = 'cancel-ext';
		form.submit();
	};
<?php else: ?>
	Joomla.submitbutton = function()
	{
		var form = document.getElementById('adminForm');
		// do field validation
		if (form.import_package.value == "")
		{
			alert("<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_MSG_PLEASE_SELECT_A_FILE', true); ?>");
		}
		else
		{
			jQuery('#loading').css('display', 'block');
			form.gettype.value = 'upload';
			form.submit();
		}
	};
	Joomla.submitbuttonDir = function()
	{
		var form = document.getElementById('adminForm');
		// do field validation
		if (form.import_directory.value == ""){
			alert("<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_MSG_PLEASE_SELECT_A_DIRECTORY', true); ?>");
		}
		else
		{
			jQuery('#loading').css('display', 'block');
			form.gettype.value = 'folder';
			form.submit();
		}
	};
	Joomla.submitbuttonUrl = function()
	{
		var form = document.getElementById('adminForm');
		// do field validation
		if (form.import_url.value == "" || form.import_url.value == "http://")
		{
			alert("<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_MSG_ENTER_A_URL', true); ?>");
		}
		else
		{
			jQuery('#loading').css('display', 'block');
			form.gettype.value = 'url';
			form.submit();
		}
	};
	Joomla.submitbuttonVDM = function()
	{
		var form = document.getElementById('adminForm');
		// do field validation
		if (form.vdm_package.value == "" || form.vdm_package.value == "http://")
		{
			alert("<?php echo JText::_('COM_COMPONENTBUILDER_SELECT_THE_COMPONENT_YOUR_WOULD_LIKE_TO_IMPORT', true); ?>");
		}
		else
		{
			// set the url
			form.import_url.value = form.vdm_package.value;
			jQuery('#loading').css('display', 'block');
			form.checksum.value = 'vdm';
			form.gettype.value = 'url';
			form.submit();
		}
	};
<?php endif; ?>


// Add spindle-wheel for importations:
jQuery(document).ready(function($) {
	var outerDiv = $('body');


	$('<div id="loading"></div>')
		.css("background", "rgba(255, 255, 255, .8) url('components/com_componentbuilder/assets/images/import.gif') 50% 15% no-repeat")
		.css("top", outerDiv.position().top - $(window).scrollTop())
		.css("left", outerDiv.position().left - $(window).scrollLeft())
		.css("width", outerDiv.width())
		.css("height", outerDiv.height())
		.css("position", "fixed")
		.css("opacity", "0.80")
		.css("-ms-filter", "progid:DXImageTransform.Microsoft.Alpha(Opacity = 80)")
		.css("filter", "alpha(opacity = 80)")
		.css("display", "none")
		.appendTo(outerDiv);
});
</script>

<?php $formats = ($this->dataType === 'smart_package') ? '.zip' : 'none'; ?>

<div id="installer-import" class="clearfix">
<form enctype="multipart/form-data" action="<?php echo JRoute::_('index.php?option=com_componentbuilder&view=import_joomla_components');?>" method="post" name="adminForm" id="adminForm" class="form-horizontal form-validate">

	<?php if (!empty( $this->sidebar)) : ?>
		<div id="j-sidebar-container" class="span2">
			<?php echo $this->sidebar; ?>
		</div>
		<div id="j-main-container" class="span10">
	<?php else : ?>
		<div id="j-main-container">
	<?php endif;?>
	<?php if ($this->hasPackage && $this->dataType === 'smart_package') : ?>
		<?php
			if (isset($this->packageInfo['name']) && ComponentbuilderHelper::checkArray($this->packageInfo['name'])) 
			{
				$cAmount = count($this->packageInfo['name']);
				$comP = ($cAmount == 1) ? 'Component' : 'Components';
			}
			else
			{
				$cAmount = 1;
				$comP = 'Component';
			}
			$hasOwner = (isset($this->packageInfo['getKeyFrom']) && ComponentbuilderHelper::checkArray($this->packageInfo['getKeyFrom'])) ? true:false;
			$class1 = ($hasOwner) ? 'span6' : 'span12';
		?>
		<h3 style="color: #1F73BA;"><?php echo JText::_('COM_COMPONENTBUILDER_CONFIRMATION_STEP_BEFORE_IMPORTING'); ?></h3>
		<p style="color: #1F73BA;"><?php echo JText::_('COM_COMPONENTBUILDER_YOU_SHOULD_ONLY_CONTINUE_THIS_IMPORT_IF_YOU_HAVE_BACKUP_YOUR_COMPONENTS_AND_INSURED_THAT_THE_PACKAGE_OWNER_IS_REPUTABLE'); ?></p>
		<?php echo JHtml::_('bootstrap.startTabSet', 'jcbImportTab', array('active' => 'advanced')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'advanced', JText::sprintf('COM_COMPONENTBUILDER_IMPORT_S', $comP)); ?>
		<div class="<?php echo $class1; ?>">
		<fieldset class="uploadform">
			<legend><?php echo JText::_('COM_COMPONENTBUILDER_SMART_PACKAGE_OPTIONS'); ?></legend>
				<?php if ($this->formPackage): ?>
					<?php foreach ($this->formPackage as $field): ?>
					<div class="control-group">
						<div class="control-label"><?php echo $field->label;?></div>
						<div class="controls"><?php echo $field->input;?></div>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
			<div class="form-actions">
				<div class="btn-group">
					<input class="btn btn-primary" type="button" value="<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_CONTINUE'); ?>" onclick="Joomla.continueExtImport()" />
					<input class="btn" type="button" value="<?php echo JText::_('COM_COMPONENTBUILDER_CANCEL'); ?>" onclick="Joomla.cancelImport()" />
				</div>
			</div>
		</fieldset>
		<?php if (!$hasOwner): ?>
			<p style="color: #922924;"><?php echo JText::_('COM_COMPONENTBUILDER_BE_CAUTIOUS_DO_NOT_CONTINUE_UNLESS_YOU_TRUST_THE_ORIGIN_OF_THIS_PACKAGE'); ?></p>
		<?php endif; ?>
		</div>
		<?php if ($hasOwner): ?>
		<div class="well span6">
			<?php 
				$ownerDetails = '<h2 class="module-title nav-header">' . JText::_('COM_COMPONENTBUILDER_PACKAGE_OWNER_DETAILS') . '</h2>';
				$ownerDetails .= '<ul>';
				if (isset($this->packageInfo['getKeyFrom']['company']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['company']))
				{
					$owner = $this->packageInfo['getKeyFrom']['company'];
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMCOMPANYEM_BSB', $this->packageInfo['getKeyFrom']['company']) . '</li>';
				}
				// add value only if set
				if (isset($this->packageInfo['getKeyFrom']['owner']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['owner']))
				{
					if (!isset($owner))
					{
						$owner = $this->packageInfo['getKeyFrom']['owner'];
					}
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMOWNEREM_BSB', $this->packageInfo['getKeyFrom']['owner']) . '</li>';
				}
				// add value only if set
				if (isset($this->packageInfo['getKeyFrom']['website']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['website']))
				{
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMWEBSITEEM_BSB', $this->packageInfo['getKeyFrom']['website']) . '</li>';
				}
				// add value only if set
				if (isset($this->packageInfo['getKeyFrom']['email']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['email']))
				{
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMEMAILEM_BSB', $this->packageInfo['getKeyFrom']['email']) . '</li>';
				}
				// add value only if set
				if (isset($this->packageInfo['getKeyFrom']['license']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['license']))
				{
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMLICENSEEM_BSB', $this->packageInfo['getKeyFrom']['license']) . '</li>';
				}
				// add value only if set
				if (isset($this->packageInfo['getKeyFrom']['copyright']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['copyright']))
				{
					$ownerDetails .= '<li>' . JText::sprintf('COM_COMPONENTBUILDER_EMCOPYRIGHTEM_BSB', $this->packageInfo['getKeyFrom']['copyright']) . '</li>';
				}							
				$ownerDetails .= '</ul>';

				// provide some details to how the user can get a key
				if (isset($this->packageInfo['getKeyFrom']['buy_link']) && componentbuilderHelper::checkString($this->packageInfo['getKeyFrom']['buy_link']))
				{
					$ownerDetails .= '<hr />';
					$ownerDetails .= JText::sprintf('COM_COMPONENTBUILDER_BGET_THE_KEY_FROMB_A_CLASSBTN_BTNPRIMARY_HREFS_TARGET_BLANK_TITLEGET_A_KEY_FROM_SSA', $this->packageInfo['getKeyFrom']['buy_link'], $owner, $owner);
				}
				// add more custom links
				elseif (isset($this->packageInfo['getKeyFrom']['buy_links']) && componentbuilderHelper::checkArray($this->packageInfo['getKeyFrom']['buy_links']))
				{
					$buttons = array();
					foreach ($this->packageInfo['getKeyFrom']['buy_links'] as $keyName => $link)
					{
						$buttons[] = JText::sprintf('COM_COMPONENTBUILDER_GET_THE_KEY_FROM_BSB_FOR_A_CLASSBTN_BTNPRIMARY_HREFS_TARGET_BLANK_TITLEGET_A_KEY_FROM_SSA', $owner, $link, $owner, $keyName);
					}
					$ownerDetails .= '<hr />';
					$ownerDetails .= implode('<br />', $buttons);
				}

				// return the owner details
				if (!isset($owner))
				{
					$ownerDetails = '<h2 style="color: #922924;">' . JText::_('COM_COMPONENTBUILDER_PACKAGE_OWNER_DETAILS_NOT_FOUND') . '</h2>';
					$ownerDetails .= '<p style="color: #922924;">' . JText::_('COM_COMPONENTBUILDER_BE_CAUTIOUS_DO_NOT_CONTINUE_UNLESS_YOU_TRUST_THE_ORIGIN_OF_THIS_PACKAGE') . '</p>';
				}
				echo $ownerDetails;
			?>
		</div>
		<?php endif; ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php if (isset($this->packageInfo['name']) && ComponentbuilderHelper::checkArray($this->packageInfo['name'])) : ?>
		<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'info', JText::sprintf('COM_COMPONENTBUILDER_S_BEING_IMPORTED', $comP)); ?>
			<?php $class2 = ($cAmount == 1) ? 'span12' : 'span6'; ?>
			<?php $counter = 1; foreach ($this->packageInfo['name'] as $key => $value): ?>
				<?php if ($cAmount > 1 && $counter == 3) { echo '</div>'; $counter = 1;} ?>
				<?php if ($cAmount > 1 && $counter == 1) { echo '<div>'; } ?>
				<div class="well well-small <?php echo $class2; ?>">
					<h2 class="module-title nav-header"><?php echo JText::sprintf('COM_COMPONENTBUILDER_BSB_EMCOMPONENT_DETAILSEM', $value . ' v' . $this->packageInfo['component_version'][$key]); ?></h2>
					<p><?php echo $this->packageInfo['short_description'][$key]; ?></p>
					<ul>
						<li><?php echo JText::sprintf('COM_COMPONENTBUILDER_EMCOMPANY_NAMEEM_BSB', $this->packageInfo['companyname'][$key]); ?></li>
						<li><?php echo JText::sprintf('COM_COMPONENTBUILDER_EMAUTHOREM_BSB', $this->packageInfo['author'][$key]); ?></li>
						<li><?php echo JText::sprintf('COM_COMPONENTBUILDER_EMEMAILEM_BSB', $this->packageInfo['email'][$key]); ?></li>
						<li><?php echo JText::sprintf('COM_COMPONENTBUILDER_EMWEBSITEEM_BSB', $this->packageInfo['website'][$key]); ?></li>
					</ul>
					<h2 class="nav-header"><?php echo JText::_('COM_COMPONENTBUILDER_LICENSE'); ?></h2>
					<p><?php echo $this->packageInfo['license'][$key]; ?></p>
					<h2  class="nav-header"><?php echo JText::_('COM_COMPONENTBUILDER_COPYRIGHT'); ?></h2>
					<p><?php echo $this->packageInfo['copyright'][$key]; ?></p>
				</div>
				<?php $counter++; ?>
			<?php endforeach; ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
		<input type="hidden" name="gettype" value="continue" />
	<?php else: ?>
		<?php if ($this->dataType === 'smart_package'): ?>
			<h1 style="color: #922924;"><?php echo JText::_('COM_COMPONENTBUILDER_BACKUP_LOCAL_DATA_FIRST'); ?></h1>
			<p style="color: #922924;"><?php echo JText::_('COM_COMPONENTBUILDER_ALWAYS_INSURE_THAT_YOU_HAVE_YOUR_LOCAL_COMPONENTS_BACKED_UP_BY_MAKING_AN_EXPORT_OF_ALL_YOUR_LOCAL_COMPONENTS_BEFORE_IMPORTING_ANY_NEW_COMPONENTS_SMALLMAKE_BSUREB_TO_MOVE_THIS_ZIPPED_BACKUP_PACKAGE_OUT_OF_THE_TMP_FOLDER_BEFORE_DOING_AN_IMPORTSMALLBR_IF_YOU_ARE_IMPORTING_A_PACKAGE_OF_A_THREERD_PARTY_JCB_PACKAGE_DEVELOPER_BMAKE_SURE_IT_IS_A_REPUTABLE_JCB_PACKAGE_DEVELOPERSB'); ?></p>
		<?php endif; ?>
		<?php echo JHtml::_('bootstrap.startTabSet', 'jcbImportTab', array('active' => 'upload')); ?>
		
		<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'upload', JText::_('COM_COMPONENTBUILDER_IMPORT_FROM_UPLOAD', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_package" class="control-label"><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_SELECT_FILE'); ?></label>
					<div class="controls">
						<input class="input_box" id="import_package" name="import_package" type="file" size="57" />
					</div>
				</div>
				<div class="form-actions">
					<input class="btn btn-primary" type="button" value="<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_UPLOAD_BOTTON'); ?>" onclick="Joomla.submitbutton()" />&nbsp;&nbsp;&nbsp;<small><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_FORMATS_ACCEPTED'); ?> (<?php echo $formats; ?>)</small>
				</div>
			</fieldset>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
		<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'directory', JText::_('COM_COMPONENTBUILDER_IMPORT_FROM_DIRECTORY', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_directory" class="control-label"><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_SELECT_FILE_DIRECTORY'); ?></label>
					<div class="controls">
						<input type="text" id="import_directory" name="import_directory" class="span5 input_box" size="70" value="<?php echo $this->state->get('import.directory'); ?>" />
					</div>
				</div>
				<div class="form-actions">
					<input type="button" class="btn btn-primary" value="<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_GET_BOTTON'); ?>" onclick="Joomla.submitbuttonDir()" />&nbsp;&nbsp;&nbsp;<small><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_FORMATS_ACCEPTED'); ?> (<?php echo $formats; ?>)</small>
				</div>
				</fieldset>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'url', JText::_('COM_COMPONENTBUILDER_IMPORT_FROM_URL', true)); ?>
			<fieldset class="uploadform">
				<legend><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_UPDATE_DATA'); ?></legend>
				<div class="control-group">
					<label for="import_url" class="control-label"><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_SELECT_FILE_URL'); ?></label>
					<div class="controls">
						<input type="text" id="import_url" name="import_url" class="span5 input_box" size="70" value="http://" />
					</div>
				</div>
				<div class="form-actions">
					<input type="button" class="btn btn-primary" value="<?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_GET_BOTTON'); ?>" onclick="Joomla.submitbuttonUrl()" />&nbsp;&nbsp;&nbsp;<small><?php echo JText::_('COM_COMPONENTBUILDER_IMPORT_FORMATS_ACCEPTED'); ?> (<?php echo $formats; ?>)</small>
				</div>
			</fieldset>
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php if ($this->vdmPackages): ?>
			<?php echo JHtml::_('bootstrap.addTab', 'jcbImportTab', 'url_vdm', JText::_('COM_COMPONENTBUILDER_VDM_PACKAGES', true)); ?>
				<fieldset class="uploadform">
					<legend><?php echo JText::_("COM_COMPONENTBUILDER_PACKAGES_FROM_VAST_DEVELOPMENT_METHOD"); ?></legend>
					<div class="alert alert-success">
						<p><?php echo JText::sprintf('COM_COMPONENTBUILDER_ALL_OF_THESE_PACKAGES_ARE_A_FULLY_DEVELOPEDMAPPED_COMPONENTS_FOR_JCB_THEY_CAN_BE_SEEN_AS_DEMO_CONTENT_OR_BASE_IMAGES_FROM_WHICH_TO_START_YOUR_PROJECTBR_ALWAYS_MAKE_SURE_YOU_ARE_ON_THE_LATEST_VERSION_OF_JCB_BEFORE_IMPORTING_ANY_OF_THESE_PACKAGES_SHOULD_ANY_OF_THEM_FAIL_TO_IMPORT_A_S_PLEASE_LET_US_KNOWA', 'href="https://www.vdm.io/support" target="_blank" title="Should any of these packages fail to import please let us know, some need a key of course."'); ?></p>
						<p><?php echo JText::sprintf('COM_COMPONENTBUILDER_THESE_ARE_THE_SAME_PACKAGES_FOUND_ON_A_S_GITHUBA_AND_CAN_BE_IMPORTED_BY_SIMPLY_MAKING_A_SELECTION_AND_THEN_CLICKING_THE_GET_PACKAGE_BUTTONBR_SOME_OF_THESE_PACKAGES_WOULD_REQUIRE_A_KEY_SINCE_THEY_ARE_NOT_FREE_A_S_GET_A_KEY_TODAYA', 'href="https://github.com/vdm-io/JCB-Packages" target="_blank" title="gitHub Reposetory"', 'href="http://vdm.bz/jcb-packages" target="_blank" title="get a key to import the paid packages."'); ?></p>
					</div>
					<?php foreach ($this->vdmPackages as $field): ?>
					<div class="control-group">
						<div class="control-label"><?php echo $field->label;?></div>
						<div class="controls"><?php echo $field->input;?></div>
					</div>
					<?php endforeach; ?>
					<div class="form-actions">
						<input type="button" class="btn btn-primary" value="<?php echo JText::_('COM_COMPONENTBUILDER_GET_PACKAGE'); ?>" onclick="Joomla.submitbuttonVDM()" />&nbsp;&nbsp;&nbsp;<small><span class="icon-shield"> </span><?php echo JText::_('COM_COMPONENTBUILDER_OFFICIAL_VDM_PACKAGES'); ?></small>
					</div>
					<div class="control-group"><small><?php echo JText::sprintf('COM_COMPONENTBUILDER_A_S_SPAN_CLASSICONFLAG_SPANREPORT_BROKEN_PACKAGEA', 'href="https://www.vdm.io/support" target="_blank" title="Should any of these packages fail to import please let us know"'); ?></small></div>
				</fieldset>
			<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
		<input type="hidden" name="gettype" value="upload" />
		<input type="hidden" name="checksum" value="0" />
	<?php endif; ?>
	<input type="hidden" name="task" value="import_joomla_components.import" />
	<?php echo JHtml::_('form.token'); ?>
</form>
</div>
<script type="text/javascript">
jQuery('#adminForm').on('change', '#haskey',function (e)
{
	e.preventDefault();
	var haskey = jQuery("#haskey input[type='radio']:checked").val();
	if (haskey == 1) {
		jQuery("#sleutle").closest('.control-group').show();
	} else {
		jQuery("#sleutle").closest('.control-group').hide();
	}
});
</script>

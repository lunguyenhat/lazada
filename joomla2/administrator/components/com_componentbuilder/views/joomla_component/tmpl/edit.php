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
	@subpackage		edit.php
	@author			Llewellyn van der Merwe <http://joomlacomponentbuilder.com>	
	@github			Joomla Component Builder <https://github.com/vdm-io/Joomla-Component-Builder>
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html 
	
	Builds Complex Joomla Components 
                                                             
/-----------------------------------------------------------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$componentParams = JComponentHelper::getParams('com_componentbuilder');
?>
<script type="text/javascript">
	// waiting spinner
	var outerDiv = jQuery('body');
	jQuery('<div id="loading"></div>')
		.css("background", "rgba(255, 255, 255, .8) url('components/com_componentbuilder/assets/images/import.gif') 50% 15% no-repeat")
		.css("top", outerDiv.position().top - jQuery(window).scrollTop())
		.css("left", outerDiv.position().left - jQuery(window).scrollLeft())
		.css("width", outerDiv.width())
		.css("height", outerDiv.height())
		.css("position", "fixed")
		.css("opacity", "0.80")
		.css("-ms-filter", "progid:DXImageTransform.Microsoft.Alpha(Opacity = 80)")
		.css("filter", "alpha(opacity = 80)")
		.css("display", "none")
		.appendTo(outerDiv);
	jQuery('#loading').show();
	// when page is ready remove and show
	jQuery(window).load(function() {
		jQuery('#componentbuilder_loader').fadeIn('fast');
		jQuery('#loading').hide();
	});
</script>
<div id="componentbuilder_loader" style="display: none;">
<form action="<?php echo JRoute::_('index.php?option=com_componentbuilder&layout=edit&id='.(int) $this->item->id.$this->referral); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">

	<?php echo JLayoutHelper::render('joomla_component.details_above', $this); ?>
<div class="form-horizontal">

	<?php echo JHtml::_('bootstrap.startTabSet', 'joomla_componentTab', array('active' => 'details')); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'details', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_DETAILS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.details_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.details_right', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'settings', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_SETTINGS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.settings_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.settings_right', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.settings_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'admin_views', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_ADMIN_VIEWS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.admin_views_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'site_views', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_SITE_VIEWS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.site_views_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'custom_admin_views', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_CUSTOM_ADMIN_VIEWS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.custom_admin_views_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'libs_helpers', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_LIBS_HELPERS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.libs_helpers_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'dash_install', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_DASH_INSTALL', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.dash_install_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.dash_install_right', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.dash_install_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'mysql', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_MYSQL', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.mysql_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'readme', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_README', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.readme_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.readme_right', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'dynamic_integration', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_DYNAMIC_INTEGRATION', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.dynamic_integration_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'dynamic_build_beta', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_DYNAMIC_BUILD_BETA', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('joomla_component.dynamic_build_beta_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php if ($this->canDo->get('joomla_component.delete') || $this->canDo->get('joomla_component.edit.created_by') || $this->canDo->get('joomla_component.edit.state') || $this->canDo->get('joomla_component.edit.created')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'publishing', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.publishing', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla_component.metadata', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php if ($this->canDo->get('core.admin')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'joomla_componentTab', 'permissions', JText::_('COM_COMPONENTBUILDER_JOOMLA_COMPONENT_PERMISSION', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<fieldset class="adminform">
					<div class="adminformlist">
					<?php foreach ($this->form->getFieldset('accesscontrol') as $field): ?>
						<div>
							<?php echo $field->label; echo $field->input;?>
						</div>
						<div class="clearfix"></div>
					<?php endforeach; ?>
					</div>
				</fieldset>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<div>
		<input type="hidden" name="task" value="joomla_component.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</div>
</div>

<div class="clearfix"></div>
<?php echo JLayoutHelper::render('joomla_component.details_under', $this); ?>
</form>
</div>

<script type="text/javascript">

// #jform_add_php_helper_admin listeners for add_php_helper_admin_vvvvvvv function
jQuery('#jform_add_php_helper_admin').on('keyup',function()
{
	var add_php_helper_admin_vvvvvvv = jQuery("#jform_add_php_helper_admin input[type='radio']:checked").val();
	vvvvvvv(add_php_helper_admin_vvvvvvv);

});
jQuery('#adminForm').on('change', '#jform_add_php_helper_admin',function (e)
{
	e.preventDefault();
	var add_php_helper_admin_vvvvvvv = jQuery("#jform_add_php_helper_admin input[type='radio']:checked").val();
	vvvvvvv(add_php_helper_admin_vvvvvvv);

});

// #jform_add_php_helper_site listeners for add_php_helper_site_vvvvvvw function
jQuery('#jform_add_php_helper_site').on('keyup',function()
{
	var add_php_helper_site_vvvvvvw = jQuery("#jform_add_php_helper_site input[type='radio']:checked").val();
	vvvvvvw(add_php_helper_site_vvvvvvw);

});
jQuery('#adminForm').on('change', '#jform_add_php_helper_site',function (e)
{
	e.preventDefault();
	var add_php_helper_site_vvvvvvw = jQuery("#jform_add_php_helper_site input[type='radio']:checked").val();
	vvvvvvw(add_php_helper_site_vvvvvvw);

});

// #jform_add_php_helper_both listeners for add_php_helper_both_vvvvvvx function
jQuery('#jform_add_php_helper_both').on('keyup',function()
{
	var add_php_helper_both_vvvvvvx = jQuery("#jform_add_php_helper_both input[type='radio']:checked").val();
	vvvvvvx(add_php_helper_both_vvvvvvx);

});
jQuery('#adminForm').on('change', '#jform_add_php_helper_both',function (e)
{
	e.preventDefault();
	var add_php_helper_both_vvvvvvx = jQuery("#jform_add_php_helper_both input[type='radio']:checked").val();
	vvvvvvx(add_php_helper_both_vvvvvvx);

});

// #jform_add_css_admin listeners for add_css_admin_vvvvvvy function
jQuery('#jform_add_css_admin').on('keyup',function()
{
	var add_css_admin_vvvvvvy = jQuery("#jform_add_css_admin input[type='radio']:checked").val();
	vvvvvvy(add_css_admin_vvvvvvy);

});
jQuery('#adminForm').on('change', '#jform_add_css_admin',function (e)
{
	e.preventDefault();
	var add_css_admin_vvvvvvy = jQuery("#jform_add_css_admin input[type='radio']:checked").val();
	vvvvvvy(add_css_admin_vvvvvvy);

});

// #jform_add_css_site listeners for add_css_site_vvvvvvz function
jQuery('#jform_add_css_site').on('keyup',function()
{
	var add_css_site_vvvvvvz = jQuery("#jform_add_css_site input[type='radio']:checked").val();
	vvvvvvz(add_css_site_vvvvvvz);

});
jQuery('#adminForm').on('change', '#jform_add_css_site',function (e)
{
	e.preventDefault();
	var add_css_site_vvvvvvz = jQuery("#jform_add_css_site input[type='radio']:checked").val();
	vvvvvvz(add_css_site_vvvvvvz);

});

// #jform_add_javascript listeners for add_javascript_vvvvvwa function
jQuery('#jform_add_javascript').on('keyup',function()
{
	var add_javascript_vvvvvwa = jQuery("#jform_add_javascript input[type='radio']:checked").val();
	vvvvvwa(add_javascript_vvvvvwa);

});
jQuery('#adminForm').on('change', '#jform_add_javascript',function (e)
{
	e.preventDefault();
	var add_javascript_vvvvvwa = jQuery("#jform_add_javascript input[type='radio']:checked").val();
	vvvvvwa(add_javascript_vvvvvwa);

});

// #jform_add_sql listeners for add_sql_vvvvvwb function
jQuery('#jform_add_sql').on('keyup',function()
{
	var add_sql_vvvvvwb = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvwb(add_sql_vvvvvwb);

});
jQuery('#adminForm').on('change', '#jform_add_sql',function (e)
{
	e.preventDefault();
	var add_sql_vvvvvwb = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvwb(add_sql_vvvvvwb);

});

// #jform_emptycontributors listeners for emptycontributors_vvvvvwc function
jQuery('#jform_emptycontributors').on('keyup',function()
{
	var emptycontributors_vvvvvwc = jQuery("#jform_emptycontributors input[type='radio']:checked").val();
	vvvvvwc(emptycontributors_vvvvvwc);

});
jQuery('#adminForm').on('change', '#jform_emptycontributors',function (e)
{
	e.preventDefault();
	var emptycontributors_vvvvvwc = jQuery("#jform_emptycontributors input[type='radio']:checked").val();
	vvvvvwc(emptycontributors_vvvvvwc);

});

// #jform_add_license listeners for add_license_vvvvvwd function
jQuery('#jform_add_license').on('keyup',function()
{
	var add_license_vvvvvwd = jQuery("#jform_add_license input[type='radio']:checked").val();
	vvvvvwd(add_license_vvvvvwd);

});
jQuery('#adminForm').on('change', '#jform_add_license',function (e)
{
	e.preventDefault();
	var add_license_vvvvvwd = jQuery("#jform_add_license input[type='radio']:checked").val();
	vvvvvwd(add_license_vvvvvwd);

});

// #jform_add_admin_event listeners for add_admin_event_vvvvvwe function
jQuery('#jform_add_admin_event').on('keyup',function()
{
	var add_admin_event_vvvvvwe = jQuery("#jform_add_admin_event input[type='radio']:checked").val();
	vvvvvwe(add_admin_event_vvvvvwe);

});
jQuery('#adminForm').on('change', '#jform_add_admin_event',function (e)
{
	e.preventDefault();
	var add_admin_event_vvvvvwe = jQuery("#jform_add_admin_event input[type='radio']:checked").val();
	vvvvvwe(add_admin_event_vvvvvwe);

});

// #jform_add_site_event listeners for add_site_event_vvvvvwf function
jQuery('#jform_add_site_event').on('keyup',function()
{
	var add_site_event_vvvvvwf = jQuery("#jform_add_site_event input[type='radio']:checked").val();
	vvvvvwf(add_site_event_vvvvvwf);

});
jQuery('#adminForm').on('change', '#jform_add_site_event',function (e)
{
	e.preventDefault();
	var add_site_event_vvvvvwf = jQuery("#jform_add_site_event input[type='radio']:checked").val();
	vvvvvwf(add_site_event_vvvvvwf);

});

// #jform_addreadme listeners for addreadme_vvvvvwg function
jQuery('#jform_addreadme').on('keyup',function()
{
	var addreadme_vvvvvwg = jQuery("#jform_addreadme input[type='radio']:checked").val();
	vvvvvwg(addreadme_vvvvvwg);

});
jQuery('#adminForm').on('change', '#jform_addreadme',function (e)
{
	e.preventDefault();
	var addreadme_vvvvvwg = jQuery("#jform_addreadme input[type='radio']:checked").val();
	vvvvvwg(addreadme_vvvvvwg);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwh function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var add_update_server_vvvvvwh = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwh(add_update_server_vvvvvwh);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var add_update_server_vvvvvwh = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwh(add_update_server_vvvvvwh);

});

// #jform_add_sales_server listeners for add_sales_server_vvvvvwi function
jQuery('#jform_add_sales_server').on('keyup',function()
{
	var add_sales_server_vvvvvwi = jQuery("#jform_add_sales_server input[type='radio']:checked").val();
	vvvvvwi(add_sales_server_vvvvvwi);

});
jQuery('#adminForm').on('change', '#jform_add_sales_server',function (e)
{
	e.preventDefault();
	var add_sales_server_vvvvvwi = jQuery("#jform_add_sales_server input[type='radio']:checked").val();
	vvvvvwi(add_sales_server_vvvvvwi);

});

// #jform_add_license listeners for add_license_vvvvvwj function
jQuery('#jform_add_license').on('keyup',function()
{
	var add_license_vvvvvwj = jQuery("#jform_add_license input[type='radio']:checked").val();
	vvvvvwj(add_license_vvvvvwj);

});
jQuery('#adminForm').on('change', '#jform_add_license',function (e)
{
	e.preventDefault();
	var add_license_vvvvvwj = jQuery("#jform_add_license input[type='radio']:checked").val();
	vvvvvwj(add_license_vvvvvwj);

});

// #jform_add_php_postflight_install listeners for add_php_postflight_install_vvvvvwk function
jQuery('#jform_add_php_postflight_install').on('keyup',function()
{
	var add_php_postflight_install_vvvvvwk = jQuery("#jform_add_php_postflight_install input[type='radio']:checked").val();
	vvvvvwk(add_php_postflight_install_vvvvvwk);

});
jQuery('#adminForm').on('change', '#jform_add_php_postflight_install',function (e)
{
	e.preventDefault();
	var add_php_postflight_install_vvvvvwk = jQuery("#jform_add_php_postflight_install input[type='radio']:checked").val();
	vvvvvwk(add_php_postflight_install_vvvvvwk);

});

// #jform_add_php_postflight_update listeners for add_php_postflight_update_vvvvvwl function
jQuery('#jform_add_php_postflight_update').on('keyup',function()
{
	var add_php_postflight_update_vvvvvwl = jQuery("#jform_add_php_postflight_update input[type='radio']:checked").val();
	vvvvvwl(add_php_postflight_update_vvvvvwl);

});
jQuery('#adminForm').on('change', '#jform_add_php_postflight_update',function (e)
{
	e.preventDefault();
	var add_php_postflight_update_vvvvvwl = jQuery("#jform_add_php_postflight_update input[type='radio']:checked").val();
	vvvvvwl(add_php_postflight_update_vvvvvwl);

});

// #jform_add_php_method_uninstall listeners for add_php_method_uninstall_vvvvvwm function
jQuery('#jform_add_php_method_uninstall').on('keyup',function()
{
	var add_php_method_uninstall_vvvvvwm = jQuery("#jform_add_php_method_uninstall input[type='radio']:checked").val();
	vvvvvwm(add_php_method_uninstall_vvvvvwm);

});
jQuery('#adminForm').on('change', '#jform_add_php_method_uninstall',function (e)
{
	e.preventDefault();
	var add_php_method_uninstall_vvvvvwm = jQuery("#jform_add_php_method_uninstall input[type='radio']:checked").val();
	vvvvvwm(add_php_method_uninstall_vvvvvwm);

});

// #jform_add_php_preflight_install listeners for add_php_preflight_install_vvvvvwn function
jQuery('#jform_add_php_preflight_install').on('keyup',function()
{
	var add_php_preflight_install_vvvvvwn = jQuery("#jform_add_php_preflight_install input[type='radio']:checked").val();
	vvvvvwn(add_php_preflight_install_vvvvvwn);

});
jQuery('#adminForm').on('change', '#jform_add_php_preflight_install',function (e)
{
	e.preventDefault();
	var add_php_preflight_install_vvvvvwn = jQuery("#jform_add_php_preflight_install input[type='radio']:checked").val();
	vvvvvwn(add_php_preflight_install_vvvvvwn);

});

// #jform_add_php_preflight_update listeners for add_php_preflight_update_vvvvvwo function
jQuery('#jform_add_php_preflight_update').on('keyup',function()
{
	var add_php_preflight_update_vvvvvwo = jQuery("#jform_add_php_preflight_update input[type='radio']:checked").val();
	vvvvvwo(add_php_preflight_update_vvvvvwo);

});
jQuery('#adminForm').on('change', '#jform_add_php_preflight_update',function (e)
{
	e.preventDefault();
	var add_php_preflight_update_vvvvvwo = jQuery("#jform_add_php_preflight_update input[type='radio']:checked").val();
	vvvvvwo(add_php_preflight_update_vvvvvwo);

});

// #jform_update_server_target listeners for update_server_target_vvvvvwp function
jQuery('#jform_update_server_target').on('keyup',function()
{
	var update_server_target_vvvvvwp = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwp = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwp(update_server_target_vvvvvwp,add_update_server_vvvvvwp);

});
jQuery('#adminForm').on('change', '#jform_update_server_target',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwp = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwp = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwp(update_server_target_vvvvvwp,add_update_server_vvvvvwp);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwp function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var update_server_target_vvvvvwp = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwp = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwp(update_server_target_vvvvvwp,add_update_server_vvvvvwp);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwp = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwp = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwp(update_server_target_vvvvvwp,add_update_server_vvvvvwp);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwq function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var add_update_server_vvvvvwq = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	var update_server_target_vvvvvwq = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	vvvvvwq(add_update_server_vvvvvwq,update_server_target_vvvvvwq);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var add_update_server_vvvvvwq = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	var update_server_target_vvvvvwq = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	vvvvvwq(add_update_server_vvvvvwq,update_server_target_vvvvvwq);

});

// #jform_update_server_target listeners for update_server_target_vvvvvwq function
jQuery('#jform_update_server_target').on('keyup',function()
{
	var add_update_server_vvvvvwq = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	var update_server_target_vvvvvwq = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	vvvvvwq(add_update_server_vvvvvwq,update_server_target_vvvvvwq);

});
jQuery('#adminForm').on('change', '#jform_update_server_target',function (e)
{
	e.preventDefault();
	var add_update_server_vvvvvwq = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	var update_server_target_vvvvvwq = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	vvvvvwq(add_update_server_vvvvvwq,update_server_target_vvvvvwq);

});

// #jform_update_server_target listeners for update_server_target_vvvvvwr function
jQuery('#jform_update_server_target').on('keyup',function()
{
	var update_server_target_vvvvvwr = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwr = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwr(update_server_target_vvvvvwr,add_update_server_vvvvvwr);

});
jQuery('#adminForm').on('change', '#jform_update_server_target',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwr = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwr = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwr(update_server_target_vvvvvwr,add_update_server_vvvvvwr);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwr function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var update_server_target_vvvvvwr = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwr = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwr(update_server_target_vvvvvwr,add_update_server_vvvvvwr);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwr = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwr = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwr(update_server_target_vvvvvwr,add_update_server_vvvvvwr);

});

// #jform_update_server_target listeners for update_server_target_vvvvvwt function
jQuery('#jform_update_server_target').on('keyup',function()
{
	var update_server_target_vvvvvwt = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwt = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwt(update_server_target_vvvvvwt,add_update_server_vvvvvwt);

});
jQuery('#adminForm').on('change', '#jform_update_server_target',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwt = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwt = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwt(update_server_target_vvvvvwt,add_update_server_vvvvvwt);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwt function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var update_server_target_vvvvvwt = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwt = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwt(update_server_target_vvvvvwt,add_update_server_vvvvvwt);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var update_server_target_vvvvvwt = jQuery("#jform_update_server_target input[type='radio']:checked").val();
	var add_update_server_vvvvvwt = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwt(update_server_target_vvvvvwt,add_update_server_vvvvvwt);

});

// #jform_add_update_server listeners for add_update_server_vvvvvwv function
jQuery('#jform_add_update_server').on('keyup',function()
{
	var add_update_server_vvvvvwv = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwv(add_update_server_vvvvvwv);

});
jQuery('#adminForm').on('change', '#jform_add_update_server',function (e)
{
	e.preventDefault();
	var add_update_server_vvvvvwv = jQuery("#jform_add_update_server input[type='radio']:checked").val();
	vvvvvwv(add_update_server_vvvvvwv);

});

// #jform_buildcomp listeners for buildcomp_vvvvvww function
jQuery('#jform_buildcomp').on('keyup',function()
{
	var buildcomp_vvvvvww = jQuery("#jform_buildcomp input[type='radio']:checked").val();
	vvvvvww(buildcomp_vvvvvww);

});
jQuery('#adminForm').on('change', '#jform_buildcomp',function (e)
{
	e.preventDefault();
	var buildcomp_vvvvvww = jQuery("#jform_buildcomp input[type='radio']:checked").val();
	vvvvvww(buildcomp_vvvvvww);

});

// #jform_dashboard_type listeners for dashboard_type_vvvvvwx function
jQuery('#jform_dashboard_type').on('keyup',function()
{
	var dashboard_type_vvvvvwx = jQuery("#jform_dashboard_type input[type='radio']:checked").val();
	vvvvvwx(dashboard_type_vvvvvwx);

});
jQuery('#adminForm').on('change', '#jform_dashboard_type',function (e)
{
	e.preventDefault();
	var dashboard_type_vvvvvwx = jQuery("#jform_dashboard_type input[type='radio']:checked").val();
	vvvvvwx(dashboard_type_vvvvvwx);

});

// #jform_dashboard_type listeners for dashboard_type_vvvvvwy function
jQuery('#jform_dashboard_type').on('keyup',function()
{
	var dashboard_type_vvvvvwy = jQuery("#jform_dashboard_type input[type='radio']:checked").val();
	vvvvvwy(dashboard_type_vvvvvwy);

});
jQuery('#adminForm').on('change', '#jform_dashboard_type',function (e)
{
	e.preventDefault();
	var dashboard_type_vvvvvwy = jQuery("#jform_dashboard_type input[type='radio']:checked").val();
	vvvvvwy(dashboard_type_vvvvvwy);

});




<?php
	$app = JFactory::getApplication();
?>
function JRouter(link) {
<?php
	if ($app->isSite())
	{
		echo 'var url = "'.JURI::root().'";';
	}
	else
	{
		echo 'var url = "";';
	}
?>
	return url+link;
}

// nice little dot trick :)
jQuery(document).ready( function($) {
  var x=0;
  setInterval(function() {
	var dots = "";
	x++;
	for (var y=0; y < x%8; y++) {
		dots+=".";
	}
	$(".loading-dots").text(dots);
  } , 500);
});
// check when dashboard switch changes
jQuery('#adminForm').on('change', '#jform_dashboard_type',function (e)
{
	e.preventDefault();
	var dasboard_type = jQuery("#jform_dashboard_type input[type='radio']:checked").val();
	dasboardSwitch(dasboard_type);
});
</script>

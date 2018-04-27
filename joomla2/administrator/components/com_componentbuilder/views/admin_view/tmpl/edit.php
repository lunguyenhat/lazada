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

	<?php echo JLayoutHelper::render('admin_view.details_above', $this); ?>
<div class="form-horizontal">

	<?php echo JHtml::_('bootstrap.startTabSet', 'admin_viewTab', array('active' => 'details')); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'details', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_DETAILS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.details_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.details_right', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.details_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'settings', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_SETTINGS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.settings_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'fields_conditions', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_FIELDS_CONDITIONS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.fields_conditions_left', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.fields_conditions_right', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.fields_conditions_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'css', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_CSS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.css_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'javascript', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_JAVASCRIPT', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.javascript_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'custom_buttons', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_CUSTOM_BUTTONS', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.custom_buttons_left', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.custom_buttons_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'php', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_PHP', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.php_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'mysql', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_MYSQL', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.mysql_left', $this); ?>
			</div>
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.mysql_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'custom_import', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_CUSTOM_IMPORT', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
		</div>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span12">
				<?php echo JLayoutHelper::render('admin_view.custom_import_fullwidth', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	<?php if ($this->canDo->get('admin_view.delete') || $this->canDo->get('admin_view.edit.created_by') || $this->canDo->get('admin_view.edit.state') || $this->canDo->get('admin_view.edit.created')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'publishing', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_PUBLISHING', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.publishing', $this); ?>
			</div>
			<div class="span6">
				<?php echo JLayoutHelper::render('admin_view.publlshing', $this); ?>
			</div>
		</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php if ($this->canDo->get('core.admin')) : ?>
	<?php echo JHtml::_('bootstrap.addTab', 'admin_viewTab', 'permissions', JText::_('COM_COMPONENTBUILDER_ADMIN_VIEW_PERMISSION', true)); ?>
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
		<input type="hidden" name="task" value="admin_view.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	</div>
</div>

<div class="clearfix"></div>
<?php echo JLayoutHelper::render('admin_view.details_under', $this); ?>
</form>
</div>

<script type="text/javascript">

// #jform_add_css_view listeners for add_css_view_vvvvvwz function
jQuery('#jform_add_css_view').on('keyup',function()
{
	var add_css_view_vvvvvwz = jQuery("#jform_add_css_view input[type='radio']:checked").val();
	vvvvvwz(add_css_view_vvvvvwz);

});
jQuery('#adminForm').on('change', '#jform_add_css_view',function (e)
{
	e.preventDefault();
	var add_css_view_vvvvvwz = jQuery("#jform_add_css_view input[type='radio']:checked").val();
	vvvvvwz(add_css_view_vvvvvwz);

});

// #jform_add_css_views listeners for add_css_views_vvvvvxa function
jQuery('#jform_add_css_views').on('keyup',function()
{
	var add_css_views_vvvvvxa = jQuery("#jform_add_css_views input[type='radio']:checked").val();
	vvvvvxa(add_css_views_vvvvvxa);

});
jQuery('#adminForm').on('change', '#jform_add_css_views',function (e)
{
	e.preventDefault();
	var add_css_views_vvvvvxa = jQuery("#jform_add_css_views input[type='radio']:checked").val();
	vvvvvxa(add_css_views_vvvvvxa);

});

// #jform_add_javascript_view_file listeners for add_javascript_view_file_vvvvvxb function
jQuery('#jform_add_javascript_view_file').on('keyup',function()
{
	var add_javascript_view_file_vvvvvxb = jQuery("#jform_add_javascript_view_file input[type='radio']:checked").val();
	vvvvvxb(add_javascript_view_file_vvvvvxb);

});
jQuery('#adminForm').on('change', '#jform_add_javascript_view_file',function (e)
{
	e.preventDefault();
	var add_javascript_view_file_vvvvvxb = jQuery("#jform_add_javascript_view_file input[type='radio']:checked").val();
	vvvvvxb(add_javascript_view_file_vvvvvxb);

});

// #jform_add_javascript_views_file listeners for add_javascript_views_file_vvvvvxc function
jQuery('#jform_add_javascript_views_file').on('keyup',function()
{
	var add_javascript_views_file_vvvvvxc = jQuery("#jform_add_javascript_views_file input[type='radio']:checked").val();
	vvvvvxc(add_javascript_views_file_vvvvvxc);

});
jQuery('#adminForm').on('change', '#jform_add_javascript_views_file',function (e)
{
	e.preventDefault();
	var add_javascript_views_file_vvvvvxc = jQuery("#jform_add_javascript_views_file input[type='radio']:checked").val();
	vvvvvxc(add_javascript_views_file_vvvvvxc);

});

// #jform_add_javascript_view_footer listeners for add_javascript_view_footer_vvvvvxd function
jQuery('#jform_add_javascript_view_footer').on('keyup',function()
{
	var add_javascript_view_footer_vvvvvxd = jQuery("#jform_add_javascript_view_footer input[type='radio']:checked").val();
	vvvvvxd(add_javascript_view_footer_vvvvvxd);

});
jQuery('#adminForm').on('change', '#jform_add_javascript_view_footer',function (e)
{
	e.preventDefault();
	var add_javascript_view_footer_vvvvvxd = jQuery("#jform_add_javascript_view_footer input[type='radio']:checked").val();
	vvvvvxd(add_javascript_view_footer_vvvvvxd);

});

// #jform_add_javascript_views_footer listeners for add_javascript_views_footer_vvvvvxe function
jQuery('#jform_add_javascript_views_footer').on('keyup',function()
{
	var add_javascript_views_footer_vvvvvxe = jQuery("#jform_add_javascript_views_footer input[type='radio']:checked").val();
	vvvvvxe(add_javascript_views_footer_vvvvvxe);

});
jQuery('#adminForm').on('change', '#jform_add_javascript_views_footer',function (e)
{
	e.preventDefault();
	var add_javascript_views_footer_vvvvvxe = jQuery("#jform_add_javascript_views_footer input[type='radio']:checked").val();
	vvvvvxe(add_javascript_views_footer_vvvvvxe);

});

// #jform_add_php_ajax listeners for add_php_ajax_vvvvvxf function
jQuery('#jform_add_php_ajax').on('keyup',function()
{
	var add_php_ajax_vvvvvxf = jQuery("#jform_add_php_ajax input[type='radio']:checked").val();
	vvvvvxf(add_php_ajax_vvvvvxf);

});
jQuery('#adminForm').on('change', '#jform_add_php_ajax',function (e)
{
	e.preventDefault();
	var add_php_ajax_vvvvvxf = jQuery("#jform_add_php_ajax input[type='radio']:checked").val();
	vvvvvxf(add_php_ajax_vvvvvxf);

});

// #jform_add_php_getitem listeners for add_php_getitem_vvvvvxg function
jQuery('#jform_add_php_getitem').on('keyup',function()
{
	var add_php_getitem_vvvvvxg = jQuery("#jform_add_php_getitem input[type='radio']:checked").val();
	vvvvvxg(add_php_getitem_vvvvvxg);

});
jQuery('#adminForm').on('change', '#jform_add_php_getitem',function (e)
{
	e.preventDefault();
	var add_php_getitem_vvvvvxg = jQuery("#jform_add_php_getitem input[type='radio']:checked").val();
	vvvvvxg(add_php_getitem_vvvvvxg);

});

// #jform_add_php_getitems listeners for add_php_getitems_vvvvvxh function
jQuery('#jform_add_php_getitems').on('keyup',function()
{
	var add_php_getitems_vvvvvxh = jQuery("#jform_add_php_getitems input[type='radio']:checked").val();
	vvvvvxh(add_php_getitems_vvvvvxh);

});
jQuery('#adminForm').on('change', '#jform_add_php_getitems',function (e)
{
	e.preventDefault();
	var add_php_getitems_vvvvvxh = jQuery("#jform_add_php_getitems input[type='radio']:checked").val();
	vvvvvxh(add_php_getitems_vvvvvxh);

});

// #jform_add_php_getitems_after_all listeners for add_php_getitems_after_all_vvvvvxi function
jQuery('#jform_add_php_getitems_after_all').on('keyup',function()
{
	var add_php_getitems_after_all_vvvvvxi = jQuery("#jform_add_php_getitems_after_all input[type='radio']:checked").val();
	vvvvvxi(add_php_getitems_after_all_vvvvvxi);

});
jQuery('#adminForm').on('change', '#jform_add_php_getitems_after_all',function (e)
{
	e.preventDefault();
	var add_php_getitems_after_all_vvvvvxi = jQuery("#jform_add_php_getitems_after_all input[type='radio']:checked").val();
	vvvvvxi(add_php_getitems_after_all_vvvvvxi);

});

// #jform_add_php_getlistquery listeners for add_php_getlistquery_vvvvvxj function
jQuery('#jform_add_php_getlistquery').on('keyup',function()
{
	var add_php_getlistquery_vvvvvxj = jQuery("#jform_add_php_getlistquery input[type='radio']:checked").val();
	vvvvvxj(add_php_getlistquery_vvvvvxj);

});
jQuery('#adminForm').on('change', '#jform_add_php_getlistquery',function (e)
{
	e.preventDefault();
	var add_php_getlistquery_vvvvvxj = jQuery("#jform_add_php_getlistquery input[type='radio']:checked").val();
	vvvvvxj(add_php_getlistquery_vvvvvxj);

});

// #jform_add_php_before_save listeners for add_php_before_save_vvvvvxk function
jQuery('#jform_add_php_before_save').on('keyup',function()
{
	var add_php_before_save_vvvvvxk = jQuery("#jform_add_php_before_save input[type='radio']:checked").val();
	vvvvvxk(add_php_before_save_vvvvvxk);

});
jQuery('#adminForm').on('change', '#jform_add_php_before_save',function (e)
{
	e.preventDefault();
	var add_php_before_save_vvvvvxk = jQuery("#jform_add_php_before_save input[type='radio']:checked").val();
	vvvvvxk(add_php_before_save_vvvvvxk);

});

// #jform_add_php_save listeners for add_php_save_vvvvvxl function
jQuery('#jform_add_php_save').on('keyup',function()
{
	var add_php_save_vvvvvxl = jQuery("#jform_add_php_save input[type='radio']:checked").val();
	vvvvvxl(add_php_save_vvvvvxl);

});
jQuery('#adminForm').on('change', '#jform_add_php_save',function (e)
{
	e.preventDefault();
	var add_php_save_vvvvvxl = jQuery("#jform_add_php_save input[type='radio']:checked").val();
	vvvvvxl(add_php_save_vvvvvxl);

});

// #jform_add_php_postsavehook listeners for add_php_postsavehook_vvvvvxm function
jQuery('#jform_add_php_postsavehook').on('keyup',function()
{
	var add_php_postsavehook_vvvvvxm = jQuery("#jform_add_php_postsavehook input[type='radio']:checked").val();
	vvvvvxm(add_php_postsavehook_vvvvvxm);

});
jQuery('#adminForm').on('change', '#jform_add_php_postsavehook',function (e)
{
	e.preventDefault();
	var add_php_postsavehook_vvvvvxm = jQuery("#jform_add_php_postsavehook input[type='radio']:checked").val();
	vvvvvxm(add_php_postsavehook_vvvvvxm);

});

// #jform_add_php_allowedit listeners for add_php_allowedit_vvvvvxn function
jQuery('#jform_add_php_allowedit').on('keyup',function()
{
	var add_php_allowedit_vvvvvxn = jQuery("#jform_add_php_allowedit input[type='radio']:checked").val();
	vvvvvxn(add_php_allowedit_vvvvvxn);

});
jQuery('#adminForm').on('change', '#jform_add_php_allowedit',function (e)
{
	e.preventDefault();
	var add_php_allowedit_vvvvvxn = jQuery("#jform_add_php_allowedit input[type='radio']:checked").val();
	vvvvvxn(add_php_allowedit_vvvvvxn);

});

// #jform_add_php_batchcopy listeners for add_php_batchcopy_vvvvvxo function
jQuery('#jform_add_php_batchcopy').on('keyup',function()
{
	var add_php_batchcopy_vvvvvxo = jQuery("#jform_add_php_batchcopy input[type='radio']:checked").val();
	vvvvvxo(add_php_batchcopy_vvvvvxo);

});
jQuery('#adminForm').on('change', '#jform_add_php_batchcopy',function (e)
{
	e.preventDefault();
	var add_php_batchcopy_vvvvvxo = jQuery("#jform_add_php_batchcopy input[type='radio']:checked").val();
	vvvvvxo(add_php_batchcopy_vvvvvxo);

});

// #jform_add_php_batchmove listeners for add_php_batchmove_vvvvvxp function
jQuery('#jform_add_php_batchmove').on('keyup',function()
{
	var add_php_batchmove_vvvvvxp = jQuery("#jform_add_php_batchmove input[type='radio']:checked").val();
	vvvvvxp(add_php_batchmove_vvvvvxp);

});
jQuery('#adminForm').on('change', '#jform_add_php_batchmove',function (e)
{
	e.preventDefault();
	var add_php_batchmove_vvvvvxp = jQuery("#jform_add_php_batchmove input[type='radio']:checked").val();
	vvvvvxp(add_php_batchmove_vvvvvxp);

});

// #jform_add_php_before_publish listeners for add_php_before_publish_vvvvvxq function
jQuery('#jform_add_php_before_publish').on('keyup',function()
{
	var add_php_before_publish_vvvvvxq = jQuery("#jform_add_php_before_publish input[type='radio']:checked").val();
	vvvvvxq(add_php_before_publish_vvvvvxq);

});
jQuery('#adminForm').on('change', '#jform_add_php_before_publish',function (e)
{
	e.preventDefault();
	var add_php_before_publish_vvvvvxq = jQuery("#jform_add_php_before_publish input[type='radio']:checked").val();
	vvvvvxq(add_php_before_publish_vvvvvxq);

});

// #jform_add_php_after_publish listeners for add_php_after_publish_vvvvvxr function
jQuery('#jform_add_php_after_publish').on('keyup',function()
{
	var add_php_after_publish_vvvvvxr = jQuery("#jform_add_php_after_publish input[type='radio']:checked").val();
	vvvvvxr(add_php_after_publish_vvvvvxr);

});
jQuery('#adminForm').on('change', '#jform_add_php_after_publish',function (e)
{
	e.preventDefault();
	var add_php_after_publish_vvvvvxr = jQuery("#jform_add_php_after_publish input[type='radio']:checked").val();
	vvvvvxr(add_php_after_publish_vvvvvxr);

});

// #jform_add_php_before_delete listeners for add_php_before_delete_vvvvvxs function
jQuery('#jform_add_php_before_delete').on('keyup',function()
{
	var add_php_before_delete_vvvvvxs = jQuery("#jform_add_php_before_delete input[type='radio']:checked").val();
	vvvvvxs(add_php_before_delete_vvvvvxs);

});
jQuery('#adminForm').on('change', '#jform_add_php_before_delete',function (e)
{
	e.preventDefault();
	var add_php_before_delete_vvvvvxs = jQuery("#jform_add_php_before_delete input[type='radio']:checked").val();
	vvvvvxs(add_php_before_delete_vvvvvxs);

});

// #jform_add_php_after_delete listeners for add_php_after_delete_vvvvvxt function
jQuery('#jform_add_php_after_delete').on('keyup',function()
{
	var add_php_after_delete_vvvvvxt = jQuery("#jform_add_php_after_delete input[type='radio']:checked").val();
	vvvvvxt(add_php_after_delete_vvvvvxt);

});
jQuery('#adminForm').on('change', '#jform_add_php_after_delete',function (e)
{
	e.preventDefault();
	var add_php_after_delete_vvvvvxt = jQuery("#jform_add_php_after_delete input[type='radio']:checked").val();
	vvvvvxt(add_php_after_delete_vvvvvxt);

});

// #jform_add_php_document listeners for add_php_document_vvvvvxu function
jQuery('#jform_add_php_document').on('keyup',function()
{
	var add_php_document_vvvvvxu = jQuery("#jform_add_php_document input[type='radio']:checked").val();
	vvvvvxu(add_php_document_vvvvvxu);

});
jQuery('#adminForm').on('change', '#jform_add_php_document',function (e)
{
	e.preventDefault();
	var add_php_document_vvvvvxu = jQuery("#jform_add_php_document input[type='radio']:checked").val();
	vvvvvxu(add_php_document_vvvvvxu);

});

// #jform_add_sql listeners for add_sql_vvvvvxv function
jQuery('#jform_add_sql').on('keyup',function()
{
	var add_sql_vvvvvxv = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxv(add_sql_vvvvvxv);

});
jQuery('#adminForm').on('change', '#jform_add_sql',function (e)
{
	e.preventDefault();
	var add_sql_vvvvvxv = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxv(add_sql_vvvvvxv);

});

// #jform_source listeners for source_vvvvvxw function
jQuery('#jform_source').on('keyup',function()
{
	var source_vvvvvxw = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxw = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxw(source_vvvvvxw,add_sql_vvvvvxw);

});
jQuery('#adminForm').on('change', '#jform_source',function (e)
{
	e.preventDefault();
	var source_vvvvvxw = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxw = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxw(source_vvvvvxw,add_sql_vvvvvxw);

});

// #jform_add_sql listeners for add_sql_vvvvvxw function
jQuery('#jform_add_sql').on('keyup',function()
{
	var source_vvvvvxw = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxw = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxw(source_vvvvvxw,add_sql_vvvvvxw);

});
jQuery('#adminForm').on('change', '#jform_add_sql',function (e)
{
	e.preventDefault();
	var source_vvvvvxw = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxw = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxw(source_vvvvvxw,add_sql_vvvvvxw);

});

// #jform_source listeners for source_vvvvvxy function
jQuery('#jform_source').on('keyup',function()
{
	var source_vvvvvxy = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxy = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxy(source_vvvvvxy,add_sql_vvvvvxy);

});
jQuery('#adminForm').on('change', '#jform_source',function (e)
{
	e.preventDefault();
	var source_vvvvvxy = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxy = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxy(source_vvvvvxy,add_sql_vvvvvxy);

});

// #jform_add_sql listeners for add_sql_vvvvvxy function
jQuery('#jform_add_sql').on('keyup',function()
{
	var source_vvvvvxy = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxy = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxy(source_vvvvvxy,add_sql_vvvvvxy);

});
jQuery('#adminForm').on('change', '#jform_add_sql',function (e)
{
	e.preventDefault();
	var source_vvvvvxy = jQuery("#jform_source input[type='radio']:checked").val();
	var add_sql_vvvvvxy = jQuery("#jform_add_sql input[type='radio']:checked").val();
	vvvvvxy(source_vvvvvxy,add_sql_vvvvvxy);

});

// #jform_add_custom_import listeners for add_custom_import_vvvvvya function
jQuery('#jform_add_custom_import').on('keyup',function()
{
	var add_custom_import_vvvvvya = jQuery("#jform_add_custom_import input[type='radio']:checked").val();
	vvvvvya(add_custom_import_vvvvvya);

});
jQuery('#adminForm').on('change', '#jform_add_custom_import',function (e)
{
	e.preventDefault();
	var add_custom_import_vvvvvya = jQuery("#jform_add_custom_import input[type='radio']:checked").val();
	vvvvvya(add_custom_import_vvvvvya);

});

// #jform_add_custom_import listeners for add_custom_import_vvvvvyb function
jQuery('#jform_add_custom_import').on('keyup',function()
{
	var add_custom_import_vvvvvyb = jQuery("#jform_add_custom_import input[type='radio']:checked").val();
	vvvvvyb(add_custom_import_vvvvvyb);

});
jQuery('#adminForm').on('change', '#jform_add_custom_import',function (e)
{
	e.preventDefault();
	var add_custom_import_vvvvvyb = jQuery("#jform_add_custom_import input[type='radio']:checked").val();
	vvvvvyb(add_custom_import_vvvvvyb);

});

// #jform_add_custom_button listeners for add_custom_button_vvvvvyc function
jQuery('#jform_add_custom_button').on('keyup',function()
{
	var add_custom_button_vvvvvyc = jQuery("#jform_add_custom_button input[type='radio']:checked").val();
	vvvvvyc(add_custom_button_vvvvvyc);

});
jQuery('#adminForm').on('change', '#jform_add_custom_button',function (e)
{
	e.preventDefault();
	var add_custom_button_vvvvvyc = jQuery("#jform_add_custom_button input[type='radio']:checked").val();
	vvvvvyc(add_custom_button_vvvvvyc);

});



<?php $fieldNrs = range(1,7,1); ?>
<?php foreach($fieldNrs as $nr): ?>jQuery('#jform_custom_button_modal').on('change', 'select[name="icomoon-<?php echo $nr; ?>"]',function (e) {
	// update the icon if changed
	var vala_<?php echo $nr; ?> = jQuery('select[name="icomoon-<?php echo $nr; ?>"] option:selected').val();
	// build new span
	var span = '<span id="icon_custom_button_fields_icomoon_<?php echo $nr; ?>" class="icon-'+vala_<?php echo $nr; ?>+'"></span>';
	// remove old one 
	jQuery('#icon_custom_button_fields_icomoon_<?php echo $nr; ?>').remove();
	// add the new icon
	jQuery('#jform_custom_button_fields_icomoon_<?php echo $nr; ?>_chzn').closest("td").append(span);
});

jQuery(document).ready(function() {
jQuery('input.form-field-repeatable').on('row-add', function (e) {
	// show the icon if set
	var vala_<?php echo $nr; ?> = jQuery('#jform_custom_button_fields_icomoon-<?php echo $nr; ?>').val();
	// build new span
	var span = '<span id="icon_custom_button_fields_icomoon_<?php echo $nr; ?>" class="icon-'+vala_<?php echo $nr; ?>+'"></span>';
	// remove old one 
	jQuery('#icon_custom_button_fields_icomoon_<?php echo $nr; ?>').remove();
	// add the new icon
	jQuery('#jform_custom_button_fields_icomoon_<?php echo $nr; ?>_chzn').closest("td").append(span);
});
});
<?php endforeach; ?>
<?php $numberAddtables = range(0, count( (array) $this->item->addtables) + 3, 1);?>

// for the values already set
jQuery(document).ready(function(){
<?php foreach($numberAddtables as $fieldNr): ?>
	jQuery('#adminForm').on('change', '#jform_addtables__addtables<?php echo $fieldNr ?>__table',function (e) {
		e.preventDefault();
		getTableColumns(<?php echo $fieldNr ?>, "_", "_");
	});
<?php endforeach; ?>
	jQuery(document).on('subform-row-add', function(event, row){
		var groupName = jQuery(row).data('group');
		var fieldName = groupName.replace(/([0-9])/g, '');
		var fieldNr = groupName.replace(/([A-z_])/g, '');
		if ('addtables' === fieldName) {
			jQuery('#adminForm').on('change', '#jform_addtables_addtables'+fieldNr+'_table',function (e) {
				e.preventDefault();
				getTableColumns(fieldNr, "", "");
			});
		}
	});
});

// #jform_add_custom_import listeners
jQuery('#jform_add_custom_import').on('change',function() {
	var valueSwitch = jQuery("#jform_add_custom_import input[type='radio']:checked").val();
	getDynamicScripts(valueSwitch);
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
</script>

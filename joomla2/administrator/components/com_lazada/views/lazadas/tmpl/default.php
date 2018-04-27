<?php
defined('_JEXEC');
JHtml::_('formbehavior.chosen','select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>

<form action="index.php?option=com_lazada&view=lazadas" method="post" id="adminForm" name="adminForm">
	
	<div id="j-sidebar-container" class="span2">
		<?php echo JHtmlSidebar::render(); ?>
	</div>
	<div id="j-main-container" class="span10">

	<div class="row-fluid">
		<div class="span6">
			<?php echo JText::_('COM_LAZADA_LAZADAS_FILTER'); ?>
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_LAZADA_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="50%">
				<?php echo JHtml::_('grid.sort', 'Name', 'name', $listDirn, $listOrder); ?>
			</th>
			<th width="10%">
				<?php echo JHtml::_('grid.sort', 'Image', 'image', $listDirn, $listOrder); ?>
			</th>				
			<th width="10%">
				<?php echo JHtml::_('grid.sort', 'Price', 'price', $listDirn, $listOrder); ?>
			</th>		
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : ?>
					<?php foreach ($row->Body->Products as $key => $value): ?>
						<tr>
							<td>
								<?php echo $this->pagination->getRowOffset($key); ?>
							</td>
							<td>
								<input type="checkbox" id="cb0" name="cid[]" value="<?= $value->Skus[0]->SellerSku ?>" onclick="Joomla.isChecked(this.checked);">
							</td>
							<td>
								<a href="" title="<?= JText::_('COM_LAZADA_EDIT_NAME') ?>">
									<?php echo $value->Attributes->name; ?>
								</a>
							</td>						
							<td>
								<a href="" title="<?= JText::_('COM_LAZADA_EDIT_LAZADA') ?>">
									<img src="<?= $value->Skus[0]->Images[0] ?>">
								</a>
							</td>							
							<td>
								<a href="" title="<?= JText::_('COM_LAZADA_EDIT_LAZADA') ?>">
									<?= $value->Skus[0]->price ?> đ
								</a>
							</td>											
							<td align="center">
								<?php //echo $row->id; ?>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value="">
	<input type="hidden" name="boxchecked" value="0">
	<input type="hidden" name="filter_order" value="<?= $listOrder ?>">
	<input type="hidden" name="filter_order_Dir" value="<?= $listDirn ?>">
	<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
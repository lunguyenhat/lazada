<?php
defined('_JEXEC');
class LazadaControllerLazadas extends JControllerAdmin
{
	public function getModel($name = 'Lazada', $prefix = 'LazadaModel', $config=array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

	public function synctoredshop()
	{
		$input = JFactory::getApplication()->input;
		$sku = $input->post->get('cid',array(), 'array');
		$model = $this->getModel();
		$model->saveProduct($sku);
		return $sku;
	}
}
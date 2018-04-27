<?php
defined('_JEXEC');

class LazadaTableLazada extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__lazada_product', 'id', $db);
	}
}
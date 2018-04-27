<?php
class ModRedshopProductHelper
{
	private static $params = null;

	public static function setParams($params){
		self::$params = $params;
	}

	public static function getCategories($params)
	{
		$categories =  $params->get('categories');
		$order_by = (int) $params->get('order_by');
		$count = (int) $params->get('count');
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$categories = array_filter($categories);
		$query->select($db->qn(array('id', 'name')))
		->from($db->qn('#__redshop_category'))
		->where($db->qn('id'). 'in ('.implode(',', $categories ) . ')');

	        // echo $query->__toString(); die();

		$result = $db->setQuery($query)->loadAssocList();
		return $result;
	}

	public static function getProductById($catid)
	{
		$db = JFactory::getDbo();
		$query =$db->getQuery(true);
		$query->select(array('product_id, product_name, product_price, discount_price, product_full_image, cat_in_sefurl'))
		->from($db->qn('#__redshop_product'))
		->where($db->qn('cat_in_sefurl')." = ".$db->quote($catid));
  		// echo $query->__tostring()die();

		return $db->setQuery($query)->loadAssocList();;
	}
}

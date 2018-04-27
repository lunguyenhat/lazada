<?php
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once JPATH_SITE . '/modules/mod_redshop_product/helper.php';

// $title = ModHelloWorldHelper::getTitle($params);
JHtml::stylesheet('mod_redshop_product/jquery-ui.css', false, true);
JHtml::stylesheet('mod_redshop_product/style.css', false, true);
JHtml::script('mod_redshop_product/jquery-1.12.4.js', false, true);
JHtml::script('mod_redshop_product/jquery-ui.js', false, true);

$cat = ModRedshopProductHelper::getCategories($params);


// 
require JModuleHelper::getLayoutPath('mod_redshop_product', $params->get('layout', 'default'));
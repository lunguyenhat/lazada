<?php
defined('_JEXEC');
use Joomla\Registry\Registry;
class LazadaViewLazadas extends JViewLegacy
{
	public function display($tpl=null)
	{
		// Get application
		$app = JFactory::getApplication();
		$context = "lazada.list.admin.lazada";

		//Get data from models
		$this->items 		= $this->getProductLazada();
		$this->pagination 	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'greeting', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		//Check for Error
		if(count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br/>', $errors));
			return false;
		}

		// Set the submenu
		LazadaHelper::addSubmenu('lazada');

		//Set toolbar
		$this->addToolBar();

		//Display template
		parent::display($tpl);

		// Set the document
		$this->setDocument();

	}

	protected function addToolBar()
	{
		$title = JToolbarHelper::title(JText::_('COM_LAZADA_MANAGER_LAZADAS'));

		if($this->pagination->total){
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}
		JToolbarHelper::title($title, 'lazada');
		JToolbarHelper::addNew('lazada.add');
		JToolbarHelper::editList('lazada.edit');
		JToolbarHelper::deleteList('', 'lazadas.delete');
		JToolbarHelper::custom('lazadas.synctoredshop','','','abc');
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JTexT::_('COM_LAZADA_ADMINISTRATOR'));
	}

	protected function getProductLazada()
	{
		date_default_timezone_set("UTC");

		// The current time. Needed to create the Timestamp parameter below.
		$now = new DateTime();

		// The parameters for the GET request. These will get signed.
		$parameters = array(
		    // The ID of the user making the call.
		    'UserID' => 'hungnguyen.ckc@gmail.com',

		    // The API version. Currently must be 1.0
		    'Version' => '1.0',

		    // The API method to call.
		    'Action' => 'GetProducts',

		    'Filter' => 'all',

		    // The format of the result.
		    'Format' => 'json',

		    'Limit' => 100,

		    'Offset' => 0,

		    // The current time in ISO8601 format
		    'Timestamp' => $now->format(DateTime::ISO8601)
		);

		// Sort parameters by name.
		ksort($parameters);

		// URL encode the parameters.
		$encoded = array();
		foreach ($parameters as $name => $value) {
		    $encoded[] = rawurlencode($name) . '=' . rawurlencode($value);
		}


		// Concatenate the sorted and URL encoded parameters into a string.
		$concatenated = implode('&', $encoded);

		// The API key for the user as generated in the Seller Center GUI.
		// Must be an API key associated with the UserID parameter.
		$api_key = 'JkB3mK-cTrvtJt6Ed8Q0w0luY4m_oLljGfxhWpMz9oVBdliqa2OGo46v';

		// Compute signature and add it to the parameters.
		$parameters['Signature'] =
		    rawurlencode(hash_hmac('sha256', $concatenated, $api_key, false));
		// Replace with the URL of your API host.
		$url = "https://api.sellercenter.lazada.vn/?";

		$queryString = http_build_query($parameters, '', '&', PHP_QUERY_RFC3986);																																	
		$unparsed_json = file_get_contents("https://api.sellercenter.lazada.vn/?". $queryString);

		$json_object = json_decode($unparsed_json);
		return $json_object;

	}
}


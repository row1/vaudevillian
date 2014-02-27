<?php
namespace com_vaudevillian\Models;

defined( '_JEXEC' ) or die( 'Restricted access' );

abstract class Base extends \JModelBase
{
	private $__state_set = null;
	protected $_total = null;
	protected $_pagination = null;
	protected $_db = null;
	protected $_table_name = null;
	public $id = null;
	 
	function __construct()
	{
		parent::__construct();
		
		$full_class_name = strtolower(get_class($this));
		
		$this->_table_name = end(explode('\\', $full_class_name));
		//$this->_table_name = get_class($this);
		
		$this->_db = \JFactory::getDBO();
	 
		$app = \JFactory::getApplication();
		$ids = $app->input->get("cids",null,'array');
	 
		$id = $app->input->get("id");
		if ( $id && $id > 0 ){
			$this->id = $id;
		}else if ( count($ids) == 1 ){
			$this->id = $ids[0];
		}else{
			$this->id = $ids;
		}
	}
	
	public function listItems()
	{
	}	
	
	public function save()
	{
    	$row = \JTable::getInstance($this->_table_name,'');
		
		if($row == null)
		{
			throw new \Exception('Error getting the table:'.$this->_table_name);			
		}
		
	    if (!$row->bind($this))
	    {
	        return false;
	    }
		
		return false;	
	}
} 
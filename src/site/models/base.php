<?php
namespace com_vaudevillian\Models;
/*
* @package Vaudevillian.Site
*
* @copyright Copyright (C) 2014 Sockware, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE
* @link http://sockware.net
*/
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
		$namespaceSplit = explode('\\', $full_class_name);
		$this->_table_name = end($namespaceSplit);
		
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
	
	private function &getTableInstance()
	{
    	$row = \JTable::getInstance($this->_table_name, 'com_vaudevillian\\Tables\\');
		
		if($row == null)
		{
			throw new \Exception('Error getting the table:'.$this->_table_name);			
		}
		return $row;
	}
	
	public function getItems()
	{
	}
	
	public function getItem($id)
	{
		if(!is_numeric($id))
		{
			return null;
		}
		
	  	$row =& $this->getTableInstance();
		$ableToLoad = $row->load((int) $id);
		return $ableToLoad ? $row : null;		
	}
	
	public function store($data)
	{
		$row =& $this->getTableInstance();
		
	    //if (!$row->bind($this))
	    if (!$row->bind($data))
	    {
	        return false;
	    }
		
		$date = date("Y-m-d H:i:s");
	    $row->modified = $date;
	    if( !$row->created )
	    {
	      $row->created = $date;
	    }
	
	    // Make sure the record is valid
	    if (!$row->check())
	    {
	        return false;
	    }
	 
	    if (!$row->store())
	    {
	        return false;
	    }
	
	    return $row;

	}
} 
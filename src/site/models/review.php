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

class Review extends Base
{
	/*
	public $template_name = null;//varchar(255) NOT NULL DEFAULT 'default'
	public $rating = null; //DECIMAL(5,1) NOT NULL default '0'
	public $title = null; //TEXT NOT NUL
	public $alias = null; //varchar(255) NOT NULL
	public $introtext = null; //mediumtext default NULL
	public $fulltext = null; //mediumtext NOT NULL
	public $images = null; //TEXT default NULL
	public $thumbnails = null; //TEXT default NULL
	
	public $created = null; //datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    public $created_by = null; //INT NOT NULL,
	public $created_by_alias = null; //varchar(255) NOT NULL,
	
	public $modified = null; //datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    public $modified_by = null; //INT DEFAULT NULL,
	public $modified_by_alias = null; //varchar(255) DEFAULT NULL,

	public $state = null; //tinyint NOT NULL default '0',
    public $publish_up = null; //datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    public $publish_down = null; //datetime NOT NULL DEFAULT '0000-00-00 00:00:00',				

	public $user_review = null; //tinyint NOT NULL default '0',
    public $status = null; //ENUM( 'pending', 'approved', 'rejected' ) NOT NULL DEFAULT 'pending',
    public $status_reason = null; //TEXT NULL,
    
	public $metakey = null; //TEXT NOT NULL DEFAULT '',
	public $metadesc = null; //TEXT NOT NULL DEFAULT '',
	public $metadata = null; //TEXT NOT NULL DEFAULT '',
	
	public $access = null; //int(10) unsigned NOT NULL DEFAULT '0',	
	*/
	public function __construct()
	{
		parent::__construct();
	}
	
	protected function _buildQuery()
	{
	    $db = \JFactory::getDBO();
	    $query = $db->getQuery(TRUE);
	
	    $query->select('r.id, r.template_name, r.rating, r.title, r.alias, r.introtext, r.fulltext, r.images,
						r.thumbnails, r.created, r.created_by, r.created_by_alias, r.modified, r.modified_by,
						r.modified_by_alias, r.state, r.publish_up, r.publish_down, r.user_review, r.status, r.status_reason, r.metakey, r.metadesc,
						r.metadata, r.access');
	    $query->from('#__vaude_reviews as r');
	
	
	    $query->select('um.name as modifier');
	    $query->leftjoin('#__users as um on um.id = r.modified_by');
	
	    $query->select('uc.name as creator');
	    $query->leftjoin('#__users AS uc on uc.id = r.created_by');
		
	    return $query;
	}
	protected function _buildWhere(ModelContextBase &$context)
	{
		$db = \JFactory::getDBO();
		$query =& $context->query;
		if(is_numeric($context->id) && $context->id > 0) 
	    {
	      $query->where('r.id = ' . (int) $context->id);
	    }
		//TODO: maybe published should be based on this?: if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content'))) 
		if($context->is_published != null)
		{
			$nullDate = $db->quote($db->getNullDate());
			$date = \JFactory::getDate();

			$nowDate = $db->quote($date->toSql());
			if($context->is_published)
			{
				$query->where('r.state = 1'); 				
				$query->where('(r.publish_up = ' . $nullDate . ' OR r.publish_up <= ' . $nowDate . ')')
					->where('(r.publish_down = ' . $nullDate . ' OR r.publish_down >= ' . $nowDate . ')');
			}
			else
			{
				$query->where('r.state = 0');
				$query->where('(r.publish_up > ' . $nowDate . ' OR r.publish_down < ' . $nowDate . ')');
			}
		}
		//return $query;
		return $context;
	}	
	 
	/* 
	public function store()
	{

	}
	 
	public function getReview()
	{

	}
	 
	function getReviews()
	{

	}
	 
	function populateState()
	{

	}
	 */
} 
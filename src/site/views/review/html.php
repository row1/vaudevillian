<?php
namespace com_vaudevillian\Views\Review;
use com_vaudevillian\Models;
use com_vaudevillian\Helpers;
/*
* @package Vaudevillian.Site
*
* @copyright Copyright (C) 2014 Sockware, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE
* @link http://sockware.net
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
 
class Html extends \JViewHtml
{
	function render()
	{
		$app = \JFactory::getApplication();
		$layout = $this->getLayout();
		//$type = $app->input->get('type');
		//$id = $app->input->get('id');
		//$view = $app->input->get('view');
		 
		$model = new Models\Review();
		 
		//$this->review = $model->getReview($id,$view,FALSE);
		
		if($layout == 'list')
	    {
	    	$this->reviews = $model->listItems();
	        $this->_addReviewView = Helpers\View::load('Review','_add','phtml');
	    }
		
		//display
		return parent::render();
	}
}
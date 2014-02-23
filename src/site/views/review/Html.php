<?php
namespace com_vaudevillian\Views\Review;
use com_vaudevillian\Models;

defined( '_JEXEC' ) or die( 'Restricted access' );
 
class Html extends \JViewHtml
{
	function render()
	{
		$app = \JFactory::getApplication();
		$type = $app->input->get('type');
		$id = $app->input->get('id');
		$view = $app->input->get('view');
		 
		$model = new Models\Review();
		 
		$this->review = $model->getReview($id,$view,FALSE);
		//display
		return parent::render();
	}
}
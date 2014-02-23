<?php
namespace com_vaudevillian\Views\Review;
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

//Display partial views
class Phtml extends \JViewHTML
{

    function render()
    {
    	$this->params = \JComponentHelper::getParams('com_vaudevillian');
    	
    	return parent::render();
 	}
}
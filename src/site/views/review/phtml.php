<?php
namespace com_vaudevillian\Views\Review;
/*
* @package Vaudevillian.Site
*
* @copyright Copyright (C) 2014 Sockware, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE
* @link http://sockware.net
*/

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
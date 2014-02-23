<?php 
namespace com_vaudevillian\Controllers;

defined( '_JEXEC' ) or die( 'Restricted access' ); 
class Fallback extends \JControllerBase
{
	public function execute()
	{
		echo 'hi';
	}
}
<?php // No direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

//sessions
jimport( 'joomla.session.session' );
 
//load tables
JTable::addIncludePath(JPATH_COMPONENT.'/tables');

//load classes
//JLoader::registerPrefix('Vaudevillian', JPATH_COMPONENT);
JLoader::registerNamespace('com_vaudevillian', JPATH_COMPONENT.'/..');

//application
$app = JFactory::getApplication();
 
// Require specific controller if requested
$controller = $app->input->get('controller','fallback');

// Create the controller
$classname  = 'com_vaudevillian\\Controllers\\'.ucwords($controller);
$controller = new $classname();

 
// Perform the Request task
$controller->execute();
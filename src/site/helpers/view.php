<?php
namespace com_vaudevillian\Helpers;

// no direct access
defined('_JEXEC') or die('Restricted access');

class View
{
	public static function load($viewName, $layoutName='default', $viewFormat='html', $vars=null)
	{
		// Get the application
		$app = \JFactory::getApplication();

		$app->input->set('view', $viewName);

        // Register the layout paths for the view
	    $paths = new \SplPriorityQueue;
	    $paths->insert(JPATH_COMPONENT . '/views/' . strtolower($viewName) . '/tmpl', 'normal');
	 
	    $viewClass  = 'com_vaudevillian\\Views\\' . ucfirst($viewName) . '\\' . ucfirst($viewFormat);
	    $modelClass = 'com_vaudevillian\\Models\\' . ucfirst($viewName);

	    if (false === class_exists($modelClass))
	    {
	    	throw new \Exception('Could not find the class:'.$modelClass);
	    }

	    $view = new $viewClass(new $modelClass, $paths);

	    $view->setLayout($layoutName);
	    
		if(isset($vars)) 
		{
			foreach($vars as $varName => $var) 
			{
				$view->$varName = $var;
			}
		}

		return $view;
	}

	private static function getHtml($view, $layout, $item, $data)
	{
		$objectView = View::load($view, $layout, 'phtml');
  		$objectView->$item = $data;

  		ob_start();
  		echo $objectView->render();
  		$html = ob_get_contents();
  		ob_clean();

  		return $html;
	}
}

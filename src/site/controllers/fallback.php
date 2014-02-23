<?php 
namespace com_vaudevillian\Controllers;

defined( '_JEXEC' ) or die( 'Restricted access' ); 
class Fallback extends \JControllerBase
{
	public function execute()
	{
		 // Get the application
		$app = $this->getApplication();
		 
		// Get the document object.
		$document = $app->getDocument();
		 
		$viewName = $app->input->getWord('view', 'review');
		$viewFormat = $document->getType();
		$layoutName = $app->input->getWord('layout', 'list');
		 
		$app->input->set('view', $viewName);
		 
		// Register the layout paths for the view
		$paths = new \SplPriorityQueue;
		$paths->insert(JPATH_COMPONENT . '/views/' . $viewName . '/tmpl', 'normal');
		 
		//$viewClass = 'LendrViews' . ucfirst($viewName) . ucfirst($viewFormat);
		$viewClass = 'com_vaudevillian\\Views\\' . ucfirst($viewName) . '\\' . ucfirst($viewFormat);
		$modelClass = 'com_vaudevillian\\Models\\' . ucfirst($viewName);
		 
		if (false === class_exists($modelClass))
		{
			$modelClass = 'com_vaudevillian\\Models\\Review';
		}
		 
		$view = new $viewClass(new $modelClass, $paths);
		$view->setLayout($layoutName);
		 
		// Render our view.
		echo $view->render();
		 
		return true;
	}
}
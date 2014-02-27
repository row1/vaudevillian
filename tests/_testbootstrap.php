<?php
//http://www.aldoapp.com/tutorials/12-how-to-do-test-driven-development-for-joomla-component-part-2.html
//https://github.com/joomla/joomla-cms/blob/staging/tests/unit/bootstrap.php

require_once "_testbootstrapvariables.php";

if (!is_dir(realpath($pathToJoomla))) {
	throw new Exception("Could not find the folder: $pathToJoomla");
}

$_SERVER['HTTP_HOST'] = 'localhost';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '';


//start

define('_JEXEC', 1);

// Fix magic quotes.
ini_set('magic_quotes_runtime', 0);

// Maximise error reporting.
ini_set('zend.ze1_compatibility_mode', '0');
error_reporting(E_ALL & ~E_STRICT);
ini_set('display_errors', 1);


if (!defined('JPATH_PLATFORM'))
{
	define('JPATH_PLATFORM', realpath($pathToJoomla . '/libraries'));
}
if (!defined('JPATH_LIBRARIES'))
{
	define('JPATH_LIBRARIES', realpath($pathToJoomla . '/libraries'));
}
if (!defined('JPATH_BASE'))
{
	define('JPATH_BASE', realpath($pathToJoomla));
}
if (!defined('JPATH_ROOT'))
{
	define('JPATH_ROOT', realpath(JPATH_BASE));
}
if (!defined('JPATH_CACHE'))
{
	define('JPATH_CACHE', JPATH_BASE . '/cache');
}
if (!defined('JPATH_CONFIGURATION'))
{
	define('JPATH_CONFIGURATION', JPATH_BASE);
}
if (!defined('JPATH_SITE'))
{
	define('JPATH_SITE', JPATH_ROOT);
}
if (!defined('JPATH_ADMINISTRATOR'))
{
	define('JPATH_ADMINISTRATOR', JPATH_ROOT . '/administrator');
}
if (!defined('JPATH_INSTALLATION'))
{
	define('JPATH_INSTALLATION', JPATH_ROOT . '/installation');
}
if (!defined('JPATH_MANIFESTS'))
{
	define('JPATH_MANIFESTS', JPATH_ADMINISTRATOR . '/manifests');
}
if (!defined('JPATH_PLUGINS'))
{
	define('JPATH_PLUGINS', JPATH_BASE . '/plugins');
}
if (!defined('JPATH_THEMES'))
{
	define('JPATH_THEMES', JPATH_BASE . '/templates');
}
if (!defined('JDEBUG'))
{
	define('JDEBUG', false);
}

// Import the platform in legacy mode.
require_once JPATH_PLATFORM . '/import.legacy.php';

// Force library to be in JError legacy mode
JError::setErrorHandling(E_NOTICE, 'message');
JError::setErrorHandling(E_WARNING, 'message');

// Bootstrap the CMS libraries.
require_once JPATH_LIBRARIES . '/cms.php';

$srcPath = realpath("../src");
JTable::addIncludePath($srcPath.'/site/tables');
require_once $srcPath."/site/models/base.php";
require_once $srcPath."/site/models/review.php";

// Register the core Joomla test classes.
//JLoader::registerPrefix('Test', __DIR__ . '/core');
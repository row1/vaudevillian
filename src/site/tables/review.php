<?php 
namespace com_vaudevillian\Tables;
/*
* @package Vaudevillian.Site
*
* @copyright Copyright (C) 2014 Sockware, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE
* @link http://sockware.net
*/
defined( '_JEXEC' ) or die( 'Restricted access' ); 
 
class Review extends \JTable
{                      
  /**
  * Constructor
  *
  * @param object Database connector object
  */
  function __construct( &$db ) {
    parent::__construct('#__vaude_reviews', 'id', $db);
  }
}
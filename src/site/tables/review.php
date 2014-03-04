<?php 
namespace com_vaudevillian\Tables;

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
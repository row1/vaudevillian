<?php

class ReviewModelTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
    {
        //If this throws an exception, make sure that the db connection host is 127.0.0.1 and not localhost
		$app = \JFactory::getApplication('site');
    }
	
    public function testPlaceholder()
    {
    	$model = new com_vaudevillian\Models\Review();
		
        $this->assertEquals(1, 1);
    }

}
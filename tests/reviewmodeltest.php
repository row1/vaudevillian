<?php

class ReviewModelTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
    {
        //If this throws an exception, make sure that the db connection host is 127.0.0.1 and not localhost
		$app = \JFactory::getApplication('site');
    }
	
	private function createReview($fieldSuffix = null)
	{
		if($fieldSuffix == null)
		{
			$fieldSuffix = rand();
		}
		
		//TODO: fill in the dates
		$review = new com_vaudevillian\Models\Review();
		$review->access = 1;
		$review->alias = "alias$randomSuffix";
		//$review->created =
		$review->created_by = 1;
		$review->created_by_alias = "test user";
		$review->fulltext= "fulltext$randomSuffix";
		$review->images = "images$randomSuffix";
		$review->introtext = "introtext$randomSuffix";
		$review->metadata = "metadata$randomSuffix";
		$review->metadesc = "metadesc$randomSuffix";
		$review->metakey = "metakey$randomSuffix";
		//$review->modified
		$review->modified_by = $review->created_by;
		$review->modified_by_alias = $review->created_by_alias;
		//$review->publish_down
		//$review->publish_up
		$review->rating = 4;
		$review->status = 'approved';
		$review->status_reason ="statusreason$randomSuffix";
		$review->template_name = "templatedname$randomSuffix";
		$review->thumbnails = "thumbnails$randomSuffix";
		$review->title ="TEST-title$randomSuffix";
		$review->user_review = 1;
		
		return $review;
	}
	
    public function testSaveReview()
    {
    	$model = $this->createReview();
		
		$model->save();
				
        $this->assertGreaterThan(0, $model->id, "The ID of a saved review must be greater than 0");
    }

}
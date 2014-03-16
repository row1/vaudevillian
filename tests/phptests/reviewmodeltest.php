<?php
/*
* @package Vaudevillian.UnitTest
*
* @copyright Copyright (C) 2014 Sockware, Inc. All rights reserved.
* @license GNU General Public License version 2 or later; see LICENSE
* @link http://sockware.net
*/
class ReviewModelTest extends PHPUnit_Framework_TestCase
{
	protected function setUp()
    {
        //If this throws an exception, make sure that the db connection host is 127.0.0.1 and not localhost
		$app = \JFactory::getApplication('site');
		$deleteTestReviewsQuery = "DELETE FROM `mc19v_vaude_reviews` WHERE `title` LIKE 'test-%'";
		
		$db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->delete()
            ->from('#__vaude_reviews')
            ->where("title LIKE 'test-%'");
        $db->setQuery($query);
		$db->query();
    }
	
	private function createReview($fieldSuffix = null)
	{
		if($fieldSuffix == null)
		{
			$fieldSuffix = rand();
		}
		
		//TODO: fill in the dates
		//$review = new com_vaudevillian\Models\Review();
		$review = new \stdClass();
		$review->access = 1;
		$review->alias = "alias-$fieldSuffix";
		//$review->created =
		$review->created_by = 1;
		$review->created_by_alias = "test user";
		$review->fulltext= "fulltext-$fieldSuffix";
		$review->images = "images-$fieldSuffix";
		$review->introtext = "introtext-$fieldSuffix";
		$review->metadata = "metadata-$fieldSuffix";
		$review->metadesc = "metadesc-$fieldSuffix";
		$review->metakey = "metakey-$fieldSuffix";
		//$review->modified
		$review->modified_by = $review->created_by;
		$review->modified_by_alias = $review->created_by_alias;
		$review->publish_down = '0000-00-00 00:00:00';
		$review->publish_up = '0000-00-00 00:00:00';
		$review->rating = 4;
		$review->status = 'approved';
		$review->status_reason ="statusreason-$fieldSuffix";
		$review->template_name = "templatedname-$fieldSuffix";
		$review->thumbnails = "thumbnails-$fieldSuffix";
		$review->title ="TEST-title-$fieldSuffix";
		$review->user_review = 1;
		
		return $review;
	}

	private function compareReviews($expected, $actual, $ignoreId = true)
	{
		foreach ($expected as $property => $property_value)
		{    
		    if($property == 'id' && $ignoreId)
			{
				continue;
			}    
			$this->assertEquals($property_value, $actual->{"$property"}, $property);
		} 				
		
	}
	
    public function testStoreReview()
    {
		$model  = new com_vaudevillian\Models\Review();
		$toSave = $this->createReview();
		$savedReview = $model->store($toSave);
		
		$this->assertNotEquals(false, $savedReview, "Save returned false.");
				
        $this->assertGreaterThan(0, $savedReview->id, "The ID of a saved review must be greater than 0");
		$this->compareReviews($toSave, $savedReview);
    }
	
	public function testLoadReview()
	{
		$model  = new com_vaudevillian\Models\Review();
		
		$savedReview = $model->store($this->createReview());
		
		$loadedReview = $model->getItem($savedReview->id);
		
		$this->assertNotNull($loadedReview);
		$this->compareReviews($savedReview, $loadedReview);
		
		$loadedReview = $model->getItem(989456465465465);
		$this->assertNull($loadedReview);
	}
	
	public function testLoadReviews()
	{
		$model  = new com_vaudevillian\Models\Review();
		$savedReviews[] = $model->store($this->createReview());
		$savedReviews[] = $model->store($this->createReview());
		$savedReviews[] = $model->store($this->createReview());
		$savedReviews[] = $model->store($this->createReview());
		
		$loadedReviews = $model->getItems();
		
		$this->assertEquals(count($savedReviews), count($loadedReviews));
		
		for($i = 0; $i < count($savedReviews); $i++)
		{
			$this->compareReviews($savedReviews[i], $loadedReviews[i]);
		}
		
	}

}
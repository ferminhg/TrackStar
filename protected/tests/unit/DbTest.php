<?php
class DbTest extends CTestCase
{
	public function testConnection()
	{
		$this->assertNotEquals(NULL, Yii::app()->db);
	}

	public function testRecentComments()
	{
		$recentComments=Comment::findRecentComments();
		$this->assertTrue(is_array($recentComments));
		$this->assertEquals(count($recentComments),4);
		//make sure the limit is working
		$recentComments = Comment::findRecentComments(2);
		$this->assertTrue(is_array($recentComments));
		$this->assertEquals(count($recentComments),2);
		//test retrieving comments only for a specific project
		$recentComments = Comment::findRecentComments(5, 5);
		$this->assertTrue(is_array($recentComments));
		$this->assertEquals(count($recentComments),0);
	}
}